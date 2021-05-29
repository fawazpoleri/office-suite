<?php include 'admin_header.php';
?>
<div class="card mb-3">
          <div class="card-header">
           <a href="intern-fee.php"> Intern Candidate Fee</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <center><h4><b>   Project Candidate Fee   </center></b></h4> </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Project Name</th>
                        <th>College</th>
                        <th>course</th>
                        <th>Total Fee</th>
                        <th>Amount Paid</th>
                        <th>Paid Date</th>
                        <th>Amount Due </th>
                        
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
                    <td><?php echo $rows['project_name'];?></td>
                    <td><?php echo $rows['clg_name'];?></td>
                    <td><?php echo $rows['project_name'];?></td>
                    <td><?php echo $rows['total'];?></td>
                    <td><?php echo $rows['paid'];?></td>
                    <td><?php echo $rows['date'];?></td>
                    <td><?php echo $rows['due'];?></td>
                   
                    <td><a href="edit-project-fee.php?id=<?php echo $rows['fee_id'];?>"><i class="fa fa-edit"></i></a>
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
      
    </div>
   
  </div>
  <?php include 'footer.php'; ?>