<?php include 'admin_header.php';

$id=$_GET['id'];
if(isset($_POST['update']))
{   
    $project=$_POST['Project'];
    $total=$_POST['total'];
    $paid=$_POST['paid'];
    $date=$_POST['date'];
   
    $due=$total-$paid;
    if($due=='0')
    {
      $due='completed';
    }
    mysqli_query($con,"UPDATE `project_fee` SET `project_id`='$project',`total`='$total',`paid`='$paid',`date`='$date',due='$due' WHERE fee_id='$id'");
    echo "<script>alert('Fee Details Updated');</script>";
   echo "<script>window.location.href='project-fee.php';</script>";
}
  if(isset($_GET['del'])){
 
    mysqli_query($con,"DELETE FROM project_fee WHERE id='$id'");
    echo "<script>alert('Delete Fee Details');</script>";
   echo "<script>window.location.href='project-fee.php';</script>";
 }
?>
<div class="card mb-3">
          <div class="card-header">
          
         <center><b> Update Project Candidate Fee   </center></b> </div>
          <div class="card-body">
            <div class="table-responsive">
            <form method="post">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Project Name</th>
                        <th>Total Fee</th>
                        <th>Amount Paid</th>
                        <th>Paid Date</th>
                       
                        
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php
                 $result=mysqli_query($con,"SELECT * FROM `project_fee` JOIN project ON project_fee.project_id=project.project_id JOIN project_candi ON project_fee.candidate_id=project_candi.candidate_id JOIN college ON project_fee.clg_id=college.clg_id");
                while($rows=mysqli_fetch_array($result))
            {
                ?> 
                <tbody>
                  <tr>
                    <td><?php echo $rows['name'];?></td>
                    <td>
                    <select name="Project" class="form-control" required>
                                <option value=""><?php echo $rows['project_name'];?></option>
                                 <?php 
                            $project =mysqli_query($con,"SELECT * from project");
                        while($row=mysqli_fetch_assoc($project))
                        {
                            $project_name = $row['project_name'];
                        ?>
                        <option value="<?php echo $row['project_id'];?>"><?php echo $project_name; ?></option>
                        <?php
                        }
                        ?>
                                
 </select>
                    
                    </td>
                    <td><input type="text" name="total" class="form-control"required value="<?php echo $rows['total'];?>"></td>
                    <td><input type="text" name="paid" class="form-control"required value="<?php echo $rows['paid'];?>"></td>
                    <td><input type="date" name="date" class="form-control"required value="<?php echo $rows['date'];?>"></td>
                   
                    <td>
                    <input type="submit" name="update" id="update" class="btn btn-primary btn-sm" value="Update" required="required" >
                    
                        <a href=".php?enq_id=<?php echo $rows[''];?>"><button class="btn btn-danger btn-sm"></a>Delete</button>
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