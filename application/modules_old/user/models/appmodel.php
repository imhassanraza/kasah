<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Appmodel extends CI_Model {

	public function getCitiesByStateId($state_id){
		$this->db->select("c.*");
		$this->db->from('ref_cities c');
		$this->db->join('ref_states s','c.state_code = s.state_code');
		$this->db->where('s.id',$state_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDocCount($id){
		$this->db->select('*');
		$this->db->from('buyer_document');
		$this->db->where('app_id',$id);
		$this->db->where('is_delete','N');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getUserByApplication($appid){
		$this->db->select(' u.*, u.id as user_id, ba.*, ba.id as appid');
		$this->db->from('users u');
		$this->db->join('buyer_application ba','u.id = ba.user_id');
		$this->db->where('ba.id', $appid);

		$result = $this->db->get();
		return $result->row_array();
	}

	public function userApplications($user_id){
		$this->db->select('*');
		$this->db->from('buyer_application');
		$this->db->where('user_id',$user_id);
		$this->db->where('is_delete','N');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getAppDetail($id,$user_id){
		$this->db->select('*');
		$this->db->from('buyer_application');
		$this->db->where('id',$id);
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getDocumentDetails($id){
		$this->db->select('bd.*,bd.id as doc_id, rf.*');
		$this->db->from('buyer_document bd');
		$this->db->join('ref_forms rf','rf.id = bd.form_id');
		$this->db->where('app_id',$id);
		$this->db->where('is_delete','N');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function uploadDocuments($appid, $formid, $amount, $file){
		$this->db->set('app_id', $appid);
		$this->db->set('form_id', $formid);
		$this->db->set('file_type', $file['file_ext']);
		$this->db->set('price', $amount);
		$this->db->set('file_name', $file['file_name']);
		$this->db->set('file_size', $file['file_size']);
		$this->db->set('uploaded_date', date('Y-m-d H:i:s'));
		$this->db->insert('buyer_document');
	}

	public function validationApplication($id , $user_id){
		$this->db->select('*');
		$this->db->from('buyer_application');
		$this->db->where('id',$id);
		$this->db->where('user_id',$user_id);

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return True;
		}else{
			return False;
		}
	}

	public function insertApplication($data){
		$user = $this->session->userdata('user');

		// insert into buyer_application
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
		$this->db->set('movein_date',date('Y-m-d H:i:s',strtotime($data['movein_date'])));
		$this->db->set('disclosure',(isset($data['disclosure']))?"Y":"N" );
		$this->db->set('policies',(isset($data['policies']))?"Y":"N" );

		$this->db->set('user_id',$user['user_id']);
		$this->db->insert('buyer_application');

		$id = $this->db->insert_id();

		// insert into application buyer detail
		$this->db->set('app_id',$id);
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

		$this->db->insert('application_buyer_detail');
	}

	public function updateApplication($data){
		$user = $this->session->userdata('user');
		
		// update buyer_application
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
		$this->db->set('movein_date',date('Y-m-d H:i:s',strtotime($data['movein_date'])));
		$this->db->set('disclosure',(isset($data['disclosure']))?"Y":"N" );
		$this->db->set('policies',(isset($data['policies']))?"Y":"N" );

		$this->db->where('user_id',$user['user_id']);
		$this->db->where('id',$data['appid']);
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
		$this->db->where('app_id',$data['appid']);
		$this->db->update('application_buyer_detail');
	}

}
?>