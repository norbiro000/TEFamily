<?php 
Class Search_Database extends CI_Model{
	public function search_news(){
		$this->db->select('*');
		$this->db->from('tb_news');
		$query=$this->db->get();
		return $query->result_array();
	}

	public function search_members(){
		$this->db->select('*');
		$this->db->from('tb_member');
		$query=$this->db->get();
		return $query->result_array();
	}

	public function search_timelines(){
		$this->db->select('*');
		$this->db->from('tb_timeline');
		$query=$this->db->get();
		return $query->result_array();
	}
}
?>