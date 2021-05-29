<?php include('admin_header.php');
      include('connect.php');
      $update=$_GET['intern'];

$result=mysqli_query($con,"SELECT *  FROM intern_candidate JOIN internship  ON intern_candidate.course_id=internship.course_id where intern_id='$update'");
      $rows=mysqli_fetch_array($result);

if(isset($_POST['submit']))                                            //update internship candiadte
    {
      $name=$_POST['name'];
      $address=$_POST['address'];
      $phone=$_POST['phone'];
      $email=$_POST['email'];
      $qual=$_POST['qual'];
      $college=$_POST['college'];
      $course=$_POST['course'];
      $date=$_POST['date'];
     


        mysqli_query($con,"UPDATE intern_candidate SET course_id='$course',name='$name',address='$address',email='$email',phone='$phone',qual='$qual',college='$college',joining_date='$date' WHERE intern_id='$update'");
    
     echo "<script>alert('Update Candidate Details');</script>";
   

 echo "<script>window.location.href='view-intern-admission.php';</script>";

    }


?>
  <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="view-admission.php">View Admission</a></li>
           <li class="breadcrumb-item active">Update Internship Candidate</li>
        </ol>
 <!-- Breadcrumbs-->
     <div class="row">
                <div class="col-sm-10">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required=""value="<?php echo $rows['name'];?>" >
                        </div>
                         <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" required=""value="<?php echo $rows['address'];?>">
                           
                        </div>
                         <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" required=""value="<?php echo $rows['phone'];?>">    
                        </div>
                         <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" required=""value="<?php echo $rows['email'];?>">
                        </div>
                        <div class="form-group">
                            <label>Qualification</label>
                            <input type="text" name="qual" class="form-control" required=""value="<?php echo $rows['qual'];?>">
                        </div>
                        <div class="form-group">
                            <label>college Name</label>
                            <input type="text" name="college" class="form-control" required=""value="<?php echo $rows['college'];?>">
                           
                        </div>
                        
                       <div class="form-group">
                            <label>Course</label>
                            <select name="course" class="form-control" required="">
                                <option value="<?php echo $rows['course_name'];?>"><?php echo $rows['course_name'];?></option>
                                <?php 
                            $course =mysqli_query($con,"SELECT * from internship");
                        while($rows=mysqli_fetch_assoc($course))
                        {
                            $course_name = $rows['course_name'];
                        ?>
                        <option value="<?php echo $rows['course_id'];?>"><?php echo $course_name; ?></option>
                        <?php
                        }
                        ?>

                                
                            </select>
                        </div>
                        <div class="form-group">
                        <label>Joining Date Date</label>
                        
                            <input type="date" name="date" class="form-control" value="<?php echo $rows['joining_date'];?>" required>
                           
                        </div>
                        <div class="form-group">
                       <center> <input type="submit" name="submit" class="btn btn-primary" value="Update"></center>
                     </div>
                    </form>
                </div>
            </div>
          

            <!-- /.row -->
          <br><br><br><br>
      
<?php include('footer.php');





?>