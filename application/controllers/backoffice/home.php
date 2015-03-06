<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->load->helper('login');
		if(is_logged_in()){
			$this->load->view('backoffice/home_view');
		}
		else{
			redirect('backoffice/login', 'refresh');
		}
		
	}

    public function logout(){
    	logout();
    	redirect('backoffice/home', 'refresh');
    }

}

?>