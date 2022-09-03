<?php
session_start();
include('../connection/function.php');
$obj = new shuvo;
$row="";
$error = '';

if(isset($_POST['submit']))
{
	$email=$_POST['email'];

	$mypassword=$_POST['password'];

	if (!$email || !$mypassword) {
		$error = 1;

		$_SESSION['email'] = 'Enter Email';
		$_SESSION['pass'] = 'Enter password';
		header("location:login.php");

	}

	elseif (!$email) {

	$error = 1;
		$_SESSION['email'] = 'Enter Email';
		header("location:login.php");

	}
	elseif (!$mypassword) {
	$error = 1;
		$_SESSION['pass'] = 'Enter password';
		header("location:login.php");

	}

	$row = $obj->login([$email],'users');

	if ($row) {
         $_SESSION['login_user'] = $email;
         if ($mypassword==$row['password']) {
         	
          $_SESSION['login_user'] = $row['name'];

          header("location: welcome.php");
         }
         else{ 
         	$_SESSION['pass'] = 'Invalid password';
         	$_SESSION['email'] = '';
	$error = 1;
			
		}
     }else{

		$_SESSION['email'] = 'Invalid Email';
		$_SESSION['pass'] = '';
	$error = 1;
	}
	if ($error) {
	header("location:login.php");
}
		}

?>