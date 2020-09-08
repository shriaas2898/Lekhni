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
    <title>Lekhni SignUp</title>
  </head>
  <body>

    <div class="header">
      <a href="index.php" class="logo"> <img src="files/logo.png" alt="Lekhni" height="150"> </a>
      <div class="header-right">
        <a  href="index.php">Home</a>
        <a class="active" href="#default">Sign Up</a>
        <a href="login.php">Sign In</a>

      </div>
    </div>


  <form action="register.php" method="post" style="border:1px solid #ccc; margin:10px 100px 10px 100px;">
    <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Display Name" name="name" required>

    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <a href="index.php"><button type="button" class="cancelbtn">Cancel</button></a>
      <button type="submit" class="signupbtn" name="submit">Sign Up</button>
    </div>
  </div>
  </form>
  </body>
<!--Footer-->
<footer >
  <span class="dev-credits">Made with ❤ by Aastha Shrivastava</span>
  </footer>

  <?php
    if(isset($_POST["submit"])){

    //Create Database Object
      $dbo = new DBOperation();
      //Checking existing email id
      $email = $_POST["email"];
      $result = $dbo->execute_query("SELECT uid, pass FROM user WHERE email = ? LIMIT 1",'s',$email);
      if($result[0]==1){
      echo "<script type='text/javascript'>alert('This account already exists');  window.location.href='register.php';</script>";
        
       }
    else{
      $name = $_POST["name"];
      $hashed_pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
      $result = $dbo->execute_update("INSERT INTO user ( email,name,pass) values (?, ?, ?)","sss", $email, $name ,$hashed_pass);
      var_dump($result);
      if($result){
      //Display message on succsessful registration
      echo "<script type='text/javascript'>alert('You have succsessfully registered!');
      window.location.href='login.php';</script>";
    }
    else{
      //Display message on unsuccsessful registration
      echo "<script type='text/javascript'>alert('We are not able to complete your registration, please try again later.');</script>";

    }
          }
      die();
}
   ?>
</html>
