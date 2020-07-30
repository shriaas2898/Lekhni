<?php
session_start();
$_SESSION[user_id] = -1;
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

    <div class="clearfix">
      <button type="submit" class="signupbtn" name="submit">Sign In</button>
    </div>
  </div>
  </form>
  </body>
  <?php
    if(isset($_POST["submit"])){
      print_r($_POST);
    //If passwords are not matching
    /*if($_POST["pass"] != $_POST["pass-repeat"]){
      die("Passwords do not match")
    }*/
    try{
          //Create connection
          $conn = new mysqli("localhost","pma","pass","lekhni_db");
          // set the PDO error mode to exception
          //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //Check connection
          if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
          }
          $email = $_POST["email"];
          $user_pass = $_POST['pass'];

          $result = $conn->query("SELECT uid, pass FROM user WHERE email = '$email' LIMIT 1");
          $row = $result->fetch_assoc();
          $stored_pass =$row["pass"];
          $id = $row["uid"];
          if (password_verify($user_pass,$stored_pass)){

            $_SESSION["user_id"] = $id;
            header("Location: index.php");
            echo "<script type='text/javascript'>alert('You have succsessfully registered!');</script>";
            die("Login succsessful");
          }


  } catch(Exception $e) {
    //Display message on unsuccsessful registration
    echo "Error: " . $e->getMessage();
    //echo "<script type='text/javascript'>alert('We are not able to complete your registration, please try again later.');</script>";
  }
}
   ?>
</html>
