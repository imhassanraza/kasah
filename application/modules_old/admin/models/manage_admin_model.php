<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manage_admin_model extends CI_Model {
    
    public function insertAdmin($data){
    	$this->db->set('username',$data['username']);
    	$this->db->set('email',$data['email']);
    	$this->db->set('first_name',$data['first_name']);
    	$this->db->set('last_name',$data['last_name']);
    	$admin = $this->session->userdata('admins');
    	$this->db->set('created_by',$admin['username']);
    	$this->db->set('created_date',date('Y-m-d'));
    	$this->db->set('password',"password('".$data['password']."')", false);
    	$this->db->set('send_admin_notification',(isset($data['send_admin_notification']))?"Y":"N");
    	$this->db->insert('admins');
    }

    public function updateAdmin($data){
    	$this->db->set('username',$data['username']);
    	$this->db->set('email',$data['email']);
    	$this->db->set('first_name',$data['first_name']);
    	$this->db->set('last_name',$data['last_name']);
    	if(!empty($data['password'])){
    		$this->db->set('password',"password('".$data['password']."')", false);
    	}
    	$this->db->where('id',$data['id']);
    	$this->db->update('admins');
    }

     public function deleteAdmin($id){
    	$this->db->set('is_delete','Y');
    	$this->db->where('id',$id);
    	$this->db->update('admins');
    }

    public function emailCheck($data){
    	$this->db->select('*');
    	$this->db->from('admins');
    	$this->db->where('email',$data['email']);
    	$this->db->or_where('username',$data['username']);
    	$query = $this->db->get();
    	return $query->num_rows();
    }
}
        
?>