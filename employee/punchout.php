<?php
ob_start();
session_start();

include"../parsial/header.php";
include"../parsial/topbar.php";
include"../parsial/sidebar.php";
include "../connection/function.php";
$error='';
$obj = new shuvo;

if (isset($_POST['submit'])){

 if (isset($_POST['employee_id'])){

 	$id = $_POST['employee_id'];

 	$row = $obj->findUserByID($id,'employee');
 	if ($row) {

 		$row = $obj->findLastRowUserByID($row['user_id'],'users_activity');

 		$user_id=$row['user_id'];
 		$logout_time = date('H:i:s');


 	  $columns=['logout_time'];
      $values = array($logout_time);
      $obj->punchout($user_id,$columns,$values,'users_activity');
      header('location: punchin.php');

 }else{
 	$error="Employee ID does't Match";
 	
     
 }
}
}
 ?>

<div class="login-box style:">
  <div class="login-logo">
    <a href="../index.php"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">End your session</p>
      <form action="punchout.php" method="post">
        <div class="input-group mb-3">
          <input type="id" class="form-control" name="employee_id" placeholder="ID">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
        	<div class="col-4">
            	<button type="submit" name="submit" class="btn btn-primary btn-block">Punch Out</button>
          	</div>
        </div>
         <?php
                      if (isset($error)) {
                      ?>
                      <p class="text-danger"><?php echo $error?></p>
                      <?php
                      }
                      ?>
      </form>
    </div>
  </div>
</div>

<?php

session_destroy();
ob_end_flush();


?>
