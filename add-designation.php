<?php

include('admin_header.php');
include('connect.php');
if(isset($_POST['designation']))                                            //add Designation
    {
       $designation=$_POST['designation_name'];
        mysqli_query($con,"INSERT INTO designation (designation) VALUES('$designation')");
     echo "<script>alert('New Designation Added');</script>";
   

 echo "<script>window.location.href='add-designation.php';</script>";

    }


if(isset($_GET['design_id']))                                              //Delete designation
    {
 $del=$_GET['design_id'];

mysqli_query($con,"DELETE FROM  designation where design_id='$del' ");




echo "<script>alert('Designation Deleted');</script>";

echo "<script>window.location.href='add-designation.php';</script>";
}




?>

  <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><h4 class="page-header">Add Designation</h4></li>
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
                            <label>Designation Name</label>
                            <input type="text" name="designation_name" class="form-control-sm" required>                      
                            <button type="submit" name="designation" class="bs-popover-bottom">Save</button>
                       </div>
                    </form>
                </div>
            </div>
            <br/>
                                                              <!--   view designation list -->
            <div class="row">
                <div class="col-sm-10">
                    <div class="panel panel-default">
                       <h4>Designation List</h4>
                        <!-- /.panel-heading -->
                      <!--   <div class="panel-body"> -->
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Designation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

 <?php
        
         
        $result=mysqli_query($con,"select *  from designation");
            while($dsign=mysqli_fetch_array($result))
            {
                ?>               <tbody>
                                  <tr class="odd gradeX">
                                        <td><?php echo $dsign['design_id'];?></td>
                                        <td><?php echo $dsign['designation'];?></td>
                                        <td><a href="add-designation.php?design_id=<?php echo $dsign['design_id'];?>"><i class="fa fa-trash"></i></a>&nbsp;&nbsp;&nbsp;

                                         <a href="edit-designation.php?design_id=<?php echo $dsign['design_id'];?>"><i class="fa fa-edit"></i></a> </td>

                                       

                                        
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
   








<?php include('footer.php');?>
 




