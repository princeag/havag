<?php
$callback = $_GET['callback'];
$today = gmdate('Y-m-d');
ini_set('error_log', 'Error_logs/'.$today.'-ajax-request-php-error.log');

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo 'not_allowed';
    exit;
}

if($callback == '') {
    echo 'not_allowed';
    exit;
}

require_once 'configs/requires.php';

if($callback == 'getUserRecords') {
    $columns 	= $_POST['columns'];
    $draw 		= $_POST['draw'];
    $start 		= $_POST['start'];
    $length 	= $_POST['length'];
    $order 		= $_POST['order'];
    $search 	= $_POST['search']['value'];
    
    $sort_order = $order[0]['dir'];
    $sort_by = $columns[$order[0]['column']]['data'];
    
    $obj_user_records = new ModelUserRecords();
    $recordsTotal = $obj_user_records->countAllUserRecords();
    
    if($search != '') {
        $where = '';
        
        foreach($columns as $key => $column) {
            if($column['searchable'] == 'true') {
                
                $where .= $column['data']." LIKE '%".$search."%'";
    
                if((count($columns)-1) > $key) {
                    $where .= ' OR ';
                }
            }	
        }
    
        // error_log('where: '.$where);die;
        $user_records_data = $obj_user_records->getAllUserRecordsBySearch($where, $start, $length, $sort_by, $sort_order);
        $recordsFiltered = $user_records_data ? count($user_records_data) : 0;
    }
    else {
        $user_records_data = $obj_user_records->getAllUserRecords($start, $length, $sort_by, $sort_order);
        $recordsFiltered = $recordsTotal;
    }
    
    $datatble_data = array('draw'=> $draw, 'data'=> $user_records_data, 'recordsFiltered'=> $recordsFiltered, 'recordsTotal'=> $recordsTotal);
    
    echo json_encode($datatble_data);
    exit;
}
else if($callback == 'add_user_tag') {
    $tags  = $_REQUEST['tags'];
    $email = $_REQUEST['email'];
    $date  = gmdate('Y-m-d H:i:s');

    $email  = trim($email);

    if($email == '') {
        echo json_encode(array('err'=> 'User not selected'));
        exit;
    }

    if(empty($tags)) {
        echo json_encode(array('err'=> 'Tags cannot empty'));
        exit;
    }

    $obj_user_records = new ModelUserRecords(array('email'=> $email, 'user_tags'=> json_encode($tags), 'date_upd'=> $date));
    $user_record_detail =  $obj_user_records->getUserRecordByEmail();

    if(!$user_record_detail) {
        echo json_encode(array('err'=> 'User not found'));
        exit;
    }

    $obj_user_records->updateUserTags();

    echo json_encode(array('notice'=> 'User tags updated'));
    exit;
}
else if($callback == 'add_user_note') {
    $user_note  = $_REQUEST['user_note'];
    $email = $_REQUEST['email'];
    $date  = gmdate('Y-m-d H:i:s');

    $email  = trim($email);
    $user_note  = trim($user_note);

    if($email == '') {
        echo json_encode(array('err'=> 'User not selected'));
        exit;
    }

    if(empty($user_note)) {
        echo json_encode(array('err'=> 'Note cannot empty'));
        exit;
    }

    $obj_user_records = new ModelUserRecords(array('email'=> $email, 'user_note'=> htmlentities($user_note), 'date_upd'=> $date));
    $user_record_detail =  $obj_user_records->getUserRecordByEmail();

    if(!$user_record_detail) {
        echo json_encode(array('err'=> 'User not found'));
        exit;
    }

    $obj_user_records->updateUserNote();
    echo json_encode(array('notice'=> 'User Note updated'));
    exit;
}
else {
    echo 'not_allowed';
}

exit;