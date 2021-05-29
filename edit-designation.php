<?php include('admin_header.php');
include('connect.php'); 
$update=$_GET['design_id'];

 
$result=mysqli_query($con,"SELECT * FROM designation where design_id='$update'");
$rows=mysqli_fetch_array($result);

if(isset($_POST['submit']))                                              // edit designation
    {
     
 $designation=$_POST['name'];

mysqli_query($con,"UPDATE  designation set designation ='$designation' where design_id='$update'");




echo "<script>alert('Designation updated');</script>";

echo "<script>window.location.href='add-designation.php';</script>";
}



?>

  <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          
          <li class="breadcrumb-item active"><h4 class="page-header">Update Designation</h4></li>
        </ol>
 <!-- Breadcrumbs-->

        
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-10">
                
                    <form role="form" method="POST">
                   
                      <div class="form-group">
                            <label>Designation Name</label>
                            <input type="text" name="name" value="<?php echo $rows['designation'];?>" class="form-control-sm">
                            
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                       
                    </form>
                </div>
            </div>
            <br/>
                                                        



<?php include('footer.php');?>

