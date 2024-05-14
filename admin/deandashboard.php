<?php
    include 'official_header.php';
    include 'official_header2.php';
?>
<style>
.search-box-container{
    background-color: #fff;
    padding: 5px;
    margin: 0 0 5px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.13);
}
.search-box-container h4{
   font-size: 1.15rem;

}
.search-post{
    padding: 0;
}
.search-post .input-group input{
    color: #606060;
    width:200px;
    padding-left: 2px;
    height: 30px;
}
.search-post input:focus{
    box-shadow: none;
    border-color: red;
    outline: none;
    border-width: 1px;
    border-radius: 2px;
}
.search-post .btn{
  
    padding: 6px 8px;
    outline: none;
    
}


 
.search-post i.fa{
    font-size: 16px;
    color: #999999;
    line-height: 40px;
    float:right;
}
</style>
<div class="chiefdash_main_container">
    <div class="chiefdash_sub_container">
      <h2 class="heading_table_up">New Complaints</h2>
          <div class="search-box-container">
            <h4>Search  by complaint Id or Student Id</h4>
            <form class="search-post" action="search.php" method ="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search .....">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-danger">Search</button>
                    </span>
                </div>
            </form>
          </div>
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
  <?php
    include 'config.php';
    
   
    $sql = "SELECT * FROM complaint WHERE status='Pending'";
    $result = mysqli_query($conn, $sql) or die("Query failed.");
    if(mysqli_num_rows($result)>0){
        while($row= mysqli_fetch_assoc($result)){
                                   
                                
  ?>
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
         <td><a href="comp_action.php?comp_id=<?php echo $row['comp_id'];  ?> & std_id=<?php echo $row['studentid'];  ?>"><i class="fa-regular fa-pen-to-square"></i></a></td>

          
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