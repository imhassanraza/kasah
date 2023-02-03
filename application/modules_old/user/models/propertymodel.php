<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Propertymodel extends CI_Model {

	function varifyProperty($id,$user_id){
		$this->db->select('*');
		$this->db->from('sell_basic');
		$this->db->where('id',$id);
		$this->db->where('user_id',$user_id);

		$query = $this->db->get();
		if ($query->num_rows() > 0 ) {
			return true;
		}else{
			return false;
		}
	}

	function checkPublishApprove($id,$user_id){
		$this->db->select('*');
		$this->db->from('sell_basic');
		$this->db->where('id',$id);
		$this->db->where('user_id',$user_id);
		$this->db->where('publish_approve','N');
		$query = $this->db->get();
		if ($query->num_rows() > 0 ) {
			return true;
		}else{
			return false;
		}
	}

	public function getListingsById($id){
		$this->db->select('*');
		$this->db->from('users u');
		$this->db->join('sell_basic sb','u.id = sb.user_id');
		$this->db->join('sell_interior si','sb.id = si.sell_id');
		$this->db->join('sell_exterior se','sb.id = se.sell_id');
		$this->db->join('sell_description sd','sd.sell_id = sb.id');
		$this->db->join('sell_contact sc','sc.sell_id = sb.id');
		$this->db->join('ref_property_type pt','pt.id = sb.property_id');
		$this->db->join('ref_cooling c','c.id = si.cooling_id');
		$this->db->join('ref_heating h','h.id = si.heating_id');
		$this->db->join('ref_fireplace f','f.id = si.fireplace_id');
		$this->db->where('sb.is_delete','N');
		$this->db->where('sb.id',$id);

		$query = $this->db->get();
		return $query->result_array();
	}

	function getPropertyDetail($id){
		$this->db->select('*');
		$this->db->from('sell_basic sb');
		$this->db->join('sell_interior si','sb.id = si.sell_id');
		$this->db->join('sell_exterior se','sb.id = se.sell_id');
		$this->db->join('sell_description sd','sd.sell_id = sb.id');
		$this->db->join('sell_contact sc','sc.sell_id = sb.id');
		$this->db->join('ref_property_type pt','pt.id = sb.property_id');
		$this->db->join('ref_cooling c','c.id = si.cooling_id');
		$this->db->join('ref_heating h','h.id = si.heating_id');
		$this->db->join('ref_fireplace f','f.id = si.fireplace_id');
		$this->db->join('ref_occupancy o','o.id = sb.occupancy_id');

		$this->db->where('sb.is_delete','N');
		$this->db->where('sb.id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getFeatures($table1, $table2, $id, $feature_type){  

		$this->db->select('*');

		$this->db->from($table1);
		$this->db->join($table2, $table1.'.feature_id = '. $table2.'.id');
		$this->db->where($table1.'.sell_id',$id);
		$this->db->where($table1.'.feature_type',$feature_type);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function updateList($data){

		$this->db->trans_start();
		// sell_contact
		$this->db->set('contact_name',$data['contact_name']);
		$this->db->set('contact_email',$data['contact_email']);
		$this->db->set('instruction_to_buyer',$data['instruction_to_buyer']);
		$this->db->set('contact_date',date('Y-m-d',strtotime($data['contact_date'])));
		$this->db->set('start_time',$data['start_time']);
		$this->db->set('end_time',$data['end_time']);
		$this->db->where('sell_id',$data['sell_id']);
		$this->db->update('sell_contact');

		// sell_description
		$this->db->set('about_home',$data['about_home']);
		$this->db->set('home_desc',$data['home_desc']);
		$this->db->set('home_worth',$data['home_worth']);
		$this->db->where('sell_id',$data['sell_id']);
		$this->db->update('sell_description');

		// sell_basic
		$this->db->set('property_id',$data['property_id']);
		$this->db->set('bedrooms',$data['bedrooms']);
		$this->db->set('bathrooms',$data['bathrooms']);
		$this->db->set('partial_baths',$data['partial_baths']);
		$this->db->set('square_feet',$data['square_feet']);
		$this->db->set('lotsize_sqft',$data['lotsize_sqft']);
		$this->db->set('yearbuilt',$data['yearbuilt']);
		$this->db->set('home_address',$data['home_address']);
		$this->db->set('occupancy_id',$data['occupancy_id']);
		$this->db->set('hoa_check',$data['hoa_check']);
		$this->db->set('esd',$data['esd']);
		$this->db->set('hsd',$data['hsd']);
		$this->db->where('id',$data['sell_id']);
		$this->db->update('sell_basic');

		// sell_exterior
		$this->db->set('horse_property',$data['horse_property']);
		$this->db->set('carport',$data['carport']);
		$this->db->set('pool',$data['pool']);
		$this->db->set('garage_space',$data['garage_space']);
		$this->db->where('sell_id',$data['sell_id']);
		$this->db->update('sell_exterior');

		// sell_exterior_feature
		$this->db->where('sell_id',$data['sell_id']);
		$this->db->delete('sell_exterior_feature');

		foreach ($data['parking'] as $parking) {
			$this->db->set('sell_id',$data['sell_id']);
			$this->db->set('feature_id',$parking);
			$this->db->set('feature_type','parking');
			$this->db->insert('sell_exterior_feature');
		}

		foreach ($data['foundation'] as $foundation) {
			$this->db->set('sell_id',$data['sell_id']);
			$this->db->set('feature_id',$foundation);
			$this->db->set('feature_type','foundation');
			$this->db->insert('sell_exterior_feature');
		}

		foreach ($data['roof'] as $roof) {
			$this->db->set('sell_id',$data['sell_id']);
			$this->db->set('feature_id',$roof);
			$this->db->set('feature_type','roof');
			$this->db->insert('sell_exterior_feature');
		}

		foreach ($data['utilities'] as $utilities) {
			$this->db->set('sell_id',$data['sell_id']);
			$this->db->set('feature_id',$utilities);
			$this->db->set('feature_type','utilities');
			$this->db->insert('sell_exterior_feature');
		}

		foreach ($data['water'] as $water) {
			$this->db->set('sell_id',$data['sell_id']);
			$this->db->set('feature_id',$water);
			$this->db->set('feature_type','water');
			$this->db->insert('sell_exterior_feature');
		}

		foreach ($data['sewer'] as $sewer) {
			$this->db->set('sell_id',$data['sell_id']);
			$this->db->set('feature_id',$sewer);
			$this->db->set('feature_type','sewer');
			$this->db->insert('sell_exterior_feature');
		}

		// sell_interior
		$this->db->set('fireplace_id',$data['fireplace_id']);
		$this->db->set('heating_id',$data['heating_id']);
		$this->db->set('cooling_id',$data['cooling_id']);
		$this->db->where('sell_id',$data['sell_id']);
		$this->db->update('sell_interior');

		// sell_interior_feature
		$this->db->where('sell_id',$data['sell_id']);
		$this->db->delete('sell_interior_feature');

		foreach ($data['dining'] as $dining) {
			$this->db->set('sell_id',$data['sell_id']);
			$this->db->set('feature_id',$dining);
			$this->db->set('feature_type','dining');
			$this->db->insert('sell_interior_feature');
		}

		foreach ($data['family'] as $family) {
			$this->db->set('sell_id',$data['sell_id']);
			$this->db->set('feature_id',$family);
			$this->db->set('feature_type','family');
			$this->db->insert('sell_interior_feature');
		}

		$this->db->trans_complete();

		return $this->db->trans_status();
	}

	function insertPhotos($id,$name,$size,$type){
		$this->db->set('sell_id',$id);
		$this->db->set('photo_name',$name);
		$this->db->set('img_type',$type);
		$this->db->set('img_size',$size);
		$this->db->insert('sell_photo');
	}

	public function deleteFeatureImg($data){
		$this->db->where('sell_id',$data['sell_id']);
		$this->db->where('photo_name',$data['photo_name']);
		$this->db->delete('sell_photo');
	}

}
?>