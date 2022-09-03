 <?php
 ob_start();
include"../parsial/header.php";
include"../parsial/topbar.php";
include"../parsial/sidebar.php";
include"../connection/function.php";
$error='';
$obj = new shuvo;

$rows = $obj->ReportGenerat();



if(isset($_POST['month']) && !empty($_POST['month'])){ 
    $month=$_POST['month'];
     }else{
      $month= date('Y-m');
    }


  if(isset($_POST['month']) && empty($_POST['month'])){
    $month_error="Select Month";
    $error=1;
   }

  $button = $obj->FindByMonth(array($month),'report');


?>

<section class="content">
 <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Selary Report Table</h3><br><br>
                <?php
               
                if (count($button)==0) {
                  ?>
                 <a href="../employee/reportgenerate.php?id=<?php echo $month ?>" method="POST" class="btn btn-success">Salary Generate For 
                <?php 
                  echo $month;?></a><br><br>

                
                <?php
                }

                
                ?>
                <form action=" " method="POST">
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 1147px;">
                    <input type="month" name="month" class="form-control float-right">
                     <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div><br>
                  <?php
                      if (isset($month_error)) {
                      ?>
                      <p class="text-danger"><?php echo $month_error?></p>
                      <?php
                      }
                      ?>
                </div>
              </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Employee ID</th>
                      <th>Month</th>
                      <th>Amount</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                     
                    if (count($button)> 0) {
                      foreach ($button as $key => $report)
                        

                       {
                    ?>                
                <tr>
            <td><?php echo $key+1?></td>
            <td><?php echo $report['user_id']?></td>
            <td><?php echo $report['month']?></td>
            <td><?php echo $report['amount']?></td>
            <td><?php
              if ($report['status']==1) {
                echo "<span class='badge badge-success'>Paid</span>";
              }else{
                echo "<span class='badge badge-danger'>Unpaid</span>";
              }
              ?></td>
            
          </tr>
          <?php
            }
            }else{
          ?>
          
        <?php 


foreach ($rows as $key => $employee) {
?>

        <tr>
            <td><?php echo $key+1?></td>
            <td><?php echo $employee['employee_id']?></td>
            <td><?php echo $employee['name']?></td>
            <td><?php echo $employee['salary']?></td>
            <td><?php echo $employee['status']?></td>
        </tr>
      </tbody>
      <?php
    }
  }

      ?>
    </table>
  </div>
</div>
</div>
</div>
</section>
<?php

include"../parsial/footer.php";
?>


