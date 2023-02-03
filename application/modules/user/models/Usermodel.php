<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usermodel extends CI_Model {

	public function getCities($state_code){
		$this->db->select("*");
		$this->db->from('ref_cities');
		$this->db->where('state_code',$state_code);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function userAppCount($user_id){
		$this->db->select("*");
		$this->db->from('buyer_application');
		$this->db->where('user_id',$user_id);
		$this->db->where('is_delete','N');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function passwordValidation($data){
		$hash_pass = "password('".$data['oldpassword']."')";
		$user = $this->session->userdata('user');
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('password',$hash_pass, false);
		$this->db->where('id',$user['user_id']);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function updatePassword($data){
		$hash_pass = "password('".$data['newpassword']."')";
		$user = $this->session->userdata('user');

		$this->db->set('password',$hash_pass,false);
		$this->db->where('id',$user['user_id']);
		$this->db->update('users');
	}

	public function getListingDetails($user_id,$page){
		$this->db->select('*');
		$this->db->from('sell_basic sb');
		$this->db->join('sell_description sd','sb.id = sd.sell_id');
		$this->db->where('sb.user_id',$user_id);
		$this->db->where('sb.is_delete','N');
		if ($page == "dashboard") {
			$this->db->where('sb.is_approved','Y');
		}
		$query = $this->db->get();
		return $query->result_array();
	}

}
?>