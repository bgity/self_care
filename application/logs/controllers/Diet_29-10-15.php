<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diet extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('diet_model');    
		$this->load->library('session');
    }
	
	public function createDiet()
	{
		$this->load->view('plan/createDiet');
	}

	public function clientDetails()
	{
		$this->load->view('plan/clientDetails');
	}
	
	public function intakeAllocation()
	{
		$this->load->view('plan/intakeAllocation');
	}
	
	public function createPlans()
	{
		$this->load->view('plan/createPlans');
	}
	
	public function mealExchange()
	{
		$this->load->view('plan/mealExchange');
	}
	
	public function scheduleExercise()
	{
		$this->load->view('plan/scheduleExercise');
	}
	public function getIBWRange() {
		$result = $this->diet_model->getIBWRange();        
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	
	public function addPlan() {
		$result = $this->diet_model->addPlan();  
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	
	/* Function to load diet plans view */ 
	public function dietPlan()
	{
		$this->load->view('plan/dietPlan');
	}
	
	/* Function to get diet plans list */ 
	public function getDietPlans() {
		$result = $this->diet_model->getDietPlans();  
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	/* get user diet plan list */
	public function dietPlanList()
	{
		$this->load->view('plan/dietPlanList');
	}
	
	/* Function to get user diet plans list */ 
	public function getDietPlanList() {
			$result = $this->diet_model->getUserDietPlans();  
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
		}
	
	/* Function to load diet chart view */ 
	public function dietChart()
	{
		$this->load->view('plan/dietChart');
	}
	
	/* Function to get diet chart details */ 
	public function getDietChart() {
		$result = $this->diet_model->getDietChartDetails();  
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	
	/* Function to show Guidelines view */
	public function showGuidelines() {
		$this->load->view('plan/showGuidelines');
	}
	
	/* Function to get guidelines */
	public function getGuidelines() {
		$result = $this->diet_model->getGuidelines();  
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	
	/* Function to load client details view */ 
	public function getClientDietDetailsView()
	{
		$this->load->view('plan/clientDietDetails');
	}
	
	/* Function to get client diet details */
	public function getClientDietDetails() {
		$result = $this->diet_model->getClientDietDetails();  
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
    
	/* Function to download as pdf */
	public function downloadPDF() {
		$clientID =  $this->uri->segment(3);
		$planID =  $this->uri->segment(4);
		
		$data = $this->diet_model->getDietChartDetails($clientID,$planID);  
	//	echo '<pre>';print_r($data);exit;
		//load the view and saved it into $html variable
		$html=$this->load->view('plan/dietChart_pdf', $data, true);
		
		//this the the PDF filename that user will get to download
		$pdfFilePath = $data['main']['first_name'].'.pdf';
		//load mPDF library
		$this->load->library('m_pdf');
		$this->pdf = $this->m_pdf->load('c','A4-P'); 
		//generate the PDF from the given html
		//$this->pdf->WriteHTML($html);
		 
		//download it.
		//$this->pdf->Output($pdfFilePath, "D");
		
		
		/*$html = '<div class="container">
			<div class="row">
				<div class="col-xs-2" style="background-color: palevioletred;"><strong>A</strong></div>
				<div class="col-xs-4" style="background-color: #808080;"><strong>B</strong></div>
				<div class="col-xs-4" style="background-color: #008000;"><strong>C</strong></div>
			</div>
		</div>';*/
		$this->pdf->WriteHTML(file_get_contents('assets/global/plugins/bootstrap/css/bootstrap.min.css'), 1);
		$this->pdf->WriteHTML($html, 2);
		$this->pdf->Output($pdfFilePath, "D");

	}
	
	/* Function to get clients list */ 
	public function getClients() {
		$result = $this->diet_model->getClients();  
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	/* Function to get clients list */ 
	public function getClientDtl() {
		$result = $this->diet_model->getClientDtl();  
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	
	/* Function to email chart */
	public function sendMailChart() {
		$data = $this->diet_model->getDietChartDetails();
		$html=$this->load->view('plan/dietChart_pdf', $data, true);
		
		$this->load->library('m_pdf');
		$this->pdf = $this->m_pdf->load('c','A4-P');
		
		$this->pdf->WriteHTML(utf8_encode($html)); 

		$content = $this->pdf->Output('', 'S');

		$content = chunk_split(base64_encode($content));
		$mailto = 'sandeep.gopalan@appetals.com'; //Mailto here
		$from_name = 'SelfCare'; //Name of sender mail
		$from_mail = 'mailfrom@selfcare.com'; //Mailfrom here
		$subject = 'Diet Chart'; 
		$message = 'Hi, Please find attached your diet chart';
		$filename = $data['first_name']."-".date("d-m-Y_H-i",time()); //Your Filename with local date and time

		//Headers of PDF and e-mail
		$boundary = "XYZ-" . date("dmYis") . "-ZYX"; 

		$header = "--$boundary\r\n"; 
		$header .= "Content-Transfer-Encoding: 8bits\r\n"; 
		$header .= "Content-Type: text/html; charset=ISO-8859-1\r\n\r\n"; // or utf-8
		$header .= "$message\r\n";
		$header .= "--$boundary\r\n";
		$header .= "Content-Type: application/pdf; name=\"".$filename."\"\r\n";
		$header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n";
		$header .= "Content-Transfer-Encoding: base64\r\n\r\n";
		$header .= "$content\r\n"; 
		$header .= "--$boundary--\r\n";

		$header2 = "MIME-Version: 1.0\r\n";
		$header2 .= "From: ".$from_name." \r\n"; 
		$header2 .= "Return-Path: $from_mail\r\n";
		$header2 .= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";
		$header2 .= "$boundary\r\n";

		mail($mailto,$subject,$header,$header2, "-r".$from_mail);

		$this->pdf->Output($filename ,'I');
		exit;
	}
	
	public function getFooditems() {
		$result = $this->diet_model->getFooditems();  
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	
	/* Function to get plan guidelines */
	public function getPlanGuidelines() {
		$result = $this->diet_model->getPlanGuidelines();  
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	
	/* Function to update general recommendations from dietchart */
	public function updateRecommend() {
		$result = $this->diet_model->updateRecommend();  
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	public function removeGeneral() {
		$result = $this->diet_model->removeGeneral();  
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	public function saveExtraRecomd() {
		$result = $this->diet_model->saveExtraRecomd();  
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	// get exercise listing
	public function getExercises() {
		$result = $this->diet_model->getExercises();  
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	
	public function getExDef() {
		$result = $this->diet_model->getExDef();  
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	
}

/* End of file diet.php */
/* Location: ./application/controllers/diet.php */