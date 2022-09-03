<?php
ob_start();
include "../parsial/header.php";
include "../parsial/topbar.php";
include "../parsial/sidebar.php";
include "../connection/function.php";
session_start();
$error='';
 $employee_id = "";

if (isset($_POST['submit'])){
  $employee_id = $_POST['employee_id'];
  $name = $_POST['name'];
  $password = $_POST['password'];
  $confirm_password=$_POST['confirm_password'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $designation = $_POST['designation'];
  $salary = $_POST['salary'];
  $age = $_POST['age'];



  if(empty($employee_id)){
    $id_error="Enter employee Id";
    $error=1;
   }

  if(empty( $name )){
    $name_error="Name is Needed";
    $error=1;
   }

  if(empty($email)){
    $email_error="Email is Needed";
    $error=1;
   }
   if(empty($phone)){
    $phone_error="Enter the phone number";
    $error=1;
   }if(empty($age)){
    $age_error="Enter your age";
    $error=1;
   }
   if(empty($salary)){
    $salary_error="Enter your salary";
    $error=1;
   }
   if(empty($address)){
    $address_error="Enter your Address";
    $error=1;
   }
   if(empty($designation)){
    $desig_error="Enter your designation";
    $error=1;
   }
   if($password != $confirm_password){
    $name_error="Password does't match";
    $error=1;
   }

  if (!$error) {

    $obj= new Shuvo;

    //users table//

    $columns=['name','phone','email','password'];

    $values = array($name,$phone,$email,$password);

    $obj->insert($columns,$values,'users');

    $row = $obj->findUserByEmail($email,'users');

    //employee table//

    $columns=['user_id','employee_id','address','designation','salary','age'];

    $values = array($row['id'],$employee_id,$address,$designation,$salary,$age);

    $obj->insert($columns,$values,'employee');

    header('location:emlist.php');

  }
  
}
?>


<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Employee Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="create.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="id">Employee ID</label>
                    <input type="number" class="form-control" id="id" name="employee_id" placeholder="Enter Employee id" value="<?php echo $employee_id;?>">
                  </div>
                   <?php
                      if (isset($id_error)) {
                      ?>
                      <p class="text-danger"><?php echo $id_error?></p>
                      <?php
                      }
                      ?>
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                  </div>
                      <?php
                      if (isset($name_error)) {
                      ?>
                      <p class="text-danger"><?php echo $name_error?></p>
                      <?php
                      }
                      ?>
       
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password"name="password" placeholder="Enter password">
                  </div>
                   <?php
                      if (isset($pass_error)) {
                      ?>
                      <p class="text-danger"><?php echo $pass_error?></p>
                      <?php
                      }
                      ?>
                  <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter password">
                  </div>
                   <?php
                      if (isset($confirm_error)) {
                      ?>
                      <p class="text-danger"><?php echo $confirm_error?></p>
                      <?php
                      }
                      ?>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
                  </div> 
                  <?php
                      if (isset($email_error)) {
                      ?>
                      <p class="text-danger"><?php echo $email_error?></p>
                      <?php
                      }
                      ?> 
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter phone no.">
                  </div>
                  <?php
                      if (isset($phone_error)) {
                      ?>
                      <p class="text-danger"><?php echo $phone_error?></p>
                      <?php
                      }
                      ?>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                  </div>
                   <?php
                      if (isset($address_error)) {
                      ?>
                      <p class="text-danger"><?php echo $address_error?></p>
                      <?php
                      }
                      ?>
                  <div class="form-group">
                    <label for="designation">Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter designation">
                  </div>
                   <?php
                      if (isset($desig_error)) {
                      ?>
                      <p class="text-danger"><?php echo $desig_error?></p>
                      <?php
                      }
                      ?>
                  <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter salary">
                  </div>
                   <?php
                      if (isset($salary_error)) {
                      ?>
                      <p class="text-danger"><?php echo $salary_error?></p>
                      <?php
                      }
                      ?>
                  <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age">
                  </div>
                   <?php
                      if (isset($age_error)) {
                      ?>
                      <p class="text-danger"><?php echo $age_error?></p>
                      <?php
                      }
                      ?>  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
            </div>
</div>           
<?php
include "../parsial/footer.php";
ob_end_flush();
?>