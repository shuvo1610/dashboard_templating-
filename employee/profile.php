 <?php
include"../parsial/header.php";
include"../parsial/topbar.php";
include"../parsial/sidebar.php";
include "../connection/function.php";
?>
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
             

            <!-- Profile Image -->
            <div class="card card-primary card-outline" style="width: 500px; height:550px;">
              <div class="card-body box-profile">
                <div class="card-header">
                <div class="card-tools">
                <a href="emlist.php" class="btn btn-success"  style="width: 100px;">Back</a>
                </div>
             </div>

                
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
    <tbody>
        <?php
            $id = $_GET['id'];

            $object = new shuvo;

            $row = $object->profile($id,'employee');
            $info = $object->profile($row['user_id'],'users');
          

        ?>
      <tr>
        <th>Employee Id</th>
        <td><?php  echo $row['employee_id'];?></td>
      </tr>
      <tr>
        <th>Name</th>
        <td><?php  echo $info['name'];?></td>
      </tr>
      <tr>
        <th>Phone</th>
        <td><?php  echo $info['phone'];?></td>
      </tr>
      <tr>
        <th>Email</th>
        <td><?php  echo $info['email'];?></td>
      </tr>
      <tr>
        <th>Address</th>
        <td><?php  echo $row['address'];?></td>
      </tr>
      <tr>
        <th>Designation</th>
        <td><?php  echo $row['designation'];?></td>
      </tr>
      <tr>
        <th>Salary</th>
        <td><?php  echo $row['salary'];?></td>
      </tr>
      <tr>
        <th>Age</th>
        <td><?php  echo $row['age'];?></td>
      </tr>
                     
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