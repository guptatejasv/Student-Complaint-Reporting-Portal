<?php
    include 'official_header.php';
    include 'official_header2.php';
?>


<div class="u_c_s_main_container">
    <div class="u_c_s_sub_container">
<table>
  <thead>
    <th>Sr. No</th>
    <th>Complaint Id</th>
    <th>Date</th>
    <th>Time</th>
    <th style="background-color:rgb(70, 168, 77);">Status</th>
    <th>Update Date</th>
    <th>Update Time</th>
    <th>Action Taker</th>
    
</thead>
<?php
    include 'config.php';
    
   
    $sql = "SELECT * FROM complaint where status != 'Pending'";
    $result = mysqli_query($conn, $sql) or die("Query failed.");
    if(mysqli_num_rows($result)>0){
        while($row= mysqli_fetch_assoc($result)){
                                               
  ?>

  <tbody>
      <tr>
         <td><?php  echo $row['comp_sr']; ?></td>
         <td><?php  echo $row['comp_id']; ?></td>
         <td><?php  echo $row['comp_date']; ?></td>
         <td><?php echo $row['comp_time']; ?></td>
         <td><?php echo $row['status']; ?></td> 
         <td><?php echo $row['update_date']; ?></td>  
         <td><?php echo $row['update_time']; ?></td>  
         <td><?php echo $row['action_taker']; ?></td>  
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
<?php
    include 'footer.php';
?>