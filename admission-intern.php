<?php include('admin_header.php');
      include('connect.php');
?>
 
    <div class="card mb-3">
          <div class="card-header">&nbsp;&nbsp;&nbsp;<a href="view-admission.php">View Admission</a>&nbsp;&nbsp;&nbsp;
           <center><h4> Internship Admission</h4></center></div>
           <div class="card-body">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required="">
                        </div>
                         <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" required="">
                           
                        </div>
                         <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" required="">    
                        </div>
                         <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Qualification</label>
                            <input type="text" name="qual" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>college Name</label>
                            <input type="text" name="college" class="form-control" required="">
                           
                        </div>
                        
                       <div class="form-group">
                            <label>Course</label>
                            <select name="course" class="form-control" required="">
                                <option value="">--- Select ---</option>
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
                        
                        <label>Joining Date Date</label>
                        <div class="input-group form-group date" data-provide="datepicker">
                            <input type="date" name="date" class="form-control" data-date-format="mm-dd-yyyy" placeholder="mm-dd-yyyy" required="">
                          <!--   <input type="date" id="birthday" name="birthday"> -->
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Course Fee</label>
                            <input type="text" name="fee" class="form-control" required="">
                        </div>
                       <center> <input type="submit" name="submit" class="btn btn-primary" value="Submit"></center>
                    </form>
                </div>
            </div>
            <div class="cliyerfix"></div>

            <!-- /.row -->
          <br><br><br><br>
      
<?php include('footer.php');


if(isset($_POST['submit']))                                            //add college
    {
      $name=$_POST['name'];
      $address=$_POST['address'];
      $phone=$_POST['phone'];
      $email=$_POST['email'];
      $qual=$_POST['qual'];
      $college=$_POST['college'];
      $course=$_POST['course'];
      $date=$_POST['date'];
      $fee=$_POST['fee'];
     


        mysqli_query($con,"INSERT INTO intern_candidate (course_id,name,address,email,phone,qual,college,joining_date) VALUES('$course','$name','$address','$email','$phone','$qual','$college','$date')");
       
        $last_id = $con->insert_id;
        
        mysqli_query($con,"INSERT INTO intern_fee (course_id,intern_id,total,due) VALUES('$course','$last_id','$fee','$fee')");
    
        echo "<script>alert('New Candidate Added');</script>";
   

 echo "<script>window.location.href='admission-intern.php';</script>";

    }






?>