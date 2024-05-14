<?php
    include 'header.php';
?>
<div class="log_main_cantainer">
    <div class="log_log_form">
        <div class="log_heading">
            <h2>Chief Proctor LogIn</h2>
        </div>
        <hr>
        <div class="log_form">
            <form action="<?php  $_SERVER['PHP_SELF'];   ?>" method="POST">
                <input type="text" name="username" placeholder="Username">
                <br>
                <input type="password" name="pass" placeholder="Password">
                <br>
                <div class="log_sub_btn">
                    <input type="submit" name="login" value="Login/ SignIn">
                </div>
                
            </form>
            <?php
                if(isset($_POST['login'])){
                    include "config.php";
                    $username = mysqli_real_escape_string($conn, $_POST['username']);
                    $password = md5($_POST['pass']);
                    $sql = "SELECT username, unique_id, fname, lname, photo FROM chiefproctor WHERE username ='{$username}' AND password ='{$password}'";

                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                    if(mysqli_num_rows($result) > 0){
                        while($row  = mysqli_fetch_assoc($result)){
                            session_start();
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['id'] = "chief";
                            $_SESSION['fname'] = $row['fname'];
                            $_SESSION['lname'] = $row['lname'];
                            $_SESSION['photo']= $row['photo'];
                            header("Location: {$hostname}/admin/chiefdashboard.php");
                        }
                    }else{
                        echo "<div class = 'alert alert-danger'>Username or Password not matched.</div>";
                    }
                }


            ?>
        </div>
    </div>
</div>

<?php
    include 'footer.php';
?>

