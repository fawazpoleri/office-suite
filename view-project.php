<?php include('admin_header.php');
      include('connect.php');


if(isset($_GET['project_id']))                                              //Delete designation
    {
 $del=$_GET['project_id'];

mysqli_query($con,"DELETE FROM  project where project_id='$del' ");




echo "<script>alert('Project Deleted');</script>";

echo "<script>window.location.href='view-project.php';</script>";
}





?>
 
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
         <a href="add-project.php">Add Project</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <center><h4> Project List</h4></center></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Project Name</th>
                        <th>Language</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
              
 <?php 
        $result=mysqli_query($con,"select *  from project");
            while($project=mysqli_fetch_array($result))
            {
                ?> 
                <tbody>
                  <tr>
                    <td><?php echo $project['project_id'];?></td>
                    <td><?php echo $project['project_name'];?></td>
                    <td><?php echo $project['domain'];?></td>
                    <td><?php echo $project['details'];?></td>
                    <td>
                      <a href="edit-project.php?project_id=<?php echo $project['project_id'];?>"><i class="fa fa-edit"></i></a> || 
                      <a href="view-project.php?project_id=<?php echo $project['project_id'];?>"><i class="fa fa-trash"></i></a>  

                    </td>
                    
                  </tr>
              <?php
              }
              ?>   
                </tbody>
              </table>
            </div>
          </div>
       
        </div>


      </div>
      <!-- /.container-fluid -->
      
<?php include('footer.php');?>