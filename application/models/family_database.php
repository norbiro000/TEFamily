<?php
CLass Family_Database extends CI_Model{

	public function load_profile($stdID){
		$this->db->select('*');
		$this->db->from('tb_member');
		$this->db->join('tb_timeline', 'tb_timeline.tl_studentid = tb_member.member_studentID' ,'left');
		$this->db->where('member_studentID = '.$stdID);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function load_family_name($stdID){
		$this->db->select('member_family');
		$this->db->from('tb_member');
		$this->db->where('member_studentID = '.$stdID);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function load_family_member($familyName){
		$this->db->select('*');
		$this->db->from('tb_member');
		$this->db->where("member_family = '".$familyName."'");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function load_family_buddy($familyName){
		$this->db->select('*');
		$this->db->from('tb_take');
		$this->db->join('tb_member', 'tb_member.member_family = tb_take.take_partner');
		$this->db->where("take_host = '".$familyName."'");
		$this->db->order_by('member_studentID','AES');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function load_family_buddy_name($familyName){
		$this->db->select('take_id, take_partner');
		$this->db->distinct();
		$this->db->from('tb_take');
		$this->db->where("take_host = '".$familyName."'");
		$this->db->order_by('take_partner','AES');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function deleteTake($takeId){
		$this->db->delete('tb_take', array('take_id' => $takeId));
	}

}
?>