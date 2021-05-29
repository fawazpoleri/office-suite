<?php include('admin_header.php');
include('connect.php');
$update=$_GET['clg_edit'];
 
$result=mysqli_query($con,"SELECT * FROM college where clg_id='$update'");
$rows=mysqli_fetch_array($result);
 
if(isset($_POST['submit']))                                              // edit designation
    {

 
 
 $college_name=$_POST['name'];
 $address=$_POST['address'];


mysqli_query($con,"UPDATE college SET clg_name ='$college_name',address='$address' WHERE clg_id='$update'");




echo "<script>alert('College Details updated');</script>";

 echo "<script>window.location.href='add-college.php';</script>";
}




?>

  <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><h4 class="page-header">Update College Details</h4></li>
        </ol>
 <!-- Breadcrumbs-->

        <div id="page-wrapper">
            <div class="row">
                
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-10">
                
                    <form role="form" method="POST">
                        <div class="form-group">
                            <label>College Name</label>
                            <input type="text" name="name"value="<?php echo $rows['clg_name'];?>" class="form-control">
                            
                        </div>
                        <div class="form-group">
                             <label>Address</label>
                            <input type="text" name="address" value="<?php echo $rows['address'];?>" class="form-control">
                            
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                       
                    </form>
                </div>
            </div>
            <br/>
                                                              <!--   view designation list -->
           
<?php include('footer.php');?>