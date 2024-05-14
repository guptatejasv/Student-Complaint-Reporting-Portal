<?php
    include 'official_header.php';
    include 'official_header2.php';
?>
<div class="u_c_h_main_container">
    <div class="u_c_h_sub_container">
    <table>
  <thead>
    <th>Sr. No</th>
    <th>Complaint Id</th>
   
    <th>Date</th>
    <th>Time</th>
    <th>Crime Location</th>
    <th>Crime Type</th>
    <th>Description</th>
</thead>
<?php
    include 'config.php';
    
   
    $sql = "SELECT * FROM complaint";
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
          <td><?php echo $row['crime_location']; ?></td>
          <td><?php echo $row['type_of_crime']; ?></td>
          <td><?php echo substr($row['description'],0,100)."..."; ?></td>
          
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