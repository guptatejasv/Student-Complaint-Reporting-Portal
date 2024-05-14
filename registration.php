<?php
include 'header.php';
if(isset($_POST['save']))
{
    include 'config.php';
   

    $fname = mysqli_real_escape_string($conn,$_POST['f_name']);
    $lname = mysqli_real_escape_string($conn,$_POST['l_name']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $std_id = mysqli_real_escape_string($conn,$_POST['std_id']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $course = mysqli_real_escape_string($conn,$_POST['course']);
    $year = mysqli_real_escape_string($conn,$_POST['year']);
    $stype = mysqli_real_escape_string($conn,$_POST['stype']);
    $pass = mysqli_real_escape_string($conn,md5($_POST['cpass']));
    $pass1 = mysqli_real_escape_string($conn,md5($_POST['pass']));
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    if($pass === $pass1){
        if(isset($_FILES['fileToUpload'])){
            $errors = array();
            $file_name = $_FILES['fileToUpload']['name'];
            $file_size = $_FILES['fileToUpload']['size'];
            $file_tmp = $_FILES['fileToUpload']['tmp_name'];
            $file_type = $_FILES['fileToUpload']['type'];
            $file_ext = strtolower(end(explode('.',$file_name)));
            $extensions = array("jpeg","jpg","png");
            if(in_array($file_ext,$extensions)===false){
                $errors[]= "This extension file is not allowed, please choose a JPG or PNG file.";
            }
            if($file_size>2097152){
                $errors[]= "File size must be 2 Mb or Lower.";
            }
            if(empty($errors)){
                move_uploaded_file($file_tmp,"admin/student_img/".$file_name);
            }
            else{
                print_r($errors);
                die();
            }
        }
        $sql = "SELECT username FROM stdusers WHERE username = '{$username}' OR studentid = '{$std_id}'";
        $result = mysqli_query($conn, $sql) or die("Query Failed.");
        if(mysqli_num_rows($result)>0)
        {
            echo "<p style='color:red;text-align:center;margin:10px 0;'>Username or Student Id already exist. Please try another username or Student ID!</p>";
        }
        else{
            $sql1 = "INSERT INTO stdusers(fname, lname, username, studentid, email, course, year, stdtype, password, phone, photo)
            VALUES('{$fname}','{$lname}','{$username}','{$std_id}','{$email}','{$course}','{$year}','{$stype}','{$pass}','{$phone}','{$file_name}')";
            if(mysqli_query($conn, $sql1)){
                header("Location: {$hostname}/u_log_form.php");
            }
        }
    }else{
        echo "<p style='color:red;text-align:center;margin:10px 0;'>Create Password and Confirm password must match.</p>";
    }
   
}

?>




<div class="r_main_container">
   <div class="r_sub_container">
    <div class="r_reg_heading">
        <h2>Registration</h2>
    </div>
    <div class="r_reg_form">
        <form action="<?php  $_SERVER['PHP_SELF'];  ?>" method="POST" enctype="multipart/form-data">  
            <div class="r_std_details">
            <div class="input-box">
                <label for="f_name">First Name <span style="color:red">*</span></label>
                <input type="text" name="f_name" id="f_name" placeholder="First Name" required >
            </div>
            <div class="input-box">
                <label for="l_name">Last Name <span style="color:red">*</span></label>
                <input type="text" name="l_name" id="l_name" placeholder="Last Name" required>
            </div>
            <div class="input-box">
                <label for="username">Username <span style="color:red">*</span></label>
                <input type="text" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="input-box">
                <label for="std_id">Student Id <span style="color:red">*</span></label>
                <input type="text" name="std_id" id="std_id" placeholder="Student Id" required>
            </div>
            <div class="input-box">
                <label for="email">Email <span style="color:red">*</span></label>
                <input type="email" name="email" id="email" placeholder="abc@example.com" required>
            </div>
            <div class="input-box">
                <label for="course">Course <span style="color:red">*</span></label>
                <select name="course" id="course">
                    <option value="" selected disabled>Choose Course</option>
                    <option value="BBA">BBA</option>
                    <option value="MBA">MBA</option>
                    <option value="B.Tech">B.Tech</option>
                    <option value="M.Tech">M.Tech</option>
                    <option value="BSc.BEd">BSc.BEd</option>
                    <option value="B.Com">B.Com</option>
                    <option value="B.Pharma">B.Pharma</option>
                    <option value="BSc.Ag">BSc.Ag</option>
                    <option value="B.Tech Bio-Tech">B.Tech Bio-Tech</option>
                    <option value="BA LLB">BA LLB</option>
                    <option value="BBA LLB">BBA LLB</option>
                    <option value="BSc. Forensic">BSc. Forensic</option>
                </select>
            </div>
            <div class="input-box">
                <label for="year">Year <span style="color:red">*</span></label>
               <select name="year" id="year">
               <option value="" selected disabled>Choose Year</option>
                <option value="1">1st</option>
                <option value="2">2nd</option>
                <option value="3">3rd</option>
                <option value="4">4th</option>
                <option value="5">5th</option>
               </select>
            </div>
            <div class="input-box">
                <label for="stype">Student Type <span style="color:red">*</span></label>
               <select name="stype" id="stype">
               <option value="" selected disabled>Choose Student Type</option>
                <option value="1">Hosteler</option>
                <option value="2">Day Scholar</option>
               </select>
            </div>
           
            <div class="input-box">
                <label for="pass">Create Password <span style="color:red">*</span></label>
                <input type="password" name="pass" id="pass">
            </div>
            
            <div class="input-box">
                <label for="cpass">Confirm Password <span style="color:red">*</span></label>
                <input type="password" name="cpass" id="cpass">
            </div>
            <div class="input-box">
                <label for="phone">Phone No <span style="color:red">*</span></label>
                <input type="tel" placeholder="1234567890" name="phone" id="phone" placeholder="First Name" required>
            </div>
            
            <div class="input-box">
                <label for="photo">Upload Photo <span style="color:red">*</span></label>
                <input type="file" name="fileToUpload" id="photo" required>
            </div>
            </div>
            <div class="r_button">
                <input type="submit" value="Register" name="save" onclick="alert('Registered Successfully')">
            </div>
            
         
        </form>
    </div>
   </div>
</div>
<?php
include 'footer.php';
?>