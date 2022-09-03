<?php
   //include('session.php');
   include('../parsial/header.php');
   session_start();
?>
<html>
   
   <head>
      <title> Log in </title>
   </head>
   <body>
      <h1>Welcome</h1> <br>
      <?php echo  $_SESSION['login_user']?>
      <h2><a href="logout.php" class="btn btn-success">Sign Out</a></h2>
   </body>
   
</html>