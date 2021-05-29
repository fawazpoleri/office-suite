<?php 
      
      include 'admin_header.php';
          
      if(isset($_GET['leave_id']))            //approve
      {
        $id=$_GET['leave_id'];
        mysqli_query($con,"UPDATE `leave` SET `status`='Approved' WHERE leave_id='$id'");
      }

        if(isset($_GET['id']))                  //reject leave
      {
          $id=$_GET['id'];
         mysqli_query($con,"UPDATE `leave` SET `status`='Rejected' where leave_id='$id'");
        }

   if(isset($_GET['delete']))                                            //delete leave request
        {
          $del=$_GET['delete'];
    
       
          mysqli_query($con,"DELETE FROM `leave` WHERE leave_id='$del'");
          echo "<script>alert('Delete Leave Request');</script>";
         echo "<script>window.location.href='view-leave.php';</script>";
        }                                                                    
  
  
?>
  <!-- Breadcrumbs-->
        
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
           <center><h4>Leave Requests</h4></center>
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Staff Name</th>
                        <th>Leave Type</th>
                        <th>Reason</th>
                        <th>Date From</th>
                        <th>Date To</th>  
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                $result=mysqli_query($con,"SELECT * FROM `leave` JOIN login ON leave.login_id=login.login_id");
                while($rows=mysqli_fetch_array($result))
            {
                ?> 
               
                <tbody>
                  <tr>
                  
                    <td><?php echo $rows['uname'];?></td>
                    <td><?php echo $rows['leave_type'];?></td>
                    <td><?php echo $rows['reason'];?></td>
                    <td><?php echo $rows['date_from'];?></td>
                    <td><?php echo $rows['date_to'];?></td>
                    <td><?php echo $rows['status'];?></td>
                    
                    <td>
                        <a href="view-leave.php?leave_id=<?php echo $rows['leave_id'];?>"><button class="btn btn-primary btn-sm">Approve </button></a>&nbsp;&nbsp;&nbsp;&nbsp;

                        <a href="view-leave.php?id=<?php echo $rows['leave_id'];?>"><button class="btn btn-danger btn-sm">Reject </button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <a href="view-leave.php?delete=<?php echo $rows['leave_id'];?>"> <button class="button-btn-danger"><i class="fa fa-trash"></a></i></button>
                  </tr>
                 
                </tbody>
                <?php
            }
            ?>
              </table>
            </div>
          </div>
       
        </div>


      </div>
      <!-- /.container-fluid -->
      
<?php include('footer.php');?>