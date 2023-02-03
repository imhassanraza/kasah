<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Docmodel extends CI_Model {

	public function getAllApplications($user_id){
		$this->db->select("*");
		$this->db->from('buyer_application');
		$this->db->where('user_id', $user_id);
		$this->db->where('is_delete', 'N');

		$result = $this->db->get();
		return $result->result_array();
	}

	public function getAllDocuments($app_id){
		$this->db->select('bd.*,bd.id as doc_id, rf.*');
		$this->db->from('buyer_document bd');
		$this->db->join('ref_forms rf','rf.id = bd.form_id');
		$this->db->where('app_id',$app_id);
		$this->db->where('is_delete','N');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getUserDocument($user_id){
		$this->db->select('*');
		$this->db->from('user_document ud');
		$this->db->where('is_delete','N');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function uploadDocuments($user_id, $file_data){
		$this->db->set('user_id', $user_id);
		$this->db->set('file_type', $file_data['file_ext']);
		$this->db->set('file_name', $file_data['file_name']);
		$this->db->set('file_size', $file_data['file_size']);
		$this->db->set('custom_name', $file_data['custom_name']);
		$this->db->set('uploaded_by','user');
		$this->db->set('uploaded_date',date('Y-m-d H:i:s'));
		$this->db->insert('user_document');
	}
}
?>