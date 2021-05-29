<?php include('admin_header.php');
      include('connect.php');
      
if(isset($_GET['id']))                                              //Delete designation
{
$del=$_GET['id'];

mysqli_query($con,"DELETE FROM  salary where salary_id='$del' ");




echo "<script>alert('Salary Deletails Deleted');</script>";

echo "<script>window.location.href='salary.php';</script>";
}

?>
  <!-- Breadcrumbs-->
        
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <a href="add-salary.php">Add Salary</a>&nbsp;&nbsp;&nbsp;
            <center><h4>Salary Details</h4></center></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Staff Name</th>
                        <th>Salary Amount</th>
                        <th>Paid Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php 
        $result=mysqli_query($con,"select *  from salary JOIN staff ON salary.staff_id=staff.staff_id");
            while($row=mysqli_fetch_array($result))
            {
                ?> 
               
                <tbody>
                  <tr>
                    <td><?php echo $row['staff_name'];?></td>
                    <td><?php echo $row['salary'];?></td>
                    <td><?php echo $row['date'];?></td> 
                    <td>
                    <a href="edit-salary.php?salary_id=<?php echo $row['salary_id'];?>"><i class="fa fa-edit"></i></a> || <a 
                      <a href="salary.php?id=<?php echo $row['salary_id'];?>"><i class="fa fa-trash"></i></a>
                    </td>
                    

                  </tr>
                 
                </tbody>
                <?php
            }
            ?>
              </table>
            </div>
          </div>
       
        </div>


      </div>
      <!-- /.container-fluid -->
      
<?php include('footer.php');?>