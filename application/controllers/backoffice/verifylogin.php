<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to start session in order to access it through CI

class VerifyLogin extends CI_Controller {
 
function __construct()
{
   parent::__construct();
   $this->load->model('backoffice/login_model','',TRUE);
}
 
function index()
{

   //This method will have the credentials validation
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
    
     //Field validation failed.  User redirected to login page
     $this->load->view('backoffice/login_view');
   }
   else
   {
     //Go to private area
     redirect('backoffice/home', 'refresh');
   }
 
}
 
function check_database($password)
{
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
 
   //query the database
   $result = $this->login_model->login($username, $password);
 
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->member_id,
         'username' => $row->member_username
       );
      $this->session->set_userdata('logged_in',$sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
}

  function logout(){
    $sess_array = array(
           'id' => '',
           'username' => ''
         );
        $this->session->unset_userdata('logged_in',$sess_array);
  }


}
?>