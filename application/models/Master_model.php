<?php

class Master_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
    }



    public function get_foodGroup() {
        /*$sql = "SELECT cd.client_name ,cd.gender ,cd.age , dpp.*  "
                . " FROM clients_details as cd "
                . " LEFT JOIN diet_plan_profile as dpp ON dpp.client_id = cd.client_id";*/
        
        $sql = "SELECT *  "
                . " FROM food_master as fm "
                . "  WHERE status = 'T' ";
        
        //echo $sql; die;
        $query = $this->db->query($sql);
        $cat = $query->result_array();
        
        return $cat;
    }
    
    public function getMasterFoodEditdetails($pid) {
                
        $sql = "SELECT *  "
                . " FROM food_master as fm "
                . "  WHERE status = 'T' AND id = ?";
        
        //echo $sql; die;
        $query = $this->db->query($sql,array($pid));
        $cat = $query->row_array();
        
        return $cat;
    }
    
    public function editFoodGroupMaster($data,$id) {
                
       $this->db->where('id', $id);
       $this->db->update('food_master', $data);
        return true;
    }
	
	/* Function to get Food master */
	public function getFoodMaster() {
		$this->db->select('*');
		$this->db->from('food_master');
		$this->db->where('status', 'T');
		$this->db->where('name!=', 'NA');
		$this->db->where('name!=', 'SINGLE DISH');
		$this->db->where('weight_per_serving!=', '0');
		$this->db->order_by('order_by ASC');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
	}
		
	/* Function to get Food short data master */
	public function getFoodMasterShort() {
		$this->db->select('id,weight_per_serving,name');
		$this->db->from('food_master');
		$this->db->where('status', 'T');
		$this->db->order_by('order_by ASC');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
	}
	/* Function to get Height Weight master */
	public function getHeightWeight() {
		$this->db->select('*');
		$this->db->from('height_weight_master');
		$this->db->where(array('status'=>'T'));
		$this->db->group_by(array('age_in_years', 'gender'));
        $query = $this->db->get();
        $result = $query->result_array();
		
		foreach($result as $key=>$value) {
			if($value['gender'] =='girl' && ($key%2)==0) {
				$arr_hwmaster[$value['age_in_years']][] = array();
			}
			$arr_hwmaster[$value['age_in_years']][] = $value;
		}
		
		//echo '<pre>';print_r($arr_hwmaster);exit;
		return $arr_hwmaster;
	}
	
	/* Function to add height weight master */
	public function addHeightWeight() {
		$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		
		$data = $this->input->post();
		$data['created_date'] = $now;
		$data['created_by'] = $userid;
		$data['status'] = 'T';
		
		$res = $this->db->insert('height_weight_master', $data);
		
		if($res) {
			$data['success'] = true;
            $data['message'] = " Height Weight has been added successfully!" ;                        
		}
        else 
        {
            $data['success'] = false;
            $data['message'] = 'Unable to add! Please try again.'; 
        }
        return $data;
	}
	
	/* Function to update hwmaster */
	public function saveHWDet() {
		$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		
		$data = $this->input->post();
		$data['edited_date'] = $now;
		$data['edited_by'] = $userid;
		
		$this->db->where('id', $data['id']);
		array_shift($data);
		$res = $this->db->update('height_weight_master', $data);
				
        if($res)
        {
            return true;
		}
        else 
        {
            return "Error";
        }

	}
	
	/* Function to add food master */
	public function addFood() {
		$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		
		$data = $this->input->post();
		$data['created_date'] = $now;
		$data['created_by'] = $userid;
		$data['status'] = 'T';
		
		$res = $this->db->insert('food_master', $data);
		
		if($res) {
			$data['success'] = true;
            $data['message'] = " Food has been added successfully!" ;                        
		}
        else 
        {
            $data['success'] = false;
            $data['message'] = 'Unable to add! Please try again.'; 
        }
        return $data;
	}
	
	/* Function to fetch food details */
	public function getFoodDetails() {
		$pid = $this->input->post('pid');
        $userid = $this->session->userdata('userid');
		
		$this->db->select('*');
        $this->db->from('food_master');
		$this->db->where(array('id'=>$pid));
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
            $school['data'] = $query->row();
        } else {
            $school['data'] = '';
        }

		return $school;
	}
	
	/* Function to update food */
	public function editFood()
	{
		$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		
		$data = $this->input->post();
		$data['edited_date'] = $now;
		$data['edited_by'] = $userid;
		
		$this->db->where('id', $data['id']);
		array_shift($data);
		$res = $this->db->update('food_master', $data);
				
        if($res)
        {
            $data['success'] = true;
            $data['message'] = " Food Master has been updated successfully!" ;                        
		}
        else 
        {
            $data['success'] = false;
            $data['message'] = 'Unable to update food master! Please try again.'; 
        }
        return $data;
	}
	
	/* Function to delete food */
	public function deleteFood()
	{
		$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		
		$id = $this->input->post('id');
		$data = array(
            'status' => 'F'
        );
		$data['edited_date'] = $now;
		$data['edited_by'] = $userid;
		
		$this->db->where('id', $id);
		$res = $this->db->update('food_master', $data);
				
		if($res)
        {
            $data['success'] = true;
            $data['message'] = " Food has been deleted successfully!" ;                        
		}
        else 
        {
            $data['success'] = false;
            $data['message'] = 'Unable to delete food! Please try again.'; 
        }
        return $data;
	}

	/* Function to get UOM master */
	public function getUomMaster() {
		$this->db->select('id, sdesc, ldesc, DATE_FORMAT(created_date,"%d-%m-%Y") as created_date, DATE_FORMAT(edited_date,"%d-%m-%Y") as edited_date');
		$this->db->from('uom_master');
		$this->db->where(array('status'=>'T'));
		$query = $this->db->get();
        $result = $query->result_array();
		
		return $result;
	}

	/* Function to update UOM master */
	public function saveUOMDet() {
		$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		
		$data = $this->input->post();
		
		$this->db->from('uom_master');
		$this->db->where('id', $data['id']);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0){ 
			$data['edited_date'] = $now;
			$data['edited_by'] = $userid;
			
			$this->db->where('id', $data['id']);
			array_shift($data);
			$res = $this->db->update('uom_master', $data);
		}
		else{
			$data['created_date'] = $now;
			$data['created_by'] = $userid;
			$data['status'] = 'T';
			
			array_shift($data);
			$res = $this->db->insert('uom_master', $data);
		}
				
        if($res)
        {
            return true;
		}
        else 
        {
            return "Error";
        }

	}
	
	/* Function to delete UOM */
	public function deleteUom()
	{
		$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		
		$id = $this->input->post('id');
		$data = array(
            'status' => 'F'
        );
		$data['edited_date'] = $now;
		$data['edited_by'] = $userid;
		
		$this->db->where('id', $id);
		$res = $this->db->update('uom_master', $data);
				
		if($res)
        {
            $data['success'] = true;
            $data['message'] = " Uom has been deleted successfully!" ;                        
		}
        else 
        {
            $data['success'] = false;
            $data['message'] = 'Unable to delete uom! Please try again.'; 
        }
        return $data;
	}
	
	#########  body weight start ###############
    public function get_bodyWeight()
     {
        $sql = "SELECT *  "
                . " FROM body_weight_master ORDER BY edited_date desc ";
             
        
        //echo $sql; die;
        $query = $this->db->query($sql);
        $cat = $query->result_array();
        
        return $cat;
    }
    public function get_bodyWeightDetail() 
    {
        $pid = $this->input->post('pid');        
        $sql = "SELECT *  "
                . " FROM body_weight_master "
                . "  WHERE id = ?";
        
        //echo $sql; die;
        $query = $this->db->query($sql,array($pid));
        $res = $query->row_array();
        
        return $res;
    }
    public function editBodyWeight()
	{
		$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		
		$data = $this->input->post();
		$data['edited_date'] = $now;
		$data['edited_by'] = $userid;
		
		$this->db->where('id', $data['id']);
		array_shift($data);
		$res = $this->db->update('body_weight_master', $data);
				
        if($res)
        {
            $data['success'] = true;
            $data['message'] = " Body Weight Master has been updated successfully!" ;                        
		}
        else 
        {
            $data['success'] = false;
            $data['message'] = 'Unable to update Body Weight Master! Please try again.'; 
        }
        return $data;
	}
	public function addBodyWeight() {
		$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		
		$data = $this->input->post();
		$data['created_date'] = $now;
		$data['created_by'] = $userid;		
		
		$res = $this->db->insert('body_weight_master', $data);
		
		if($res) {
			$data['success'] = true;
            $data['message'] = " Body Weight has been added successfully!" ;                        
		}
        else 
        {
            $data['success'] = false;
            $data['message'] = 'Unable to add Body Weight! Please try again.'; 
        }
        return $data;
	}
	public function deleteBodyWeight()
	{
		/*$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		
		$data = array(
            'status' => 'F'
        );
		$data['edited_date'] = $now;
		$data['edited_by'] = $userid;*/
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$res = $this->db->delete('body_weight_master');
				
		if($res)
        {
            $data['success'] = true;
            $data['message'] = " Body Weight has been deleted successfully!" ;                        
		}
        else 
        {
            $data['success'] = false;
            $data['message'] = 'Unable to delete Body Weight! Please try again.'; 
        }
        return $data;
	}
#########  body weight end ###############	
#########  Frame Size start ###############
    public function getFrameSize()
     {
        
		$this->db->select('*');
		$this->db->from('frame_size_master');
		//$this->db->where(array('status'=>'T'));
		$this->db->group_by(array('operator','gender'));
        $query = $this->db->get();
        $result = $query->result_array();
		
		foreach($result as $value) {
			$arr_framesize[$value['operator']][] = $value;
		}
		    
        
        
        return $arr_framesize;
    }
    public function getFrameSizeDetails() 
    {
        $pid = $this->input->post('pid');        
        $sql = "SELECT *  "
                . " FROM frame_size_master "
                . "  WHERE id = ?";
        
        //echo $sql; die;
        $query = $this->db->query($sql,array($pid));
        $res = $query->row_array();
        
        return $res;
    }
    public function addFrameSize() {
		$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		
		$data = $this->input->post();
		$data['created_date'] = $now;
		$data['created_by'] = $userid;		
		
		$res = $this->db->insert('frame_size_master', $data);
		
		if($res) {
			$data['success'] = true;
            $data['message'] = " Frame Size has been added successfully!" ;                        
		}
        else 
        {
            $data['success'] = false;
            $data['message'] = 'Unable to add Frame Size! Please try again.'; 
        }
        return $data;
	}
	public function editFrameSize()
	{
		$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		
		$data = $this->input->post();
		$data['edited_date'] = $now;
		$data['edited_by'] = $userid;
		
		$this->db->where('id', $data['id']);
		array_shift($data);
		$res = $this->db->update('frame_size_master', $data);
				
        if($res)
        {
            $data['success'] = true;
            $data['message'] = "Frame Size Master has been updated successfully!" ;                        
		}
        else 
        {
            $data['success'] = false;
            $data['message'] = 'Unable to update Frame Size! Please try again.'; 
        }
        return $data;
	}
	public function saveFrameSizeDet() 
	{
		$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		
		$data = $this->input->post();
		$data['edited_date'] = $now;
		$data['edited_by'] = $userid;
		
		$this->db->where('id', $data['id']);
		array_shift($data);
		$res = $this->db->update('frame_size_master', $data);
				
        if($res)
        {
            return true;
		}
        else 
        {
            return "Error";
        }

	}
	#########  Frame Size end ###############
	#########  Intake start ###############
    public function getIntake()
     {
        $this->db->from('intake_master');
		$this->db->where(array('status'=>'T'));
		$query = $this->db->get();
        $result = $query->result_array();
        
        return $result;
    }
    public function getIntakeDetails() 
    {
        $pid = $this->input->post('pid');        
        $sql = "SELECT *  "
                . " FROM intake_master "
                . "  WHERE id = ?";
        
        //echo $sql; die;
        $query = $this->db->query($sql,array($pid));
        $res = $query->row_array();
        
        return $res;
    }
    public function addIntake() {
		$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		
		$data = $this->input->post();
		$data['created_date'] = $now;
		$data['created_by'] = $userid;
		$data['status'] = 'T';		
		
		$res = $this->db->insert('intake_master', $data);
		
		if($res) {
			$data['success'] = true;
            $data['message'] = " Intake has been added successfully!" ;                        
		}
        else 
        {
            $data['success'] = false;
            $data['message'] = 'Unable to add Intake! Please try again.'; 
        }
        return $data;
	}
	public function editIntake()
	{
		$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		
		$data = $this->input->post();
		$data['edited_date'] = $now;
		$data['edited_by'] = $userid;
		
		$this->db->where('id', $data['id']);
		array_shift($data);
		$res = $this->db->update('intake_master', $data);
				
        if($res)
        {
            $data['success'] = true;
            $data['message'] = "Intake has been updated successfully!" ;                        
		}
        else 
        {
            $data['success'] = false;
            $data['message'] = 'Unable to update Intake! Please try again.'; 
        }
        return $data;
	}
	public function deleteIntake()
	{
		$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		
		$id = $this->input->post('id');
		$data = array(
            'status' => 'F'
        );
		$data['edited_date'] = $now;
		$data['edited_by'] = $userid;
		
		$this->db->where('id', $id);
		$res = $this->db->update('intake_master', $data);
				
		if($res)
        {
            $data['success'] = true;
            $data['message'] = " Intake has been deleted successfully!" ;                        
		}
        else 
        {
            $data['success'] = false;
            $data['message'] = 'Unable to delete Intake! Please try again.'; 
        }
        return $data;
	}
	#########  Intake end ###############
	#########  Food pref start ###############
	/* Function to get UOM master */
	public function getFoodpfsMaster() {
		$this->db->select('id, sdesc, ldesc, DATE_FORMAT(created_date,"%d-%m-%Y") as created_date, DATE_FORMAT(edited_date,"%d-%m-%Y") as edited_date');
		$this->db->from('food_preference_master');
		$this->db->where(array('status'=>'T'));
		$query = $this->db->get();
        $result = $query->result_array();
		
		return $result;
	}
	/* Function to update UOM master */
	public function saveFoodpf() {
		$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		
		$data = $this->input->post();
		
		$this->db->from('food_preference_master');
		$this->db->where('id', $data['id']);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0){ 
			$data['edited_date'] = $now;
			$data['edited_by'] = $userid;
			
			$this->db->where('id', $data['id']);
			array_shift($data);
			$res = $this->db->update('food_preference_master', $data);
		}
		else{
			$data['created_date'] = $now;
			$data['created_by'] = $userid;
			$data['status'] = 'T';
			
			array_shift($data);
			$res = $this->db->insert('food_preference_master', $data);
			$data['id'] = $this->db->insert_id();
		}
				
        if($res)
        {
            return $data;
		}
        else 
        {
            return "Error";
        }

	}
	
	public function deleteFoodpf()
	{
		$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		
		$id = $this->input->post('id');
		$data = array(
            'status' => 'F'
        );
		$data['edited_date'] = $now;
		$data['edited_by'] = $userid;
		
		$this->db->where('id', $id);
		$res = $this->db->update('food_preference_master', $data);
				
		if($res)
        {
            $data['success'] = true;
            $data['message'] = " Food Preference has been deleted successfully!" ;                        
		}
        else 
        {
            $data['success'] = false;
            $data['message'] = 'Unable to delete Food Preference! Please try again.'; 
        }
        return $data;
	}
	#########  Food pref end ###############
	#########  disease recommendation start ###############
	
	public function getDiseaseRec() {
		$this->db->select('dr.id, dr.disease_id,d.name as disease_name, dr.recommendation , DATE_FORMAT(dr.created_date,"%d-%m-%Y") as created_date, DATE_FORMAT(dr.edited_date,"%d-%m-%Y") as edited_date');
		$this->db->from('disease_recommendation dr ');
	    $this->db->join('disease d', 'd.id = dr.disease_id', 'left'); 
		$query = $this->db->get();
        $result = $query->result_array();
		
		return $result;
	}
	public function getDisease() {
		$key = $this->input->post('query');
		$this->db->select('*');
		$this->db->from('disease');
		$this->db->where('id!=26');
		$this->db->like('name', $key); 
		$query = $this->db->get();
        $result = $query->result_array();
		
		return $result;
	}
	
	/* public function saveDiseaseRecom() {
		$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		
		$data = $this->input->post();
		
		$this->db->from('disease_recommendation');
		$this->db->where('id', $data['id']);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0){ 
			$data['edited_date'] = $now;
			$data['edited_by'] = $userid;
			
			$this->db->where('id', $data['id']);
			array_shift($data);
			$res = $this->db->update('disease_recommendation', $data);
		}
		else{
			$data['created_date'] = $now;
			$data['created_by'] = $userid;
			
			array_shift($data);
			$res = $this->db->insert('disease_recommendation', $data);
			
		}
				
        if($res)
        {
            return $data;
		}
        else 
        {
            return "Error";
        }

	}*/
	    public function getDiseaseRecDetails() 
	    {
	        $pid = $this->input->post('pid');        
	        $sql = "SELECT *  "
	                . " FROM disease_recommendation "
	                . "  WHERE id = ?";
        
	        //echo $sql; die;
	        $query = $this->db->query($sql,array($pid));
	        $res = $query->row_array();
        
	        return $res;
	    }
	    public function addDiseaseRec() {
			$userid = $this->session->userdata['logged_in']['userid'];
	        $now = date("Y-m-d H:i:s");
		
			$data = $this->input->post();
			$data['created_date'] = $now;
			$data['created_by'] = $userid;
		
			$res = $this->db->insert('disease_recommendation', $data);
		
			if($res) {
				$data['success'] = true;
	            $data['message'] = " Disease Recommendation has been added successfully!" ;                        
			}
	        else 
	        {
	            $data['success'] = false;
	            $data['message'] = 'Unable to add Disease Recommendation! Please try again.'; 
	        }
	        return $data;
		}
		public function editDiseaseRec()
		{
			$userid = $this->session->userdata['logged_in']['userid'];
	        $now = date("Y-m-d H:i:s");
		
			$data = $this->input->post();
			$data['edited_date'] = $now;
			$data['edited_by'] = $userid;
		
			$this->db->where('id', $data['id']);
			array_shift($data);
			$res = $this->db->update('disease_recommendation', $data);
				
	        if($res)
	        {
	            $data['success'] = true;
	            $data['message'] = "Disease Recommendation has been updated successfully!" ;                        
			}
	        else 
	        {
	            $data['success'] = false;
	            $data['message'] = 'Unable to update Disease Recommendation! Please try again.'; 
	        }
	        return $data;
		}
		public function deleteDiseaseRec()
		{
			$id = $this->input->post('id');
			/*$userid = $this->session->userdata['logged_in']['userid'];
			$now = date("Y-m-d H:i:s");
			
			$id = $this->input->post('id');
			$data = array(
				'status' => 'F'
			);
			$data['edited_date'] = $now;
			$data['edited_by'] = $userid;*/
			
			$this->db->where('id', $id);
			$res = $this->db->delete('disease_recommendation');
			//$res = $this->db->update('disease_recommendation', $data);
					
			if($res)
			{
				$data['success'] = true;
				$data['message'] = "Disease Recommendation has been deleted successfully!" ;                        
			}
			else 
			{
				$data['success'] = false;
				$data['message'] = 'Unable to delete Disease Recommendation! Please try again.'; 
			}
			return $data;
		}
		public function addDisease() {
			
			$data = $this->input->post();			
			$res = $this->db->insert('disease', $data);
		
			if($res) {
				$data['success'] = true;
	            $data['message'] = " Disease has been added successfully!" ;                        
			}
	        else 
	        {
	            $data['success'] = false;
	            $data['message'] = 'Unable to add Disease ! Please try again.'; 
	        }
	        return $data;
		}
		#########  disease recommendation end ###############
		
		######## Food item master ############
		public function addFoodItem() {
			$userid = $this->session->userdata['logged_in']['userid'];
			$now = date("Y-m-d H:i:s");
			
			$data = $this->input->post();
			
			$macr_arr = $data['macro_nut'];			
			foreach($macr_arr as $KK=>$vv)
			{
				  $macron[] = $vv['value'];
			}
			$macnut_value = implode(',',$macron);
			$data['macro_nut'] = $macnut_value;
			
			$calc_arr = $data['calc_base'];
			foreach($calc_arr as $K=>$v)
			{
				  $calcb[] = $v['value'];
			}
			$calc_value = implode(',',$calcb);
			$data['calc_base'] = $calc_value;
			
			$data['created_date'] = $now;
			$data['created_by'] = $userid;
			$data['status'] = 'T';
			
			$res = $this->db->insert('food_item_master', $data);
			
			if($res) {
				$data['success'] = true;
				$data['message'] = " Food item has been added successfully!" ;                        
			}
			else 
			{
				$data['success'] = false;
				$data['message'] = 'Unable to add! Please try again.'; 
			}
			return $data;
		}
		
		/* Function to get Food Item master */
		public function getFoodItemMaster() {
			$this->db->select('fim.*, fm.name as category');
			$this->db->from('food_item_master fim');
			$this->db->join('food_master fm', 'fm.id = fim.food_category');
			$this->db->where('fim.status', 'T');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		
		/* Function to fetch food item details */
		public function getFoodItemDetails() {
			$pid = $this->input->post('pid');
			$userid = $this->session->userdata('userid');
			
			$this->db->select('*');
			$this->db->from('food_item_master');
			$this->db->where(array('id'=>$pid));
			$query = $this->db->get();
			
			if ($query->num_rows() > 0) {
				$fooditem['data'] = $query->row();
			} else {
				$fooditem['data'] = '';
			}

			return $fooditem;
		}
		
		/* Function to update food item */
		public function editFoodItem()
		{
			$userid = $this->session->userdata['logged_in']['userid'];
			$now = date("Y-m-d H:i:s");
			
			$data = $this->input->post();
			
			$macr_arr = $data['macro_nut'];			
			foreach($macr_arr as $KK=>$vv)
			{
				  $macron[] = $vv['value'];
			}
			$macnut_value = implode(',',$macron);
			$data['macro_nut'] = $macnut_value;
			
			$calc_arr = $data['calc_base'];
			foreach($calc_arr as $K=>$v)
			{
				  $calcb[] = $v['value'];
			}
			$calc_value = implode(',',$calcb);
			$data['calc_base'] = $calc_value;
			
			$data['edited_date'] = $now;
			$data['edited_by'] = $userid;
			
			$this->db->where('id', $data['id']);
			array_shift($data);
			$res = $this->db->update('food_item_master', $data);
					
			if($res)
			{
				$data['success'] = true;
				$data['message'] = " Food Item Master has been updated successfully!" ;                        
			}
			else 
			{
				$data['success'] = false;
				$data['message'] = 'Unable to update food item master! Please try again.'; 
			}
			return $data;
		}
		public function deleteFoodItem()
		{
			$id = $this->input->post('id');
			$data = array(
				'status' => 'F'
			);
			$userid = $this->session->userdata['logged_in']['userid'];
			$now = date("Y-m-d H:i:s");
			$data['edited_date'] = $now;
			$data['edited_by'] = $userid;
			
			$this->db->where('id', $id);
			$res = $this->db->update('food_item_master', $data);
					
			if($res)
			{
				$data['success'] = true;
				$data['message'] = "Food item has been deleted successfully!" ;                        
			}
			else 
			{
				$data['success'] = false;
				$data['message'] = 'Unable to delete Food item! Please try again.'; 
			}
			return $data;
		}
		######## End Food item master ############
		######## Exercise master ############
		public function addExercise() {
			$userid = $this->session->userdata['logged_in']['userid'];
			$now = date("Y-m-d H:i:s");
			
			$data = $this->input->post();
			$data['created_date'] = $now;
			$data['created_by'] = $userid;
			$data['status'] = 'T';
			
			$res = $this->db->insert('exercise_master', $data);
			
			if($res) {
				$data['success'] = true;
				$data['message'] = "Exercise has been added successfully!" ;                        
			}
			else 
			{
				$data['success'] = false;
				$data['message'] = 'Unable to add! Please try again.'; 
			}
			return $data;
		}
		
		/* Function to get Food Item master */
		public function getExerciseMaster() {
			$this->db->select('*');
			$this->db->from('exercise_master');
			$this->db->where('status', 'T');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		
		/* Function to fetch food item details */
		public function getExerciseDetails() {
			$pid = $this->input->post('pid');
			$userid = $this->session->userdata('userid');
			
			$this->db->select('*');
			$this->db->from('exercise_master');
			$this->db->where(array('id'=>$pid));
			$query = $this->db->get();
			
			if ($query->num_rows() > 0) {
				$fooditem['data'] = $query->row();
			} else {
				$fooditem['data'] = '';
			}

			return $fooditem;
		}
		
		/* Function to update food item */
		public function editExercise()
		{
			$userid = $this->session->userdata['logged_in']['userid'];
			$now = date("Y-m-d H:i:s");
			
			$data = $this->input->post();
			$data['edited_date'] = $now;
			$data['edited_by'] = $userid;
			
			$this->db->where('id', $data['id']);
			array_shift($data);
			$res = $this->db->update('exercise_master', $data);
					
			if($res)
			{
				$data['success'] = true;
				$data['message'] = " Exercise has been updated successfully!" ;                        
			}
			else 
			{
				$data['success'] = false;
				$data['message'] = 'Unable to update Exercise! Please try again.'; 
			}
			return $data;
		}
		public function deleteExercise()
		{
			$id = $this->input->post('id');
			$data = array(
				'status' => 'F'
			);
			$userid = $this->session->userdata['logged_in']['userid'];
			$now = date("Y-m-d H:i:s");
			$data['edited_date'] = $now;
			$data['edited_by'] = $userid;
			
			$this->db->where('id', $id);
			$res = $this->db->update('exercise_master', $data);
					
			if($res)
			{
				$data['success'] = true;
				$data['message'] = "Exercise has been deleted successfully!" ;                        
			}
			else 
			{
				$data['success'] = false;
				$data['message'] = 'Unable to delete Exercise! Please try again.'; 
			}
			return $data;
		}
}
