<?php
include "../parsial/header.php";
include "../parsial/topbar.php";
include "../parsial/sidebar.php";
include "../connection/function.php";
$obj = new shuvo;
$rows = $obj->employeeView();


?>
<!DOCTYPE html>
<section class="content">
<div class="container-fluid">
        
          
<div class="row">
<div class="col-12">
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Employee List</h3>
      
      <div class="card-tools">
<a href="create.php" class="btn btn-success"  style="width: 100px;">Insert</a>
</div>
</div>

<div class="card-body">
  <table class="table table-bordered table-hover">
      <thead>
            <tr>
              <th>#</th>
              <th>Employee Id</th>
              <th>Name</th>
              <th>Designation</th>
              <th>Salary</th>
              <th>Email</th>
              <th>Action</th>

            </tr>
      </thead>
  <tbody>
<?php 

foreach ($rows as $key => $employee) {
?>
        <tr>
            <td><?php echo $key+1?></td>
            <td><?php echo $employee['employee_id']?></td>
            <td><?php echo $employee['name']?>
              <?php
              if ($employee['status']==1) {
                echo "<span class='badge badge-success'>Active</span>";
              }else{
                echo "<span class='badge badge-danger'>Deactive</span>";
              }


              ?>
            </td>
           
            <td><?php echo $employee['designation']?></td>
            <td><?php echo $employee['salary']?></td>
            <td><?php echo $employee['email']?></td>
            <td style="white-space: nowrap;"><a href="profile.php?id=<?= $employee['id']?>" class="btn btn-primary">View</a>

              <a href="edit.php?id=<?= $employee['id']?>" class="btn btn-success">Edit</a>
              
              <a href="delete.php?id=<?= $employee['id']?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>

              <a href="status.php?id=<?= $employee['user_id']?>&&status=<?= $employee['status']?>"> <?php
              if ($employee['status']==1) {
                echo "<span class='btn btn-danger'>Deactive</span>";
              }else{
                echo "<span class='btn btn-success'>Active</span>";
              }


              ?></a></td>
        </tr>


<?php
  }
?>

  </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</section>


<?php

include"../parsial/footer.php";
?>