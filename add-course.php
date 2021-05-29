<?php include('admin_header.php');
      include("connect.php");
?>
 
<div class="card mb-3">
          <div class="card-header">

           <a href="view-course.php">View Course</a>
           <center><h4> Add Course </h4></center>
           </div>
        
          <div class="card-body">
                    <form role="form" method="POST" >
                        <div class="form-group">
                            <label>Course Name</label>
                            <input type="text" name="Cname" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Duration</label>
                            <input type="text" name="duration" class="form-control" required="">   
                        </div>

                    
                        <div class="form-group">
                            <label>Course Details</label>
                            <textarea name="Cdetails" class="form-control" required="" rows="5"> </textarea>    
                        </div>
                        
                       <center> <input type="submit" name="submit" class="btn btn-primary btn-sm" value="ADD"></center>
                    </form>
                </div>
            </div>
            <div class="cliyerfix"></div> 
      
<?php include('footer.php');

 
if(isset($_POST['submit']))                                            //add projects
    {
       $Cname=$_POST['Cname'];
       $duration=$_POST['duration'];
       $Cdetails=$_POST['Cdetails'];
        mysqli_query($con,"INSERT INTO internship (course_name,details,duration) VALUES('$Cname','$Cdetails','$duration')");
     echo "<script>alert('New Course Added');</script>";
   

 echo "<script>window.location.href='add-course.php';</script>";

    }







?>