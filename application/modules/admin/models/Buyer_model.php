<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Buyer_model extends CI_Model {

	public function getBuyerApplication(){
		$this->db->select('ba.*, ba.is_approved as b_is_approved, ba.id as app_id, u.*, rs.*, rc.*');
		$this->db->from('buyer_application ba');
		$this->db->join('users u','u.id = ba.user_id','left');
		$this->db->join('ref_states rs','rs.id = ba.state_id','left');
		$this->db->join('ref_cities rc','rc.id = ba.city_id','left');
		$this->db->where('ba.is_delete','N');
		$where = "(ba.is_complete = 'Y' or ba.is_approved = 'Y')";
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getUserDetailsByAppid($id){
		// SELECT u.* FROM `users` u inner join buyer_application ba on ba.user_id = u.id where ba.id = 9 
		$this->db->select('u.*');
		$this->db->from('users u');
		$this->db->join('buyer_application ba','ba.user_id = u.id');
		$this->db->where('ba.id',$id);

		$query = $this->db->get();
		return $query->row_array();
	}

	public function getNotApprovedApps(){
		$this->db->select('ba.*, ba.is_approved as b_is_approved, ba.id as app_id, u.*, rs.*, rc.*');
		$this->db->from('buyer_application ba');
		$this->db->join('users u','u.id = ba.user_id','left');
		$this->db->join('ref_states rs','rs.id = ba.state_id','left');
		$this->db->join('ref_cities rc','rc.id = ba.city_id','left');
		$this->db->where('ba.is_delete','N');
		$this->db->where('ba.is_approved','N');
		$this->db->where('ba.is_complete','Y');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function getBuyerApplicationById($id){
		$this->db->select(' ba.id as app_id,ba.*, abd.*, abd.city_name as app_city_name, abd.email as app_email, abd.state_id as app_state_id,  `ba`.`state_id` as ba_state_id, ba.is_approved as b_is_approved, ba.id as app_id, u.*, rs.*, rc.*');
		$this->db->from('buyer_application ba');
		$this->db->join('application_buyer_detail abd','abd.app_id = ba.id','left');
		$this->db->join('users u','u.id = ba.user_id','left');
		$this->db->join('ref_states rs','rs.id = ba.state_id','left');
		$this->db->join('ref_cities rc','rc.id = ba.city_id','left');
		$this->db->where('ba.is_delete','N');
		$this->db->where('ba.id',$id);
		$query = $this->db->get();

		return $query->row_array();
	}

	public function getBuyerForms($id){
		$this->db->select('bd.*,bd.id as doc_id,rf.*');
		$this->db->from('buyer_document bd');
		$this->db->join('ref_forms rf','bd.form_id = rf.id');
		$this->db->where('app_id',$id);
		$this->db->where('is_delete','N');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function updateBuyerApplication($data){

// show($data);
		$this->db->set('accepted_form',$data['accepted_form']);
		$this->db->set('yearly_amount',$data['yearly_amount']);
		$this->db->set('rent_amount',$data['rent_amount']);
		$this->db->set('bankruptcy',$data['bankruptcy']);
		$this->db->set('apartment_collections',$data['apartment_collections']);
		$this->db->set('sex_offender',$data['sex_offender']);
		$this->db->set('lease_agreement',$data['lease_agreement']);
		$this->db->set('reported_damage',$data['reported_damage']);
		$this->db->set('home_business',$data['home_business']);
		$this->db->set('have_pets',$data['have_pets']);
		$this->db->set('process_days',$data['process_days']);
		$this->db->set('state_id',$data['state_id']);
		$this->db->set('city_id',$data['city_id']);
		$this->db->set('rent_permonth',$data['rent_permonth']);
		$this->db->set('disclosure',$data['disclosure']);
		$this->db->set('policies',$data['policies']);
		$this->db->set('movein_date',date('Y-m-d H:i',strtotime($data['movein_date'])));
		$this->db->where('id',$data['app_id']);
		$this->db->update('buyer_application');


		// update application buyer detail
		$this->db->set('firstname',$data['firstname']);
		$this->db->set('middleinitial',$data['middleinitial']);
		$this->db->set('lastname',$data['lastname']);
		$this->db->set('suffix',$data['suffix']);
		$this->db->set('email',$data['email']);
		$this->db->set('homeaddress',$data['homeaddress']);
		$this->db->set('unitnumber',$data['unitnumber']);
		$this->db->set('state_id',$data['state_app']);
		$this->db->set('city_name',$data['city_name']);
		$this->db->set('zipcode',$data['zipcode']);
		$this->db->where('app_id',$data['app_id']);
		$this->db->update('application_buyer_detail');
	}
}
 ?>