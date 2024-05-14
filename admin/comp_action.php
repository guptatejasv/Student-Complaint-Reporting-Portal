<?php
    include 'official_header.php';
    include 'official_header2.php';

?>
<!-- styling is in style1.css -->
<div class="comp_action_main_container">
    <div class="comp_action_sub_container">
        <div class="comp_action_logo_detail">
            <div class="comp_action_logo">
                <img src="Img/ilogo.png" alt="">
            </div>
            <div class="comp_action_add">
            Bareilly-Lucknow National Highway NH-24, Bareilly 243123, Uttar Pradesh
            </div>
        </div>
        <hr>
        <?php
            include 'config.php';
            $comp_id = $_GET['comp_id'];
            
            $sql = "SELECT * FROM complaint INNER JOIN stdusers ON complaint.studentid = stdusers.studentid WHERE complaint.comp_id='{$comp_id}'";
            $result = mysqli_query($conn, $sql) or die("Query failed.");
            if(mysqli_num_rows($result)>0){
                while($row= mysqli_fetch_assoc($result)){
                                                         
        ?>
        <div class="comp_action_logo_detail1">
            <div class="comp_action_std_detail">
              <form action="">
                <div class="form_div">
                    <div>
                        <label for="name">Name</label><br>
                        <input type="text" value="<?php echo $row['fname']." ".$row['lname'];  ?>" disabled>
                    </div>
                    <div>
                        <label for="name">Student Id</label><br>
                        <input type="text" value="<?php echo $row['studentid'];  ?>" disabled>
                    </div>
                </div>
                <div class="form_div">
                    <div>
                        <label for="name">Course</label><br>
                        <input type="text" value="<?php echo $row['course'];  ?>" disabled>
                    </div>
                    <div>
                        <label for="name">Year</label><br>
                        <input type="text" value="<?php echo $row['year'];  ?>" disabled>
                    </div>
                </div>
                <div class="form_div">
                    <div>
                        <label for="name">Student Type</label><br>
                        <input type="text" value="<?php echo $row['stdtype'];  ?>" disabled>
                    </div>
                    <div>
                        <label for="name">Email</label><br>
                        <input type="text" value="<?php echo $row['email'];  ?>" disabled>
                    </div>
                </div>
                <div class="form_div">
                    <div>
                        <label for="name">Contact No.</label><br>
                        <input type="text" value="<?php echo $row['phone'];  ?>" disabled>
                    </div>
                    <div>
                        <label for="name">Student Id</label><br>
                        <input type="text" value="<?php echo $row['studentid'];  ?>" disabled>
                    </div>
                </div>
              </form>

            </div>
            <div class="comp_action_std_photo">
                <img src="student_img/<?php echo $row['photo'];  ?>" alt="">
            </div>
        </div>
        <hr>
        <div class="comp_action_cmptable">
        <table>
  <thead>
  
    <th>Sr. No</th>
    <th>Complaint Id</th>
    <th>Student Id</th>
    <th>Date</th>
    <th>Time</th>
    <th>Crime Location</th>
    <th>Crime Type</th>
    <th>Description</th>
    <th>Status</th>
    <th>Take Action</th>
 
    

</thead>

  <tbody>

      <tr>
         <td><?php  echo $row['comp_sr']; ?></td>
         <td><?php  echo $row['comp_id']; ?></td>
         <td><?php  echo $row['studentid']; ?></td>
         <td><?php  echo $row['comp_date']; ?></td>
         <td><?php echo $row['comp_time']; ?></td>
         <td><?php echo $row['crime_location']; ?></td>
         <td><?php echo $row['type_of_crime']; ?></td>
         <td><?php echo substr($row['description'],0,100)."..."; ?></td>
         <td><?php echo $row['status']; ?></td>
         <td>
           <form action="update_comp.php" method="POST">
           <div class="form">
                          <input type="hidden" name="comp_id" value="<?php echo $comp_id;  ?>" placeholder="">
            </div>
            <div class="form">
                          <input type="hidden" name="action_taker" value="<?php echo $_SESSION['fname']. ' '. $_SESSION['lname'];  ?>" placeholder="">
            </div>
           <select name="action_opt" id="action_opt">
            <option value="choose" selected disabled>Choose</option>
                <option value="Pending">Pending</option>
                <option value="Refused">Refused</option>
                <option value="Resolved">Resolved</option>
            </select>
            <button name="save">Update</button>
           </form>
           
            
    
            
         </td>


          
      </tr>
  </tbody>
  <?php 
    } 
      }else{
          echo "<div class='alert alert-danger'>No record found...!</div>";
      }

    ?>
</table>
        </div>
           
    </div>
    </div>
</div>