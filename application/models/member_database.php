<?php
CLass Member_Database extends CI_Model{
	public function load_profile($stdID){
		$this->db->select('*');
		$this->db->from('tb_member');
		$this->db->join('tb_timeline', 'tb_timeline.tl_studentid = tb_member.member_studentID' ,'left');
		$this->db->where('member_studentID = '.$stdID);
		$query = $this->db->get();
		return $query->result_array();
	}

}
?>