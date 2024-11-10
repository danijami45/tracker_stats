<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stats extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		// loading model
		$this->load->model('Visitor_tracker_model', 'visitor_tracker_model');
	}
	public function index()
	{
		// fetching data all visitors records
		$data['visitors'] = $this->visitor_tracker_model->getAllVisitorRecords();
		// loading stats view and passing data by arguments
		$this->load->view('stats_view', $data);
	}

	public function visitor_tracker(){
		if($this->input->is_ajax_request()){
			// get post values in the variables
			$siteUrl = $this->input->post("siteUrl");
			$userAgent = $this->input->post("userAgent");
			$ip = $this->input->ip_address();

			// check if already visited in the past 24 hours
			$visitorRecord = $this->visitor_tracker_model->getVisitorRecord($siteUrl, $userAgent, $ip);
			// declare empty string message variable
			$message = '';
			// if not visited already then add new visit record
			if(!$visitorRecord){
				//save new visit
				$visit_record_id = $this->visitor_tracker_model->saveVisitRecord($siteUrl, $userAgent, $ip);
				if($visit_record_id){
					// message if record added successfully
					$message = 'New visitor record created.';
				}else{
					// message if record adding failed
					$message = 'New visitor record could not be created.';
				}
			}else{
				//send previous record in response if already added
				$siteUrl = $visitorRecord['site_url'];
				$userAgent = $visitorRecord['user_agent'];
				$ip = $visitorRecord['ip_address'];
				// message if already added visitor record
				$message = 'Already visited.';
			}
			// sending json response
			echo json_encode(
				[
					'siteUrl' => $siteUrl,
					'userAgent' => $userAgent,
					'ip' => $ip,
					'message' => $message
				]
			);exit;
		}
	}
}
