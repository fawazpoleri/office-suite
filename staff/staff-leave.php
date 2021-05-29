<?php
   
    include 'staff-header.php';
    if(isset($_POST['send']))                                               //leave requst
    {
        $type=$_POST['lv_type'];
        $reason=$_POST['reason'];
        $strt_date=$_POST['strt_date'];
        $end_date=$_POST['end_date'];
        mysqli_query($con,"INSERT INTO `leave`(`login_id`, `leave_type`, `reason`, `date_from`, `date_to`) VALUES ('$user','$type','$reason','$strt_date','$end_date')
        ");
        echo "<script>alert('Leave Applied');</script>";
        echo "<script>window.location.href='staff-leave.php';</script>";
    }

      if(isset($_GET['leave_id']))                                            //delete leave request
      {
        $del=$_GET['leave_id'];
  
     
        mysqli_query($con,"DELETE FROM `leave` WHERE leave_id='$del'");
        echo "<script>alert('Delete Leave Request');</script>";
        echo "<script>window.location.href='staff-leave.php';</script>";
      }                                                                    


 ?>  

<div class="card mb-3">
          <div class="card-header"><a href="#view">Leave Status&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;</a>
           Apply Leave</div>
          <div class="card-body">
          <form method=POST >
            <label for="name">Leave Type</label>
          <select name="lv_type"  class='form-control'required>
                <option value="">--Select--</option>
                <option value="Casual Leave">Casual Leave</option>
                <option value="Medical Leave">Medical Leave</option>
                <option value="Other">Other</option>
           
          </select>
            <label >Reason</label>
            <textarea name="reason"  cols="30" rows="5" required class='form-control'></textarea>
            
            <label for="date">Start Date</label>
            <input type="date" name="strt_date" class='form-control'required><br>
            <label for="date">End Date</label>
            <input type="date" name="end_date" class='form-control'required><br>
            <input type="submit" name='send' value="Send" class='btn-info'>  
          </form>        

           
        </div>


      </div>
      <br>

      <!-- View Applied leave -->
      <div id='view'>
       
       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           My Leave Request</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        
                        <th>Leave Type</th>
                        <th>Reason</th>
                        <th>Date From</th>
                        <th>Date To</th>                     
                        <th>Status</th>
                        <th>Action</th>
                      
                    </tr>
                </thead>
                <?php
                $result=mysqli_query($con,"SELECT * FROM `leave` WHERE login_id='$user'");
               
            while($row=mysqli_fetch_array($result))
            {
                ?>
                <tbody>
                  <tr>
                    <td><?php echo $row['leave_type'];?></td>
                    <td><?php echo $row['reason'];?></td>
                    <td><?php echo $row['date_from'];?></td>
                    <td><?php echo $row['date_to'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td><a href="staff-leave.php?leave_id=<?php echo $row['leave_id'];?>" <button class="button-btn-danger"><i class="fa fa-trash"></a></i></button></td>
                    
                    
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
      

      
      </div>
<?php include '../footer.php'; ?>