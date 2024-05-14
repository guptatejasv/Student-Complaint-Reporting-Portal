<?php
    include 'header.php';
    include 'header2.php';

if(isset($_POST['save']))
{
    include 'config.php';
    function random_strings($length_of_string)
{
 
    // String of all alphanumeric character
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
    // Shuffle the $str_result and returns substring
    // of specified length
    return substr(str_shuffle($str_result), 
                       0, $length_of_string);
}
    $student_id = mysqli_real_escape_string($conn,$_POST['studentid']);
    $crime_loction = mysqli_real_escape_string($conn,$_POST['crimelocation']);
    $toc = mysqli_real_escape_string($conn,$_POST['toc']);
    $description = mysqli_real_escape_string($conn,$_POST['c_des']);
    $date = date("d M, Y");
    date_default_timezone_set("Asia/Kolkata");
    $time = date("h:i:sA");
    $comp_id = random_strings(10);
    $sql1 = "INSERT INTO complaint(comp_id, studentid, crime_location, type_of_crime, description, comp_date, comp_time)
    VALUES('{$comp_id}','{$student_id}','{$crime_loction}','{$toc}','{$description}','{$date}','{$time}')";
    if(mysqli_query($conn, $sql1)){
        header("Location: {$hostname}/admin/userdashboard.php");
    }
    
}

?>
<div class="studentdash_main_container">
    <div class="studentdash_sub_container1">
        <div class="studentdash_imp_link">
            <p>Important Links</p>
        </div>
        <ul>
            <li><a href="http://erp.invertisuniversity.ac.in:81/loginForm.aspx">ERP LogIn</a></li>
            <li><a href="https://www.invertisuniversity.ac.in/">Invertis Official</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Disclaimer</a></li>
            <li><a href="#">Policy</a></li>
        </ul>
    </div>
    <div class="studentdash_sub_container2">
        <!-- <div class="studentdash_form_head">Complaint Form</div> -->
        <div class="studentdash_comp_form">
            <div class="studentdash_comp_form_head">Complaint Form</div>

            <?php
                include 'config.php';
                $std_id = $_SESSION['user_sr'];
                $sql = "SELECT fname, lname, studentid, course FROM stdusers WHERE std_sr={$std_id} ";
                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
        
            ?>

            <form action="<?php  $_SERVER['PHP_SELF'];  ?>" method="POST">
                <div class="input-box">
                    <input type="text" placeholder="First Name" name="fname" value="<?php echo $row['fname']; ?>" disabled>
                    <input type="text" placeholder="Last Name" name="lname" value="<?php echo $row['lname'];   ?>" disabled>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Student Id" name="studentid" value="<?php echo $row['studentid'];   ?>" required>
                    <select name="course" id="course" disabled>
                    <option value="<?php echo $row['course'];   ?>" selected disabled><?php echo $row['course'];   ?></option>
                   
                    </select>
                </div>
                <div class="input-box">
                <select name="crimelocation" id="crimelocation" required>
                    <option value="" selected disabled>Choose Crime Location</option>
                   <option value="T-Block">T-Block</option>
                   <option value="M-Block">M-Block</option>
                   <option value="UV-Block">UV-Block</option>
                   <option value="UV-Library">UV-Library</option>
                   <option value="Main-Library">Main-Library</option>
                   <option value="others">others</option>
                    </select>
                    <select name="toc" id="toc" required>
                    <option value="" selected disabled>Choose Type of Crime</option>
                    <option value="Physical Bullying">Physical Bullying</option>
                    <option value="Verbal Bullying">Verbal Bullying</option>
                    <option value="Social Bullying">Social Bullying</option>
                    <option value="Cyberbullying">Cyberbullying</option>
                    <option value="Discrimination-based Bullying">Discrimination-based Bullying</option>
                    <option value="Retaliation and Witness Intimidation">Retaliation and Witness Intimidation</option>
                    <option value="Teacher or Staff Bullying">Teacher or Staff Bullying</option>
                    <option value="Repeated Harassment">Repeated Harassment</option>
                    <option value="Others">Others</option>
                    </select>
                </div>
                <div class="input-box">
                   <textarea name="c_des" id="c_des" cols="70" rows="10">Describe in Brief...</textarea>
                </div>
                <div class="input-box">
                    <button name="save">Submit</button>
                </div>
            </form>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</div>

</div>
