<?php   include('admin_header.php');
        include('connect.php');
        $update=$_GET['staff'];
     

        $result=mysqli_query($con,"SELECT *  FROM staff JOIN designation ON staff.staff_id=designation.design_id JOIN login ON login.login_id=staff.staff_id WHERE staff.staff_id='$update'");
        $rows=mysqli_fetch_array($result);

        if(isset($_POST['submit']))                                 //updateS staff
        {
            $name=$_POST['name'];
            $designation=$_POST['designation'];
            $address=$_POST['address'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $date=$_POST['date'];
            $Username=$_POST['Username'];
            $Password=$_POST['Password'];
            $role=$_POST['role'];
             mysqli_query($con,"UPDATE `staff` SET `design_id`='$designation',`staff_name`='$name',`address`='$address',`phone`='$phone',`email`='$email',`join_date`='$date' WHERE staff_id='$update'");
            mysqli_query($con,"UPDATE `login` SET `uname`='$Username',`passwd`='$Password',`role`= '$role' WHERE login_id='$update'");
            
            echo "<script>alert('Staff Details Updated');</script>";
            echo "<script>window.location.href='view-staff.php';</script>";
        

        }




       ?>
  <!-- Breadcrumbs-->
        <ol class="breadcrumb">
         
          <li class="breadcrumb-item"><a href="view-staff.php">View Staff </a>
          <li class="breadcrumb-item active">Add Staff</li>
        </ol>
 <!-- staff adding form-->
     <div class="row">
                <div class="col-sm-10">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required=""value="<?php echo $rows['staff_name'];?>" readonly>
                        </div>

                        <div class="form-group">
                            <label>Designation</label>
                            <select name="designation" class="form-control" required="">
                                <!-- <option value="<?php echo $rows['designation'];?>"><?php echo $rows['designation'];?></option> -->
                               <?php 
                            $clg =mysqli_query($con,"SELECT * from designation");
                        while($row1=mysqli_fetch_assoc($clg))
                        {
                            $designation = $row1['designation'];
                        ?>

                        <option value="<?php echo $row1['design_id'];?>"><?php echo $designation; ?></option>
                        <?php
                        }
                        ?>
                            </select>
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
                        <label>Joining Date</label>
                         <div class="input-group form-group date" data-provide="datepicker">
                             <input type="date" name="date" class="form-control" value="<?php echo $rows['join_date'];?>"  required="">
                            
                        </div>
                        <div class="form-group">
                            <label>UserName</label>
                            <input type="text" name="Username" class="form-control" required=""value="<?php echo $rows['uname'];?>">    
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="Password" class="form-control" required=""value="<?php echo $rows['passwd'];?>">    
                        </div>
                        <div class="form-group">
                            <label>User Role</label>
                            <select name="role" class="form-control">

                                <option value="STAFF">STAFF</option>
                                <option value="ADMIN">ADMIN</option>
                            </select>   
                        </div>
                       
                       
                        
                       <center> <input type="submit" name="submit" class="btn btn-primary" value="update"></center>
                    </form>
                </div>
            </div>
            <div class="cliyerfix"></div>

            <!-- /.row -->
          <br><br><br><br>
      
<?php include('footer.php');?>