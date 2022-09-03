<?php
ob_start();
include"../parsial/header.php";
include"../parsial/topbar.php";
include"../parsial/sidebar.php";
include "../connection/function.php";

$object = new shuvo;
if(isset($_GET['id'])){
$id = $_GET['id'];
$row = $object->profile($id,'employee');
$info = $object->profile($row['user_id'],'users');
}

    if (isset($_POST['submit'])){
      $name = $_POST['name'];
      // $employee_id = $_POST['employee_id'];
      $password = $_POST['password'];
      $confirm_password=$_POST['confirm_password'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $designation = $_POST['designation'];
      $salary = $_POST['salary'];
      $age = $_POST['age'];


    $columns=['address','designation','salary','age'];

      $values = array($address,$designation,$salary,$age);
      

     $object->update($id,$columns,$values,'employee');


    $columns=['name','password','email','phone'];

    $values = array($name,$password,$email,$phone);

    $object->update($id,$columns,$values,'users');

header('location:emlist.php');

}
?>
<!-- /.card-header -->
<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Employee Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="edit.php?id=<?php echo $id ?>" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="<?php echo $info['name'];?>" id="name">
                  </div>
                  
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password"name="password">
                  </div>
                      
                  <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="" id="confirm_password">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $info['email'];?>" id="email">
                  </div>
                  
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $info['phone'];?>" id="phone">
                  </div>
                  
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address'];?>" id="address">
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="designation">Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $row['designation'];?>" id="designation">
                  </div>
                  
                  <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="text" class="form-control" id="salary" name="salary" value="<?php echo $row['salary'];?>" id="salary">
                  </div>
                  
                  <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age" value="<?php echo $row['age'];?>" id="age">
                  </div>  
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  <a href="emlist.php" class="btn btn-warning"  style="width: 100px;">Cancel</a>
              
                </div>
              </form>
            </div>
            </div>
            </div>
</div>        
<?php

include"../parsial/footer.php";
ob_end_flush();
?>