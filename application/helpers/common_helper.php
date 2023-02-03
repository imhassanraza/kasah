<?php

function sanitizeStringForUrl($str, $delimiter = '-') {
    $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', '', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    return $slug;
}

function checkUserLogin(){
    $CI = & get_instance();
    $user = $CI->session->userdata('user');
    if (!$user['logged_in']) {
        return false;
    }else{
        return true;
    }
}

function checkAdminLogin(){
    $CI = & get_instance();
    $admin = $CI->session->userdata('admins');
    if (!$admin['is_user_login']) {
        return false;
    }else{
        return true;
    }
}

function custom_substr($x, $length) {
    if (strlen($x) <= $length) {
        echo $x;
    } else {
        $y = substr($x, 0, $length) . '...';
        echo $y;
    }
}

function send_mail_func($to = '',$subject,$message){
    $CI = & get_instance();
    $CI->load->library('email');

    $config['mailtype'] = 'html';
    $CI->email->initialize($config);
    $cc = "";
    $bcc = "akhzarjaved1993@live.com, mmuzammil45@gmail.com,sana.baig96@gmail.com";
    $CI->email->from('support@kasah.co', 'Kasah.co');
    if (!empty($to)) {         //&& $to != 'support@kasah.co'
        $CI->email->to($to);
    }else{
        $CI->email->to('akhzarjaved1993@gmail.com, mmuzammil45@gmail.com, sana.baig96@gmail.com');
    }
    $CI->email->reply_to('support@kasah.co', 'Kasah.co');
    if (!empty($cc)){
       $CI->email->cc($cc);
   }
   if (!empty($bcc)){
       $CI->email->bcc($bcc);
   }

   $CI->email->subject($subject);
   $CI->email->message($message);

   $CI->email->send();

}

function getAll($table, $where_column = '', $where_val = '') {
    $CI = & get_instance();

    $CI->db->select('*');
    $CI->db->from($table);
    if ($where_column != '') {
        $CI->db->where($where_column, $where_val);
    }
    $query = $CI->db->get();
    return $query->result_array();
}

function getReplies($post_id,$comment_id){
    $CI = & get_instance();
    $CI->db->select('*');
    $CI->db->from('comment');
    $CI->db->where('post_id',$post_id);
    $CI->db->where('comment_approved','Y');
    $CI->db->where('comment_parent',$comment_id);
    $CI->db->order_by('comment_date','desc');
    $query = $CI->db->get();
    return $query->result_array();
}

function singleRow($table, $select_col, $where_arr = '') {
    $CI = & get_instance();

    $CI->db->select($select_col);
    $CI->db->from($table);
    if ($where_arr != '') {
        $CI->db->where($where_arr);
    }
    $query = $CI->db->get();
    return $query->row_array();
}


function updateData($table, $update_arr, $where_array = '') {
    $CI = & get_instance();

    $CI->db->where($where_array);
    $CI->db->update($table, $update_arr);
    return $CI->db->affected_rows();
}

function getActsByUserId($user_id) {
    $CI = & get_instance();

    $CI->db->select('group_concat(toa.type) as acts_title');
    $CI->db->from('acts');
    $CI->db->join('types_of_act toa','toa.id = acts.act_id');
    $CI->db->where('acts.user_id', $user_id);
    $query = $CI->db->get();
    return $query->row();
}

function getAllResult($table, $where_column = '', $where_val = '', $select = '', $protect_identifiers = TRUE) {
    $CI = & get_instance();

    $CI->db->_protect_identifiers = false;

    $CI->db->select($select);
    $CI->db->from($table);
    if ($where_column != '') {
        $CI->db->where($where_column, $where_val);
    }
    $query = $CI->db->get();
    return $query->result_array();
}

function removeSpacesCommas($value) {
    return preg_replace("/[\s\/]/", "", $value);
}

function rlq() {
    $CI = & get_instance();
    echo '<pre>';
    echo $CI->db->last_query();
    exit;
}

function show($data) {
    echo '<pre>';
    print_r($data);
    exit;
}

function fileUpload($file, $folder = '', $type = "*") {
    $CI = & get_instance();

    $path = ($folder != '' ? './assets/upload/' . $folder . '/' : './assets/upload/');

    $config['upload_path'] = $path;
    $config['allowed_types'] = $type;
    $config['overwrite'] = false;
    $config['remove_spaces'] = true;

    $CI->load->library('upload', $config);
    $CI->upload->initialize($config);
    $data2 = array();
    if (!$CI->upload->do_upload($file)) {
        $error = $CI->upload->display_errors();
        $data2["error"] = $error;
        //print_r( $data2["error"]); exit;
        return $data2;
    } else {
        $img_data = $CI->upload->data();
        return $img_data;
    }
}

function hardDeleteRecord($user_id){
    $CI = & get_instance();

    $CI->db->where('user_id',$user_id);
    $CI->db->delete('acts');

    $CI->db->where('user_id',$user_id);
    $CI->db->delete('fields_meta');

    $CI->db->where('user_id',$user_id);
    $CI->db->delete('files');

    $CI->db->where('user_id',$user_id);
    $CI->db->delete('service_areas');

    $CI->db->where('user_id',$user_id);
    $CI->db->delete('user_gallery');

    $CI->db->where('id',$user_id);
    $CI->db->delete('users');
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
?>