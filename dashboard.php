<?php
$p = 'dashboard';
require 'configs/requires.php';
$smarty = new SmartyEngine();

$email = $_GET['email'] ?? false;

if($email != '') {
    $obj_user_records = new ModelUserRecords(array('email'=> $email));
    $user_record_detail =  $obj_user_records->getUserRecordDetailByEmail();
    
    if(!$user_record_detail) {
        header('Location: 404.php');
    }

}

$smarty->assign('user_record_detail', $user_record_detail ?? false);
$smarty->assign('app_name', _AppName);
$smarty->assign('title', 'Admin Dashboard');
$smarty->assign('p', $p);
$smarty->display('dashboard.tpl');
