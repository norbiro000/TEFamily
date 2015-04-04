<?php 
Class Search_News extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	 	$this->load->library('form_validation');
	 	$this->load->model('search_database');
	}

	public function index(){
		$this->load->view('search_news_view');

	}

	public function getData()
	{
		$this->form_validation->set_rules('search','Search','');

		echo $this->input->post('search');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('search_news_view');
			echo $this->input->post('search');
		}
		else
		{
			
			$result=$this->search_database->search_news($this->input->post('shirts'),$this->input->post('search'));
			var_dump($result);
		}

	}

}
?>