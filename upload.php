<?php
include 'connect.php';


if (isset($_POST['submit'])) 
{
 //Import uploaded file to Database
 $handle = fopen($_FILES['filename']['tmp_name'], "r");
 while(($data = fgetcsv($handle)) !== FALSE){
 $sql = "INSERT into attendace (attend_id, login_id, date, attendance)
  values('".$data[0]."', '".$data[1]."', '".$data[2]."', '".$data[3]."')";
 
  mysqli_query($con, $sql) ;
}
}





?>



<html>
 <head>
    
 </head>
 <body>
   <form  method="post" enctype="multipart/form-data">
   <div>
    <label>Import CSV File:</label>
    <input type="file"  name="filename" id="filename">
    <button type="submit" id="submit" name="submit">Upload</button>
   </div>
  </form>
 <body>
</html>