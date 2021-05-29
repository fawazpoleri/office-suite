<?php include('admin_header.php');
      include("connect.php");


      if(isset($_POST['submit']))                                            //add projects
      {
         $pro_name=$_POST['name'];
         $pro_lang=$_POST['language'];
         $pro_des=$_POST['details'];
          mysqli_query($con,"INSERT INTO project (project_name,domain,details) VALUES('$pro_name','$pro_lang','$pro_des')");
       echo "<script>alert('New Project Added');</script>";
     
  
   echo "<script>window.location.href='add-project.php';</script>";
  
      }
  


?>
  

        <div class="card mb-3">
          <div class="card-header">&nbsp;&nbsp;&nbsp; <a href="view-project.php">View Project</a>&nbsp;&nbsp;&nbsp;
           <center><h4> Add Projects</h4></center></div>
          <div class="card-body">
                    <form role="form" method="POST" >
                        <div class="form-group">
                            <label>Project Name</label>
                            <input type="text" name="name" class="form-control" required="">
                        </div>
                        
                        <div class="form-group">
                            <label>Language</label>
                            <input type="text" name="language" class="form-control" required="">   
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="details" class="form-control" required="" rows="5"> </textarea>    
                        </div>

                       <center> <input type="submit" name="submit" class="btn btn-primary" value="ADD"></center>
                    </form>
                </div>
            </div>
            <div class="cliyerfix"></div> 
      
<?php include('footer.php');

 






?>