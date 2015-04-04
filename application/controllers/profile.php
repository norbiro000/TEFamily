<?php 
Class Profile extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('search_database');
		$this->load->helper(array('form', 'url'));
	 	$this->load->library('form_validation');
	 	$this->load->model('member_database');
	 	$this->load->view('menu_view');
		$this->load->view('head');
	}

	public function index(){
		$id = $this->uri->segment(3);
		if($id==''){
			$id = $this->session->userdata('logged_in')['studentid'];
		}

		$result = $this->member_database->load_profile($id);
		$this->load->view('profile_view',array('data'=>$result));
	}


	public function editprofile(){

	}

	public function show(){

	}

}
?>