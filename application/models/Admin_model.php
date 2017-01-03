<?php
Class Admin_model extends CI_Model
{
	// Check login of user
	 public function login($username, $password)
	 {
		 
	   $this->db->select('id, username, password');
	   $this->db->from('users');
	   $this->db->where('username', $username);
	   $this->db->where('password', MD5($password));
	   $this->db->limit(1);

	   $query = $this->db->get();
	 
	   if($query->num_rows() == 1)
	   {
		   //print_r($query->row());
		 return $query->row();
	   }
	   else
	   {
		 return false;
	   }
	 }
 
 // Read user data from database to show data in admin page
	public function get_user($username) {

		$condition = "username =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}
	
	// Update password on forget password
	public function updatePassword($email, $newpassword) {
		
		$data = array('password'=>MD5($newpassword));
		
		$this->db->where('email',trim($email));
		
		$result = $this->db->update('users',$data);
		
		if($result) {
			return true;
		}
		else {
			return false;
		}
	}
	
	// Function to check if user exist using email
	public function checkUserExist($uemail) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$uemail);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to change user password
	public function changeUserPassword($rdata) {
		$response = array();
		
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array('password'=>md5($rdata['current_pass']), 'id'=>$rdata['user_id']));
		$query = $this->db->get();
		
		if ($query->num_rows()) {
			if($rdata['new_pass'] != $rdata['confirm_pass']) {
				$response['message'] = 'Entered new passwords doesnot match.';
				$response['status'] = false;
			}
			else {
				$data = array('password'=>MD5($rdata['new_pass']));
				$this->db->where('id',$rdata['user_id']);
				$result = $this->db->update('users',$data);
		
				if($result) {
					$response['message'] = 'Password updated successfully.';
					$response['status'] = true;
				}
				else {
					$response['message'] = 'There was some problem in updating password. Please try again later.';
					$response['status'] = true;
				}
			}
			
		} else {
			$response['message'] = 'Current password doesnot match.';
			$response['status'] = false;
		}
		
		return $response;
	}
}
?>