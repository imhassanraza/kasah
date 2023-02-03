<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Accountmodel extends CI_Model {

	function tokenValidation($token){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('token', $token);
		$this->db->where('is_delete', 'N');

		$result = $this->db->get();
		if ($result->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function getUserDetail($token){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('token', $token);
		$this->db->where('is_delete', 'N');

		$result = $this->db->get();
		return $result->row_array();
	}

	function getDetailByEmail($email){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('is_delete', 'N');

		$result = $this->db->get();
		return $result->row_array();
	}

	function updatePassword($data){
		$hash_pass="password('".$data['password']."')"; 
		
		$this->db->set('password',$hash_pass,false);
		$this->db->where('token', $data['token']);
		$this->db->update('users');
	}
}
?>