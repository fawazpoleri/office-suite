<?php
    
    include "staff-header.php";
    $task_id=$_GET['task_id'];
    $result= $result=mysqli_query($con,"SELECT * FROM task JOIN staff ON task.staff_id=staff.staff_id Where task.task_id='$task_id'");
    $rows= mysqli_fetch_array($result);

    if(isset($_POST['update']))                                            //edit task
    {  
        $status=$_POST['status'];
        $cmptd=$_POST['completed']; 
        mysqli_query($con,"UPDATE task SET status='$status',completion='$cmptd' WHERE task_id='$task_id'");
        echo "<script>alert('Task Details Updated');</script>";
        echo "<script>window.location.href='staff-task.php';</script>";
    }
?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
 
   <li class="breadcrumb-item"><a href="staff-task.php">List Tasks</a>
 
  <li class="breadcrumb-item active">Tasks</li>
</ol>
<!-- Breadcrumbs-->

<div class="row">
        <div class="col-sm-10">
            <form role="form" method="post">
                
                <div class="form-group">
                    <label>Task Name</label>
                    <input type="text" name="task_name" class="form-control"value="<?php echo $rows['task_name'];?>" readonly>
                   
                </div>
                <div class="form-group">
                    <label>Task Details</label>
                    <textarea name="task_details" class="form-control" rows="3" readonly=""><?php echo $rows['task_details'];?></textarea>
                </div>
               
                <div class="form-group">
                <label>Status</label>
                    <select name="status" class='form-control'>
                    <option value="<?php echo $rows['status'];?>"><?php echo $rows['status'];?></option>
                    <option value="Not Started">Not Started</option>
                    <option value="Pending">Pending</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                    
                    </select>
                    </div>
                    <div class="form-group">
                    <label>Completed %</label>
                    <input type="text" name="completed" class="form-control"value="<?php echo $rows['completion'];?>">
                   
                </div>

                <input type="submit" name="update" class="btn btn-primary" value="Update ">
            </form>
        </div>
    </div>
    <div class="cliyerfix"></div>

<?php include('../footer.php');?>