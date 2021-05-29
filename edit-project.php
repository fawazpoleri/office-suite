<?php 
      
      include('admin_header.php');
      include("connect.php");
      $project_id=$_GET['project_id'];
       $result= mysqli_query($con,"SELECT * FROM project where project_id='$project_id'");
      $rows= mysqli_fetch_array($result);

      
      if(isset($_POST['Update']))                                            
    {
       $pro_name=$_POST['name'];
       $pro_lang=$_POST['language'];
       $pro_des=$_POST['details'];
        mysqli_query($con,"UPDATE  project SET project_name='$pro_name',domain='$pro_lang',details='$pro_des' WHERE project_id='$project_id'");

     echo "<script>alert('Project Details Updated');</script>";
   

 echo "<script>window.location.href='view-project.php';</script>";

    }




?>
  <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          
          <li class="breadcrumb-item">
            <a href="view-project.php">View Project</a>
          </li>
           <li class="breadcrumb-item active">Update Projects</li>
        </ol>
 <!-- Breadcrumbs-->
     <div class="row">
                <div class="col-sm-10">
                    <form role="form" method="POST" >
                        <div class="form-group">
                            <label>Project Name</label>
                            <input type="text" name="name" value="<?php echo $rows['project_name'];?>" class="form-control" required="">
                        </div>
                        
                        <div class="form-group">
                            <label>Language</label>
                            <input type="text" name="language" class="form-control"value="<?php echo $rows['domain'];?>" required="">   
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="details" class="form-control" required="" rows="5" ><?php echo $rows['details'];?> </textarea>    
                        </div>

                       <center> <input type="submit" name="Update" class="btn btn-primary" value="Update"></center>
                    </form>
                </div>
            </div>
            <div class="cliyerfix"></div> 
      
<?php include('footer.php');?>
