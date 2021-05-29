<?php
    
      include('staff-header.php');
     $result=mysqli_query($con,"SELECT *  FROM staff WHERE staff_id='$user' ");
     $resu=mysqli_query($con,"SELECT *  FROM login WHERE login_id='$user' ");
$rows=mysqli_fetch_array($resu);
$row=mysqli_fetch_array($result);

      
?>
 
 
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-user"></i>
            My Profile
         </div>
          <div class="card-body">
            <div class="table-responsive">
             <table border="1" class="table table-bordered">
 <tr align="center">
<td colspan="2" style="font-size:20px;color:blue">
 <?php echo $row['staff_name'];?></td></tr>

    <tr>
  
    <th width="50%"> Gender</th>
    <td width="50%"><?php  echo $row['gender'];?></td>
  </tr>
     <tr>
  
    <th width="50%"> Age</th>
    <td width="50%"><?php  echo $row['Age'];?></td>
  </tr>
     <tr>
  
    <th width="50%"> Address</th>
    <td width="50%"><?php  echo $row['address'];?></td>
  </tr>
    <tr>
  
    <th width="50%"> Email</th>
    <td width="50%"><?php  echo $row['email'];?></td>
  </tr>
  <tr>
  
    <th width="50%"> Phone</th>
    <td width="50%"><?php  echo $row['phone'];?></td>
  </tr>
   <tr>
  
    <th width="50%"> Join Date</th>
    <td width="50%"><?php  echo $row['join_date'];?></td>
  </tr>
  
  <tr>
  
    <th width="50%"> Username</th>
    <td width="50%"><?php  echo $rows['uname'];?></td>
  </tr>
   <tr>
  
    <th width="50%"> Password</th>
    <td width="50%"><?php  echo $rows['passwd'];?></td>
  </tr>
 
 

</table>

              
            </div>
          </div>
         <!--  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
        </div>


      </div>
      <!-- /.container-fluid -->
      
<?php include('../footer.php');?>