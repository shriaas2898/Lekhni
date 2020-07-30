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
  <?php
    if(isset($_POST["submit"])){
      print_r($_POST);
    try{
          //Create connection
          $conn = new mysqli("localhost","pma","pass","lekhni_db");
          //Check connection
          if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
          }

          $stmnt = $conn->prepare("INSERT INTO user (email,name,pass) values (?, ?, ?)");
          $stmnt->bind_param("sss", $email, $name ,$hashed_pass);

          $email = $_POST["email"];
          $name = $_POST["name"];
          $hashed_pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);

          $stmnt->execute();
          //Display message on succsessful registration
          echo "<script type='text/javascript'>alert('You have succsessfully registered!');
          window.location.href='login.php';</script>";
          $conn->close();
          die();
  } catch(Exception $e) {
    //Display message on unsuccsessful registration
    echo "<script type='text/javascript'>alert('We are not able to complete your registration, please try again later.');</script>";
  }
}
   ?>
</html>
