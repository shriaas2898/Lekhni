<?php
session_start();
if(isset($_COOKIE['uid'])) $_SESSION['user_id'] = $_COOKIE['uid'];
require "database/db_operations.php";
// If user is already loggedin
if(isset($_SESSION["user_id"])){
header("Location: logout.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Lekhni Sign In</title>
  </head>
  <body>

    <div class="header">
      <a href="index.php" class="logo"> <img src="files/logo.png" alt="Lekhni" height="150"> </a>
      <div class="header-right">
        <a  href="index.php">Home</a>
        <a  href="register.php">Sign Up</a>
        <a class="active" href="#">Sign In</a>

      </div>
    </div>


  <form action="login.php" method="post" style="border:1px solid #ccc; margin:10px 100px 10px 100px;">
    <div class="container">
    <h1>Sign In</h1>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required>
    
    <label for="remember"><b>Remembr Me</b></label>
    <input type="checkbox" name="remember">

    <div class="clearfix">
      <button type="submit" class="signupbtn" name="submit">Sign In</button>
    </div>
  </div>
  </form>


<!--Footer-->
<footer >
  <span class="dev-credits">Made with ❤ by Aastha Shrivastava</span>
  </footer>

  </body>
  <?php
    if(isset($_POST["submit"])){
    try{
          //Create Database Object
          $dbo = new DBOperation();
          $email = $_POST["email"];
          $user_pass = $_POST['pass'];
          $result = $dbo->execute_query("SELECT uid, pass FROM user WHERE email = ? LIMIT 1","s",$email);
          if($result[0]==1)
          {$row = $result[1][0];
          $stored_pass =$row["pass"];
          $id = $row["uid"];
        
          if (password_verify($user_pass,$stored_pass)){

            $_SESSION["user_id"] = $id;
            if(isset($_POST["remember"])){
            setcookie("uid",$id, time() + (86400 * 30));
            }
            echo "<script type='text/javascript'>alert('You have succsessfully logged-in!');
            window.location.href='index.php';
            </script>";
            
            die("Login succsessful");
          }
        }
        // If credentials are invalid and `die()` isn't executed
            echo "<script type='text/javascript'>alert('The email or password you have entered does not match our records.
             \n Please try again.');
             </script>";
            

  } catch(Exception $e) {
    //Display message on unsuccsessful registration
    echo "Error: " . $e->getMessage();
    //echo "<script type='text/javascript'>alert('We are not able to complete your registration, please try again later.');</script>";
  }
}
   ?>
</html>
