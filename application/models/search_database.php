<?php 
Class Search_Database extends CI_Model{
	public function search_news($condition){
		$this->db->select('*');
		$this->db->from('tb_news');
		$this->db->where($condition);
		$query=$this->db->get();
		print_r($query);
		$this->output->enable_profiler(TRUE);
		return $query->result_array();
	}
}
?>