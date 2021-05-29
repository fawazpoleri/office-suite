<?php include('admin_header.php');
      include('connect.php');
      $salary_id=$_GET['salary_id'];
      $result=mysqli_query($con,"select *  from salary JOIN staff ON salary.staff_id=staff.staff_id WHERE salary_id='$salary_id'");
      $rows=mysqli_fetch_array($result);
      if(isset($_POST['add']))
      {
          $staff=$_POST['staff_id'];
          $salary=$_POST['salary'];
          $date=$_POST['salary_date'];
          mysqli_query($con,"UPDATE salary SET salary='$salary',date='$date' WHERE salary_id='$salary_id'");
          echo "<script>alert('Salary updated');</script>";
          echo "<script>window.location.href='salary.php';</script>";
      }

?>
  <!-- Breadcrumbs-->
        
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
           <center><h4> Update Salary Detail</h4></center></div>

          <div class="card-body">
          <form method=POST >
            <label for="name">Staff Name</label>
           
            <input type="text" value="<?php echo $rows['staff_name'];?>" readonly class="form-control">
           

          
            <label for="salary">Salary Amount</label>
            <input type="text"name='salary' class='form-control'required=""value="<?php echo $rows['salary'];?>">
            <label for="date">Salary Date</label>
            <input type="date" name="salary_date" class='form-control'required value="<?php echo $rows['date'];?>"><br>
            <input type="submit" name='add' value="Update"class='btn-info'>  
          </form>        

           
        </div>


      </div>
      <!-- /.container-fluid -->
      
<?php include('footer.php');?>