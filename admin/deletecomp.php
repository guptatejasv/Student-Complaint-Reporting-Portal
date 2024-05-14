<?php
include 'config.php';
$comp_id = $_GET['comp_id'];
$sql = "DELETE FROM complaint WHERE comp_id='{$comp_id}'";
if(mysqli_query($conn, $sql)){
    header("Location: {$hostname}/admin/chiefdashboard.php");
}

?>