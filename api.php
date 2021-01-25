<?php 
session_start();
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$email = isset($_GET['email']) ? trim(htmlentities($_GET['email'])):'';

use EmailValidation\EmailValidatorFactory;

require __DIR__ . '/vendor/autoload.php';

$validator = EmailValidatorFactory::create($_REQUEST['email'] ?? '');

header('Content-Type: application/json');
$jsonResult = $validator->getValidationResults()->asJson();
$arrayResult = $validator->getValidationResults()->asArray();

$obj = json_decode($jsonResult);
if($obj->valid_format == false){   
$data = array('error_code' => 1, 'email' => $email, 'status' => 'invalid');
echo json_encode($data);
exit();
}
if($obj->valid_mx_records == false){   
$data = array('error_code' => 1, 'email' => $email, 'status' => 'invalid');
echo json_encode($data);
exit();
}
if($obj->free_email_provider == false){   
$data = array('error_code' => 1, 'email' => $email, 'status' => 'invalid');
echo json_encode($data);
exit();
}
if($obj->disposable_email_provider == true){   
$data = array('error_code' => 1, 'email' => $email, 'status' => 'invalid');
echo json_encode($data);
exit();
}
if($obj->valid_host == false){   
$data = array('error_code' => 1, 'email' => $email, 'status' => 'invalid');
echo json_encode($data);
exit();
}
else{
$data = array('error_code' => 0, 'email' => $email, 'status' => 'live');
echo json_encode($data);
exit();
}
?>