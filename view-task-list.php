<?php include('admin_header.php');
      include('connect.php');
?>
  <!-- Breadcrumbs-->
        
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>&nbsp;&nbsp;&nbsp;<a href="add_task.php">Add Task</a>&nbsp;&nbsp;&nbsp;
            Task Lists</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Assigned To</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        
                        <th>Completed %</th>
                       
                        <th>Action</th>
                    </tr>
                </thead>
                            
 <?php 
        $result=mysqli_query($con,"SELECT * FROM task JOIN staff ON task.staff_id=staff.staff_id");
            while($rows=mysqli_fetch_array($result))
            {
                ?> 
      
                <tbody>
                  <tr>
                    <td><?php echo $rows['task_name'];?></td>
                    <td><?php echo $rows['staff_name'];?></td>
                    <td><?php echo $rows['strt_date'];?></td>
                    <td><?php echo $rows['end_date'];?></td>
                    <td><?php echo $rows['status'];?></td>
                    <td><?php echo $rows['completion'];?></td>
                  
                    <td>
                      <a href="edit-task.php?id=<?php echo $rows['task_id'];?>"><i class="fa fa-edit"> </i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="view-task-list.php?task=<?php echo $rows['task_id'];?>"><i class="fa fa-trash"></a></i>
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
      
<?php include('footer.php');?>


<?php



if(isset($_GET['task']))                                              //Delete designation
    {
 $id=$_GET['task'];

mysqli_query($con,"DELETE FROM  task where task_id='$id' ");




echo "<script>alert('task Deleted');</script>";

echo "<script>window.location.href='view-task-list.php';</script>";
}




?>