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
		$this->load->view('head');
		$this->load->view('menu_view');
		$this->myfamily();
	}

	public function myfamily(){
		$studentid = $this->session->userdata('logged_in')['studentid'];
		$year = $this->setFamily($studentid);
		$familyName=$this->family_database->load_family_name($studentid);
		$familyList=$this->family_database->load_family_member($familyName[0]['member_family']);
		$takeNames=$this->family_database->load_family_buddy_name($familyName[0]['member_family']);
		$takeList = $this->family_database->load_family_buddy($familyName[0]['member_family']);
		$partnerData=array();
		$familyData=array("0"=>$familyList);
		foreach ($takeList as $key) {
			for($i=0;$i<count($takeNames);$i++){
				if($key['member_family']==$takeNames[$i]['take_partner']){
					$vartest{$i}[] = $key;
					//array_push($take, $vartest{$i});
					//array_push($partnerData, $vartest{$i});
				}
			}
		}
		for($i=0;$i<count($takeNames);$i++){
			array_push($partnerData, $vartest{$i});
		}

		
		//$test = array('tttt'=>$vartest{}); 
		$a = array_merge($familyData,$partnerData);
		//var_dump($a);
		//var_dump($partnerData);

		//$data = array('familyData'=>$familyList,'partnerData'=>$partnerData);
		$data = array('familyData'=>$familyList,'partnerData'=>$a);
		$this->load->view('test',$data);
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

	public function getPartnerListJSON(){
		$studentid = $this->session->userdata('logged_in')['studentid'];
		$familyName=$this->family_database->load_family_name($studentid);
		$takeNames=$this->family_database->load_family_buddy_name($familyName[0]['member_family']);
		echo json_encode($takeNames);
	}

	public function deleteTake(){
		$takeid = $this->uri->segment(3);
		$this->family_database->deleteTake($takeid);
	}

}
?>