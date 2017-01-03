<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->helper('form');
   $this->load->library('session');
   $this->load->model('Admin_model');
 }

 function index()
 {
   $this->load->helper('security');
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('admin/login');
   }
   else
   {
     //Go to private area
     //$this->load->view('admin/index');
	 redirect('admin/index');
   }
 }
 
 function check_database($password)
 {

	//Field validation succeeded.  Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->Admin_model->login($username, $password);
	
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
 
 function login_ang() {
	$this->load->library('form_validation');
	
	$postdata = file_get_contents('php://input');
	$request = json_decode($postdata);
	$username = $request->username;
	$password = $request->password;
	$result = $this->Admin_model->login($username, $password);
	if($result)
	{
	 $sess_array = array();
	 foreach($result as $row)
	 {
	   $sess_array = array(
		 'id' => $row->id,
		 'username' => $row->username
	   );
	   $this->session->set_userdata('logged_in', $sess_array);
	 }
	 echo $result = '{"status" : "success"}';
	}
	else
	{
	 echo $result = '{"status" : "failure","msg" : "Invalid username or password"}';
	}
	
 }
 
 public function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('login', 'refresh');
	 }

}

?>