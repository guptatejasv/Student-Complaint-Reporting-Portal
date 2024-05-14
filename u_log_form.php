<?php
    include 'header.php';
?>
<div class="log_main_cantainer">
    <div class="log_log_form">
        <div class="log_heading">
            <h2>Student LogIn</h2>
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
                    $sql = "SELECT std_sr, username, fname, lname, studentid, photo FROM stdusers WHERE username ='{$username}' AND password ='{$password}'";

                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                    if(mysqli_num_rows($result) > 0){
                        while($row  = mysqli_fetch_assoc($result)){
                            session_start();
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['fname'] = $row['fname'];
                            $_SESSION['lname'] = $row['lname'];
                            $_SESSION['user_sr'] = $row['std_sr'];
                            $_SESSION['photo']= $row['photo'];
                            $_SESSION['studentid']= $row['studentid'];
                            header("Location: {$hostname}/admin/userdashboard.php");
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

