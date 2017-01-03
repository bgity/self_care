<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/master
	 *	- or -  
	 * 		http://example.com/index.php/master/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/master/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
         public function __construct() {
             parent::__construct();
			 $this->load->library('session');
             $this->load->model('master_model');
             
         }
         
	public function index()
	{
            //$this->load->view('client/client_list'); 
            //$this->load->view('client/client_info');
	}
        
        public function foodGroupMasterList()
	{
            $this->load->view('master/foodGroupMasterList'); 
	}
        
        public function get_foodGroup()
        {
            $p = $this->master_model->get_foodGroup();
            //echo "<pre>";print_r($p);"<pre>"; die;
            $this->output->set_content_type('application/json')->set_output(json_encode($p));
        }
        
        public function editMasterFoodGroupView()
        {
            $this->load->view('master/editMasterFoodGroupView');
        }
        
        public function getMasterFoodEditdetails()
        {
            $pid = $this->input->post('pid');  
            if($pid >0)
            {
                $pid = $pid;
            }
            else
            {
                $pid = 1;
            }
            $p = $this->master_model->getMasterFoodEditdetails($pid);
            //echo "<pre>";print_r($p);"<pre>"; die;
            $this->output->set_content_type('application/json')->set_output(json_encode($p));
        }
        
        public function editFoodGroupMaster()
        {
            //echo "<pre>";print_r($_POST);"<pre>"; die;
            $id                         = $this->input->post('id');
            $data['name']               = $this->input->post('name');
            $data['weight_per_serving'] = $this->input->post('weight_per_serving');
            $data['prot_per_serving']   = $this->input->post('prot_per_serving');
            $data['fat_per_serving']    = $this->input->post('fat_per_serving');
            $data['chol_per_serving']   = $this->input->post('chol_per_serving');
            $data['calo_per_serving']   = $this->input->post('calo_per_serving');
            $data['calc_per_serving']   = $this->input->post('calc_per_serving');
            
            
        
            $p=$this->master_model->editFoodGroupMaster($data,$id);     
            
            $this->output->set_content_type('application/json')->set_output(json_encode($p)); 
        }
		
		public function getFoodMaster()
		{
			$result = $this->master_model->getFoodMaster();
            $this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
		public function getFoodMasterShort()
		{
			$result = $this->master_model->getFoodMasterShort();
            $this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
        
		public function heightWeight()
		{
			$this->load->view('master/heightWeight');
		}
		
		public function viewHeightWeights()
		{
			$result = $this->master_model->getHeightWeight();
			$this->output->set_content_type('application/json')->set_output(json_encode($result));    
		}
        
		public function addHeightWeightview()
		{
			$this->load->view('master/heightWeightAdd');
		}
		
		public function addHeightWeight()
		{
			$result = $this->master_model->addHeightWeight();  
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
		
		public function saveHWDet() {
			$result = $this->master_model->saveHWDet();  
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
		
		public function foodMaster()
		{
			$this->load->view('master/foodMaster');
		}
		
		public function addFoodsview()
		{
			$this->load->view('master/foodAdd');
		}
		
		public function addFood()
		{
			$result = $this->master_model->addFood();  
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
		
		public function getFoodDetails() 
		{
			$result = $this->master_model->getFoodDetails();  
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
		
		public function editFood()
		{        
			$result = $this->master_model->editFood();        
			$this->output->set_content_type('application/json')->set_output(json_encode($result));        
		} 
		
		public function deleteFood()
		{        
			$result = $this->master_model->deleteFood();        
			$this->output->set_content_type('application/json')->set_output(json_encode($result));        
		} 
		
		public function uomMaster()
		{
			$this->load->view('master/uomMaster');
		}
		
		public function viewUomMaster()
		{
			$result = $this->master_model->getUomMaster();
			$this->output->set_content_type('application/json')->set_output(json_encode($result));    
		}
		
		public function saveUOMDet() {
			$result = $this->master_model->saveUOMDet();  
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
		
		public function deleteUom()
		{        
			$result = $this->master_model->deleteUom();        
			$this->output->set_content_type('application/json')->set_output(json_encode($result));        
		}
		
		public function getPlanFoodOptions() {
			$result = array("sandwich","sambhar","butter", "bajra", "jowar");        
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
		
		
	############# body weight #######################	

		public function bodyWeightMaster()
		{
				$this->load->view('master/bodyWeightMaster'); 
		}
		public function moreBodyWeight()
		{
				$this->load->view('master/moreBodyWeight'); 
		}
		 public function get_bodyWeight()
		{
				$p = $this->master_model->get_bodyWeight();
				$this->output->set_content_type('application/json')->set_output(json_encode($p));
		}
		 public function editBodyWeightMaster()
		 {
				$this->load->view('master/editBodyWeightMaster');
		 }
		 
		public function getBodyWeightDetails()
		{
				$pid = $this->input->post('pid');  
				$p = $this->master_model->get_bodyWeightDetail($pid);
				$this->output->set_content_type('application/json')->set_output(json_encode($p));
		}
		public function editBodyWeight()
		{        
				$result = $this->master_model->editBodyWeight();        
				$this->output->set_content_type('application/json')->set_output(json_encode($result));        
		} 
		public function addBodyWeight()
		{        
				$result = $this->master_model->addBodyWeight();        
				$this->output->set_content_type('application/json')->set_output(json_encode($result));        
		} 
		public function deleteBodyWeight()
			{        
				$result = $this->master_model->deleteBodyWeight();        
				$this->output->set_content_type('application/json')->set_output(json_encode($result));        
			} 
				
	############# end body weight #######################
	############# Frame Size start #######################	

		public function frameSizeMaster()
		{
				$this->load->view('master/frameSizeMaster'); 
		}
		public function editFrameSizeView()
		 {
				$this->load->view('master/editFrameSize');
		 }
		public function getFrameSize()
		{
				$p = $this->master_model->getFrameSize();
				$this->output->set_content_type('application/json')->set_output(json_encode($p));
		}
		public function getFrameSizeDetails()
		{
				$p = $this->master_model->getFrameSizeDetails();
				$this->output->set_content_type('application/json')->set_output(json_encode($p));
		}
		public function addFrameSize()
		{        
				$result = $this->master_model->addFrameSize();        
				$this->output->set_content_type('application/json')->set_output(json_encode($result));        
		}
		public function editFrameSize()
		{        
				$result = $this->master_model->editFrameSize();        
				$this->output->set_content_type('application/json')->set_output(json_encode($result));        
		}  
		public function saveFrameSizeDet() 
		{
			$result = $this->master_model->saveFrameSizeDet();  
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}  
		
	############# Frame Size end #######################
	############# intake start #######################	

		public function intakeMaster()
		{
				$this->load->view('master/intakeMaster'); 
		}
		public function addIntakeView()
		 {
				$this->load->view('master/addIntake');
		 }
		public function getIntake()
		{
				$p = $this->master_model->getIntake();
				$this->output->set_content_type('application/json')->set_output(json_encode($p));
		}
		public function getIntakeDetails()
		{
				$p = $this->master_model->getIntakeDetails();
				$this->output->set_content_type('application/json')->set_output(json_encode($p));
		}
		public function addIntake()
		{        
				$result = $this->master_model->addIntake();        
				$this->output->set_content_type('application/json')->set_output(json_encode($result));        
		}
		public function editIntake()
		{        
				$result = $this->master_model->editIntake();        
				$this->output->set_content_type('application/json')->set_output(json_encode($result));        
		}
		public function deleteIntake()
			{        
				$result = $this->master_model->deleteIntake();        
				$this->output->set_content_type('application/json')->set_output(json_encode($result));        
			}   
		
	############# intake end #######################	
    ############# Food Pref start #######################	
       public function foodPrefMaster()
		{
			$this->load->view('master/foodPrefMaster');
		}
		public function getFoodpfsMaster()
		{
			$result = $this->master_model->getFoodpfsMaster();
			$this->output->set_content_type('application/json')->set_output(json_encode($result));    
		}
		public function saveFoodpfDet() {
			$result = $this->master_model->saveFoodpf();  
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
		public function deleteFoodpf()
		{        
			$result = $this->master_model->deleteFoodpf();        
			$this->output->set_content_type('application/json')->set_output(json_encode($result));        
		}
	
	############# disease recommend start #######################	
       public function diseaseRecommendation()
		{
			$this->load->view('master/diseaseRecommendation');
		}
		public function addDiseaseRecView()
		{
			$this->load->view('master/addDiseaseRec');
		}
		public function getDiseases()
		{
			$result = $this->master_model->getDisease();
			$this->output->set_content_type('application/json')->set_output(json_encode($result));    
		}
	    public function getDiseaseRecDetails()
	    {
	            $p = $this->master_model->getDiseaseRecDetails();
	            $this->output->set_content_type('application/json')->set_output(json_encode($p));
	    }
		public function getDiseaseRec()
		{
			$result = $this->master_model->getDiseaseRec();
			$this->output->set_content_type('application/json')->set_output(json_encode($result));    
		}
		/*public function saveDiseaseRec() {
			$result = $this->master_model->saveDiseaseRec();  
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}*/
	    public function addDiseaseRec()
		{        
				$result = $this->master_model->addDiseaseRec();        
				$this->output->set_content_type('application/json')->set_output(json_encode($result));        
		}
		public function editDiseaseRec()
		{        
				$result = $this->master_model->editDiseaseRec();        
				$this->output->set_content_type('application/json')->set_output(json_encode($result));        
		}
		public function deleteDiseaseRec()
		{        
			$result = $this->master_model->deleteDiseaseRec();        
			$this->output->set_content_type('application/json')->set_output(json_encode($result));        
		}	
	############# disease recommend end #######################
	
	public function addClientView()
	{
		$this->load->view('plan/addClient');
	}
}

/* End of file master.php */
/* Location: ./application/controllers/master.php */