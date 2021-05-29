<?php
      include('admin_header.php');
      include('connect.php');
      if(isset($_POST['staff_id']))
      {
        $staff_id=$_GET['staff_id'];

        
        mysqli_query($con,"DELETE FROM staff where staff_id='$staff_id' ");


        echo "<script>alert(' Delete Staff');</script>";
        echo "<script>window.location.href='view-staff.php';</script>";
      }
?>
 
 
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Staff Lists</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Joining Date</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
  <?php 
        $result=mysqli_query($con,"SELECT *  FROM staff JOIN designation ON staff.staff_id=designation.design_id JOIN login ON login.staff_id=staff.staff_id");
        while($staff=mysqli_fetch_array($result))
          {
  ?> 
               <tbody>
                  <tr>
                    <td><?php echo $staff['staff_id'];?></td>
                    <td><?php echo $staff['staff_name'];?></td>
                    <td><?php echo $staff['designation'];?></td>
                    <td><?php echo $staff['gender'];?></td>
                    <td><?php echo $staff['Age'];?></td>
                    <td><?php echo $staff['address'];?></td>
                    <td><?php echo $staff['phone'];?></td>
                    <td><?php echo $staff['email'];?></td>
                    <td><?php echo $staff['join_date'];?></td>
                    <td><?php echo $staff['uname'];?></td>
                    <td><?php echo $staff['passwd'];?></td>
                    <td>
                      


<a href="edit-staff.php?staff=<?php echo $staff['staff_id'];?>"><i class="fa fa-edit"></i></a> || <a href="view-staff.php?staff_id=<?php echo $staff['staff_id'];?>"><i class="fa fa-trash"></i></a>

                    </td>
                    
                  </tr>
                 
                </tbody>
    <?php } ?>
              </table>    
              </table>
            </div>
          </div>
         <!--  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
        </div>


      </div>
      <!-- /.container-fluid -->
      
<?php include('footer.php');?>