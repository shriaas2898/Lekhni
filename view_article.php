<?php
session_start();

//Retriving article based on query parameter.

try{
      //Create connection
      $conn = new mysqli("localhost","pma","pass","lekhni_db");
      //Check connection
      if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
      }
      $art_id =   $_GET["ida"];
      $result = $conn->query("SELECT title, modified,body,name,uid FROM articles a,user u WHERE id = $art_id AND auth_id = uid LIMIT 1");
      $row = $result->fetch_assoc();
      $title = $row['title'];
      $body = $row['body'];
      $time = $row['modified'];
      $author = $row['name'];
      $uid = $row["uid"];

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title></title>
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
            if($_SESSION["user_id"] == $uid){
              echo "<a  href='edit_article.php?ida=$art_id'>Edit Article</a>";
            }
          }
          else{
            echo '<a  href="register.php">Sign Up</a>';
            echo '<a href="login.php">Sign In</a>';
          }
         ?>

      </div>
    </div>
    <div class="container">

       <?php
       echo "<h1 class='art_title'>$title</h1>";
        echo "Last Modified: $time";
        ?>
        <p class="art_body"> <?php echo "$body"; ?> </p>
        <?php echo "By: $author"; ?>
    </div>

  </body>
  <?php
          $conn->close();
          $result->close();

  } catch(Exception $e) {
    //Display message on unsuccsessful registration
    echo "Error: " . $e->getMessage();
    //echo "<script type='text/javascript'>alert('We are not able to complete your registration, please try again later.');</script>";
  }

   ?>
</html>
