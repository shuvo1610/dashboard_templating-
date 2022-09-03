<?php
include "../parsial/header.php";
include "../parsial/topbar.php";
include "../parsial/sidebar.php";
include "../connection/function.php";
$obj = new shuvo;
$rows = $obj->show('report');



?>
<!DOCTYPE html>
<section class="content">
<div class="container-fluid">
        
          
<div class="row">
<div class="col-12">
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Final Report</h3>
      
      <div class="card-tools">
<a href="../index.php" class="btn btn-success"  style="width: 100px;">Home</a>
</div>
</div>

<div class="card-body">
  <table class="table table-bordered table-hover">
      <thead>
            <tr>
              <th>#</th>
              <th>User Id</th>
              <th>Working Hour</th>
              <th>Date</th>
              <th>Month</th>
              <th>Salary</th>
              <th>Status</th>

            </tr>
      </thead>
       <tbody>
<?php 

foreach ($rows as $key => $employee) {
?>
        <tr>
            <td><?php echo $key+1?></td>
            <td><?php echo $employee['user_id']?></td>
            <td><?php echo $employee['working_hour']?></td>
            <td><?php echo $employee['date']?></td>
            <td><?php echo $employee['month']?></td>
            <td><?php echo $employee['amount']?></td>
            <td><?php
              if ($employee['status']==1) {
                echo "<span class='badge badge-success'>Paid</span>";
              }else{
                echo "<span class='badge badge-danger'>Unpaid</span>";
              }
              ?></td>
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