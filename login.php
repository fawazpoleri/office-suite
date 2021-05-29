<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"])){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "connect.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["uname"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["uname"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["passwd"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["passwd"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT * FROM login WHERE uname = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $password1,$type,$staff_id);
                    if(mysqli_stmt_fetch($stmt)){
                        if($password1 === $password){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["login_id"] = $id;
                            $_SESSION["uname"] = $username;                            
                            $_SESSION["role"] = $type;                            
                            
                            // Redirect user to welcome page
                            if($type === 'ADMIN'){
                            header("location:index.php");
                            }
                            else if($type === 'STAFF') {
                           header("location:staff/staff-index.php");
                            }  

                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($con);
}
?>




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Futura Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body style="background-image: url('css/12.jpg');" >
<br><br><br>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><center>Futura Login</center></div>
       <p>Please fill in your credentials to login.</p>
      <div class="card-body">
        <form method="POST">
          <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?> ">
            <div class="form-label-group">
                <input type="text" name="uname" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>   
            </div>
          </div>
          <div class="form-group">
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <input type="password" class="form-control"  name="passwd" placeholder="Password"/>
               <span class="help-block"><?php echo $password_err; ?></span>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
         <input type="submit"class="btn btn-primary btn-block" value="Submit" name="submit" id="but_submit" />
          
        </form>
        <div class="text-center">
         
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  

</body>

</html>
