<?php
Class Partner extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('partner_database');
	}

	function index(){

	}

	function add(){
		$partername = $this->input->post('partnername');
		if(strlen($partername) == 2 ){
			$partername = "0"+$parternamen;
		}
		if(strlen($partername) == 1){
			$partername = "00"+$parternamen;
		}
		$major = $this->input->post('major');
		$familyname = $major.$partername;
		$hostname = $this->session->userdata('logged_in')['familyname'];
	
		$this->partner_database->save($familyname,$hostname);
	}
}

?>