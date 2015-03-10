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

	public function search_news_validate(){
		$this->resultSearch = "Hello";
		echo $this->get();
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
				if($value != '')
					$condition = $condition." ".$key." = '".$value."'";
			}

			if($key == 'news_topic'){
				if($value != '')
					$condition = $condition." ".$key." like '%".$value."%'";
			}

			if($key == 'news_details'){
				if($value != '')
					$condition = $condition." ".$key." like '%".$value."%'";
			}
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