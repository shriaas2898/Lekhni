//ToDo: Add link for user profile
<?php
session_start();
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
        <a class="active" href="index.php">Home</a>
        <?php
          if(isset($_SESSION["user_id"])){
            echo "<a  href='user.php/id'>My Profile</a>";//TODO
            echo "<a href='logout.php'>Sign Out</a>";
          }
          else{
            echo '<a  href="register.php">Sign Up</a>';
            echo '<a href="login.php">Sign In</a>';
          }
         ?>

      </div>
    </div>



    <div class="container">
      <h3>Main Page content</h3>
  </div>

  </body>
  </html>
