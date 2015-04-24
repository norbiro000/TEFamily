<?php 
Class Profile extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('search_database');
		$this->load->helper(array('form', 'url'));
	 	$this->load->library('form_validation');
	 	$this->load->model('member_database');

	}

	public function index(){
		$this->load->view('head');
		$this->load->view('menu_view');
		$id = $this->uri->segment(3);
		if($id==''){
			$id = $this->session->userdata('logged_in')['studentid'];
		}

		$result = $this->member_database->load_profile($id);
		$this->load->view('profile_view',array('data'=>$result));
	}


	public function editprofile(){
		$id = $this->session->userdata('logged_in')['studentid'];
		$colum = $this->input->post('colum');
		$data = $this->input->post('data');
		$data = array(
               $colum => $data
        );

		$this->db->where('member_studentID', $id);
		$this->db->update('tb_member', $data); 
		echo 'SUCCESS';
	}

	public function addWork(){
		$id = $this->session->userdata('logged_in')['studentid'];
		$orgname = $this->input->post('orgname');
		$address = $this->input->post('address');
		$telephone = $this->input->post('telephone');
		$job = $this->input->post('job');
		$workcity = $this->input->post('workcity');
		$date = $this->input->post('date');

		$data = array(
		   'tl_studentid' => $id ,
		   'tl_officename' => $orgname ,
		   'tl_officeaddress' => $address,
		   'tl_officetelnumber' => $telephone ,
		   'tl_jobs' => $job,
		   'tl_workcity' => $workcity ,
		   'tl_datetime' => $date

		);

		$this->db->insert('tb_timeline', $data); 
	}

	public function deleteWork(){
		$id = $this->input->get('wid');
		$this->db->delete('tb_timeline', array('tl_id' => $id)); 
	}

}
?>