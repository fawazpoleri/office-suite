<?php   include('admin_header.php');
        include('connect.php');

        if(isset($_POST['submit']))                                 //add staff
        {
            $name=$_POST['name'];
            $designation=$_POST['designation'];
            $gender=$_POST['gender'];
           
            $age=$_POST['age'];
          
            $address=$_POST['address'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $date=$_POST['date'];
            $Username=$_POST['Username'];
            $Password=$_POST['Password'];
            $role=$_POST['role'];

           $staff= mysqli_query($con,"INSERT INTO staff (design_id,staff_name,gender,age,address,phone,email,join_date) VALUES('$designation','$name','$gender','$age','$address','$phone','$email','$date')");

           $last_id = $con->insert_id;

     
           

            
            
            mysqli_query($con,"INSERT INTO login (uname,passwd,role,staff_id) VALUES('$Username','$Password','$role','$last_id')");
             echo "<script>alert('New Staff Added');</script>";
            echo "<script>window.location.href='add-staff.php';</script>";
        

        }




       ?>
 
 <!-- staff adding form-->
    <div class="card mb-3">
          <div class="card-header">
           <center><h4> Add Staff </h4></center></div>
           <div class="card-body">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <select name="designation" class="form-control" required="">
                                <option value="">--- Select ---</option>
                               <?php 
                            $clg =mysqli_query($con,"SELECT * from designation");
                        while($rows=mysqli_fetch_assoc($clg))
                        {
                            $designation = $rows['designation'];
                        ?>
                        <option value="<?php echo $rows['design_id'];?>"><?php echo $designation; ?></option>
                        <?php
                        }
                        ?>
                            </select>
                        </div>
                        <div class="form-group">
                       Gender &nbsp;:&nbsp;&nbsp;
                        <label for="male">Male</label>
                            <input type="radio" id="male" name="gender" value="male">&nbsp;&nbsp;&nbsp;
                            <label for="female">Female</label>  
                                <input type="radio" id="female" name="gender" value="female">
                          
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" name="age" class="form-control" required="">   
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
                        <label>Joining Date</label>
                         <div class="input-group form-group date" data-provide="datepicker">
                             <input type="date" name="date" class="form-control" data-date-format="mm-dd-yyyy" placeholder="mm-dd-yyyy" required="">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>UserName</label>
                            <input type="text" name="Username" class="form-control" required="">    
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="Password" class="form-control" required="">    
                        </div>
                        <div class="form-group">
                            <label>User Role</label>
                            <select name="role" class="form-control">
                                <option value="STAFF">STAFF</option>
                                <option value="ADMIN">ADMIN</option>
                            </select>   
                        </div>
                       
                       
                        
                       <center> <input type="submit" name="submit" class="btn btn-primary" value="Submit"></center>
                    </form>
                </div>
            </div>
            <div class="cliyerfix"></div>

            <!-- /.row -->
          <br><br><br><br>
      
<?php include('footer.php');?>
