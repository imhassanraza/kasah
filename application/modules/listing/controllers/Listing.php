<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Listing extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user/propertymodel');
	}

	function index($id) {
		$data['detail'] = $this->propertymodel->getPropertyDetail($id);
		if (empty($data['detail'])) {
			redirect(base_url());
		}
		$data['detail']['features']['dining'] = implode(', ',array_column($this->propertymodel->getFeatures('sell_interior_feature','ref_dining_room',$id,'dining'),'dining_type'));

		$data['detail']['features']['family'] = implode(', ',array_column($this->propertymodel->getFeatures('sell_interior_feature','ref_family_room',$id,'family'),'family_room_type'));

		$data['detail']['features']['parking'] = implode(', ',array_column($this->propertymodel->getFeatures('sell_exterior_feature','ref_parking_feature',$id,'parking'),'parking_type'));

		$data['detail']['features']['foundation'] = implode(', ',array_column($this->propertymodel->getFeatures('sell_exterior_feature','ref_foundation',$id,'foundation'),'foundation_type'));

		$data['detail']['features']['roof'] = implode(', ',array_column($this->propertymodel->getFeatures('sell_exterior_feature','ref_roof',$id,'roof'),'roof_type'));

		$data['detail']['features']['utilities'] = implode(', ',array_column($this->propertymodel->getFeatures('sell_exterior_feature','ref_utilities',$id,'utilities'),'utilities'));

		$data['detail']['features']['water'] = implode(', ',array_column($this->propertymodel->getFeatures('sell_exterior_feature','ref_water',$id,'water'),'water_system'));

		$data['detail']['features']['sewer'] = implode(', ',array_column($this->propertymodel->getFeatures('sell_exterior_feature','ref_sewer',$id,'sewer'),'sewer_type'));

		$data['detail']['images'] = getAll('sell_photo','sell_id',$id);
		$this->load->view('listing/listing',$data);
	}
}
?>