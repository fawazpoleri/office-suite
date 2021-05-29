<?php include('admin_header.php');
      include("connect.php");
      $course_id=$_GET['course_id'];
      $result=mysqli_query($con,"SELECT * FROM internship where course_id='$course_id'");
      $rows=mysqli_fetch_array($result);
     
if(isset($_POST['submit']))                         //update course details                                         
    {
      
       $Cname=$_POST['Cname'];
       $duration=$_POST['duration'];
       $Cdetails=$_POST['Cdetails'];
        mysqli_query($con,"UPDATE  internship SET course_name='$Cname',details='$Cdetails',duration='$duration' WHERE course_id='$course_id'");
     echo "<script>alert('New Course Added');</script>";
   

 echo "<script>window.location.href='view-course.php';</script>";

    }


?>

  <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          
           <li class="breadcrumb-item active">Update Course</li>
        </ol>
 <!-- Breadcrumbs-->
     <div class="row">
                <div class="col-sm-10">
                    <form role="form" method="POST" >
                        <div class="form-group">
                            <label>Course Name</label>
                            <input type="text" name="Cname" class="form-control" value="<?php echo $rows['course_name'];?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Duration</label>
                            <input type="text" name="duration" class="form-control"value="<?php echo $rows['duration'];?>" required="">   
                        </div>

                    
                        <div class="form-group">
                            <label>Course Details</label>
                            <input type="text" name="Cdetails" class="form-control"value="<?php echo $rows['details'];?>" required="" rows="5"> </textarea>    
                        </div>
                        
                       <center> <input type="submit" name="submit" class="btn btn-primary" value="UPDATE"></center>
                    </form>
                </div>
            </div>
            <div class="cliyerfix"></div> 
      
<?php include('footer.php');








?>