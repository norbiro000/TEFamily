<?php
Class Family extends CI_Controller{
	function __construct(){
		parent::__construct();

		$data = $this->setFamily($this->session->userdata('logged_in')['studentid']);
		$this->db->where('member_studentID', $this->session->userdata('logged_in')['studentid']);
		$this->db->update('tb_member', $data); 
		$this->load->model('family_database');
	}

	public function index(){
		$this->myfamily();
	}

	public function myfamily(){
		$studentid = $this->session->userdata('logged_in')['studentid'];
		$year = $this->setFamily($studentid);
		$familyName=$this->family_database->load_family_name($studentid);
		$familyList=$this->family_database->load_family_member($familyName[0]['member_family']);
		$takeList = $this->family_database->load_family_take($familyName[0]['member_family']);
		
		$data = array('familyData'=>$familyList,'partnerData'=>$takeList);
		$this->load->view('menu_view');
		$this->load->view('family_view',$data);
	}

	private function setFamily($id){
		$year = substr($id,0,2);
		$major = substr($id,4,3);
		$number = substr($id,7,3);
		$majorText;
		switch($major){
			case '211' : $majorText='IT'; break;
			case '212' : $majorText='E-Biz'; break;
			case '213' : $majorText='SE'; break;
			case '214' : $majorText='ETM'; break;
			case '215' : $majorText='GEO'; break;
		}

		$data = array('member_family'=> $majorText.$number,
			'member_startstudy'=> $year
		);

		return $data;
	}

}
?>