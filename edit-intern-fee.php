<?php include 'admin_header.php';

$id=$_GET['id'];
if(isset($_POST['submit']))
{   
    $course=$_POST['course'];
    $total=$_POST['total'];
    $paid=$_POST['paid'];
    $date=$_POST['date'];
   
    $due=$total-$paid;
    if($due=='0')
    {
      $due='completed';
    }
    mysqli_query($con,"UPDATE `intern_fee` SET `course_id`='$course',`total`='$total',`paid`='$paid',`date`='$date',due='$due' WHERE id='$id'");
    echo "<script>alert('Fee Details Updated');</script>";
   echo "<script>window.location.href='intern-fee.php';</script>";
}
  if(isset($_GET['del'])){
 
    mysqli_query($con,"DELETE FROM intern_fee WHERE id='$id'");
    echo "<script>alert('Delete Fee Details');</script>";
   echo "<script>window.location.href='intern-fee.php';</script>";
 }
?>
<div class="card mb-3">
          <div class="card-header">
        
           <center><b>Update Intern Candidate Fee </center></b>  </div>
          <div class="card-body">
            <div class="table-responsive">
            <form method="POST"> 
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Course Name</th>
                        <th>Total Fee</th>
                        <th>TotalAmount Paid</th>
                        <th>Paid Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
             
                <?php
                $result=mysqli_query($con,"SELECT * FROM `intern_fee` JOIN internship ON intern_fee.course_id=internship.course_id JOIN intern_candidate ON intern_fee.intern_id=intern_candidate.intern_id WHERE intern_fee.id='$id'");
                while($rows=mysqli_fetch_array($result))
            {
                ?> 
                 
                <tbody>
                  <tr>
                    <td><?php echo $rows['name'];?></td>
                    <td>                  
                          <select name="course"  required=""class="form-control">
                                    <option value=""></option>
                                  <?php 
                                      $course =mysqli_query($con,"SELECT * from internship");
                                      while($row=mysqli_fetch_assoc($course))
                                      {
                                          $course_name = $row['course_name'];
                                      ?>
                                      <option value="<?php echo $row['course_id'];?>"><?php echo $course_name; ?></option>
                                      <?php
                                      }
                                  ?>						
                          </select>					
				        	</td>
                    <td><input type="text" name="total" value="<?php echo $rows['total'];?>"required class="form-control"></td>
                    <td><input type="text" name="paid"value="<?php echo $rows['paid'];?>"required class="form-control"></td>                  
                    <td><input type="date" name="date" value="<?php  $rows['date'];?>" required class="form-control"></td>
                    <td><input type="submit" value="Update" name="submit"  class="btn btn-sm btn-primary">                   
                  
					            <a href="edit-intern-fee.php?del=<?php echo $rows['id'];?>"><i class="fa fa-trash"></i></a>
                    </td>
                    
                  </tr>
                 
                </tbody>
                <?php
            }
            ?>
              </table>
              </form> 
            </div>
          </div>
         <!--  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
        </div>


      </div>
      
    </div>
   
  </div>

  <?php include 'footer.php'; ?>