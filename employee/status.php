<?php
ob_start();
include"../parsial/header.php";
include"../parsial/topbar.php";
include"../parsial/sidebar.php";
include "../connection/function.php";
session_start();

$object = new shuvo;

$id = $_GET['id'];
$status=$_GET['status'];

 	if ($status==1) {
 		$status=0;
 	}
 	else{
 		$status=1;
 	}
	$columns=['status'];

    $values = array($status);
      

     $object->update($id,$columns,$values,'users');
     header('location:emlist.php');



?>
<?php

include"../parsial/footer.php";
ob_end_flush();
?>