<?php
Class Member_Management_database extends CI_Model {
	public function load_all_member(){
			$this->db->select('*');
			$this->db->from('tb_member');
			$this->db->order_by('member_studentID','ASC');
			$query = $this->db->get();
			return $query->result_array();
	}

	public function load_member_by_id($stdID){
			$condition = "member_studentID = ".$stdID;
			$this->db->select('*');
			$this->db->from('tb_member');
			$this->db->where($condition);
			$query = $this->db->get();
			return $query->result_array();
	}
}
