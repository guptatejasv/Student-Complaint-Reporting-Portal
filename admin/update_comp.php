<?php
    if(isset($_POST['save'])){
        $update_value = $_POST['action_opt'];
        $comp_id = $_POST['comp_id'];
        $action_taker = $_POST['action_taker'];
        $update_date = date("d M, Y");
        date_default_timezone_set("Asia/Kolkata");
         $update_time = date("h:i:sA");
        include 'config.php';
        $sql = "UPDATE complaint SET status = '{$update_value}', action_taker = '{$action_taker}', update_date= '{$update_date}', update_time= '{$update_time}' WHERE comp_id = '{$comp_id}'";
        $result = mysqli_query($conn, $sql) or die("Query Failed...!");

        header("Location: http://localhost/Mini Project 1/admin/chiefdashboard.php");
        mysqli_close($conn);

    }

?>