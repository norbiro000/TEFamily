<?php
Class Family extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!is_logged_in()){
			redirect('user_authentication');
		}
		$this->load->model('family_database');
	}

	public function index(){
		$this->load->view('head');
		$this->load->view('menu_view');
		$this->myfamily();
	}

	public function myfamily(){

		$studentid = $this->session->userdata('logged_in')['studentid'];
		//$year = $this->setFamily($studentid);
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
			if(isset($vartest{$i})){
				array_push($partnerData, $vartest{$i});
			}
		}

		
		//$test = array('tttt'=>$vartest{}); 
		$a = array_merge($familyData,$partnerData);
		//var_dump($a);
		//var_dump($partnerData);

		//$data = array('familyData'=>$familyList,'partnerData'=>$partnerData);
		$data = array('familyData'=>$familyList,'partnerData'=>$a);
		$this->load->view('test',$data);
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