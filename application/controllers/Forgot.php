<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Forgot extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// Load database
		$this->load->model('users');
		// Load form helper library
        $this->load->helper('form');
        // Load form validation library
        $this->load->library('form_validation');
    }
// Check for user login process
public function index(){      
		$this->load->view('forgot');
   }
public function retrieve(){
        $email = $this->input->post('email');  
        $data['members_data'] = $this->users->check_email($email);
	     if($data['members_data'] != false) {
	       $data = array(
		   'success_message' => 'Information on how to reset password sent to '.$email
		  );
		   $this->load->view('forgot',$data);
		  } 
	     else {
		   $data = array(
		   'error_message' => 'Email not registered...'
		  );
		  $this->load->view('forgot', $data);
		}
     }
public function users(){
        $data['user_data'] = $this->login_database->read('1');
	     if($data['user_data'] != false) {
		   $this->load->view('users',$data);
		  } 
	     else {
		   $data = array(
		   'error_message' => 'No users found ...'
		  );
		  $this->load->view('users', $data);
		}
	}
public function update(){ 
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $pass = $this->input->post('password');
        $password = md5($pass);
        $data = array(
		'password' => $password,
        'email' => $email,
        'phone' => $phone
		);
    $result = $this->login_database->update($username,$data);
	 if($result != false) {
		$session_data = array(
		'username' => $username,
        'email' => $email,
        'password' => $pass,
        'phone' => $phone,
        'user_level' => $this->session->userdata['logged_in']['user_level']
		);
		// Add user data in session
		$this->session->set_userdata('logged_in', $session_data);
 	    $data = array(
		'success_message' => 'Information updated ...'
		);
		$this->load->view('dashboard',$data);
		} 
	else {
		$data = array(
		'error_message' => 'Update failed ...'
		);
		$this->load->view('dashboard', $data);
		}
    }
  public function logout(){
// Removing session data
		$sess_array = array(
        'password' => '',
        'email' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['logout_message'] = 'Successfully Logged Out';
		$this->load->view('index',$data);
		}
   }
?>