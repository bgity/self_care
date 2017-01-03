<?php

class Diet_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
    }

	/* Function to get IBW Range */
	public function getIBWRange() {
		$post_height = $this->input->post('height');
		$post_bf = $this->input->post('bf');
		$post_age = $this->input->post('age');
		$gender = $this->input->post('gender');
		
		$size_arr = array("S"=>array("col1"=>"bw_small_frame", "col2"=>"bw_small_frame_maxval"), "M"=>array("col1"=>"bw_medium_frame", "col2"=>"bw_medium_frame_maxval"), "L"=>array("col1"=>"bw_large_frame", "col2"=>"bw_large_frame_maxval"));
				
		$this->db->select(''.$size_arr[$post_bf]["col1"].' as min_range , '.$size_arr[$post_bf]["col2"].' as max_range, ABS( height_in_cm - '.$post_height.' ) as height');
		$this->db->from('body_weight_master');
		$this->db->where('gender',$gender);
		$this->db->order_by('height');
		$this->db->limit(1);
		
		$query = $this->db->get();
		$result = $query->result();
		$arr = array();
		
			if($post_age >=31 && $post_age <= 40)
			{
				$arr['min_range'] = $result[0]->min_range+1.5;
				$arr['max_range'] = $result[0]->max_range+1.5;
			}
			elseif($post_age >=41 && $post_age <= 50)
			{
				$arr['min_range'] = $result[0]->min_range+3;
				$arr['max_range'] = $result[0]->max_range+3;
			}
			elseif($post_age >=51 && $post_age <= 60)
			{
				$arr['min_range'] = $result[0]->min_range+4.5;
				$arr['max_range'] = $result[0]->max_range+4.5;
			}
			elseif($post_age >60)
			{
				$arr['min_range'] = $result[0]->min_range+6;
				$arr['max_range'] = $result[0]->max_range+6;
			}
			else
			{
				$arr['min_range'] = $result[0]->min_range;
				$arr['max_range'] = $result[0]->max_range;
			}
				
		return $arr;
	}

	/* Function to insert diet plan details */
	public function addPlan() {
		$userid = $this->session->userdata['logged_in']['userid'];
        $now = date("Y-m-d H:i:s");
		$data = array();
		
		$post = $this->input->post();
		

		//echo '<pre>';print_r($post);exit;
		//$dt_start = DateTime::createFromFormat('H:i:s','14:56:58');
		//echo $dt_start->format('D M d Y H:i:s');	
		//exit;
		
		// edit plan 
		if($post['planid']>0 && $post['copy_plan']==0)
		{
			$client_id = $post['id'];
			$plan_id = $post['planid'];
			
			$this->db->trans_begin();
			/********* update in diet_plan_main ****************/
 			$arr_planMain['first_name'] = $post['name'];
 			$arr_planMain['email'] = $post['email'];
 			$arr_planMain['gender'] = $post['gender']['value'];
 			$arr_planMain['file_no'] = $post['file_no'];
			if(isset($post['preg_lact']))
			{
			  $arr_planMain['preg_lact'] = $post['preg_lact']['text'];
		    }
			else
			{
				$arr_planMain['preg_lact'] = "";
			}
			$arr_planMain['programe_type'] = $post['programe_type']['id'];
 			$arr_planMain['city'] = $post['city'];
   		   if(preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/",$post['dob']))
   		    {
   		        $dt_dbo = DateTime::createFromFormat('d-m-Y',$post['dob']);
   		    }else{
   		        $dt_dbo = DateTime::createFromFormat('D M d Y H:i:s e+',$post['dob']);
   		    }
			
 			$arr_planMain['birth_date'] = $dt_dbo->format('Y-m-d');
 			$arr_planMain['age'] = $post['age'];
 			$arr_planMain['food_pref_id'] = $post['food_pref'];
 			$arr_planMain['edited_date'] = $now;
 			$arr_planMain['edited_by'] = $userid;
			
			$this->db->where('id',$client_id);
			$result_main = $this->db->update('diet_plan_main',$arr_planMain);
			
			/**************** update in diet_plan_profile ***********/
			$preg_lact_energy = isset($post['preg_lact_energy'])?$post['preg_lact_energy']:0;
			$preg_lact_protein = isset($post['preg_lact_protein'])?$post['preg_lact_protein']:0;
		
			$arr_framesize = array(1=>'S', 2=>'M', 3=>'L');
			
			  if(preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/",$post['consult_date']))
			    {
			        $dt_conslt = DateTime::createFromFormat('d-m-Y',$post['consult_date']);
			    }else{
			        $dt_conslt = DateTime::createFromFormat('D M d Y H:i:s e+',$post['consult_date']);
			    }

             if(preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/",$post['target_date']))
			    {
			        $dt_target = DateTime::createFromFormat('d-m-Y',$post['target_date']);
			    }else{
			        $dt_target = DateTime::createFromFormat('D M d Y H:i:s e+',$post['target_date']);
			    }				
			$arr_planProfile['consultation_date'] = $dt_conslt->format('Y-m-d');
			$arr_planProfile['target_date'] = $dt_target->format('Y-m-d');
			$arr_planProfile['height_in_cm'] = $post['height_in_cm'];
			$arr_planProfile['weight_in_kg'] = $post['weight_in_kg'];
			$arr_planProfile['bfc_in_percentage'] = '';
			$arr_planProfile['wrist_in_inch'] = $post['wrist_in_inch'];
			$arr_planProfile['wrist_in_cm'] = $post['wrist_in_cm'];
			$arr_planProfile['rfactor'] = $post['rfactor'];
			$arr_planProfile['body_fat'] = $post['bf'].'-'.$arr_framesize[$post['body_fat']];
			$arr_planProfile['ibw'] = $post['ibw'];
			$arr_planProfile['ibw_mean'] = $post['ibw_mean'];
			$arr_planProfile['icc'] = $post['icc'];
			$arr_planProfile['icc_adjusted'] = $post['icc_adjusted'];
			$arr_planProfile['bmi'] = round(($arr_planProfile['weight_in_kg']/(($arr_planProfile['height_in_cm']/100)*($arr_planProfile['height_in_cm']/100))), 2);
			$arr_planProfile['excess_weight'] = round($arr_planProfile['weight_in_kg']-$arr_planProfile['ibw_mean'], 2);
			$arr_planProfile['rec_protien'] = $post['rec_protien'];
			$arr_planProfile['rec_fat'] = $post['rec_fat'];
			$arr_planProfile['rec_carbs'] = $post['rec_carbs'];
			$arr_planProfile['rec_calcium'] = '';
			$arr_planProfile['preg_lact_energy'] = $preg_lact_energy;
			$arr_planProfile['preg_lact_protein'] = $preg_lact_protein;
			$arr_planProfile['edited_date'] = $now;
			$arr_planProfile['edited_by'] = $userid;
			$arr_planProfile['target_weight_in_kg'] = $post['target_weight_in_kg'];
			
			$this->db->where('id',$plan_id);
			$this->db->where('client_id',$client_id);
			$result_profile = $this->db->update('diet_plan_profile',$arr_planProfile);
			
			/************ update diet_plan_food_details ***********/
			
			//delete old and insert new food details
		       $this->db->where('client_id',$client_id);
		       $this->db->where('plan_id',$plan_id);
		       $delfoddetl = $this->db->delete('diet_plan_food_details');
			   
			$foods = $post['foods'];
			$arr_foodDetails = array();
			foreach($foods as $key => $value) {
				if(isset($value['no_of_serving'])) {
					$arr_foodDetails[$key]['client_id'] = $client_id;
					$arr_foodDetails[$key]['plan_id'] = $plan_id;
					$arr_foodDetails[$key]['food_id'] = $key+1;
					$arr_foodDetails[$key]['servings'] = isset($value['no_of_serving'])?$value['no_of_serving']:'';
					$arr_foodDetails[$key]['servings_prot'] = isset($value['prot_per_serving'])?$value['prot_per_serving']:'';
					$arr_foodDetails[$key]['servings_fat'] = isset($value['fat_per_serving'])?$value['fat_per_serving']:'';
					$arr_foodDetails[$key]['servings_chol'] = isset($value['chol_per_serving'])?$value['chol_per_serving']:'';
					$arr_foodDetails[$key]['servings_calo'] = isset($value['calo_per_serving'])?$value['calo_per_serving']:'';
					$arr_foodDetails[$key]['servings_calc'] = isset($value['calc_per_serving'])?$value['calc_per_serving']:'';
					$arr_foodDetails[$key]['status'] = 'T';
					$arr_foodDetails[$key]['edited_date'] = $now;
					$arr_foodDetails[$key]['edited_by'] = $userid;
				}
			}
			$result_fdetails = $this->insertTable('diet_plan_food_details', $arr_foodDetails, 'multiple');
			
			/*********** update diet_plan_intake_chart  ***********/
			$arr_intakeChart = array();			
			$arr_intakeChart['breakfast_protein'] = $post['breakfast_protein'];
			$arr_intakeChart['lunch_protein'] = $post['lunch_protein'];
			$arr_intakeChart['snack_protein'] = $post['snack_protein'];
			$arr_intakeChart['dinner_protein'] = $post['dinner_protein'];
			$arr_intakeChart['breakfast_cal'] = $post['breakfast_cal'];
			$arr_intakeChart['lunch_cal'] = $post['lunch_cal'];
			$arr_intakeChart['snack_cal'] = $post['snack_cal'];
			$arr_intakeChart['dinner_cal'] = $post['dinner_cal'];
			$arr_intakeChart['calories'] = json_encode($post['calories']);
			$arr_intakeChart['prots'] = json_encode($post['prots']);
		    
			$this->db->where('plan_id',$plan_id);
			$this->db->where('client_id',$client_id);
			$result_intake = $this->db->update('diet_plan_intake_chart',$arr_intakeChart);
			
			/*********** update diet_plan_guidelines ******/
			$arr_planGuidelines = array();
			/*if(isset($post['guidelines'])) {
				$guidelines = $post['guidelines'];
			}
			else {
				if(isset($post['diseases']))
					$guidelines = $this->getGuidelines($post['diseases']);
				else
					$guidelines = '';
			}*/
			// delete and insert new 
	         $this->db->where('client_id',$client_id);
	         $this->db->where('plan_id',$plan_id);
	         $delguidline = $this->db->delete('diet_plan_guidelines');
			 
			 /*if($guidelines) {
				foreach($guidelines as $disease =>$recommend) {
					foreach($recommend as $dkey=>$dvalue) {
						if(isset($dvalue['checked'])) {
							if($dvalue['checked'] == 'true') {
								$arr_planGuidelines[$dkey]['client_id'] = $client_id;
								$arr_planGuidelines[$dkey]['disease_id'] = $dvalue['disease_id'];
								$arr_planGuidelines[$dkey]['recommend_id'] = $dvalue['id'];
								$arr_planGuidelines[$dkey]['plan_id'] = $plan_id;
							}
						}
					}
					$this->insertTable('diet_plan_guidelines', $arr_planGuidelines, 'multiple');
					unset($arr_planGuidelines);
				}
			 }*/
			 if(isset($post['guidelines'])) { 
				$guidelines = $post['guidelines'];
				
				foreach($guidelines as $disease =>$recommend) {
					foreach($recommend as $dkey=>$dvalue) {
						if(isset($dvalue['checked'])) {
							if($dvalue['checked'] == 'true') {
								$arr_planGuidelines[$dkey]['client_id'] = $client_id;
								$arr_planGuidelines[$dkey]['disease_id'] = $dvalue['disease_id'];
								$arr_planGuidelines[$dkey]['recommend_id'] = $dvalue['id'];
								$arr_planGuidelines[$dkey]['plan_id'] = $plan_id;
							}
						}
					}
					//print_r($arr_planGuidelines);
					$this->insertTable('diet_plan_guidelines', $arr_planGuidelines, 'multiple');
					unset($arr_planGuidelines);
				}
			}
			else {
				if(isset($post['diseases'])) {
					$guidelines = $this->getGuidelines($post['diseases']);
					
					foreach($guidelines as $disease =>$recommend) {
						foreach($recommend as $dkey=>$dvalue) {
							$arr_planGuidelines[$dkey]['client_id'] = $client_id;
							$arr_planGuidelines[$dkey]['disease_id'] = $dvalue['disease_id'];
							$arr_planGuidelines[$dkey]['recommend_id'] = $dvalue['id'];
							$arr_planGuidelines[$dkey]['plan_id'] = $plan_id;
								
						}
						//print_r($arr_planGuidelines);
						$this->insertTable('diet_plan_guidelines', $arr_planGuidelines, 'multiple');
						unset($arr_planGuidelines);
					}
				}
				else {
					$guidelines = '';
				}
					
			}
			 
			 
			/********** update diet_plan_meals **************/
			// delete old 
               $this->db->where('client_id',$client_id);
               $this->db->where('plan_id',$plan_id);
               $delguidline = $this->db->delete('diet_plan_meals');
			   
			$arr_planMeals = array();
			$arr_planMealOptions = array();
			$arr_planMealItems = array();
			$foodItems = $post['fooditems'];
			$meals = $post['meals'];
			foreach($foodItems as $mkey=>$value) {
				$arr_planMeals['client_id'] = $client_id;
				$arr_planMeals['plan_id'] = $plan_id;
				$arr_planMeals['meal'] = $mkey;
				$arr_planMeals['meal_name'] = $meals[$mkey-1]['name'];
				$arr_planMeals['notes'] = isset($value['notes'])?$value['notes']:'';
				
	    	   if(!preg_match("~\bGMT\b~",$meals[$mkey-1]['start_time'])) ///^(?:0[1-9]|1[0-2]):[0-5][0-9] (am|pm|AM|PM)$/
	    		    {
	    		        //$dt_start = DateTime::createFromFormat('H:i A',$meals[$mkey-1]['start_time']);
						$dt_start = DateTime::createFromFormat('D M d Y H:i:s',$meals[$mkey-1]['start_time']);				
	    		    }else{				
	    		        $dt_start = DateTime::createFromFormat('D M d Y H:i:s e+',$meals[$mkey-1]['start_time']);
	    		    }			
			   $arr_planMeals['start_time']=$dt_start->format('H:i:s');
	  		   if(!preg_match("~\bGMT\b~",$meals[$mkey-1]['end_time']))
	  		    {
	  		       // $dt_end = DateTime::createFromFormat('H:i A',$meals[$mkey-1]['end_time']);
				   $dt_end = DateTime::createFromFormat('D M d Y H:i:s',$meals[$mkey-1]['end_time']);			
	  		    }else{			
	  		        $dt_end = DateTime::createFromFormat('D M d Y H:i:s e+',$meals[$mkey-1]['end_time']);
	  		    }			
				$arr_planMeals['end_time'] = $dt_end->format('H:i:s');
			
				$result_meals = $this->insertTable('diet_plan_meals', $arr_planMeals);
			
				/********* update diet_plan_meal_options *****************/ 
				// delete old use  cascaed on update 
				
				$optionsArr = array();
				$aoptionsArr = array();
				$commonarray = array();
				
				$aoptionsArr = isset($value['aoptions'])?$value['aoptions']:array();

				if(!empty($aoptionsArr))
					$commonarray = array_replace_recursive($value['options'], $aoptionsArr);
				else
					$commonarray = $value['options'];
				
				  foreach($commonarray as $ikey=>$ivalue) { //$value['options']
					$arr_planMealOptions['meal_id'] = $result_meals; /* store the primary key id of meals table */
					if(is_array($ivalue)) {
						$result_mealopt = $this->insertTable('diet_plan_meal_options', $arr_planMealOptions);
					}
				
					if(is_array($ivalue)) {
						foreach($ivalue as $keyo=>$val) {
							$arr_planMealItems[$keyo]['option_id'] = $result_mealopt;
							/*$arr_planMealItems[$keyo]['food_item_id'] = isset($val['item']['id'])?$val['item']['id']:'';
							$arr_planMealItems[$keyo]['food_item'] = isset($val['item']['name'])?$val['item']['name']:'';*/
							$arr_planMealItems[$keyo]['food_item'] = isset($val['item'])?$val['item']:'';
							$arr_planMealItems[$keyo]['amount'] = isset($val['exch'])?$val['exch']:'';
							$itemId = $this->getItemId(trim($val['item']));
							$arr_planMealItems[$keyo]['food_item_id'] = $itemId;
						}
						$result_mealoptitems = $this->insertTable('diet_plan_meal_option_items', $arr_planMealItems, 'multiple');
						unset($arr_planMealItems);
					}
				}
			}
			
			// Update Exercise details
			$arr_planExercises = array();
			//$arr_planExercises['plan_id'] = $plan_id;
			$arr_planExercises['consult_date'] = $dt_conslt->format('Y-m-d');;
			$arr_planExercises['total_cd'] = $post['total_cd'];
			$arr_planExercises['ex_def'] = $post['tot_ex_def'];
			$arr_planExercises['no_of_days'] = $post['exno_of_days'];
			$arr_planExercises['cal_loss'] = $post['total_closs'];
			$arr_planExercises['weight_loss'] = $post['weight_loss'];
			$arr_planExercises['program'] = $post['program'];
			$arr_planExercises['weeks'] = $post['exno_of_weeks'];
			$arr_planExercises['exercise_det'] = json_encode($post['exercise_new']);
			$arr_planExercises['exercise_anytime'] = json_encode($post['exercise_anytime']);
			
			$this->db->where('plan_id',$plan_id);
			$result_planexercise = $this->db->update('diet_plan_exercise', $arr_planExercises);
			
			if ($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				$data['success'] = false;
				$data['message'] = "Unable to Edit plan!" ;  
			
			 } else {
				$this->db->trans_commit();
				$data['success'] = true;
				$data['dietid'] = $client_id;
				$data['planid'] = $plan_id;
				$data['message'] = "Plan Edited successfully!" ;  
			
			 } 
		
			return $data;
		   // end update tables 
		}
		else
		{
			
		/* add new plan and existing plan */
		$this->db->trans_begin();
		// add new plan for existing user 
		if(isset($post['id']) && $post['copy_plan']==0)
		{
			$result_main = $post['id'];	
            			
		}
		else
		{
			if($post['copy_plan']==1)
			{
			  $email = $post['email'];
			  $this->db->select('*');
		      $this->db->from('diet_plan_main');
		      $this->db->where(array('email'=>$email));
			  $query = $this->db->get();
			  $cnt = $query->num_rows();
			  if($cnt==1)
			  {
				 $data['success'] = false;
			     $data['message'] = "Email Already Exist !" ; 
                 return $data;  
			  }
		     // $query = $this->db->get();
             // $result = $query->row_array();	
			}
			$arr_planMain['first_name'] = $post['name'];
			$arr_planMain['email'] = $post['email'];
			$arr_planMain['gender'] = $post['gender']['value'];
			$arr_planMain['file_no'] = $post['file_no'];
			if(isset($post['preg_lact']))
			{
			  $arr_planMain['preg_lact'] = $post['preg_lact']['text'];
		    }
			else
			{
				$arr_planMain['preg_lact'] = "";
			}
			$arr_planMain['programe_type'] = $post['programe_type']['id'];
			
			$arr_planMain['city'] = $post['city'];
  		   if(preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/",$post['dob']))
  		    {
  		        $dt_dbo = DateTime::createFromFormat('d-m-Y',$post['dob']);
  		    }else{
  		        $dt_dbo = DateTime::createFromFormat('D M d Y H:i:s e+',$post['dob']);
  		    }
			
			$arr_planMain['birth_date'] = $dt_dbo->format('Y-m-d');
			$arr_planMain['age'] = $post['age'];
			$arr_planMain['food_pref_id'] = $post['food_pref'];
			$arr_planMain['status'] = 'T';
			$arr_planMain['created_date'] = $now;
			$arr_planMain['created_by'] = $userid;
			
			$result_main = $this->insertTable('diet_plan_main', $arr_planMain);
		}
		$preg_lact_energy = isset($post['preg_lact_energy'])?$post['preg_lact_energy']:0;
		$preg_lact_protein = isset($post['preg_lact_protein'])?$post['preg_lact_protein']:0;
		
		$arr_framesize = array(1=>'S', 2=>'M', 3=>'L');
		
		$arr_planProfile['client_id'] = $result_main; /* storing plan id in client_id column, may change the logic later */
		
		  if(preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/",$post['consult_date']))
		    {
		        $dt_conslt = DateTime::createFromFormat('d-m-Y',$post['consult_date']);
		    }else{
		        $dt_conslt = DateTime::createFromFormat('D M d Y H:i:s e+',$post['consult_date']);
		    }
              if(preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/",$post['target_date']))
			    {
			        $dt_target = DateTime::createFromFormat('d-m-Y',$post['target_date']);
			    }else{
			        $dt_target = DateTime::createFromFormat('D M d Y H:i:s e+',$post['target_date']);
			    }
				
		$arr_planProfile['consultation_date'] = $dt_conslt->format('Y-m-d');
		$arr_planProfile['target_date'] = $dt_target->format('Y-m-d');
		$arr_planProfile['height_in_cm'] = $post['height_in_cm'];
		$arr_planProfile['weight_in_kg'] = $post['weight_in_kg'];
		$arr_planProfile['bfc_in_percentage'] = '';
		$arr_planProfile['wrist_in_inch'] = $post['wrist_in_inch'];
		$arr_planProfile['wrist_in_cm'] = $post['wrist_in_cm'];
		$arr_planProfile['rfactor'] = $post['rfactor'];
		$arr_planProfile['body_fat'] = $post['bf'].'-'.$arr_framesize[$post['body_fat']];
		$arr_planProfile['ibw'] = $post['ibw'];
		$arr_planProfile['ibw_mean'] = $post['ibw_mean'];
		$arr_planProfile['icc'] = $post['icc'];
		$arr_planProfile['icc_adjusted'] = $post['icc_adjusted'];
		$arr_planProfile['bmi'] = round(($arr_planProfile['weight_in_kg']/(($arr_planProfile['height_in_cm']/100)*($arr_planProfile['height_in_cm']/100))), 2);
		$arr_planProfile['excess_weight'] = round($arr_planProfile['weight_in_kg']-$arr_planProfile['ibw_mean'], 2);
		$arr_planProfile['rec_protien'] = $post['rec_protien'];
		$arr_planProfile['rec_fat'] = $post['rec_fat'];
		$arr_planProfile['rec_carbs'] = $post['rec_carbs'];
		$arr_planProfile['rec_calcium'] = '';
		$arr_planProfile['preg_lact_energy'] = $preg_lact_energy;
		$arr_planProfile['preg_lact_protein'] = $preg_lact_protein;
		$arr_planProfile['status'] = 'T';
		$arr_planProfile['created_date'] = $now;
		$arr_planProfile['created_by'] = $userid;
		$arr_planProfile['target_weight_in_kg'] = $post['target_weight_in_kg'];
		
		$result_profile = $this->insertTable('diet_plan_profile', $arr_planProfile);
		
		$foods = $post['foods'];
		$arr_foodDetails = array();
		//print_r($foods);
		foreach($foods as $key => $value) {
			if(isset($value['no_of_serving'])) {
				$arr_foodDetails[$key]['client_id'] = $result_main;
				$arr_foodDetails[$key]['plan_id'] = $result_profile;
				$arr_foodDetails[$key]['food_id'] = $key+1;
				$arr_foodDetails[$key]['servings'] = isset($value['no_of_serving'])?$value['no_of_serving']:'';
				$arr_foodDetails[$key]['servings_prot'] = isset($value['prot_per_serving'])?$value['prot_per_serving']:'';
				$arr_foodDetails[$key]['servings_fat'] = isset($value['fat_per_serving'])?$value['fat_per_serving']:'';
				$arr_foodDetails[$key]['servings_chol'] = isset($value['chol_per_serving'])?$value['chol_per_serving']:'';
				$arr_foodDetails[$key]['servings_calo'] = isset($value['calo_per_serving'])?$value['calo_per_serving']:'';
				$arr_foodDetails[$key]['servings_calc'] = isset($value['calc_per_serving'])?$value['calc_per_serving']:'';
				$arr_foodDetails[$key]['status'] = 'T';
				$arr_foodDetails[$key]['created_date'] = $now;
				$arr_foodDetails[$key]['created_by'] = $userid;
			}
		}
		//exit;
		$result_fdetails = $this->insertTable('diet_plan_food_details', $arr_foodDetails, 'multiple');
				
					
		$arr_intakeChart = array();
		$arr_intakeChart['client_id'] = $result_main;
		$arr_intakeChart['plan_id'] = $result_profile;
		$arr_intakeChart['breakfast_protein'] = $post['breakfast_protein'];
		$arr_intakeChart['lunch_protein'] = $post['lunch_protein'];
		$arr_intakeChart['snack_protein'] = $post['snack_protein'];
		$arr_intakeChart['dinner_protein'] = $post['dinner_protein'];
		$arr_intakeChart['breakfast_cal'] = $post['breakfast_cal'];
		$arr_intakeChart['lunch_cal'] = $post['lunch_cal'];
		$arr_intakeChart['snack_cal'] = $post['snack_cal'];
		$arr_intakeChart['dinner_cal'] = $post['dinner_cal'];
		$arr_intakeChart['calories'] = json_encode($post['calories']);
		$arr_intakeChart['prots'] = json_encode($post['prots']);
		$arr_intakeChart['status'] = 'T';
		
		$result_intake = $this->insertTable('diet_plan_intake_chart', $arr_intakeChart);
					
		$arr_planGuidelines = array();
		if(isset($post['guidelines'])) { 
			$guidelines = $post['guidelines'];
			
			foreach($guidelines as $disease =>$recommend) {
				foreach($recommend as $dkey=>$dvalue) {
					if(isset($dvalue['checked'])) {
						if($dvalue['checked'] == 'true') {
							$arr_planGuidelines[$dkey]['client_id'] = $result_main;
							$arr_planGuidelines[$dkey]['disease_id'] = $dvalue['disease_id'];
							$arr_planGuidelines[$dkey]['recommend_id'] = $dvalue['id'];
							$arr_planGuidelines[$dkey]['plan_id'] = $result_profile;
						}
					}
				}
				//print_r($arr_planGuidelines);
				$this->insertTable('diet_plan_guidelines', $arr_planGuidelines, 'multiple');
				unset($arr_planGuidelines);
			}
		}
		else {
			if(isset($post['diseases'])) {
				$guidelines = $this->getGuidelines($post['diseases']);
				
				foreach($guidelines as $disease =>$recommend) {
					foreach($recommend as $dkey=>$dvalue) {
						$arr_planGuidelines[$dkey]['client_id'] = $result_main;
						$arr_planGuidelines[$dkey]['disease_id'] = $dvalue['disease_id'];
						$arr_planGuidelines[$dkey]['recommend_id'] = $dvalue['id'];
						$arr_planGuidelines[$dkey]['plan_id'] = $result_profile;
							
					}
					//print_r($arr_planGuidelines);
					$this->insertTable('diet_plan_guidelines', $arr_planGuidelines, 'multiple');
					unset($arr_planGuidelines);
				}
			}
			else {
				$guidelines = '';
			}
				
		}
		//$guidelines = isset($post['guidelines'])?$post['guidelines']:'';
		
		/*if($guidelines) {
			foreach($guidelines as $disease =>$recommend) {
				foreach($recommend as $dkey=>$dvalue) {
					if(isset($dvalue['checked'])) {
						if($dvalue['checked'] == 'true') {
							$arr_planGuidelines[$dkey]['client_id'] = $result_main;
							$arr_planGuidelines[$dkey]['disease_id'] = $dvalue['disease_id'];
							$arr_planGuidelines[$dkey]['recommend_id'] = $dvalue['id'];
							$arr_planGuidelines[$dkey]['plan_id'] = $result_profile;
						}
					}
				}
				//print_r($arr_planGuidelines);
				$this->insertTable('diet_plan_guidelines', $arr_planGuidelines, 'multiple');
				unset($arr_planGuidelines);
			}
		}*/
		$arr_planMeals = array();
		$arr_planMealOptions = array();
		$arr_planMealItems = array();
		$foodItems = $post['fooditems'];
		$meals = $post['meals'];
		foreach($foodItems as $mkey=>$value) {
			$arr_planMeals['client_id'] = $result_main;
			$arr_planMeals['plan_id'] = $result_profile;
			$arr_planMeals['meal'] = $mkey;
			$arr_planMeals['meal_name'] = $meals[$mkey-1]['name'];
			$arr_planMeals['notes'] = isset($value['notes'])?$value['notes']:'';
			
   		   if(!preg_match("~\bGMT\b~",$meals[$mkey-1]['start_time']))
   		    {		       
 			   $dt_start = DateTime::createFromFormat('D M d Y H:i:s',$meals[$mkey-1]['start_time']);			
   		    }else{			
   		        $dt_start = DateTime::createFromFormat('D M d Y H:i:s e+',$meals[$mkey-1]['start_time']);
   		    }	
    	   			
		   $arr_planMeals['start_time']=$dt_start->format('H:i:s');
  		   if(!preg_match("~\bGMT\b~",$meals[$mkey-1]['end_time']))
  		    {		       
			   $dt_end = DateTime::createFromFormat('D M d Y H:i:s',$meals[$mkey-1]['end_time']);			
  		    }else{			
  		        $dt_end = DateTime::createFromFormat('D M d Y H:i:s e+',$meals[$mkey-1]['end_time']);
  		    }
			
			$arr_planMeals['end_time'] = $dt_end->format('H:i:s');
			
			$result_meals = $this->insertTable('diet_plan_meals', $arr_planMeals);
			
			
			$optionsArr = array();
			$aoptionsArr = array();
			$commonarray = array();
				
			$aoptionsArr = isset($value['aoptions'])?$value['aoptions']:array();

			if(!empty($aoptionsArr))
				$commonarray = array_replace_recursive($value['options'], $aoptionsArr);
			else
				$commonarray = $value['options'];
				
			foreach($commonarray as $ikey=>$ivalue) { //$value['options']
				$arr_planMealOptions['meal_id'] = $result_meals; /* store the primary key id of meals table */
				if(is_array($ivalue)) {
					$result_mealopt = $this->insertTable('diet_plan_meal_options', $arr_planMealOptions);
				}
				
				if(is_array($ivalue)) {
					foreach($ivalue as $keyo=>$val) {
						$arr_planMealItems[$keyo]['option_id'] = $result_mealopt;
						/*$arr_planMealItems[$keyo]['food_item_id'] = isset($val['item']['id'])?$val['item']['id']:'';
						$arr_planMealItems[$keyo]['food_item'] = isset($val['item']['name'])?$val['item']['name']:'';*/
						$arr_planMealItems[$keyo]['food_item'] = isset($val['item'])?trim($val['item']):'';
						$arr_planMealItems[$keyo]['amount'] = isset($val['exch'])?$val['exch']:'';
						$itemId = $this->getItemId(trim($val['item']));
						$arr_planMealItems[$keyo]['food_item_id'] = $itemId;
					}
					$result_mealoptitems = $this->insertTable('diet_plan_meal_option_items', $arr_planMealItems, 'multiple');
					unset($arr_planMealItems);
				}
			}
		}
		
		// Insert exercises to table
		$arr_planExercises = array();
		$arr_planExercises['plan_id'] = $result_profile;
		$arr_planExercises['consult_date'] = $dt_conslt->format('Y-m-d');;
		$arr_planExercises['total_cd'] = $post['total_cd'];
		$arr_planExercises['ex_def'] = $post['tot_ex_def'];
		$arr_planExercises['no_of_days'] = $post['exno_of_days'];
		$arr_planExercises['cal_loss'] = $post['total_closs'];
		$arr_planExercises['weight_loss'] = $post['weight_loss'];
		$arr_planExercises['program'] = $post['program'];
		$arr_planExercises['weeks'] = $post['exno_of_weeks'];
		$arr_planExercises['exercise_det'] = json_encode($post['exercise_new']);
		$arr_planExercises['exercise_anytime'] = json_encode($post['exercise_anytime']);
		$result_planexercise = $this->insertTable('diet_plan_exercise', $arr_planExercises);
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			$data['success'] = false;
			$data['message'] = "Unable to create plan!" ;  
			
		} else {
			$this->db->trans_commit();
			$data['success'] = true;
			$data['dietid'] = $result_main;
			$data['planid'] = $result_profile;
			$data['message'] = "Plan created successfully!" ;  
			
		} 
		
		return $data;
	  }
	}
	
	/* Function to get food item id */
	public function getItemId($name) {
		$this->db->select('id');
		$this->db->from('food_item_master');
		$this->db->where(array('name'=>$name));
		$query = $this->db->get();
	    $result = $query->row_array();
		return $result['id'];
	}
	
	/* Function to insert data to table */
	public function insertTable($table, $data, $type='single') {
		
		if($type != 'multiple') {
			$res = $this->db->insert($table, $data);
			
			$insert_id = $this->db->insert_id();
		}
		else {
			$res = $this->db->insert_batch($table, $data); 
		}
				
		if($res) {
			if($type != 'multiple')
				return $insert_id;
			else	
				return true;
		}
		else {
			return false;
		}
	}
	
	/* Function to get Diet Plans */
	public function getDietPlans() {
		$this->db->select('pm.id,first_name,DATE_FORMAT(birth_date,"%d-%m-%Y") as dob, age, sdesc, city, pm.status, pm.created_by, pm.edited_date, pm.edited_by,fpm.ldesc,pm.file_no');
		$this->db->from('diet_plan_main as pm');
		$this->db->join('food_preference_master as fpm', 'fpm.id=pm.food_pref_id');
		$this->db->where(array('pm.status'=>'T'));
		$this->db->order_by('pm.id desc');
		$query = $this->db->get();
        $result = $query->result_array();
		
		return $result;
	}
	
	public function getUserDietPlans() {
		$userid = $this->input->post('uid');
		$this->db->select('pp.id,pp.client_id,DATE_FORMAT(consultation_date,"%d-%m-%Y") as consult,u.username');
		$this->db->from('diet_plan_profile as pp');
		$this->db->join('users as u', 'pp.created_by=u.id');
		$this->db->where(array('pp.status'=>'T'));
		$this->db->where(array('pp.client_id'=>$userid));
		$this->db->order_by('pp.id desc');
		$query = $this->db->get();
        $result = $query->result_array();
		//echo '<pre>';print_r($result);exit;
		return $result;
	}
	
	/* Function to get Diet Chart */
	public function getDietChartDetails($clientId = '',  $planId='') {
		$arr_exercise = array();
		
		if(!$clientId)
			$clientId = $this->input->post('diet_id');
		else
			$clientId = $clientId;
		
		if(!$planId)
			$planId = $this->input->post('plan_id');
		else
			$planId = $planId;
		
		/*$clientId = 75;
		$planId = 108;*/
		
	//	echo $clientId.'==='.$planId;exit;
		// get Plan main details
		$arr_programme_type = array(1=>'Weight Loss', 2=>'Weight Gain', 3=>'NA');
		$result['main'] = $this->getPlanMain($clientId);
		$result['main']['program_type'] = $arr_programme_type[$result['main']['programe_type']];
		
		$this->db->select('pm.*, TIME_FORMAT(pm.start_time, "%h:%i %p") as start_time, TIME_FORMAT(pm.end_time, "%h:%i %p") as end_time,
		                   ic.breakfast_protein,ic.lunch_protein,ic.snack_protein,ic.dinner_protein,ic.breakfast_cal,ic.lunch_cal,ic.snack_cal,ic.dinner_cal');
		$this->db->from('diet_plan_meals as pm');
		$this->db->join('diet_plan_intake_chart as ic', 'ic.plan_id=pm.plan_id');
		$this->db->where(array('pm.plan_id'=>$planId));
		$query = $this->db->get();
        $result['meals'] = $query->result_array();
		
		/*$this->db->select('*, TIME_FORMAT(pp.start_time, "%h:%i %p") as start_time, TIME_FORMAT(pp.end_time, "%h:%i %p") as end_time');
		$this->db->from('diet_plan_main as pm');
		$this->db->join('diet_plan_meals as pp', 'pp.client_id=pm.id');
		//$this->db->join('diet_plan_meal_options as pmo', 'pmo.meal_id=pp.id');
		$this->db->where(array('pm.status'=>'T', 'pp.plan_id'=>$planId));
		$query = $this->db->get();
        $result = $query->result_array();*/
		
		foreach($result['meals'] as $key=>$opt_value) {
			$this->db->select('*');
			$this->db->from('diet_plan_meal_options as pmo');
			$this->db->where(array('meal_id'=>$opt_value['id']));
			$query = $this->db->get();
			$opt_result = $query->result_array();
			$arr_items = array();
			
			foreach($opt_result as $ikey=>$ivalue) {
				$this->db->select('*');
				$this->db->from('diet_plan_meal_options as pmo');
				$this->db->join('diet_plan_meal_option_items as pmoi', 'pmoi.option_id=pmo.id');
				$this->db->join('food_item_master as im', 'pmoi.food_item_id=im.id');
				$this->db->where(array('option_id'=>$ivalue['id']));
				$query = $this->db->get();
				
				$item_result = $query->result_array();
				$tot_prot = 0;
				$tot_fat = 0;
				$tot_carb = 0;
				$tot_kcal = 0;
				foreach($item_result as $kk=>$vv)
				{
					$item_result[$kk]['macro_nut'] = trim($vv['macro_nut']);
					$item_result[$kk]['name'] = trim($vv['name']);
					$item_result[$kk]['food_item'] = trim($vv['food_item']);

					$arrnut = explode(',',$vv['macro_nut']);
					$item_result['nut_count'] = count($arrnut);
					
					if(isset($vv['exchange'])) {
						if($vv['exchange']!='')
							{
								if($vv['id']==84)
								{
								   $arrecc =  explode(',',$vv['exchange']);	
								   $item_result[$kk]['text_exchange'] = $arrecc[0].' '.$vv['amount']*$vv['gm_ml_meas'].' '.$vv['calc_base'].' of '.$arrecc[1];
								}
								else
								{
									 $arrexh =  explode(',',$vv['exchange']);
									 $arrcalc =  explode(',',$vv['calc_base']);
									 $item_result[$kk]['text_exchange'] = $vv['amount']*$vv['number_meas'].' '.$arrcalc[0].' of '.$arrexh[0].' + '.$vv['amount']*$vv['cup_meas'].' '.$arrcalc[1].' of '.$arrexh[1];
								}
							}
					}
					// sum of content
					$tot_prot = $tot_prot + ($vv['amount']*$vv['protein']);
					$tot_fat = $tot_fat + ($vv['amount']*$vv['fat']);
					$tot_carb = $tot_carb + ($vv['amount']*$vv['carbs']);
					$tot_kcal = $tot_kcal + ($vv['amount']*$vv['kcal']);
					
				}
				$item_result['tot_prot'] = $tot_prot;
				$item_result['tot_fat'] = $tot_fat;
				$item_result['tot_carb'] = $tot_carb;
				$item_result['tot_kcal'] = $tot_kcal;
				//echo '<pre>';print_r($arr_items);
				//echo '<pre>';print_r($item_result);exit;
				$result['meals'][$key]['options'][$ikey]['items'] = $item_result;
				
			} 
			//$result[$key]['options'] = $opt_result;
		}
		// echo '<pre>';print_r($result);exit;
		// get Recommended intake
		$arr_recommIntake = $this->getPlanProfile($clientId);
		$result['recomm_intake'] = $arr_recommIntake;
		
		// get diet Guidelines
		$arr_guideLines = $this->getDietGuidelines($planId);
		$result['guidelines'] = $arr_guideLines;
		
		$result['recomm_intake']['guidelines_count'] = count($arr_guideLines);
		
		//get intake chart details
		$arr_intakechart = $this->getIntakeChartDetail($planId);
		$result['intake_chart'] = $arr_intakechart;
				
		// get exercise details
		$arr_exercise = $this->getPlanExerciseDet($planId);
		$result['exercise'] = $arr_exercise;
		
		// get diet general Guidelines
		$arr_gen_guideLines = $this->getGeneralGuidelines($planId);
		$result['gen_guidelines'] = $arr_gen_guideLines;
		
		$arr_genext_guideLines = $this->getExtraGeneralGuidelines($planId);
		$result['gen_ext_guidelines'] = $arr_genext_guideLines;
		
		// get diet started and target details
		$arr_targetDetails = $this->getDietTargetDet($clientId);
		$result['target_details'] = $arr_targetDetails;
		
		//echo '<pre>';print_r($result);exit;
		
		return $result;
	}
	
	/* Function to get Plan main details */
	public function getPlanMain($diet_id) {
		$this->db->select('*, pm.id as id, DATE_FORMAT(pm.birth_date,"%d-%m-%Y") as birth_date, pm.status as status,pm.programe_type');
		$this->db->from('diet_plan_main pm');
		$this->db->join('food_preference_master fpm', 'fpm.id=pm.food_pref_id');
		$this->db->where(array('pm.status'=>'T','pm.id'=>$diet_id));
		$query = $this->db->get();
        $result = $query->row_array();
		
		return $result;
	}
	
	/* Function to get Recommended intake */
	public function getPlanProfile($diet_id) {
		$this->db->select('*, DATE_FORMAT(consultation_date,"%D %M %Y") as consultation_date');
		$this->db->from('diet_plan_profile');
		$this->db->where(array('client_id'=>$diet_id));
		$this->db->order_by('id DESC');
		$this->db->limit('0,1');
		$query = $this->db->get();
        $result = $query->row_array();
		
		return $result;
	}
	/* Function to get intake chart*/
	public function getIntakeChartDetail($planId) {
		$this->db->select('SUM(servings_prot) as protein,SUM(servings_fat) as fats ,SUM(servings_chol) as carbs ,SUM(servings_calo) as calories, SUM(servings_calc) as calcium');
		$this->db->from('diet_plan_food_details');
		$this->db->where(array('plan_id'=>$planId));
		$query = $this->db->get();
        $result = $query->row_array();		
		return $result;
	}
	
	/* Function to fetch diet guidelines */
	public function getDietGuidelines($planId) {
		$arr_diseases = array();
		$this->db->select('pg.disease_id,dr.recommendation,d.name');
		$this->db->from('diet_plan_guidelines pg');
		$this->db->join('disease as d', 'd.id=pg.disease_id');
		$this->db->join('disease_recommendation as dr', 'dr.id=pg.recommend_id');
		$this->db->where(array('pg.plan_id'=>$planId, 'd.id !='=>26));
		$query = $this->db->get();
		//echo $this->db->last_query();
		$result = $query->result_array();
		
		foreach($result as $value) {
			$arr_diseases[$value['disease_id']]['name'] = $value['name'];
			$arr_diseases[$value['disease_id']][] = $value;
		}
		//echo '<pre>';print_r($arr_diseases);
		return $arr_diseases;
	}
	
	/* Function to fetch guidelines */
	public function getGuidelines($disease_id = '') {
		
		$arr_diseases = array();
		if(!$disease_id)
			$post = json_decode(trim(file_get_contents('php://input')), true);
		else
			$post = $disease_id;
		
		foreach($post as $key=>$value) {
			$this->db->select('*');
			$this->db->from('disease_recommendation');
			$this->db->where(array('disease_id'=>$value['id']));
			$query = $this->db->get();
			$disease_result = $query->result_array();
			$arr_diseases[$value['name']] = $disease_result;
		}
		
		return $arr_diseases;
	}
	
	/* Function to get client diet details */
	public function getClientDietDetails() {
		$diet_id = $this->input->post('client_id');
		
		// get Plan main details
		$result['main'] = $this->getPlanMain($diet_id);
		
		// get Plan profile details
		$result['profile'] = $this->getPlanProfile($diet_id);
		//echo '<pre>';print_r($result);exit;
		return $result;
	}
	
	/* Function to clients Plans */
		public function getClients() {
			$this->db->select('*');
			$this->db->from('diet_plan_main');
			$this->db->where(array('status'=>'T'));
			$this->db->order_by('id asc');
			$query = $this->db->get();
	        $result = $query->result_array();

			return $result;
		}
	    public function getClientDtl() 
	    {
	        $pid = $this->input->post('pid');
			$plan_id = $this->input->post('planid');
			 if($plan_id=='0')
			 {
			     $plan_id = $this->getLastPlanId($pid);
			 }
			//echo $plan_id.'-planidssss';exit;
			$this->db->select('pm.id,pm.first_name as name,pm.email,pm.food_pref_id as food_pref,pm.gender,DATE_FORMAT(pm.birth_date,"%d-%m-%Y") AS dob,pm.age,pm.city,pm.programe_type,DATE_FORMAT(pp.consultation_date,"%d-%m-%Y") as consult_date,,DATE_FORMAT(pp.target_date,"%d-%m-%Y") as target_date,pp.height_in_cm,pp.weight_in_kg,pp.target_weight_in_kg,pp.bmi,pp.wrist_in_inch,pp.wrist_in_cm,pp.rfactor,pp.ibw,pp.ibw_mean,pp.icc,pp.icc_adjusted,pp.rec_protien,pp.rec_fat,pp.rec_carbs,pp.preg_lact_energy,pp.preg_lact_protein,pm.file_no,pm.preg_lact');
			$this->db->from('diet_plan_main pm');
			$this->db->join('diet_plan_profile as pp', 'pp.client_id=pm.id');	
			//$this->db->join('diet_plan_food_details as pf', 'pf.client_id=pm.id');		
			$this->db->where(array('pm.id'=>$pid));
			$this->db->where(array('pp.id'=>$plan_id));
			$query = $this->db->get();
				$result = $query->row_array();
				
				$this->db->select('pf.food_id,fm.name,pf.servings as no_of_serving,pf.servings_prot,pf.servings_fat,pf.servings_chol,pf.servings_calo,pf.servings_calc');
				$this->db->from('diet_plan_food_details as pf');
				$this->db->join('food_master as fm', 'fm.id=pf.food_id');
				$this->db->where(array('pf.client_id'=>$pid));
				$this->db->where(array('pf.plan_id'=>$plan_id));
				$query = $this->db->get();
				$item_result = $query->result_array();
				$result['foodss'] = $item_result;
				
				$this->db->select('pg.disease_id as id,d.name');
				$this->db->from('diet_plan_guidelines as pg');
				$this->db->join('disease as d', 'd.id=pg.disease_id');
				$this->db->where(array('pg.client_id'=>$pid));
				$this->db->where(array('pg.plan_id'=>$plan_id));
				$this->db->where('pg.disease_id!=26');
				$this->db->group_by('pg.disease_id');
				$query = $this->db->get();
				$item_result = $query->result_array();
				$result['diseasess'] = $item_result;
				
				$this->db->select('meal as id,meal_name as name,DATE_FORMAT(start_time,"%a %b %d %Y %H:%i:%s") as start_time,DATE_FORMAT(end_time,"%a %b %d %Y %H:%i:%s") as end_time');
				//$this->db->select('meal as id,meal_name as name,start_time,end_time');
				$this->db->from('diet_plan_meals');
				$this->db->where(array('client_id'=>$pid));
				$this->db->where(array('plan_id'=>$plan_id));
				$query = $this->db->get();
				$times_result = $query->result_array();
				$result['mealtimes'] = $times_result;
			
				
				$this->db->select('*');
				$this->db->from('diet_plan_intake_chart');
				$this->db->where(array('client_id'=>$pid));
				$this->db->where(array('plan_id'=>$plan_id));
				$query = $this->db->get();
				$meal_result = $query->row_array();
				$result['exchanges'] = $meal_result;
				
				$this->db->select('pm.meal as id,pm.meal_name as name,pm.start_time,pm.end_time,moi.option_id,moi.food_item as item, moi.amount as exch');
				$this->db->from('diet_plan_meals as pm');
				$this->db->join('diet_plan_meal_options as mo', 'pm.id=mo.meal_id');
				$this->db->join('diet_plan_meal_option_items as moi', 'mo.id=moi.option_id');
				$this->db->where(array('pm.client_id'=>$pid));
				$this->db->where(array('pm.plan_id'=>$plan_id));
				//$this->db->group_by(array('pm.meal_name'));
				$this->db->order_by('pm.id,moi.id');
				$query = $this->db->get();
				$item_result = $query->result_array();
				//echo '<pre>';print_R($item_result);
				$i=0;
				$j=0;
				$res_items =array();
				$opdids =array();
				$mealids =array();
				foreach($item_result as $key=>$val)
				{
					
					$res_items[$val['id']]['id']=$val['id'];
					$res_items[$val['id']]['name']=$val['name'];
					
					//$dt_start = DateTime::createFromFormat('H:i:s',$val['start_time']);	
					//$res_items[$val['id']]['start_time'] = $dt_start->format('D M d Y H:i:s');
					
					//$dt_end = DateTime::createFromFormat('H:i:s',$val['end_time']);	
					//$res_items[$val['id']]['end_time'] = $dt_end->format('D M d Y H:i:s');
					
						
					if(!in_array($val['option_id'],$opdids))
					{
						$opdids[] = $val['option_id'];
						
						
						$i++;
						$j=0;						
					}
					if(!in_array($val['id'],$mealids))
					{
						$mealids[] = $val['id'];
						$i=0;
						
					}
					$res_items[$val['id']]['options'][$i][$j]['item'] = $val['item'];
					$res_items[$val['id']]['options'][$i][$j]['exch'] = $val['exch'];
					
					$j++;
						
					
				}
				$result['mealopts'] = $res_items;
				
				
		 $this->db->select('total_cd, ex_def as tot_ex_def, no_of_days as exno_of_days, cal_loss as total_closs, weight_loss, program, weeks as exno_of_weeks, exercise_det as exercises,exercise_anytime');
								$this->db->from('diet_plan_exercise');
								$this->db->where(array('plan_id'=>$plan_id));
								$query = $this->db->get();
								$exercise_result = $query->row_array();
								$result['plan_exercises'] = $exercise_result;
				//print_r($result);exit;
	        return $result;
	    }

		/* Function to fetch diet guidelines */
		public function getFooditems() {
			
			$this->db->select('im.id,im.name,fm.name as category_name');
			$this->db->from('food_item_master im');
			$this->db->join('food_master as fm', 'fm.id=im.food_category');
			//$this->db->group_by('im.food_category');
			$this->db->order_by('im.food_category');
			$query = $this->db->get();
	        $result = $query->result_array();
			
			return $result;
		}	
		
		public function getLastPlanId($pid)
		{
			$this->db->select('id');
			$this->db->from('diet_plan_profile');
			$this->db->where(array('client_id'=>$pid));
			$this->db->order_by('id desc');
			$this->db->limit(0, 1);
			$query = $this->db->get();
		        $result = $query->row_array();
			return $result['id'];
		}

       // Function to get general guidelines
		public function getGeneralGuidelines($planId) {
			$arr_genGuidelines = array();
			$arr_pgenGuidelines = array();
			
			$this->db->select('recommend_id as id, recommend_text as recommendation,checked');
			$this->db->from('diet_plan_guidelines');
			$this->db->where(array('disease_id'=>26, 'plan_id'=>$planId));
			$query = $this->db->get();
	        $plan_result = $query->result_array();
			
			if($plan_result)
			{
				foreach($plan_result as $ky => $val) {
					if($val['id']!=0)
					{
					 $arr_pgenGuidelines[$val['id']] = $val['recommendation'];
					 $arr_pgenGuidelines[0][$val['id']] = $val['checked'];
					}
				}
			}
			
			$this->db->select('id, recommendation');
			$this->db->from('disease_recommendation');
			$this->db->where(array('disease_id'=>26));
			$query = $this->db->get();
	        $result = $query->result_array();
						
			foreach($result as $key=>$value) {
				$arr_genGuidelines[$key]['id'] = $value['id'];
				$arr_genGuidelines[$key]['recommendation'] = isset($arr_pgenGuidelines[$value['id']])?$arr_pgenGuidelines[$value['id']]:$value['recommendation'];
				if(isset($arr_pgenGuidelines[$value['id']]))
				{
					$checked = $arr_pgenGuidelines[0][$value['id']];
				}
                else
				{
					$checked = 1;
				}				
				$arr_genGuidelines[$key]['chkd'] = ($checked==1?'true':'false');
			}
			return $arr_genGuidelines;
		}
		public function getExtraGeneralGuidelines($planId) 
		{
			$this->db->select('recommend_text_ext');
			$this->db->from('diet_plan_guidelines');
			$this->db->where(array('disease_id'=>26, 'plan_id'=>$planId));
			$this->db->where('recommend_id',0);
			$this->db->where('recommend_text_ext!=""');
			$query = $this->db->get();
			
	        $result = $query->row_array();
		   return $result['recommend_text_ext'];
		}
		// Function to get plan guidelines
		public function getPlanGuidelines() {
			$arr_recommends = array();
			$result_recommends = array();
			
			$clientId = json_decode(trim(file_get_contents('php://input')), true);
			
			$planId = $this->getLastPlanId($clientId);
			
			$this->db->select('recommend_id');
			$this->db->from('diet_plan_guidelines');
			$this->db->where(array('plan_id'=>$planId));
			$query = $this->db->get();
			
			$result_recommends = $query->result_array();
			foreach($result_recommends as $value) {
				$arr_recommends[] = $value['recommend_id'];
			}
			//print_r($arr_recommends);exit;
			return $arr_recommends;
		}
		
		/* Function to update general recommendations from dietchart */
		public function updateRecommend() {
			$post = $this->input->post();
			
			$this->db->where('plan_id',$post['plan_id']);
			$this->db->where('client_id',$post['client_id']);
			$this->db->where('recommend_id',$post['id']);
			
			$del_gen_recommendations = $this->db->delete('diet_plan_guidelines');
			
			$data['client_id'] = $post['client_id'];
			$data['plan_id'] = $post['plan_id'];
			$data['disease_id'] = 26;
			$data['recommend_id'] = $post['id'];
			$data['recommend_text'] = $post['recommendation'];
			
			$res = $this->db->insert('diet_plan_guidelines', $data);
			
			if($res) {
				return true;
			}
			else {
				return "Error";
			}
		}
		
		/* Function to get plan exercise */
		public function getPlanExerciseDet($plan_id) {
			
				$this->db->select('total_cd, ex_def as tot_ex_def, no_of_days as exno_of_days, cal_loss as total_closs, weight_loss, program, weeks as exno_of_weeks, exercise_det as exercises,exercise_anytime');
				$this->db->from('diet_plan_exercise');
				$this->db->where(array('plan_id'=>$plan_id));
				$query = $this->db->get();
				$exercise_result = $query->row_array();
				
				return $exercise_result;
		}
		
		public function removeGeneral() {
			$post = $this->input->post();
			
			$this->db->where('plan_id',$post['plan_id']);
			$this->db->where('client_id',$post['client_id']);
			$this->db->where('recommend_id',$post['id']);
			
			$del_gen_recommendations = $this->db->delete('diet_plan_guidelines');
			
			$data['client_id'] = $post['client_id'];
			$data['plan_id'] = $post['plan_id'];
			$data['disease_id'] = 26;
			$data['recommend_id'] = $post['id'];
			$data['recommend_text'] = $post['recomd'];
			$data['checked'] = $post['chk'];
			
			$res = $this->db->insert('diet_plan_guidelines', $data);
			
			if($res) {
				return true;
			}
			else {
				return "Error";
			}
		}
		public function saveExtraRecomd() {
			$post = $this->input->post();
			
			$this->db->select('recommend_id');
			$this->db->from('diet_plan_guidelines');
			$this->db->where('plan_id',$post['plan_id']);
			$this->db->where('client_id',$post['client_id']);
			$this->db->where('recommend_id',0);
			$this->db->where('recommend_text_ext!=""');
			
			$query = $this->db->get();
		    $result = $query->row_array();
				
				$data['client_id'] = $post['client_id'];
				$data['plan_id'] = $post['plan_id'];
				$data['disease_id'] = 26;
				$data['recommend_text_ext'] = $post['extrec'];
			if($result['recommend_id']=="")
			{								
				$res = $this->db->insert('diet_plan_guidelines', $data);
			}
			else
			{
				$this->db->where('plan_id',$post['plan_id']);
			    $this->db->where('client_id',$post['client_id']);
				$this->db->where('recommend_id',0);
				$res = $this->db->update('diet_plan_guidelines', $data);
			}
			if($res) {
				return $post['extrec'];
			}
			else {
				return "Error";
			}
		}
		/* Function to fetch diet guidelines */
		public function getExercises() {
			
			$this->db->select('id,desc');
			$this->db->from('exercise_master ');
			$query = $this->db->get();
	        $result = $query->result_array();			
			return $result;
		}
		
		/* Function to fetch exercise ex deficit based on age */
		public function getExDef() {
			 $exc_name = $this->input->post('exc');
			 $weight = $this->input->post('weigt');
			
			if($weight >=50 && $weight <= 59)
			{
				$wegt = 'wt_50';
			}
			else if($weight >=60 && $weight <= 69)
			{
				$wegt = 'wt_60';
			}
			else if($weight >=70 && $weight <= 79)
			{
				$wegt = 'wt_70';
			}
			else if($weight >=80 && $weight <= 89)
			{
				$wegt = 'wt_80';
			}
			else 
			{
				$wegt = 'wt_90';
			}
			$this->db->select($wegt);
			$this->db->from('exercise_master');
			$this->db->where('desc',trim($exc_name));
			$query = $this->db->get();
			$result = $query->row_array();
			return $result[$wegt];	
		}
		
		/* Function to get started and target details of plan */
		public function getDietTargetDet($clientId) {
			$this->db->select('DATE_FORMAT(consultation_date,"%D %M %Y") as start_date, DATE_FORMAT(target_date,"%D %M %Y") as target_date,weight_in_kg as start_weight, target_weight_in_kg as target_weight, rec_fat as fat, bmi');
			$this->db->from('diet_plan_profile');
			$this->db->where(array('status'=>'T','client_id'=>$clientId));
			$this->db->order_by('id ASC');
			$this->db->limit(1);
			$query = $this->db->get();
			$result = $query->row_array();
			
			return $result;
		}
}
