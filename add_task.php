<?php include('admin_header.php');
        include('connect.php');
                    
            if(isset($_POST['add-task']))                                            //add projects
            {
            $staff=$_POST['staff'];
            $type=$_POST['type'];
            $task_name=$_POST['task_name'];
            $task_details=$_POST['task_details'];
            $strt_date=$_POST['strt_date'];
            $end_date=$_POST['end_date'];
          //  var_dump($staff,$type,$task_name,$task_details,$strt_date,$end_date);exit();
           
            
            mysqli_query($con,"INSERT INTO task (staff_id,task_type,task_name,task_details,strt_date,end_date) VALUES('$staff','$type','$task_name','$task_details','$strt_date','$end_date')");
            echo "<script>alert('New Task Added');</script>";


            echo "<script>window.location.href='add_task.php';</script>";

            }




?>
 <!-- Breadcrumbs-->
        <ol class="breadcrumb">
         
           <li class="breadcrumb-item"><a href="view-task-list.php">List Tasks</a>
         
          <li class="breadcrumb-item active">Tasks</li>
        </ol>
      <!-- Breadcrumbs-->
<center><h3 class="page-header">Add Task</h3></center>
       <div class="row">
                <div class="col-sm-10">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>Name</label>
                        <select name="staff" class="form-control">
                            <option value="">--- Select Name ---</option>
                            <?php 
                            $clg =mysqli_query($con,"SELECT * from staff");
                        while($rows=mysqli_fetch_assoc($clg))
                        {
                            $staff = $rows['staff_name'];
                        ?>
                        <option value="<?php echo $rows['staff_id'];?>"><?php echo $staff; ?></option>
                        <?php
                        }
                        ?>
              
                                 
                        </select>
                        <label>Task Type</label>
                        <select name="type" class="form-control">
                            <option value="">--- Select Name ---</option>
                            <option value="student project">student project</option>     
                            <option value="Day to Day Task">Day to Day Task</option>
                            <option value="Client Project">Client Project</option> 
                            <option value="Student Session">Student Session</option>      
                        </select>
                        
                        
                        </div>
                        <div class="form-group">
                            <label>Task Name</label>
                            <input type="text" name="task_name" class="form-control">
                           
                        </div>
                        <div class="form-group">
                            <label>Task Details</label>
                            <textarea name="task_details" class="form-control" rows="3"></textarea>
                        </div>
                        <label>Start Date</label>
                        <div class="input-group form-group date" data-provide="datepicker">
                            <input type="date" name="strt_date" class="form-control">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                        <label>End Date</label>
                        <div class="input-group form-group date" >
                            <input type="date" name="end_date"class="form-control">
                           
                        </div>
                        <input type="submit" name="add-task" class="btn btn-primary" value="ADD ">
                    </form>
                </div>
            </div>
            <div class="cliyerfix"></div>
      
<?php include('footer.php');?>