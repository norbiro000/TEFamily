<?php
Class Family2 extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('family_database');
	}



	public function getPartnerListJSON(){
		$studentid = $this->session->userdata('logged_in')['studentid'];
		$familyName=$this->family_database->load_family_name($studentid);
		$takeNames=$this->family_database->load_family_buddy_name($familyName[0]['member_family']);
		echo json_encode($takeNames);
	}

}
?>