<?php 
Class Search_Database extends CI_Model{
	public function search_news($condition,$where){
		$this->db->select('*');
		$this->db->from('tb_news');
		$this->db->where($condition." LIKE '%".$where."%'");
		$query=$this->db->get();
		return $query->result_array();
	}
}
?>