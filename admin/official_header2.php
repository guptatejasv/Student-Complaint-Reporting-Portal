<?php
  include "config.php";

  if($_SESSION['id']=="chief"){
    $heading = "Chief Dashboard";
    $home = "chiefdashboard.php";
    $current_history = "chiefdashboard_c_history.php";
    $current_status = "chiefdashboard_c_status.php";
  }
  elseif($_SESSION['id']=="dean"){
    $heading = "Dean Dashboard";
    $home = "deandashboard.php";
    $current_history = "deandashboard_c_history.php";
    $current_status = "deandashboard_c_status.php";

  }
  else{
    $heading = "HOD Dashboard";
    $home = "hoddashboard.php";
    $current_history = "hoddashboard_c_history.php";
    $current_status = "hoddashboard_c_status.php";

  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="style2.css">

  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  
  
  <title>Document</title>
</head>
<style>
 
</style>
<body>
  <div class="root">
<header class="header2">
    <div class="header2_head">
        <div class="header2_dashboard_auth"><h2><?php echo $heading;  ?></h2></div>
    </div>
    <div class="header2_dashboard_btn">
        <button><a href="<?php echo $home;  ?>">Home</a></button>
        <button><a href="<?php echo $current_history;  ?>">Complaint History</a></button>
        <button><a href="<?php echo $current_status;  ?>">Complaint Status</a></button>
        <button><a href="http://erp.invertisuniversity.ac.in:81/loginForm.aspx">ERP Login</a></button>
        <button><a href="https://www.invertisuniversity.ac.in/">Invertis official</a></button>

    </div>
   </header>
