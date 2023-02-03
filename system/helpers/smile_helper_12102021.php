<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* End of file connect_helper.php */
/* Location: ./system/helpers/sof_helper.php */


//---------------------------------------- start common functions ---------------------//
//
if ( ! function_exists('admin_url'))
{
	function admin_url()
	{
		$CI = get_instance();
		return $CI->config->item('admin_url');
	}
}

if ( ! function_exists('admin_controller'))
{
	function admin_controller()
	{
		$CI = get_instance();
		return $CI->config->item('admin_controller');
	}

}


if ( ! function_exists('employee_url'))
{
	function employee_url()
	{
		$CI = get_instance();
		return $CI->config->item('employee_url');
	}
}


if ( ! function_exists('employee_controller'))
{
	function employee_controller()
	{
		$CI = get_instance();
		return $CI->config->item('employee_controller');
	}

}
if ( ! function_exists('show_error_404')){
	function show_error_404(){
		$CI = get_instance();
		return $CI->load->view('common/error_page');
	}
}

if ( ! function_exists('show_admin404'))
{
	function show_admin404()
	{
		$CI = get_instance();
		return $CI->load->view('common/admin_error_page');
	}
}

if ( ! function_exists('get_session'))
{
	function get_session($session_name)
	{
		$CI = get_instance();
		return $CI->session->userdata($session_name);
	}

}
if ( ! function_exists('set_session'))
{
	function set_session($session_name, $value)
	{
		$CI = get_instance();
		return $CI->session->set_userdata($session_name, $value);
	}

}
if ( ! function_exists('unset_session'))
{
	function unset_session($session_name)
	{
		$CI = get_instance();
		return $CI->session->unset_userdata($session_name);
	}
}
if ( ! function_exists('admin_email'))
{
	function admin_email()
	{
		$CI = get_instance();
		return $CI->config->item('admin_email');
	}
}

if ( ! function_exists('admin_phone_number'))
{
	function admin_phone_number()
	{
		$CI = get_instance();
		return $CI->config->item('admin_phone_number');
	}
}
if ( ! function_exists('no_reply_email'))
{
	function no_reply_email()
	{
		$CI = get_instance();
		return $CI->config->item('no_reply_email');
	}
}
if ( ! function_exists('login_email'))
{
	function login_email()
	{
		$CI = get_instance();
		return $CI->config->item('login_email');
	}
}

if ( ! function_exists('custom_substr'))
{
	function custom_substr($x, $length) {
		if (strlen($x) <= $length) {
			echo $x;
		} else {
			$y = substr($x, 0, $length) . '...';
			echo $y;
		}
	}
}

if ( ! function_exists('support_email'))
{
	function support_email()
	{
		$CI = get_instance();
		return $CI->config->item('support_email');
	}
}

if ( ! function_exists('show'))
{
	function show($data){
		echo "<pre>";
		print_r($data);
	}
}

if ( ! function_exists('check_admin'))
{
	function check_admin($id) {

		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from('admin_users');
		$CI->db->where('id', $id);
		$query = $CI->db->get();
		if($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}



if ( ! function_exists('formated_date'))
{
	function formated_date($datee){
		return date("d/m/Y" , strtotime($datee));
	}
}

if ( ! function_exists('db_date'))
{
	function db_date($datee){
		return date("Y-m-d" , strtotime($datee));
	}
}

if ( ! function_exists('js_date_formate'))
{
	function js_date_formate(){
		return "dd/mm/yyyy";
	}
}

if ( ! function_exists('dateTimeCC'))
{
	function date_time ($time) {
		return   $newDateTime = formated_date($time)." ".date('h:i A', strtotime($time));
	}
}

if(! function_exists('create_slug')){
	function create_slug($name, $table, $id=''){
		$CI = & get_instance();
		$count = 0;
		$url_name = url_title($name, '-', true);
		$slug_name = $url_name;
		while(true)
		{
			$CI->db->select('*');
			$CI->db->from($table);
			$CI->db->where('slug', $slug_name);
			if ($id) {
				$CI->db->where('id !=', $id);
			}
			$query = $CI->db->get();
			if ($query->num_rows() == 0) break;
			$slug_name = $url_name . '-' . (++$count);
		}
		return $slug_name;
	}
}

if ( ! function_exists('slugify'))
{
	function slugify($text,$random = 1)
	{
		if($random == 1){
			$text = $text.'-'.uniqid(md5(rand()));
		}
        // replace non letter or digits by -
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        // $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

        // trim
		$text = trim($text, '-');

        // remove duplicate -
		$text = preg_replace('~-+~', '-', $text);

        // lowercase
		$text = strtolower($text);
		if (empty($text)) {
			return 'n-a';
		}

		return $text;
	}
}


//---------------------------------------- end common functions ---------------------//

if ( ! function_exists('get_admin_user'))
{
	function get_admin_user($user_id) {

		$CI = & get_instance();
		$CI->db->select('username');
		$CI->db->from('admin_users');
		$CI->db->where('id', $user_id);
		$query = $CI->db->get()->row_array();
		return $query['username'];
	}
}

if ( ! function_exists('general_table')){
	function general_table($table='',$column = '',$val = '') {
		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from($table);
		if(!empty($column)) {
			$CI->db->where($column, $val);
		}
		$CI->db->order_by('id', 'ASC');
		$query = $CI->db->get();
		return $query->result_array();
	}
}

if ( ! function_exists('average_start')){
	function average_start($product_id) {
		$CI = & get_instance();
		$CI->db->select("AVG(rating) as avg");
		$CI->db->from('reviews');
		$CI->db->where('product_id', $product_id);
		$CI->db->where('status', 1);
		$query = $CI->db->get();
		if ($query->num_rows() > 0) {
			$query = $query->row_array();
			return $query['avg'];
		} else {
			return 0;
		}

	}
}
if ( ! function_exists('get_all_reviews')){
	function get_all_reviews($product_id) {
		$CI = & get_instance();
		$CI->db->select("*");
		$CI->db->from('reviews');
		$CI->db->where('product_id', $product_id);
		$CI->db->where('status', 1);
		$query = $CI->db->get();
		return $query->result_array();
	}
}



if ( ! function_exists('get_categories'))
{
	function get_categories() {
		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from('categories');
		$CI->db->where('status', 1);
		$CI->db->order_by('sorting', 'ASC');
		$query = $CI->db->get();
		return $query->result_array();
	}
}

if ( ! function_exists('get_product_title'))
{
	function get_product_title($product_id) {

		$CI = & get_instance();
		$CI->db->select('product_name');
		$CI->db->from('products');
		$CI->db->where('id', $product_id);
		$query = $CI->db->get()->row_array();
		return $query['product_name'];
	}
}


if ( ! function_exists('customer_credit_total'))
{
	function customer_credit_total($id) {
		$CI = & get_instance();
		$CI->db->select("SUM(trx_amount) as credit_total");
		$CI->db->from("customer_wallet");
		$CI->db->where('customer_id', $id);
		$CI->db->where('trx_status', 1);
		$CI->db->where('type', 0);
		$query = $CI->db->get()->row_array();
		return $query['credit_total'];
	}
}

if ( ! function_exists('customer_debit_total'))
{
	function customer_debit_total($id) {
		$CI = & get_instance();
		$CI->db->select("SUM(trx_amount) as debit_total");
		$CI->db->from("customer_wallet");
		$CI->db->where('customer_id', $id);
		$CI->db->where('trx_status', 1);
		$CI->db->where('type', 1);
		$query = $CI->db->get()->row_array();
		return $query['debit_total'];
	}
}

if ( ! function_exists('customer_purchases_total'))
{
	function customer_purchases_total($id) {
		$CI = & get_instance();
		$CI->db->select("SUM(total) as used_amount");
		$CI->db->from("orders");
		$CI->db->where('customer_id', $id);
		$query = $CI->db->get()->row_array();
		return $query['used_amount'];
	}
}
if ( ! function_exists('customer_current_balance'))
{
	function customer_current_balance($id) {
		$credit = customer_credit_total($id);
		$debit = customer_debit_total($id);
		$used_amount = customer_purchases_total($id);
		$balance = $credit - ($debit + $used_amount);
		return $balance;
	}
}


if (!function_exists('get_pages_name'))
{
	function get_pages_name($page)
	{
		$CI =& get_instance();
		$CI->db->select('page_name');
		$CI->db->where('url_slug', $page);
		$CI->db->from('custom_pages');
		$query = $CI->db->get();
		$query = $query->row_array();
		return $query['page_name'];
	}
}

if (!function_exists('get_pages_content'))
{
	function get_pages_content($page)
	{
		$CI =& get_instance();
		$CI->db->select('page_content');
		$CI->db->where('url_slug', $page);
		$CI->db->from('custom_pages');
		$query = $CI->db->get();
		$query = $query->row_array();
		return $query['page_content'];
	}
}

if (!function_exists('get_section_content'))
{
	function get_section_content($page , $meta_key)
	{
		$CI =& get_instance();
		$CI->db->select('meta_value');
		$CI->db->where('meta_tag', $page);
		$CI->db->where('meta_key',$meta_key);
		$CI->db->from('settings');
		$query = $CI->db->get();
		$query = $query->row_array();
		return $query['meta_value'];
	}
}

if ( ! function_exists('is_not_available'))
{
	function is_not_available($id) {
		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from('product_codes');
		$CI->db->where('product_id', $id);
		$CI->db->where('is_sell_out', 0);
		$query = $CI->db->get();
		if($query->num_rows() == 0) {
			return false;
		} else {
			return true;
		}
	}
}

if ( ! function_exists('sold_out_products'))
{
	function sold_out_products($id) {
		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from('product_codes');
		$CI->db->where('product_id', $id);
		$CI->db->where('product_code', NULL);
		$CI->db->where('is_sell_out', 1);
		$query = $CI->db->get();
		if($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}

if ( ! function_exists('count_sold_out_products'))
{
	function count_sold_out_products($id) {
		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from('product_codes');
		$CI->db->where('product_id', $id);
		$CI->db->where('product_code', NULL);
		$CI->db->where('is_sell_out', 1);
		$query = $CI->db->get();
		return $query->num_rows();
	}
}

if ( ! function_exists('available_product_code'))
{
	function available_product_code($id) {
		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from('product_codes');
		$CI->db->where('product_id', $id);
		$CI->db->where('is_sell_out', 0);
		$query = $CI->db->get();
		if($query->num_rows() == 0) {
			return 0;
		} else {
			return $query->num_rows();
		}
	}
}

/* --------------- Start Client Side Functions --------------- */

if ( ! function_exists('get_products')){
	function get_products($column = '',$val = '') {
		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from('products');
		$CI->db->where('status', 1);
		if(!empty($column)) {
			$CI->db->where($column, $val);
		}
		$CI->db->order_by('sorting', 'ASC');
		$query = $CI->db->get();
		return $query->result_array();
	}
}

if ( ! function_exists('get_products_by_category')){
	function get_products_by_category($category_id) {
		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from('products');
		$CI->db->where('status', 1);
		$CI->db->where('category_id', $category_id);
		$CI->db->order_by('sorting', 'ASC');
		$query = $CI->db->get();
		return $query->result_array();
	}
}


if ( ! function_exists('category_name'))
{
	function category_name($category_id) {
		$CI = & get_instance();
		$CI->db->select('name');
		$CI->db->from('categories');
		$CI->db->where('id', $category_id);
		$query = $CI->db->get()->row_array();
		return $query['name'];
	}
}
if ( ! function_exists('get_category'))
{
	function get_category($category_id) {
		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from('categories');
		$CI->db->where('id', $category_id);
		$query = $CI->db->get()->result_array();
		return $query;
	}
}

if ( ! function_exists('category_name_by_slug'))
{
	function category_name_by_slug($category_slug) {
		$CI = & get_instance();
		$CI->db->select('id');
		$CI->db->from('categories');
		$CI->db->where('slug', $category_slug);
		$query = $CI->db->get()->row_array();
		return $query['id'];
	}
}

if ( ! function_exists('get_featured_products')){
	function get_featured_products() {
		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from('products');
		$CI->db->where('featured_product', 1);
		$CI->db->where('status', 1);
		$CI->db->order_by('sorting', 'ASC');
		$query = $CI->db->get();
		return $query->result_array();
	}
}

if ( ! function_exists('get_categories_have_product')){
	function get_categories_have_product() {
		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from('categories');
		if (get_session('user_type') == 1) {
			$CI->db->where("EXISTS (SELECT category_id FROM products WHERE products.category_id = categories.id AND products.status = 1 AND products.can_see = 1)");
		}else{
			$CI->db->where("EXISTS (SELECT category_id FROM products WHERE products.category_id = categories.id AND products.status = 1)");
		}
		$CI->db->where('categories.status', 1);
		if (get_session('user_type') == 1) {
			$CI->db->where('categories.can_see', 1);
		}
		$CI->db->order_by('categories.sorting', 'ASC');
		$query = $CI->db->get();
		return $query->result_array();
	}
}

if ( ! function_exists('get_product_sele_codes')){
	function get_product_sele_codes($order_id, $product_id) {
		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from('product_codes');
		$CI->db->where('order_id', $order_id);
		$CI->db->where('product_id', $product_id);
		$query = $CI->db->get();
		return $query->result_array();
	}
}

if ( ! function_exists('get_sliders'))
{
	function get_sliders() {
		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from('sliders');
		$CI->db->where('status', 1);
		$query = $CI->db->get();
		return $query->result_array();
	}
}

if ( ! function_exists('get_remaining_line_credits'))
{
	function get_remaining_line_credits($customer_id) {
		$CI = & get_instance();
		$CI->db->select('remaining_line_credit');
		$CI->db->from('customers');
		$CI->db->where('id', $customer_id);
		$query = $CI->db->get()->row_array();
		return $query['remaining_line_credit'];
	}
}

if ( ! function_exists('get_line_credits'))
{
	function get_line_credits($customer_id) {
		$CI = & get_instance();
		$CI->db->select('line_credit');
		$CI->db->from('customers');
		$CI->db->where('id', $customer_id);
		$query = $CI->db->get()->row_array();
		return $query['line_credit'];
	}
}

if ( ! function_exists('get_customer_name'))
{
	function get_customer_name($customer_id) {
		$CI = & get_instance();
		$CI->db->select('CONCAT(first_name, " ", last_name) AS name');
		$CI->db->from('customers');
		$CI->db->where('id', $customer_id);
		$query = $CI->db->get()->row_array();
		return $query['name'];
	}
}


if ( ! function_exists('get_product_price'))
{
	function get_product_price($product_id) {
		$CI = & get_instance();
		$CI->db->select('purchase_price');
		$CI->db->from('products');
		$CI->db->where('id', $product_id);
		$query = $CI->db->get()->row_array();
		return $query['purchase_price'];
	}
}

if ( ! function_exists('get_resellers'))
{
	function get_resellers() {

		$CI = & get_instance();
		$CI->db->select('id, username');
		$CI->db->from('admin_users');
		$CI->db->where('type', 1);
		$CI->db->where('status', 1);
		return $CI->db->get()->result_array();
	}
}

if ( ! function_exists('stock_alert_qty'))
{
	function stock_alert_qty($id) {
		$CI = & get_instance();
		$CI->db->select('alert_qty');
		$CI->db->from('products');
		$CI->db->where('id', $id);
		$query = $CI->db->get()->row_array();
		return $query['alert_qty'];
	}
}

if ( ! function_exists('check_user_isactive'))
{
	function check_user_isactive($id) {
		$CI = & get_instance();
		$CI->db->select('status');
		$CI->db->from('customers');
		$CI->db->where('id', $id);
		$query = $CI->db->get()->row_array();
		return $query['status'];
	}
}


if ( ! function_exists('get_products_links'))
{
	function get_products_links($id) {
		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from('products');
		$CI->db->where('id', $id);
		$query = $CI->db->get();
		return $query->row_array();
	}
}

