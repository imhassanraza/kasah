<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reporting extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('admin/reportingmodel');
		if (!checkAdminLogin()) {
			redirect(base_url().'admin/login');
		}
	}
	
	function index() {
		$data['listing'] = $this->reportingmodel->getListings();
		$this->load->view('admin/reporting/manage',$data);
	}

	public function ajaxFilter(){
		$data = $_POST;
		$data['listing'] = $this->reportingmodel->getListingByFilter($data);
		$html  = $this->load->view('admin/reporting/ajaxFilter',$data, true);

		$response = array('html' => $html);
		echo json_encode($response);
	}
}
?>