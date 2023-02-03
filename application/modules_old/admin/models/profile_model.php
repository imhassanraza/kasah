<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {

	public function updateProfile($data)	{
		$this->db->set('first_name',$data['first_name']);
		$this->db->set('last_name',$data['last_name']);
		if(!empty($data['password'])){
			$this->db->set('password',"password('".$data['password']."')", false);
		}
		$this->db->where('id',$data['id']);
    	$this->db->update('admins');
	}

	public function uploadAvatar($id,$avatar)	{
		$this->db->set('avatar',$avatar);
		$this->db->where('id',$id);
    	$this->db->update('admins');
	}
}
?>