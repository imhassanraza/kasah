<?php 

print_r($_POST);
$data = $_POST;

$action = $data['action'];
$col = $data['col'];
$val = $data['val'];
$table = $data['table'];
$id = $data['id'];

switch ($action) {
	case 'update':{
		$update = array($col => $val);
		$where = array('id' => $id);
		updateData($table,$update, $where);
	}
	break;
	
	default:
	break;
}


?>