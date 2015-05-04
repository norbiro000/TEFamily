

<?php

session_start(); //we need to start session in order to access it through CI

Class User_Authentication extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('login_database');
		$this->load->view('menu_view');
		$this->load->view('head');

	}

	public function index(){
		if($this->session->userdata('logged_in')==null){
			$this->load->view('login_form');
		}else{

			$result = $this->login_database->read_user_information($this->session->userdata('logged_in'));
			if($result != false){
				$data = array(
					'username' =>$result[0]->member_username,
					'password' =>$result[0]->member_password,
					'studentid' =>$result[0]->member_studentID,
					'usertype' =>$result[0]->member_type,
					'familyname' =>$result[0]->member_family
					);
				$this->load->view('admin_page', $data);
			}
		}
	}

// Show login page
	public function user_login_show() {
		$this->load->view('login_form');
	}

// Show registration page
	public function user_registration_show() {
		$this->load->view('registration_form');
	}

// Validate and store registration data in database
	public function new_user_registration() {

// Check validation for user input in SignUp form
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('registration_form');
		} else {
			$data = array(
				'member_username' => $this->input->post('username'),
				'member_password' => $this->input->post('password')
				);
			$result = $this->login_database->registration_insert($data) ;
			if ($result == TRUE) {
				$data['message_display'] = 'Registration Successfully !';
				$this->load->view('login_form', $data);
			} else {
				$data['message_display'] = 'Username already exist!';
				$this->load->view('registration_form', $data);
			}
		}
	}

// Check for user login process
	public function user_login_process() {

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login_form');
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
				);
			$result = $this->login_database->login($data);
			if($result == TRUE){
				$sess_array = array(
					'username' => $this->input->post('username')
					);

// Add user data in session
				//$this->session->set_userdata('logged_in', $sess_array);
				$result = $this->login_database->read_user_information($sess_array);
				if($result != false){
					$data = array(
						
						'username' =>$result[0]->member_username,
						'password' =>$result[0]->member_password,
						'studentid' =>$result[0]->member_studentID,
						'usertype' =>$result[0]->member_type,
						'familyname' =>$result[0]->member_family
						);
				$this->session->set_userdata('logged_in', $data);
				redirect('');
				}
			}else{
				$data = array(
					'error_message' => 'Invalid Username or Password'
					);
				$this->load->view('login_form', $data);
			}
		}
	}

// Logout from admin page
	public function logout() {
// Removing session data
		$sess_array = array(
			'username' => ''
			);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		redirect('User_Authentication');
	}
}

?>

