<?php
  include "config.php";
  session_start();

  if(!isset($_SESSION['username'])){
    header("Location: {$hostname}/official_login.php");
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
  
   <!-- Bootstrap -->
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
  
  <title>Document</title>
</head>
<body>
  <div class="root">
<header class="header">
    <div class="logo_invertis">
      <img src="Img/ilogo.png" alt="">
      <div class="line"></div>
      <div class="portal_name"><h2>Student Complaint Reporting Portal</h2></div>
    </div>
    <div class="login_btns">
      <div class="sd_std_img">
        <img src="officers_img/<?php echo $_SESSION['photo']; ?>" alt="">
      </div>
      <div class="sd_std_logout_btn">
        <p><a href="logout.php">Hi <?php echo ucwords(strtolower($_SESSION['fname']." ". $_SESSION['lname']));  ?>, Logout</a></p>
      </div>
    </div>
   </header>
