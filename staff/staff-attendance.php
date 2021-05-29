<?php   include 'staff-header.php' ; ?>
  <!-- Breadcrumbs-->
        
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Attendance</div>
          <div class="card-body">
            <div class="table-responsive">


            <table class="table table-striped">
						<tr>
							<th width="30%">Date</th>
							<th width="50%">Attendance Date</th>
              <?php
                $result=mysqli_query($con,"SELECT * FROM attendance JOIN staff ON attendance.staff_id=staff.staff_id WHERE staff.staff_id='$user'");
                while($rows=mysqli_fetch_array($result))
            {
                ?> 
						<tr>
							<td><?php echo $rows['date']; ?></td>
							<td><?php echo $rows['attendance']; ?></td>
							
						</tr>
<?php  } ?>
					</table>
            </div>
          </div>
       
        </div>


      </div>
      <!-- /.container-fluid -->
      




   
      
<?php include('../footer.php');?>