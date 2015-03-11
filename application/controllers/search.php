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
		$this->search_news();
	}

	public function search_news(){
		$this->load->view('search_news_view');		
	}

	private function setDateTime($year,$month,$date){
		$datetime = '';

		if($year!=''){
			$datetime = $datetime.$year.'-';
		}else{
			$datetime = $datetime.'0000-';
		}

		if($month!=''){
			$datetime = $datetime.$month.'-';
		}else{
			$datetime = $datetime.'00-';
		}
		
		if($date!=''){
			$datetime = $datetime.$date.'-';
		}else{
			$datetime = $datetime.'00';
		}

		if(substr($datetime,0,4)=='0000'){
			$datetime =  date("Y").substr($datetime,4,6);
		}

		return $datetime;
	}

	public function search_news_validate(){
		$this->form_validation->set_rules('newsid','News ID','');
		$this->form_validation->set_rules('newstopic','News Topic','');
		$this->form_validation->set_rules('newsdetails','News Details','');
		$this->form_validation->set_rules('date','News Date','');
		$this->form_validation->set_rules('month','News month','');
		$this->form_validation->set_rules('year','News Topic','');

		$datetime=$this->setDateTime($this->input->post('year'),$this->input->post('month'),$this->input->post('date'));
		$data = array('news_newsID'=> $this->input->post('newsid'),
			'news_topic'=>$this->input->post('newstopic'),
			'news_details'=>$this->input->post('newsdetails'),
			'news_createdate'=>$datetime
			);

		$result = $this->search_news_load($data);
		$this->resultSearch = $result;
	}


	public function search_news_load($data){
		$condition = '';

		//make Connection String
		foreach ($data as $key => $value) {
			if($condition != '' && $value != ''){
				$condition = $condition . ' AND ';
			}

			if($key == 'news_newsID'){
				if($value != '')
					$condition = $condition."".$key." = '".$value."'";
			}

			if($key == 'news_createdate'){
				if(substr_count($value, '00')>= 1){
					$condition = $condition."".$key." >= '".$value."%'";
				}
				else{
					$condition = $condition."".$key." LIKE '".$value."%'";
				}
			}

			if($key == 'news_topic'){
				if($value != '')
					$condition = $condition."".$key." like '%".$value."%'";
			}

			if($key == 'news_details'){
				if($value != '')
					$condition = $condition."".$key." like '%".$value."%'";
			}
		}

		if(substr($condition,-5, 5) == ' AND '){
			$condition = substr($condition,0,-5);
		}
		if(substr($condition,-3, 3) == '--%'){
			$condition = substr($condition,0,-3);
		}
		if(substr($condition,-5, 5) == ' AND '){
			$condition = substr($condition,0,-5);
		}

		$result = $this->search_database->search_news($condition);
		return $result;

	}

	public function search_member(){
		
	}

	public function get(){
		$temp = $this->resultSearch;
		$this->resultSearch='';
		return $temp;
	}
}
?>