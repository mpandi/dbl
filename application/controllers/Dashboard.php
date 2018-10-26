<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
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
       if(isset($this->session->userdata['logged_in'])){
         $this->load->view('dashboard');
        }
       else{
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $data = array(
		'email' => $email,
		'password' => $password
		);
		$result = $this->users->login($data);
	    if($result != false) {
		 $session_data = array(
		  'email' => $result[0]->email,
          'password' => $password,
          'is_admin' => $result[0]->is_admin
		);
		// Add user data in session
		 $this->session->set_userdata('logged_in', $session_data);
         $this->load->view('dashboard');
        }
	else {
		$data = array(
		'error_message' => 'Invalid Email or Password',
        'email' => $email
		);
		$this->load->view('index', $data);
		}
     }
   }
public function filter(){
        $inmateid = $this->input->post('inmateid');
        $fname = $this->input->post('fname');
        if(!empty($inmateid)){
            $data = array(
        		'inmate' => $inmateid
        		);
        }
        else{
           $data = array(
    		'full_name' => $fname
    		); 
        }      
        $data['members_data'] = $this->login_database->filter($data);
	     if($data['members_data'] != false) {
		   $this->load->view('dashboard',$data);
		  } 
	     else {
		   $data = array(
		   'error_message' => 'Nothing found by the search...'
		  );
		  $this->load->view('dashboard', $data);
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