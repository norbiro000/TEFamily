<?php 
Class Test extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->view('menu_view');
		$this->load->view('head');
	}

	public function index(){
		$this->load->view('test');
	}
}

?>