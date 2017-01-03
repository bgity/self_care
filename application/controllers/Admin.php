<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Admin_model');
	}
	
	public function index()
	{
		$data['title'] = "Dashboard";
		       
		
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			
			$this->load->view('admin/header', $data);
			$this->load->view('admin/index', $data);
			$this->load->view('admin/footer');
		}
		else
		{
		 //If no session, redirect to login page
		 redirect('login', 'refresh');
		}
	}
	
	public function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('login', 'refresh');
	 }

}