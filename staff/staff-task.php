<?php
     
    include 'staff-header.php';
    
    
?>
   <!-- DataTables Example -->
   <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table">
            </i>&nbsp;&nbsp;&nbsp;Task Lists</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Task Details</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>  
                        <th>Completed %</th>
                        <th>Action</th>
                    </tr>
                </thead>
                            
 <?php 
        $result=mysqli_query($con,"SELECT * FROM task JOIN staff ON task.staff_id=staff.staff_id Where staff.staff_id='$user'"); // todo
            while($rows=mysqli_fetch_array($result))
            {
                ?> 
                <tbody>
                  <tr>
                    <td><?php echo $rows['task_name'];?></td>
                    <td><?php echo $rows['task_details'];?></td>
                    <td><?php echo $rows['strt_date'];?></td>
                    <td><?php echo $rows['end_date'];?></td>
                    <td><?php echo $rows['status'];?></td>
                    <td><?php echo $rows['completion'];?></td>
                    
                    <td>
                      <a href="staff-edit-task.php?task_id=<?php echo $rows['task_id'];?>"><button class="btn btn-secondary btn-sm">EDIT </button></a>                     
                    </td>
                  </tr>
                </tbody>
                <?php
            }
            ?>
              </table>
            </div>
          </div>
         <!--  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
        </div>


      </div>
      <!-- /.container-fluid -->
      
<?php include('../footer.php');?>