<?php 

class Member_Management extends CI_Controller {
	public function __construct() {
	 	parent::__construct();
	 	$this->load->helper(array('form', 'url'));
	 	$this->load->library('form_validation');
	 	$this->load->model('member_management_database');
	 }

	public function index(){
		$this->member_add();
		$this->member_edit();
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
				'member_picprofile' => 'null',
				'member_type' => 'student'
				);
			$this->db->insert('tb_member',$data);
			$this->load->view('member_management_add_view');
			redirect('Member_Management');
		}
	}

	public function member_edit(){
		$result = $this->member_management_database->load_all_member();
		$this->load->view('member_management_edit_view',array('data'=>$result));
	}

	public function member_edit_edit(){
		$stdID=$this->uri->segment(3);
		$result = $this->member_management_database->load_member_by_id($stdID);
		$this->load->view('member_management_edit_edit_view',array('data'=> $result));
	}

	public function member_edit_save(){
		//check old data
		$stdID = $this->input->post('studentidhide');
		$result = $this->member_management_database->load_member_by_id($stdID);
		var_dump($result);
		if($result[0]['member_username']!=$this->input->post('username') || $result[0]['member_email']!=$this->input->post('email')){
			$this->form_validation->set_rules('username','Username','is_unique[tb_member.member_username]');
			$this->form_validation->set_rules('email','Email','is_unique[tb_member.member_email]');
		}
		$this->form_validation->set_rules('fname','Firstnamr','');
		$this->form_validation->set_rules('lname','Lastname','');
		$this->form_validation->set_rules('nickname','Nickname','');
		$this->form_validation->set_rules('address','Address','');
		$this->form_validation->set_rules('telnumber','telnumber','is_natural');


		if ($this->form_validation->run() == FALSE)
		{
			redirect('member_management/member_edit_edit/'.$stdID);
		}
		else
		{
			$data = array('member_username' => $this->input->post('username'),
				'member_firstname' => $this->input->post('fname'),
				'member_lastname' => $this->input->post('lname'),
				'member_email' => $this->input->post('email'),
				'member_nickname' => $this->input->post('nickname'),
				'member_address' => $this->input->post('address'),
				'member_major' => $this->input->post('major'),
				'member_telephone' => $this->input->post('telnumber')
				);

			$this->db->where('member_studentID',$stdID);
			$this->db->update('tb_member',$data);
			redirect('Member_Management');
		}
	}
	public function member_delete(){
		$stdID=$this->uri->segment(3);
		$this->db->where('member_studentID',$stdID);
		$this->db->delete('tb_member');
		redirect('member_management');
	}

}?>