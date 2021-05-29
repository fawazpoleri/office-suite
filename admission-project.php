<?php include('admin_header.php');
      include('connect.php');
?>

    
    <div class="card mb-3">
          <div class="card-header">&nbsp;&nbsp;&nbsp;    <a href="view-admission.php">view Admission</a>&nbsp;&nbsp;&nbsp;
           <center><h4> Project Admission</h4></center></div>
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
                            <label>College</label>
                            <select name="college" class="form-control" required="">
                                <option value="">--- Select ---</option>
                                <?php 
                            $clg =mysqli_query($con,"SELECT * from college");
                        while($rows=mysqli_fetch_assoc($clg))
                        {
                            $clg_name = $rows['clg_name'];
                        ?>
                        <option value="<?php echo $rows['clg_id'];?>"><?php echo $clg_name; ?></option>
                        <?php
                        }
                        ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Course Name</label>
                            <input type="text" name="course" class="form-control" required="">
                           
                        </div>
                        
                       <div class="form-group">
                            <label>Project Name</label>
                            <select name="Project" class="form-control" required="">
                                <option value="">--- Select ---</option>
                                 <?php 
                            $project =mysqli_query($con,"SELECT * from project");
                        while($rows=mysqli_fetch_assoc($project))
                        {
                            $project_name = $rows['project_name'];
                        ?>
                        <option value="<?php echo $rows['project_id'];?>"><?php echo $project_name; ?></option>
                        <?php
                        }
                        ?>
                                
                            </select>
                        </div>
                         <div class="form-group">
                            <label>Total members</label>
                            <input type="number" name="members" class="form-control" required="">     
                        </div>
                         <div class="form-group">
                            <label>Team Details</label>
                            <textarea name="details" rows="4" class="form-control" required=""></textarea>      
                        </div>
                        <label>Joining Date Date</label>
                        <div class="input-group form-group date" data-provide="datepicker">
                             <input type="date" name="date" class="form-control" data-date-format="mm-dd-yyyy" placeholder="mm-dd-yyyy" required="">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Project Fee</label>
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
       $college=$_POST['college'];
      $course=$_POST['course'];
      $pro_name=$_POST['Project'];
      $members=$_POST['members'];
      $details=$_POST['details'];
     $date=$_POST['date'];
     $total=$_POST['fee'];
     $due=$total;


        mysqli_query($con,"INSERT INTO project_candi (clg_id,project_id,name,address,phone,email,course_name,total_members,team_details,joining_date) VALUES('$college','$pro_name','$name','$address','$phone','$email','$course','$members', '$details','$date')");
 
     $last_id = $con->insert_id;
     
     mysqli_query($con,"INSERT INTO project_fee (candidate_id,clg_id,project_id,total,due) VALUES('$last_id','$college','$pro_name','$total',$due)");
    echo "<script>alert('New Candidate Added');</script>";
 echo "<script>window.location.href='admission-project.php';</script>";

    }


?>