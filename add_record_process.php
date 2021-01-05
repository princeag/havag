<?php
require_once 'configs/requires.php';
$today = gmdate('Y-m-d');
ini_set('error_log', 'Error_logs/'.$today.'-ajax-request-php-error.log');

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: 404.php');
}

error_log(var_export($_REQUEST, true));
error_log(var_export($_FILES, true));

$email          = $_REQUEST['email'];
$name           = $_REQUEST['name'];
$mobile         = $_REQUEST['mobile'];
$occupation     = $_REQUEST['occupation'];
$short_bio      = $_REQUEST['short_bio'];
$gender         = $_REQUEST['gender'];
$password       = $_REQUEST['password'];
$dob            = $_REQUEST['dob'];
$profile        = $_FILES['profile'];
$resume_file    = $_FILES['resume_file'];
$date           = gmdate('Y-m-d H:i:s');

$email      = trim($email);
$name       = trim($name);
$mobile     = trim($mobile);
$occupation = trim($occupation);
$short_bio  = trim($short_bio);
$gender     = trim($gender);
$password   = trim($password);
$dob        = trim($dob);

if(empty($email) || empty($name) || empty($mobile) || empty($occupation) || empty($short_bio) || empty($gender) || empty($password) || empty($dob)) {
    echo json_encode(array('err'=> 'Fields are required'));
    exit;
}

# validate email
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(array('err'=> 'Email is invalid'));
    exit;
}

# validate gender
$gender_values = ['other', 'male', 'female'];
if(($gender = array_search($gender, $gender_values)) === FALSE) {
    echo json_encode(array('err'=> 'Gender is invalid'));
    exit;
}

# check profile img
if(!is_uploaded_file($profile['tmp_name'])) {
    echo json_encode(array('err'=> 'Profile img is not uploded'));
    exit;
}

# supported profile img
$supported_profile_img = ['png', 'jpg'];
$profile_ext = pathinfo($profile['name'], PATHINFO_EXTENSION);
if(!in_array($profile_ext, $supported_profile_img)) {
    echo json_encode(array('err'=> 'Profile img is not supported'));
    exit;
}

$profile_dest_folder = 'uploads/profiles/';
$profile_new_name = md5($profile['name'].$date);
$profile_new_name .= '.'.$profile_ext;

if(!move_uploaded_file($profile['tmp_name'], $profile_dest_folder.$profile_new_name)) {
    echo json_encode(array('err'=> 'Profile img cannot uploaded'));
    exit;
}


# check resume file
if(!is_uploaded_file($resume_file['tmp_name'])) {
    echo json_encode(array('err'=> 'Resume file is not uploded'));
    exit;
}

# supported profile img
$supported_resume_file = ['pdf'];
$resume_file_ext = pathinfo($resume_file['name'], PATHINFO_EXTENSION);
if(!in_array($resume_file_ext, $supported_resume_file)) {
    echo json_encode(array('err'=> 'Resume file is not supported'));
    exit;
}

$resume_file_dest_folder = 'uploads/resume_files/';
$resume_file_new_name = md5($resume_file['name'].$date);
$resume_file_new_name .= '.'.$resume_file_ext;

if(!move_uploaded_file($resume_file['tmp_name'], $resume_file_dest_folder.$resume_file_new_name)) {
    echo json_encode(array('err'=> 'Resume File cannot uploaded'));
    exit;
}

$dob = new DateTime($dob);
$dob = $dob->format('Y-m-d');

$obj_user_records = new ModelUserRecords(array('name'=> $name, 'email'=> $email, 'mobile'=> $mobile, 'password'=> $password, 'dob'=> $dob, 'occupation'=> $occupation, 'short_bio'=> $short_bio, 'gender'=> $gender, 'profile'=> $profile_new_name, 'resume_file'=> $resume_file_new_name, 'date_add'=> $date, 'date_upd'=> $date));
$user_record_detail =  $obj_user_records->getUserRecordByEmail();

if($user_record_detail) {
    $record_id = $obj_user_records->updateUserRecord();
    
    if($user_record_detail['profile'] && $user_record_detail['profile'] != '') {
        unlink($profile_dest_folder.$user_record_detail['profile']);
    }

    if($user_record_detail['resume_file'] && $user_record_detail['resume_file'] != '') {
        unlink($resume_file_dest_folder.$user_record_detail['resume_file']);
    }
}
else {
    $record_id = $obj_user_records->addUserRecord();
}

if(!$record_id) {
    echo json_encode(array('err'=> 'Something went wrong'));
    exit;
}

echo json_encode(array('notice'=> 'Record '.($user_record_detail ? 'updated' : 'saved').' successfully'));
exit;