<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// Load database
		$this->load->model('users');
		// Load form helper library
        $this->load->helper('form');
        // Load form validation library
        $this->load->library('form_validation');
    }
public function index(){
		  $this->load->view('index');
		}
   }
?>