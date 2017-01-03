<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct() {
		 parent::__construct();
		$this->load->library('session');
		// check if user is logged in
        $this->checkLoginStatus();

        $this->swapDatabase();
    }

    // redirect user to login page if not logged in
    protected function checkLoginStatus() {
        if (! $this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
        }
    }
	
	protected function swapDatabase()
	{
		$this->load->model('Admin_model');
		$session_data = $this->session->userdata('logged_in');
		
		$school_id = $session_data['school_id'];
		if($session_data['school_id']) 
		{
			$school_db = $this->Admin_model->getSchoolDB($school_id); 
				
			if($school_db->db_name)
			{
					$this->db->close();
					$config['hostname'] = $this->db->hostname;
					$config['username'] = $this->db->username;
					$config['password'] = $this->db->password;
					$config['database'] = trim(strtolower($school_db->db_name));
					$config['dbdriver'] = $this->db->dbdriver;
					
	
					$this->load->database($config, FALSE, TRUE);
					
					$user_det = $this->Admin_model->get_user($session_data['username']); 
					$sess_array = array(
					 'userid' => $user_det->id,
					 'username' => $user_det->username,
					 'school_id' => $school_id
				   );
				   $this->session->set_userdata('logged_in', $sess_array);
					
			}
		}
		
	}
}