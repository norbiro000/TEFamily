<?php 
Class Login_model extends CI_Model
{
function login($username, $password)
{
   $this -> db -> select('member_id, member_username, member_password');
   $this -> db -> from('tb_member');
   $this -> db -> where('member_username', $username);
   $this -> db -> where('member_password', $password);
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
}
}
?>