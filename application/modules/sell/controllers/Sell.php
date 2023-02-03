<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Sell extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('sell/sellmodel');
		if (!checkUserLogin()) {
			redirect(base_url() . 'signup');
		}
	}

	function index() {
		$user = $this->session->userdata('user');
		if ($user['roll'] != "seller") {
			$this->session->set_flashdata('error_msg','<b>Error!</b> The URL you are trying to access is invalid!');
			redirect(base_url().'user/dashboard');
		}
		$data['ref_property_type'] = getAll('ref_property_type');
		$data['ref_heating'] = getAll('ref_heating');
		$data['ref_occupancy'] = getAll('ref_occupancy');
		$data['ref_cooling'] = getAll('ref_cooling');
		$data['ref_fireplace'] = getAll('ref_fireplace');
		$data['ref_dining_room'] = getAll('ref_dining_room');
		$data['ref_family_room'] = getAll('ref_family_room');
		$data['ref_foundation'] = getAll('ref_foundation');
		$data['ref_parking_feature'] = getAll('ref_parking_feature');
		$data['ref_roof'] = getAll('ref_roof');
		$data['ref_sewer'] = getAll('ref_sewer');
		$data['ref_utilities'] = getAll('ref_utilities');
		$data['ref_water'] = getAll('ref_water');
		$data['ref_water'] = getAll('ref_water');
		$this->load->view('sell/property_form', $data);
	}

	public function insertListing() {
		$data = $_POST;
		// show($data);
        $data['home_worth'] = str_replace(',', '', $data['home_worth']);
		$response = $this->sellmodel->insertListing($data);
		if ($response['status']) {
			$this->uploadImages($response['sell_id']);
		}
		$this->session->set_flashdata('success_msg','The property record has been saved successfully as a draft.');
		redirect(base_url() . 'user/properties');
	}

    // image uploading method
	function uploadImages($sell_id) {
		$files = $_FILES;
		$count = count($_FILES['listingPhotos']['name']);
		$this->load->library('upload');
		for ($i = 0; $i < $count; $i++) {
			$_FILES['listingPhotos']['name'] = $files['listingPhotos']['name'][$i];
			$_FILES['listingPhotos']['type'] = $files['listingPhotos']['type'][$i];
			$_FILES['listingPhotos']['tmp_name'] = $files['listingPhotos']['tmp_name'][$i];
			$_FILES['listingPhotos']['error'] = $files['listingPhotos']['error'][$i];
			$_FILES['listingPhotos']['size'] = $files['listingPhotos']['size'][$i];
            $this->upload->initialize($this->set_upload_options()); //function defination below
            if ($this->upload->do_upload('listingPhotos')) {
            	$upload_data = $this->upload->data();
            	$name_array[] = $upload_data['file_name'];
            	$fileName = $upload_data['file_name'];
            	$fileSize = $upload_data['file_size'];
            	$imgType = $upload_data['image_type'];
            	$this->sellmodel->insertPhotos($sell_id, $fileName, $fileSize, $imgType);
            	
            	$update_img = array('feature_img' => $fileName);
            	$where_sell_id = array('id' => $sell_id);
            	updateData('sell_basic', $update_img, $where_sell_id);
            }
        }
    }

    function set_upload_options() {
    	$config = array();
        $config['upload_path'] = './uploads/images/'; //give the path to upload the image in folder
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE; // for encrypting the name
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['overwrite'] = FALSE;
        return $config;
    }

}

?>