<?php 		
	include('admin_header.php');
	include('connect.php');
	$update=$_GET['project'];		 
	$result=mysqli_query($con,"SELECT * FROM project_candi JOIN project ON project.project_id=project_candi.candidate_id JOIN college ON project_candi.clg_id=college.clg_id  where candidate_id='$update'");
	$rows=mysqli_fetch_array($result);

	if(isset($_POST['submit']))                                            //update project admission details
{
	$name=$_POST['name'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$college=$_POST['college'];
	$course=$_POST['course'];
	$pro_name=$_POST['Project'];
	$members=$_POST['members'];
	$details=$_POST['details'];
	$date=$_POST['date'];
	mysqli_query($con,"UPDATE  project_candi SET clg_id='$college',project_id='$pro_name',name='$name',address='$address',phone='$phone',email='$email',course_name='$course',total_members='$members',team_details='$details',joining_date='$details' where candidate_id='$update' ");
	echo "<script>alert('Update Candidate Details');</script>";
	echo "<script>window.location.href='view-admission.php';</script>";
}



?>
	<!-- Breadcrumbs-->
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="view-admission.php">view Admission</a>
					</li>
					<li class="breadcrumb-item active">Update Project Candidate Details</li>
					
				</ol>
 <!-- Breadcrumbs-->
		 <div class="row">
					<div class="col-sm-10">
							<form role="form" method="post">
									<div class="form-group">
											<label>Name</label><?php echo $rows['name'];?>
											<input type="text" name="name" class="form-control"value="<?php echo $rows['name'];?>" required="">
									</div>
										<div class="form-group">
											<label>Address</label>
											<input type="text" name="address" class="form-control"value="<?php echo $rows['address'];?>" required="">
											
									</div>
										<div class="form-group">
											<label>Phone</label>
											<input type="text" name="phone" class="form-control"value="<?php echo $rows['phone'];?>" required="">    
									</div>
										<div class="form-group">
											<label>Email</label>
											<input type="text" name="email" class="form-control"value="<?php echo $rows['email'];?>" required="">
									</div>
									<div class="form-group">
											<label>College</label>
											<select name="college" class="form-control"value="<?php echo $rows['clg_name'];?>" required="">
													<option value="">--- Select ---</option>
													<?php 
											$clg =mysqli_query($con,"SELECT * from college");
									while($row=mysqli_fetch_assoc($clg))
									{
											$clg_name = $row['clg_name'];
									?>
									<option value="<?php echo $row['clg_id'];?>"><?php echo $clg_name; ?></option>
									<?php
									}
									?>

											</select>
									</div>
									<div class="form-group">
											<label>Course Name</label>
											<input type="text" name="course" class="form-control"value="<?php echo $rows['course_name'];?>" required="">
											
									</div>
									
									<div class="form-group">
											<label>Project Name</label>
											<select name="Project" class="form-control" required="">
													<option value=""><?php echo $rows['project_name'];?></option>
														<?php 
											$project =mysqli_query($con,"SELECT * from project");
									while($pr=mysqli_fetch_assoc($project))
									{
											$project_name = $pr['project_name'];
									?>
									<option value="<?php echo $pr['project_id'];?>"><?php echo $project_name; ?></option>
									<?php
									}
									?>
													
											</select>
									</div>
										<div class="form-group">
											<label>Total members</label>
											<input type="text" name="members" class="form-control" required=""value="<?php echo $rows['total_members'];?>">     
									</div>
										<div class="form-group">
											<label>Team Details</label>
											<input type="text" name="details" class="form-control" required=""value="<?php echo $rows['team_details'];?>">    
									</div>
									<label>Joining Date Date</label>
									<div class="input-group form-group date" data-provide="datepicker">
												<input type="date" name="date" class="form-control" data-date-format="mm-dd-yyyy" placeholder="mm-dd-yyyy" required="">
											<div class="input-group-addon">
													<span class="glyphicon glyphicon-th"></span>
											</div>
									</div>
									<center> <input type="submit" name="submit" class="btn btn-primary" value="Update"></center>
							</form>
					</div>
			</div>
			<div class="cliyerfix"></div>

			<!-- /.row -->
		<br><br><br><br>
			
<?php include('footer.php');



?>