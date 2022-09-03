<?php
ob_start();
include "../parsial/header.php";
include "../parsial/topbar.php";
include "../parsial/sidebar.php";
include "../connection/function.php";
session_start();

$obj = new shuvo;
$row = $obj->show('employee');
$date= date('Y-m-d H:i:s');


if(isset($_GET['id'])){ 
    $month=$_GET['id'];
     }else{
      $month= date('Y-m');
    }

$working_hour = $_POST['working_hour']=0;
$status = $_POST['status']=1;

?>
<?php 

foreach ($row as $key => $employee) {

	

	$columns=['user_id','working_hour','date','month','amount','status'];

	$values  = array($employee['user_id'],$working_hour,$date,$month,$employee['salary'],$status);
	
	$obj->insert($columns,$values,'report');

	header('location:reportview.php');


}
?>