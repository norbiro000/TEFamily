<?php 

class Member_Management extends CI_Controller {
	public function __construct() {
	 	parent::__construct();
	 	$this->load->helper(array('form', 'url'));
	 	$this->load->library('form_validation');
	 }

	public function index(){
		
	}

	public function member_add(){
		$this->load->view('member_management_add_view');
	}

	public function member_add_save(){
		$this->form_validation->set_rules('studentid','studentid','required|min_length[10]|max_length[10]|is_unique[tb_member.member_studentID]');
		$this->form_validation->set_rules('fname','fname','required');
		$this->form_validation->set_rules('lname','lname','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('conf-password','Password Confirmation','required|matches[password]');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('member_management_add_view');
		}
		else
		{
			$data = array('member_studentID' => $this->input->post('studentid'),
				'member_username' => $this->input->post('studentid'),
				'member_firstname' => $this->input->post('fname'),
				'member_lastname' => $this->input->post('lname'),
				'member_password' => $this->input->post('password'),
				'member_type' => 'student'
				);
			$this->db->insert('tb_member',$data);
			$this->load->view('member_management_add_view');
		}
	}

	public function member_edit(){
		
	}

	public function member_delete(){
		
	}

}?>