<?php

if (isset($_GET['id'])) {
include '../connection/function.php';
 
    $obj = new shuvo;
    $obj->delete($_GET['id'],'employee');

    
}
header("location:emlist.php");
?>
