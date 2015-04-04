
<?php

Class Login_Database extends CI_Model {

// Insert registration data in database
public function registration_insert($data) {

// Query to check whether username already exist or not
$condition = "member_username =" . "'" . $data['member_username'] . "'";
$this->db->select('*');
$this->db->from('tb_member');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 0) {

// Query to insert data in database
$this->db->insert('tb_member', $data);
if ($this->db->affected_rows() > 0) {
return true;
}
} else {
return false;
}
}


// Read data using username and password
public function login($data) {

$condition = "member_username =" . "'" . $data['username'] . "' AND " . "member_password =" . "'" . $data['password'] . "'";
$this->db->select('*');
$this->db->from('tb_member');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return true;
} else {
return false;
}
}

// Read data from database to show data in admin page
public function read_user_information($sess_array) {

$condition = "member_username =" . "'" . $sess_array['username'] . "'";
$this->db->select('*');
$this->db->from('tb_member');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}

}

?>

