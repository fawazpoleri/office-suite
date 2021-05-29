<?php include 'admin_header.php';
?>
<div class="card mb-3">
          <div class="card-header">
           <a href="project-fee.php">Project Candidate Fee</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <h4> <center><b>Intern Candidate Fee </center></b>  </h4></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Course Name</th>
                        <th>Total Fee</th>
                        <th>Amount Paid</th>
                        <th>Paid Date</th>
                        <th>Amount Due </th>
                        
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php
                $result=mysqli_query($con,"SELECT * FROM `intern_fee` JOIN internship ON intern_fee.course_id=internship.course_id JOIN intern_candidate ON intern_fee.intern_id=intern_candidate.intern_id");
                while($rows=mysqli_fetch_array($result))
            {
                ?> 
                <tbody>
                  <tr>
                    <td><?php echo $rows['name'];?></td>
                    <td><?php echo $rows['course_name'];?></td>
                    <td><?php echo $rows['total'];?></td>
                    <td><?php echo $rows['paid'];?></td>
                    <td><?php echo $rows['date'];?></td>
                    <td><?php echo $rows['due'];?></td>
                   
                    <td><a href="edit-intern-fee.php?id=<?php echo $rows['id'];?>"><button class="btn btn-primary btn-sm">Edit</button></a>
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