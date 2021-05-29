<?php include 'admin_header.php';
      include 'connect.php';
?>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">

            <a href="add-course.php">Add Course</a><center><h4> Internship Course List </h4></center>
           </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Course Name</th>
                        <th>Course Details</th>
                        <th>Duration</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
              
 <?php 
        $result=mysqli_query($con,"select *  from internship");
            while($intern=mysqli_fetch_array($result))
            {
                ?> 
                <tbody>
                  <tr>
                    <td><?php echo $intern['course_id'];?></td>
                    <td><?php echo $intern['course_name'];?></td>
                   
                    <td><?php echo $intern['details'];?></td>
                     <td><?php echo $intern['duration'];?></td>
                    <td>
                      <a href="edit-course.php?course_id=<?php echo $intern['course_id'];?>"><i class="fa fa-edit"></i></a> || 
                      <a href="view-course.php?course_id=<?php echo $intern['course_id'];?>"><i class="fa fa-trash"></i></a>
                    </td>
                    
                  </tr>
              <?php
              }
              ?>   
                </tbody>
              </table>
            </div>
          </div>
       
        </div>


      </div>
      <!-- /.container-fluid -->
      
<?php include 'footer.php';


if(isset($_GET['course_id']))                                              //Delete designation
    {
 $del=$_GET['course_id'];

mysqli_query($con,"DELETE FROM  internship where course_id='$del' ");




echo "<script>alert('Course Deleted');</script>";

echo "<script>window.location.href='view-course.php';</script>";
}



?>