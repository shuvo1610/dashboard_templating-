<?php
ob_start();
session_start();

include"../parsial/header.php";
include"../parsial/topbar.php";
include"../parsial/sidebar.php";
include "../connection/function.php";

$obj = new shuvo;
if (isset($_POST['submit'])){

$id = $_POST['employee_id'];

$row = $obj->findUserByID($id,'employee');
	
	if ($row) {

 		$user_id=$row['user_id'];
		$login_time = date('H:i:s');


	$columns=['user_id','login_time'];

    $values = array($user_id,$login_time);

    $obj->insert($columns,$values,'users_activity');

    header('location: punchout.php');

	}
}
 ?>


<!DOCTYPE html>
<html>
<body class="hold-transition login-page">
<div class="login-box style:">
  <div class="login-logo">
    <a href="../index.php"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Start your session</p>
      
      <form action="punchin.php" method="post" >
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
            	<button type="submit" name="submit" class="btn btn-primary btn-block">Punch IN</button>
          	</div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>

<?php
session_destroy();
ob_end_flush();
?>
