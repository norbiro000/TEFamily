<?php
	function is_logged_in() {
	    // Get current CodeIgniter instance
	    $CI =& get_instance();
	    // We need to use $CI->session instead of $this->session
	    $user = $CI->session->userdata('logged_in');
	    if ($user==false) { return false; } else { return true; }
	}

	function getUserType(){
	    // Get current CodeIgniter instance
	    $CI =& get_instance();
	    $user="";
	    // We need to use $CI->session instead of $this->session
	    if(isset($CI->session->userdata('logged_in')['usertype']))
	    $user = $CI->session->userdata('logged_in')['usertype'];
	    return $user;
	}

	function getUserStudentID(){
	    // Get current CodeIgniter instance
	    $CI =& get_instance();
	    $user="";
	    // We need to use $CI->session instead of $this->session
	    if(isset($CI->session->userdata('logged_in')['studentid']))
	    $user = $CI->session->userdata('logged_in')['studentid'];
	    return $user;
	}

	function logout(){
			    $CI =& get_instance();
	    // We need to use $CI->session instead of $this->session
		$CI->session->unset_userdata('logged_in');
	}
?>