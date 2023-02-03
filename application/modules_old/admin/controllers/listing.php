<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Listing extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/sell_model');
		if (!checkAdminLogin()) {
			redirect(base_url().'admin/login');
		}
	}

	function index() {
		$data['listing'] = $this->sell_model->getListings();
		$this->load->view('admin/listing/manage',$data);
		// show($data);
	}

	public function edit($id){
		$data['listing'] = $this->sell_model->getListingsById($id);
		$x = 0;
		foreach ($data['listing'] as $listing) {
			$data['listing'][$x]['int_feature']['dining'] = $this->sell_model->getFeatures('sell_interior_feature','ref_dining_room',$listing['sell_id'],'dining');

			$data['listing'][$x]['int_feature']['family'] = $this->sell_model->getFeatures('sell_interior_feature','ref_dining_room',$listing['sell_id'],'family');

			$data['listing'][$x]['ext_feature']['parking'] = $this->sell_model->getFeatures('sell_exterior_feature','ref_parking_feature',$listing['sell_id'],'parking');

			$data['listing'][$x]['ext_feature']['foundation'] = $this->sell_model->getFeatures('sell_exterior_feature','ref_foundation',$listing['sell_id'],'foundation');

			$data['listing'][$x]['ext_feature']['roof'] = $this->sell_model->getFeatures('sell_exterior_feature','ref_roof',$listing['sell_id'],'roof');

			$data['listing'][$x]['ext_feature']['utilities'] = $this->sell_model->getFeatures('sell_exterior_feature','ref_utilities',$listing['sell_id'],'utilities');

			$data['listing'][$x]['ext_feature']['water'] = $this->sell_model->getFeatures('sell_exterior_feature','ref_water',$listing['sell_id'],'water');

			$data['listing'][$x]['ext_feature']['sewer'] = $this->sell_model->getFeatures('sell_exterior_feature','ref_sewer',$listing['sell_id'],'sewer');
		}
		$data['listing'] = $data['listing'][0];
		// show($data);
		$this->load->view('admin/listing/edit',$data);
	}

	public function view($id){
		$data['listing'] = $this->sell_model->getListingsById($id);
		$x = 0;
		foreach ($data['listing'] as $listing) {
			$data['listing'][$x]['int_feature']['dining'] = $this->sell_model->getFeatures('sell_interior_feature','ref_dining_room',$listing['sell_id'],'dining');

			$data['listing'][$x]['int_feature']['family'] = $this->sell_model->getFeatures('sell_interior_feature','ref_dining_room',$listing['sell_id'],'family');

			$data['listing'][$x]['ext_feature']['parking'] = $this->sell_model->getFeatures('sell_exterior_feature','ref_parking_feature',$listing['sell_id'],'parking');

			$data['listing'][$x]['ext_feature']['foundation'] = $this->sell_model->getFeatures('sell_exterior_feature','ref_foundation',$listing['sell_id'],'foundation');

			$data['listing'][$x]['ext_feature']['roof'] = $this->sell_model->getFeatures('sell_exterior_feature','ref_roof',$listing['sell_id'],'roof');

			$data['listing'][$x]['ext_feature']['utilities'] = $this->sell_model->getFeatures('sell_exterior_feature','ref_utilities',$listing['sell_id'],'utilities');

			$data['listing'][$x]['ext_feature']['water'] = $this->sell_model->getFeatures('sell_exterior_feature','ref_water',$listing['sell_id'],'water');

			$data['listing'][$x]['ext_feature']['sewer'] = $this->sell_model->getFeatures('sell_exterior_feature','ref_sewer',$listing['sell_id'],'sewer');
		}
		$data['listing'] = $data['listing'][0];
		$this->load->view('admin/listing/view',$data);
	}

	public function ajax_call(){
		$this->load->view('admin/ajax_call',$_POST,true);
		echo "1";
	}

	public function delete($id){
		$update = array('is_delete' => 'Y');
		$where = array('id' => $id);
		updateData('sell_basic', $update, $where);
		$this->session->set_flashdata('success_msg','Listing deleted successfuly!');
		redirect(base_url().'admin/listing');
	}

	public function update(){
		$data = $_POST;
		$data['home_worth'] = str_replace(',', '', $data['home_worth']);
		
		$response = $this->sell_model->updateList($data);
		if ($response) {
			$this->session->set_flashdata('success_msg','Record updated successfuly');
			redirect(base_url().'admin/listing');
		}else{
			$this->session->set_flashdata('error_msg','Opss! There was an error occured while updating the record');
			redirect(base_url().'admin/listing');
		}
	}

	public function updatePropertyStatus(){
		$data = $_POST;
		if ($data['val'] == "Y") {
			$update = array('is_approved' => 'Y','publish_approve' => 'N','draft' => 'N');
			$where = array('id' => $data['id']);
			$result['detail'] = $this->sell_model->getEmailandId($data['id']);
			$result['detail']['list_id'] = $data['id'];
			$this->sendMail($result['detail']);
		}else {
			$update = array('is_approved' => 'N','publish_approve' => 'N','draft' => 'Y');
			$where = array('id' => $data['id']);
		}
		updateData('sell_basic', $update, $where);
	}

	public function sendMail($data){
		$to = $data['email'];
		$subject = "Your Property has been Approved - Kasah.co";
		$message = $this->load->view('email_template/list_approve',$data, true);
		
		send_mail_func($to,$subject,$message);
	}

	public function getListingByAjax(){
		$data = $_POST;
		$data['listing'] = $this->sell_model->getListingsByAjax($data['column']);

		$html = $this->load->view('admin/listing/manage_ajax', $data, true);
		$response = array('view' => $html);
		echo json_encode($response);
	}

	public function senddetails($id) {
		$data['id'] = $id;
		$this->load->view('admin/listing/senddetail',$data);
	}

	public function emailToBuyer(){
		$data = $_POST;
		$update = array('admin_home_worth' => $data['admin_home_worth']);
		$where = array('sell_id' => $data['sell_id']);
		updateData('sell_description',$update,$where);
		$to = $data['email'];
		$subject = $data['subject'];
		$message = $this->load->view('admin/listing/email_template',$data, true);
		
		send_mail_func($to,$subject,$message);
		
		$this->sell_model->insertEmailToDB($data);
		$this->session->set_flashdata('success_msg','<b>Emailed!</b> Property details has been sent to buyer successfully');
		redirect(base_url().'admin/listing');
	}

	public function view_email($sell_id){
		$data['sell_id'] = $sell_id;
		$data['message'] = "--- Your Message Will Show HERE ---";
		$this->load->view('admin/listing/email_template', $data);
	}
}

?>