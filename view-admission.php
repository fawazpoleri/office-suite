<?php 
      include 'admin_header.php';
      include 'connect.php';
      if(isset($_GET['project']))             //Delete project Admission
        {
           $del=$_GET['project'];
            mysqli_query($con,"DELETE FROM  project_candi where candidate_id='$del' ");
            echo "<script>alert('Project Candidate Deleted');</script>";
            echo "<script>window.location.href='view-admission.php';</script>";
        }

      if(isset($_GET['intern_id']))             //Delete Internship Admission
      {
          $del=$_GET['intern_id'];
          mysqli_query($con,"DELETE FROM  intern_candidate where intern_id='$del' ");
          echo "<script>alert('Internship Candidate Deleted');</script>";
          echo "<script>window.location.href='view-intern-admission.php';</script>";
      }
?>

        
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
          <div style="float: right;"> 
            <a href="view-intern-admission.php"><button class="btn btn-secondary btn-sm">Internship Candidate</button></a>
             </div>
      <center>  <h4><b>  Project Admission List</b></h4></center></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Topic</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>College</th>
                        <th>Course</th>
                        <th>Total Members</th>
                        <th>Team details</th>
                        <th>Joining Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
               <?php 
                   $result=mysqli_query($con,"SELECT * FROM project_candi JOIN project ON project_candi.project_id=project.project_id JOIN college ON project_candi.clg_id=college.clg_id");
                    while($row=mysqli_fetch_array($result))
                    {
                ?>
                <tbody>
                  <tr>
                    <td><?php echo $row['name']; ?> </td>
                    <td><?php echo $row['project_name']; ?> </td>
                    <td><?php echo $row['address']; ?> </td>
                    <td><?php echo $row['phone']; ?> </td>
                    <td><?php echo $row['email']; ?> </td>
                    <td><?php echo $row['clg_name']; ?> </td>
                    <td><?php echo $row['course_name']; ?> </td>
                    <td><?php echo $row['total_members']; ?> </td>
                     <td><?php echo $row['team_details']; ?> </td>
                      <td><?php echo $row['joining_date']; ?> </td>
                   <td>
                     <a href="edit-proj-adm.php?project=<?php echo $row['candidate_id'];?>"><i class="fa fa-edit"></i></a> &nbsp;&nbsp;&nbsp;
                      <a href="view-admission.php?project=<?php echo $row['candidate_id'];?>"><i class="fa fa-trash"></i></a>
                    </td>
                    
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
     
      <br><br><br><br><br>
        <!-- internship candidate view -->



      
      
<?php include('footer.php');?>