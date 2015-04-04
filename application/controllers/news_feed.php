<?php
class News_feed extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('news_feed_database');
		$this->load->helper('date');
		$this->load->helper('url');
		$this->load->library('image_lib');
		$this->load->controller('search');
		$this->load->view('menu_view');
		$this->load->view('head');
		

	}

	public function index(){
	
		$this->read_news($this->uri->segment(3));
		if(is_logged_in()){
			$this->load->view('news_feed_post_view');
		}
		
		$this->show_news_feed();

		//$this->load->view('search_news_view');
		//$this->load->view('news_feed_post_view');
	}

	public function show_news_feed(){
		$result = $this->news_feed_database->load_public_news('public');
		$viewer = array('studentid' => $this->session->userdata('logged_in')['studentid'],'usertype' => $this->session->userdata('logged_in')['usertype']);	
		$this->load->view('news_feed_view.php', array('data'=> $result,'viewer'=> $viewer));
	}

	public function read_news($news_id){
		if($news_id==null){
			$result = $this->news_feed_database->load_public_news('public');
		}else{
			$result = $this->news_feed_database->load_news_by_id('public',$news_id);
		}
		$this->load->view('news_feed_read_news',array('data'=> $result));
	}

	public function post_news_feed(){
		$this->form_validation->set_rules('topic','Topic','');
		$this->form_validation->set_rules('details','Details','');
		if($this->form_validation->run()==false){
			redirect('news_feed');
	}

		//get username form session
		$author=$this->session->userdata('logged_in')['studentid'];

		//pass parameter to model and save
		$this->news_feed_database->post_news($this->input->post('topic'),$this->input->post('details'),$author,$this->get_time());
		redirect('news_feed','refresh');
	}

	public function delete_news_feed(){
		$this->news_feed_database->delete_news($this->uri->segment(3));
		$this->index();
		redirect('news_feed','refresh');
	}

	public function edit_news_feed(){
		$news_id = $this->uri->segment(3);
		$data = $this->news_feed_database->load_news_by_id('public',$news_id);
		$this->load->view('news_feed_edit_view', array('data' => $data));
	}

	public function edit_news_save_feed(){
		$news_id = $this->input->post('id');

		$data = array(
               'news_topic' => $this->input->post('topic'),
               'news_details' => $this->input->post('details'),
               'news_editby' => $this->session->userdata('logged_in')['username'],
               'news_editdate' => $this->get_time()
            );

		$this->news_feed_database->edit_news($data,$news_id);
		redirect('news_feed','refresh');
	}

	public function get_time(){
		date_default_timezone_set('Asia/Bangkok');
		$datestring = "%Y-%m-%d %h:%i:%s";
		$time = time();
		return mdate($datestring,$time);
	}
}
?>