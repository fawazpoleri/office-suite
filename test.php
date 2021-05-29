<?php 
	include "admin_header.php"; 

	$stu = new Student();
?>
<?php 
	// error_reporting(0);
	$dt = $_GET['dt'];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		 $attend = $_POST['attend'];
		 $attattend = $stu->updateAttendance($dt, $attend);
	}
?>
	<div class="container">
<?php 
	if (isset($attattend)) {
		echo $attattend;
	}
?>
<div class='alert alert-danger' style="display: none;"><strong>Error !</strong> Student Roll Missing !</div>
		<div class="card">
			<div class="card-header">
				<h2>
					<a class="btn btn-success" href="add.php">Add Student</a>
					<a class="btn btn-info float-right" href="date_view.php">Back</a>
				</h2>
			</div>

			<div class="card-body">
				<div class="card bg-light text-center mb-3">
					<h4 class="m-0 py-3"><strong>Date</strong>: <?php echo $dt; ?></h4>
				</div>
				<form action="" method="post">
					<table class="table table-striped">
						<tr>
							<th width="25%">S/L</th>
							<th width="25%">Student Name</th>
							<th width="25%">Student Roll</th>
							<th width="25%">Attendance</th>
	     
							<?php 
        $result=mysqli_query($con,"select * from staff join Attendance ON staff.staff_id=attendace.staff_id ");
            while($value=mysqli_fetch_array($result))
            {
                ?>  
<tr>
	<td><?php echo $i; ?></td>
	<td><?php echo $value['staff_name']; ?></td>
	<td><?php echo $value['staff_id']; ?></td>
	<td>
		<input type="radio" name="attend[<?php echo $value['staff_id']; ?>]" value="present" <?php if($value['attend'] == "present") {echo "checked";} ?>>P
		<input type="radio" name="attend[<?php echo $value['staff_id']; ?>]" value="absent" <?php if($value['attend'] == "absent") {echo "checked";} ?>>A
	</td>
</tr>
<?php  } ?>

						<tr>
							<td colspan="4" class="text-center">
								<input type="submit" name="submit" class="btn btn-primary px-5" value="Update">
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
<?php include("footer.php"); ?>

<?php

public function updateAttendance($con, $attend){
		foreach ($attend as $atn_key => $atn_value) {
			if ($atn_value == "present") {
				$query = "UPDATE tbl_attendance
						SET attend = 'present'
						WHERE roll = '".$atn_key."' AND att_time = '".$con."'";
				$data_update = $this->db->update($query);
			} elseif ($atn_value == "absent") {
				$query = "UPDATE tbl_attendance
						SET attend = 'absent'
						WHERE roll = '".$atn_key."' AND att_time = '".$con."'";
				$data_update = $this->db->update($query);
			}
		}

		if ($data_update) {
			$msg = "<div class='alert alert-success'><strong>Success !</strong> Attendance data updated successfully !</div>";
			return $msg;
		} else {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> Attendance data not updated !</div>";
			return $msg;
		}
	}

}

?>