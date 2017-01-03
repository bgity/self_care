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
	 
	 $sess_array = array(
		 'userid' => $result->id,
		 'username' => $result->username
	   );
	   
	 $this->session->set_userdata('logged_in', $sess_array);
	 
	 echo $result = '{"status" : "success"}';
	}
	else
	{
	 echo $result = '{"status" : "failure","msg" : "Invalid username or password"}';
	}
	
 }
 
 public function forgotPassword() {
	 $postdata = file_get_contents('php://input');
	 $request =  json_decode($postdata, true);
	 $response= array();
	
	 $checkUser = $this->Admin_model->checkUserExist($request['email']);
	 
	 if($checkUser) {
		 $newpassword = $this->randomPassword(8);
	 
		 $this->load->library('email');

		 $this->email->from('info@selfcare.com', 'Selfcare');
		 $this->email->to($request['email']); 
		 
		 $this->email->set_newline("\r\n");
		 $email_body ="<div>Hi, </div>
						<div>&nbsp;</div>
						<div>Your password has been reset. Please use the new password: ".$newpassword."</div>";
		 
		 $this->email->subject('Selfcare - Forgot Password');
		 $this->email->message($email_body);	
		 
		 $this->email->set_mailtype("html");

		 if(!$this->email->send()) {
			 $response['message'] = 'There was some problem in sending the email. Please try again later.';
			 $response['status'] = false;
		 }
		 else {
			 $result = $this->Admin_model->updatePassword($request['email'], $newpassword);
			 if($result) {
				$response['message'] = 'An email has been sent to the mentioned email id. Please check your email.';
				$response['status'] = true;
			 }
			 else {
				$response['message'] = 'There was some problem in updating the password. Please try again later.';
				$response['status'] = false;
			 }
		 }
	 }
	 else {
		 $response['message'] = 'Email address entered is not in records. Please enter valid email address.';
		 $response['status'] = false;
	 }
	 
	 
	 $this->output->set_content_type('application/json')->set_output(json_encode($response));
 }
 
 public function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('login', 'refresh');
	 }

	public function randomPassword( $length = 8 ) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$password = substr( str_shuffle( $chars ), 0, $length );
		return $password;
	}
	
	/* Function added for changePassword popup view */
	public function changePassword() {
		$this->load->view('admin/changePassword');
	}
	
	/* Function to update password */
	public function changeUserPassword() {
		$postdata = file_get_contents('php://input');
		$request = json_decode($postdata, TRUE);
		
		$response = $this->Admin_model->changeUserPassword($request);
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
}

?>