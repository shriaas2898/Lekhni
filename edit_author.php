<?php
session_start();
// -1 dentoes anoynamus user
if(!isset($_SESSION["user_id"])){
  $_SESSION['user_id'] = isset( $_COOKIE['uid'])? (int)$_COOKIE['uid']: -1;
  $_SESSION['role_id'] = isset( $_COOKIE['rid'])? (int)$_COOKIE['rid']: -1;
}
// Logged in user should either be admin or owner of the profile to edit it
$uid = isset($_GET["idu"])? (int)$_GET["idu"]: (int)$_SESSION['user_id'];
if(($_SESSION["user_id"]==-1)||( $_SESSION["role_id"]!=0 && $_SESSION["user_id"]!=$uid )){
 header("Location: not_allowed.html");
  die();
}

require "database/db_operations.php";

try{
  //Create Database Object
  $dbo = new DBOperation();
  $uid = $_SESSION["user_id"];  
  $result = $dbo->execute_query("SELECT email, name FROM user WHERE uid = ? LIMIT 1","i",$uid);
  if($result){
      $row = $result[1][0];
      $email = $row['email'];
      $name = $row['name'];
      
      //Changing the heading of page
      $heading = "Editing $name's Profile";

    if($_SESSION["user_id"] != $uid){
    header("Location: not_allowed.html");
    die();
    }
  }


 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo  $heading; ?></title>
  </head>
  <body>

  <div class="header">
      <a href="index.php" class="logo"> <img src="files/logo.png" alt="Lekhni" height="150"> </a>
      <div class="header-right">
          <a  href="index.php">Home</a>
          <a  href="edit_article.php">Add Article</a>
            <a  class='active' href='author.php/idu="$_SESSION["user_id"]."'>My Profile</a>
            <a href='logout.php'>Sign Out</a>
      </div>
 </div>

    <h1><?php echo  $heading; ?></h1>
    <form action="edit_author.php" method="post" style="border:1px solid #ccc; margin:10px 100px 10px 100px;">
  <div class="container">
    <p>You can edit your information here.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" value = " <?php echo "$email"; ?>" required>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Display Name" name="name" value = " <?php echo "$name"; ?>" required>

    <label for="pass"><b>New Password</b></label>
    <input type="password" placeholder="Enter new Password" name="pass" >

    <div class="clearfix">
      <a href="index.php"><button type="button" class="cancelbtn">Cancel</button></a>
      <button type="submit" class="signupbtn" name="submit">Save</button>
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
var_dump($_POST);

 //ToDo: Change according to role
 if(isset($_SESSION["user_id"])){

    //Update author.
    $name = $_POST["name"];
    $email = $_POST["email"];
    $id = (int) $uid;//ToDo change to get query
    print((bool)$_POST['pass']);
    if($_POST['pass']){
      
      $pass = $_POST['pass'];
      $result = $dbo->execute_update("UPDATE user SET email = ? , name = ?, pass = ?  WHERE uid = ?","sssi", $email,$name,$pass,$id);  
    }
    else{
    $result = $dbo->execute_update("UPDATE user SET email = ? , name = ?  WHERE uid = ?","ssi", $email,$name,$id);
    }
    var_dump($result);  
    if($result){
      echo "<script type='text/javascript'>alert('Changes have been saved!');
        window.location.href='author.php';</script>";
      }
      else{
        echo "<script type='text/javascript'>alert('Some error occured please try again. ');</script>";
      }
  
    }
    else{
    header("Location: not_allowed.html");
    }
}



}//End of try block
    catch(Exception $e) {
      //Display message on unsuccsessful registration
      echo "Error: " . $e->getMessage();
    }

   ?>
</html>
