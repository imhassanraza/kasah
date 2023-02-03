<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Property extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user/propertymodel');
		if (!checkUserLogin()) {
			redirect(base_url().'login');
		}
	}

	function view($id) {
		$user = $this->session->userdata('user');
		$response = $this->propertymodel->varifyProperty($id,$user['user_id']);
		if ($response) {
			$data['detail'] = $this->propertymodel->getPropertyDetail($id);

			$data['detail']['features']['dining'] = implode(', ',array_column($this->propertymodel->getFeatures('sell_interior_feature','ref_dining_room',$id,'dining'),'dining_type'));

			$data['detail']['features']['family'] = implode(', ',array_column($this->propertymodel->getFeatures('sell_interior_feature','ref_family_room',$id,'family'),'family_room_type'));

			$data['detail']['features']['parking'] = implode(', ',array_column($this->propertymodel->getFeatures('sell_exterior_feature','ref_parking_feature',$id,'parking'),'parking_type'));

			$data['detail']['features']['foundation'] = implode(', ',array_column($this->propertymodel->getFeatures('sell_exterior_feature','ref_foundation',$id,'foundation'),'foundation_type'));

			$data['detail']['features']['roof'] = implode(', ',array_column($this->propertymodel->getFeatures('sell_exterior_feature','ref_roof',$id,'roof'),'roof_type'));

			$data['detail']['features']['utilities'] = implode(', ',array_column($this->propertymodel->getFeatures('sell_exterior_feature','ref_utilities',$id,'utilities'),'utilities'));

			$data['detail']['features']['water'] = implode(', ',array_column($this->propertymodel->getFeatures('sell_exterior_feature','ref_water',$id,'water'),'water_system'));

			$data['detail']['features']['sewer'] = implode(', ',array_column($this->propertymodel->getFeatures('sell_exterior_feature','ref_sewer',$id,'sewer'),'sewer_type'));

			$data['detail']['images'] = getAll('sell_photo','sell_id',$id);
		}else{
			$this->session->set_flashdata('error_msg','<b>Error! </b> The URL you are trying to reach is not valid!');
			redirect(base_url().'user/dashboard');
		}
		$this->load->view('user/property/view',$data);
	}

	public function publishApproval($id){
		$update = array('publish_approve' => 'Y', 'draft' => 'N');
		$where = array('id' => $id);
		updateData('sell_basic',$update,$where);
		$this->sendMail($id);
		$this->session->set_flashdata('success_msg','<b>Request Sent! </b> Publish Request for your property has been sent to Kasah Management!');
		redirect(base_url().'user/properties');
	}

	public function edit($id){
		$user = $this->session->userdata('user');
		$response = $this->propertymodel->checkPublishApprove($id,$user['user_id']);
		if (!$response) {
			$this->session->set_flashdata('error_msg','<b>Error! </b> The URL you are trying to reach is not valid!');
			redirect(base_url().'user/properties');
		}
		$data['listing'] = $this->propertymodel->getListingsById($id);
		$x = 0;
		foreach ($data['listing'] as $listing) {
			$data['listing'][$x]['int_feature']['dining'] = array_column($this->propertymodel->getFeatures('sell_interior_feature','ref_dining_room',$listing['sell_id'],'dining'),'feature_id');

			$data['listing'][$x]['int_feature']['family'] = array_column($this->propertymodel->getFeatures('sell_interior_feature','ref_dining_room',$listing['sell_id'],'family'),'feature_id');

			$data['listing'][$x]['ext_feature']['parking'] = array_column($this->propertymodel->getFeatures('sell_exterior_feature','ref_parking_feature',$listing['sell_id'],'parking'),'feature_id');

			$data['listing'][$x]['ext_feature']['foundation'] = array_column($this->propertymodel->getFeatures('sell_exterior_feature','ref_foundation',$listing['sell_id'],'foundation'),'feature_id');

			$data['listing'][$x]['ext_feature']['roof'] = array_column($this->propertymodel->getFeatures('sell_exterior_feature','ref_roof',$listing['sell_id'],'roof'),'feature_id');

			$data['listing'][$x]['ext_feature']['utilities'] = array_column($this->propertymodel->getFeatures('sell_exterior_feature','ref_utilities',$listing['sell_id'],'utilities'),'feature_id');

			$data['listing'][$x]['ext_feature']['water'] = array_column($this->propertymodel->getFeatures('sell_exterior_feature','ref_water',$listing['sell_id'],'water'),'feature_id');

			$data['listing'][$x]['ext_feature']['sewer'] = array_column($this->propertymodel->getFeatures('sell_exterior_feature','ref_sewer',$listing['sell_id'],'sewer'),'feature_id');
		}
		$data['listing'] = $data['listing'][0];
		$data['listing']['images'] = getAll('sell_photo','sell_id',$id);
		// show($data);
		$this->load->view('user/property/property_edit',$data);
	}

	public function updateProperty(){
		$data = $_POST;
		// show($_FILES);
		// show($data);
		$data['home_worth'] = str_replace(',', '', $data['home_worth']);
		$response = $this->propertymodel->updateList($data);
		if ($response) {
			$this->uploadImages($data);
			$this->session->set_flashdata('success_msg','<b>Updated!</b> Property Detail updated successfully!');
		}else{
			$this->session->set_flashdata('error_msg','<b>Error!</b> An error occured while updating your property detail!');
		}
		redirect(base_url().'user/properties');
	}

	function uploadImages($data){
		$files = $_FILES;
		$count = count($_FILES['imageUpload']['name']);
		$this->load->library('upload');
		for($i=0; $i<$count; $i++)
		{
			$_FILES['imageUpload']['name']= $files['imageUpload']['name'][$i];
			$_FILES['imageUpload']['type']= $files['imageUpload']['type'][$i];
			$_FILES['imageUpload']['tmp_name']= $files['imageUpload']['tmp_name'][$i];
			$_FILES['imageUpload']['error']= $files['imageUpload']['error'][$i];
			$_FILES['imageUpload']['size']= $files['imageUpload']['size'][$i];
        	$this->upload->initialize($this->set_upload_options());//function defination below
        	if ($this->upload->do_upload('imageUpload')) {
        		$upload_data = $this->upload->data();
        		$name_array[] = $upload_data['file_name'];
        		$fileName = $upload_data['file_name'];
        		$fileSize = $upload_data['file_size'];
        		$imgType = $upload_data['image_type'];
        		if (!empty($fileName)) {
        			$this->propertymodel->insertPhotos($data['sell_id'],$fileName,$fileSize,$imgType);
        		}
        	}
        }
    }

    function set_upload_options(){
    	$config = array();
        $config['upload_path'] = './uploads/images/'; //give the path to upload the image in folder
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE; // for encrypting the name
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['overwrite'] = FALSE;
        return $config;
    }

    public function deleteFeatureImg(){
    	$data = $_POST;
    	$this->propertymodel->deleteFeatureImg($data);
    	echo "True";
    }

    public function updateFeatureImg(){
    	$data = $_POST;
    	$update = array('feature_img' => $data['photo_name']);
    	$where = array('id' => $data['sell_id']);
    	updateData('sell_basic', $update, $where);
    }

    function sendMail($property_id){
    	$data['property_id'] = $property_id;

		// Email template start
		$to = "support@kasah.co";
		$subject = "New Property Approval - Kasah.co";
		$message = $this->load->view('email_template/property_approval',$data,true);
		// Email template ending

		send_mail_func($to,$subject,$message);
	}
}
?>