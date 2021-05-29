<?php include('admin_header.php');
include('connect.php');
?>

  <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><h4 class="page-header">Add College</h4></li>
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
                            <input type="text" name="college_name" class="form-control-sm" required>                  
                             <label>Address</label>
                            <input type="text" name="address" class="form-control-sm" required>                    
                            <button type="submit" name="college" class="btn btn-sm btn-primary">Save</button>
                       </div>
                    </form>
                </div>
            </div>
            <br/>
                                                              <!--   view college list -->
            <div class="row">
                <div class="col-sm-10">
                    <div class="panel panel-default">
                       <h4>College List</h4>
                        <!-- /.panel-heading -->
                      <!--   <div class="panel-body"> -->
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>College Name</th>
                                        <th>College Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

 <?php
        
         
        $result=mysqli_query($con,"select *  from college");
            while($clg=mysqli_fetch_array($result))
            {
                ?>               <tbody>
                                  <tr class="odd gradeX">
                                        <td><?php echo $clg['clg_id'];?></td>
                                        <td><?php echo $clg['clg_name'];?></td>
                                        <td><?php echo $clg['address'];?></td>
                                        <td><a href="add-college.php?clg_id=<?php echo $clg['clg_id'];?>"><i class="fa fa-trash"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                        <a href="edit-college.php?clg_edit=<?php echo $clg['clg_id'];?>"><i class="fa fa-edit"></i></a></td>
                                        </td>
                                        
                                    </tr>
                                   
                                </tbody>
                                 <?php
                             }
                             ?>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
   
<?php include('footer.php');


if(isset($_POST['college']))                                            //add college
    {
       $college=$_POST['college_name'];
       $clg_address=$_POST['address'];
       $sql= mysqli_query($con,"INSERT INTO college (clg_name,address) VALUES('$college','$clg_address')");
    
 if (mysqli_query($con, $sql)) 
 {
   echo "<script>alert('New College Added');</script>";
   

 echo "<script>window.location.href='add-college.php';</script>";
} else
 {
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

    }




if(isset($_GET['clg_id']))                                              //Delete college
    {
 $del=$_GET['clg_id'];

mysqli_query($con,"DELETE FROM  college where clg_id='$del'");




echo "<script>alert('College Deleted');</script>";

echo "<script>window.location.href='add-college.php';</script>";
}
?>