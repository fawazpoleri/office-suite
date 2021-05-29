<?php
    
    // $user= $_SESSION['login_id'];
    // include "connect.php";
    include "admin_header.php";
    $id=$_GET['id'];

    $result=mysqli_query($con,"SELECT * FROM task JOIN staff ON task.staff_id=staff.staff_id Where task.task_id='$id'");
    $rows= mysqli_fetch_array($result);
    if(isset($_POST['update']))                                            //edit task
    {  
        $name=$_POST['name'];
       
        $task=$_POST['task_name'];
        $type=$_POST['type'];
        $details=$_POST['task_details'];
        $strt=$_POST['strt'];
        $end=$_POST['end'];
        $status=$_POST['status'];
        $cmptd=$_POST['completed']; 
      
        mysqli_query($con,"UPDATE `task` SET `task_type`='$type',`task_name`='$task',`task_details`='$details',`strt_date`= '$strt',`end_date`='$end',`status`= '$status',`completion`='$cmptd' WHERE task_id='$id'");


        echo "<script>alert('Task Details Updated');</script>";
       echo "<script>window.location.href='view-task-list.php';</script>";
    }
?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
 
   <li class="breadcrumb-item"><a href="view-task-list.php">List Tasks</a>
 
  <li class="breadcrumb-item active">Tasks</li>
</ol>
<!-- Breadcrumbs-->

<div class="row">
        <div class="col-sm-10">
            <form role="form" method="post">
            <div class="form-group">
                    <label>Staff Name</label>
                    
                   <select name="name" class="form-control">
                   <option value="<?php echo $rows['staff_id'];?>"><?php echo $rows['staff_name'];?></option>
                   <?php 
                            $clg =mysqli_query($con,"SELECT * from staff");
                        while($row=mysqli_fetch_assoc($clg))
                        {
                            $staff = $row['staff_name'];
                        ?>
                        <option value="<?php echo $row['staff_id'];?>"><?php echo $staff; ?></option>
                        <?php
                        }
                        ?>
                   
                   </select>
                </div>
                
                <div class="form-group">
                    <label>Task Name</label>
                    <input type="text" name="task_name" class="form-control"value="<?php echo $rows['task_name'];?>"required>
                   
                </div>
                <div class="form-group">
                <label>Task Type</label>
                        <select name="type" class="form-control">
                          
                            <option value="student project">student project</option>     
                            <option value="Day to Day Task">Day to Day Task</option>
                            <option value="Client Project">Client Project</option> 
                            <option value="Student Session">Student Session</option>      
                        </select>
                        
                        
                        </div>
                <div class="form-group">
                    <label>Task Details</label>
                    <textarea name="task_details" class="form-control" rows="3"required><?php echo $rows['task_details'];?></textarea>
                </div>
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" name="strt" class="form-control" required value="<?php echo $rows['strt_date'];?>">
                </div>
                <div class="form-group">
                    <label>End Date</label>
                    <input type="date" class="form-control" name="end"required value="<?php echo $rows['end_date'];?>">
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

<?php include('footer.php');?>