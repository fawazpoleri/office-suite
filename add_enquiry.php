<?php
    include('connect.php');
    include('admin_header.php');                    //add internship enquiry
    if(isset($_POST['Intern_Enq']))
    {
        $name=$_POST['name'];
        $course=$_POST['course'];
        $qual=$_POST['qual'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $date=$_POST['enquiry_date'];
        $details=$_POST['Details']; 
        mysqli_query($con,"INSERT INTO intern_enquiry (name,course_id,qual,address,phone,email,date,enq_details) VALUES('$name','$course','$qual','$address','$phone','$email','$date','$details')");
        echo "<script>alert('New Enquiry Added');</script>";
        echo "<script>window.location.href='add_enquiry.php';</script>";
    }
    if(isset($_POST['pjct_Enq']))                    // add projecy enquiry
    {
        $name=$_POST['name'];
        $project=$_POST['project']; 
        $clg=$_POST['clg'];
        $qual=$_POST['qual'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $date=$_POST['enquiry_date'];
        $details=$_POST['Details']; 
        

        $sql="INSERT INTO `project_enquiry`(`project_id`, `name`, `college`, `course`, `address`, `phone`, `email`, `date`, `details`) VALUES ('$project','$name','$clg','$qual','$address','$phone','$email','$date','$details')";
        echo "$sql";
    mysqli_query($con,$sql);

       
        echo "<script>alert('New Enquiry Added');</script>";
  
    echo "<script>window.location.href='add_enquiry.php';</script>";
    }
?>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

</head>
<body>


<ul class="nav nav-pills" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="pill" href="#home">Project Enquiry</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu1">Internship Enquiry</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="view-enquiry.php">View Enquiries</a>
    </li>
    <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="view-enquiry.php"><button>View Enquiries</button></a> -->
    
  </ul>

  <!-- Tab panes -->
   <!-- project Enquiry end -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
     

    <form role="form" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required="">
                        </div>
                
                       <div class="form-group">
                            <label>Project Name</label>
                            <select name="project" class="form-control" required="">
                                <option>--- Select ---</option>
                                <?php 
                            $course =mysqli_query($con,"SELECT * from project");
                        while($rows=mysqli_fetch_assoc($course))
                        {
                            $course_name = $rows['project_name'];
                        ?>
                        <option value="<?php echo $rows['project_id'];?>"><?php echo $course_name; ?></option>
                        <?php
                        }
                        ?>
                         <option value="other">--other--</option>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label>College Name</label>
                            <input type="text" name="clg" class="form-control" required="">
                           
                        </div>
                        <div class="form-group">
                            <label>Qualification</label>
                            <input type="text" name="qual" class="form-control" required="">
                           
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
                        <label>Enquiry Date</label>
                        <div class="input-group form-group date" data-provide="datepicker">
                            <input type="date" name="enquiry_date" class="form-control" data-date-format="mm-dd-yyyy" placeholder="mm-dd-yyyy" required="">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Enquiry Details</label>
                            <textarea name="Details" row="4" class="form-control"></textarea>
                           
                        </div>
                       
                        
                       <center> <input type="submit" name="pjct_Enq" class="btn btn-primary" value="Submit"></center>
                    </form>










    </div>
      <!-- project Enquiry end -->







    <!-- internship Enquiry -->
    <div id="menu1" class="container tab-pane fade"><br>
  
                <form role="form" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required="">
                        </div>
                
                       <div class="form-group">
                            <label>Course</label>
                            <select name="course" class="form-control" required="">
                                <option>--- Select ---</option>
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
                            <label>Qualification</label>
                            <input type="text" name="qual" class="form-control" required="">
                           
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
                        <label>Enquiry Date</label>
                        <div class="input-group form-group date" data-provide="datepicker">
                            <input type="date" name="enquiry_date" class="form-control" data-date-format="mm-dd-yyyy" placeholder="mm-dd-yyyy" required="">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Enquiry Details</label>
                            <textarea name="Details" row="4" class="form-control"></textarea>
                           
                        </div>
                       
                        
                       <center> <input type="submit" name="Intern_Enq" class="btn btn-primary" value="Submit"></center>
                    </form>
     <!-- internship Enquiry end -->
    </div>  
  </div>
</div>

<?php include('footer.php');?>