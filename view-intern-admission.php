<?php
    include 'admin_header.php';
?>
        <div class="card mb-3">
          <div class="card-header">
           <div style="float: right;">

<a href="view-admission.php"><button class="btn btn-secondary btn-sm">Project Candidate</button></a>

</div> 
         <center><h4> <b> Internship Admission </b></h4></center></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Course Details</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Qualification</th>
                        <th>College</th>
                        <th>Joining Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php 
        $result=mysqli_query($con,"SELECT *  FROM intern_candidate JOIN internship  ON intern_candidate.course_id=internship.course_id");
            while($row=mysqli_fetch_array($result))
            {
                ?>
               
                <tbody>
                  <tr>
                    <td><?php echo $row['name']; ?> </td>
                    <td><?php echo $row['course_name']; ?> </td>
                    <td><?php echo $row['address']; ?> </td>
                    <td><?php echo $row['email']; ?> </td>
                    <td><?php echo $row['phone']; ?> </td>
                    <td><?php echo $row['qual']; ?> </td>
                    <td><?php echo $row['college']; ?> </td>
                    <td><?php echo $row['joining_date']; ?> </td>
                   <td>
                     <a href="edit-intern-adm.php?intern=<?php echo $row['intern_id'];?>"><i class="fa fa-edit"></i></a> &nbsp;&nbsp;&nbsp;
                      <a href="view-admission.php?intern_id=<?php echo $row['intern_id'];?>"><i class="fa fa-trash"></i></a> 
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


      
      
<?php include('footer.php');?>