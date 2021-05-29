<?php include('admin_header.php');?>






  <!-- Breadcrumbs-->
        
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <center><h4>All Attendance</h4></center>
            <div style="float: right;"><a href="upload-attendance.php">
              <button class="btn btn-secondary btn-sm">Upload Attendance</button></a>
            </div>
              
            </div>

          <div class="card-body">
            <div class="table-responsive">
            <form action="" method="post">
					<table class="table table-striped">
						<tr>
							<th width="30%">S/L</th>
							<th width="50%">Attendance Date</th>
							<th width="20%">Action</th>
       
                            <?php 
        $result=mysqli_query($con,"select DISTINCT date from attendance ORDER BY date");
        $i=0;
            while($rows=mysqli_fetch_array($result))
            {$i++;
                ?>  
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $rows['date']; ?></td>
							<td>
							<a class="btn btn-primary btn-sm" href="attendance-bydate.php?id=<?php echo $rows['date']; ?>">View</a>
							</td>
						</tr>
<?php  } ?>
					</table>
				</form>
            </div>
          </div>
       
        </div>


      </div>
      <!-- /.container-fluid -->
      
<?php include('footer.php');?>