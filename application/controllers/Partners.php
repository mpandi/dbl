<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Partners extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// Load database
		$this->load->model('partners_database');
		// Load form helper library
        $this->load->helper('form');
        // Load form validation library
        $this->load->library('form_validation');
    }
// Check for user login process
public function create(){
      $this->load->view('add_partner');
   }
public function view(){
        $data['users_data'] = $this->partners_database->read();
	     if($data['users_data'] != false) {
		   $this->load->view('view_partners',$data);
		  } 
	     else {
		   $data = array(
		   'error_message' => 'No partners at the moment...'
		  );
		  $this->load->view('view_partners', $data);
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
public function add(){ 
        $email = $this->input->post('email');
        $full_name = $this->input->post('fname');
        $phone = $this->input->post('phone');
        $state= $this->input->post('state');
        $city = $this->input->post('city');       
        $postal=$this->input->post('postal');           				
        
        $address = $this->input->post('address');
        $country=$this->input->post('country');
        $assignee=$this->input->post('assignee');
        
        $data = array(
    		'email' => $email,
            'fullname' => $full_name,
            'phone' => $phone,
            'city' => $city,
            'country' => $country,
            'state' => $state,
            'postal_code' => $postal,
            'assigned_to' => $assignee,
            'address' => $address,
            'password' => sha1('test1234')                                       
		);
		echo $this->partners_database->insert($data);		
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