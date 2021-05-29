<?php include('admin_header.php');
      include('connect.php');
      if(isset($_POST['add']))
      {
          $staff=$_POST['staff_id'];
          $salary=$_POST['salary'];
          $date=$_POST['salary_date'];
          mysqli_query($con,"INSERT INTO salary (staff_id,salary,date) VALUE ('$staff','$salary','$date')");
          echo "<script>alert('Salary Added');</script>";
          echo "<script>window.location.href='salary.php';</script>";
      }

?>
  <!-- Breadcrumbs-->
        
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">&nbsp;&nbsp;&nbsp;<a href="salary.php">View Salary</a>&nbsp;&nbsp;&nbsp;
           <center><h4> Add Salary Details</h4></center></div>
          <div class="card-body">
          <form method=POST >
            <label for="name">Staff Name</label>
            <select name="staff_id" id="staff_id" class='form-control'required>
            <option value="">--Select--</option>
            <?php 
                            $clg =mysqli_query($con,"SELECT * from staff");
                        while($rows=mysqli_fetch_assoc($clg))
                        {
                            $staff = $rows['staff_name'];
                        ?>
                        <option value="<?php echo $rows['staff_id'];?>"><?php echo $staff; ?></option>
                        <?php
                        }
                        ?>
            

            </select>
            <label for="salary">Salary Amount</label>
            <input type="text"name='salary' class='form-control'required="">
            <label for="date">Salary Date</label>
            <input type="date" name="salary_date" class='form-control'required><br>
            <input type="submit" name='add' value="Add"class='btn-info'>  
          </form>        

           
        </div>


      </div>
      <!-- /.container-fluid -->
      
<?php include('footer.php');?>