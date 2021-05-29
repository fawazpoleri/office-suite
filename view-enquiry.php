<?php include('admin_header.php');
     
      
if(isset($_GET['id']))                                              //Delete intern enquiry
{
$del=$_GET['id'];

mysqli_query($con,"DELETE FROM  intern_enquiry where id='$del' ");




echo "<script>alert('Internship Enquiry Deleted');</script>";

echo "<script>window.location.href='view-enquiry.php';</script>";
}

if(isset($_GET['enq_id']))                                              //Delete project enquiry
{
$del=$_GET['enq_id'];

mysqli_query($con,"DELETE FROM  project_enquiry where enq_id='$del' ");




echo "<script>alert('Project Enquiry Deleted');</script>";

echo "<script>window.location.href='view-enquiry.php';</script>";
}

?>


<section id="tabs" class="project-tab">
           
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Internship Enquiry</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Project Enquiry</a>
                               
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                
                            <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Internship Enquiry</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Qualification</th>
                        
                        <th>Place</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Enquiry Date</th>
                        <th>Details</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php
                $result=mysqli_query($con,"SELECT * FROM `intern_enquiry` JOIN internship ON intern_enquiry.course_id=internship.course_id");
                while($rows=mysqli_fetch_array($result))
            {
                ?> 
                <tbody>
                  <tr>
                    <td><?php echo $rows['name'];?></td>
                    <td><?php echo $rows['course_name'];?></td>
                    <td><?php echo $rows['qual'];?></td>
                    <td><?php echo $rows['address'];?></td>
                    <td><?php echo $rows['email'];?></td>
                    <td><?php echo $rows['phone'];?></td>
                    <td><?php echo $rows['date'];?></td>
                    <td><?php echo $rows['enq_details'];?></td>
                   
                    <td><a href="view-enquiry.php?id=<?php echo $rows['id'];?>"><button class=" btn-danger">Delete</a></button>
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
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Project Enquiry</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Topic</th>
                        <th>College</th>
                        <th>course</th>
                        <th>Place</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Enquiry Date</th>
                        <th>Details</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php
                $result=mysqli_query($con,"SELECT * FROM `project_enquiry` JOIN project ON project_enquiry.project_id=project.project_id");
                while($rows=mysqli_fetch_array($result))
            {
                ?> 
                <tbody>
                  <tr>
                    <td><?php echo $rows['name'];?></td>
                    <td><?php echo $rows['project_name'];?></td>
                    <td><?php echo $rows['college'];?></td>
                    <td><?php echo $rows['course'];?></td>
                    <td><?php echo $rows['address'];?></td>
                    <td><?php echo $rows['email'];?></td>
                    <td><?php echo $rows['phone'];?></td>
                    <td><?php echo $rows['date'];?></td>
                    <td><?php echo $rows['details'];?></td>
                    <td><a href="view-enquiry.php?enq_id=<?php echo $rows['enq_id'];?>"><button class=" btn-danger">Delete</a></button>
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
                            </div>
  
       
<?php include('footer.php');?>