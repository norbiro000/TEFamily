<?php 
Class Search extends CI_Controller{
	public $resultSearch;

	function __construct(){
		parent::__construct();
		$this->load->model('search_database');
		$this->load->helper(array('form', 'url'));
	 	$this->load->library('form_validation');
	}

	public function index(){
		$this->find();
	}

	public function find(){
		$this->load->view('head');
		$this->load->view('menu_view');
		$dataNews=$this->search_database->search_news();
		$dataMembers=$this->search_database->search_members();
		$dataTimeline=$this->search_database->search_timelines();
		$this->load->view('search_view', array('dataMember'=>$dataMembers,'dataNews'=>$dataNews,'dataTimeline'=>$dataTimeline));
	}
}
?>