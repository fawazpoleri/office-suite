<?php
include "admin_header.php";
$id=$_GET['id'];


?>

<form action="" method="post">
		<div class="card">
			<div class="card-header">
          <center>  <h4 class="m-0 py-2"><?php echo "$id";?></h4></center>
           
			</div>

			<div class="card-body">
				
			
					<table class="table table-striped">
						<tr>
							<th width="25%">Staff ID</th>
							<th width="25%">Staff Name</th>
							
							<th width="25%">Attendance</th>
						</tr>
                           
                        <?php 
        $result=mysqli_query($con,"select * from attendance JOIN staff ON attendance.staff_id=staff.staff_id WHERE date='$id'");
            while($rows=mysqli_fetch_array($result))
            {
                ?>  
    
<tr>

	
	<td><?php echo $rows['staff_id']; ?></td>
	<td><?php echo $rows['staff_name']; ?></td>
    <td>
    
    	Present &nbsp;&nbsp;<input type="radio" name="attendance">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	Absent &nbsp;&nbsp;<input type="radio" name="attendance">

   
</td>
  
</tr>

<?php }
            ?>
			
						
					</table>
					<center><button class="btn btn-primary btn-sm">Update</button></center>
				</form>
			</div>
		</div>
	</div>

    <?php include 'footer.php'; ?>