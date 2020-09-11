
<?php
session_start();
error_reporting(E_ALL);
// -1 dentoes anoynamus user
if(!isset($_SESSION["user_id"])){
  $_SESSION['user_id'] = isset( $_COOKIE['uid'])? (int)$_COOKIE['uid']: -1;
  $_SESSION['role_id'] = isset( $_COOKIE['rid'])? (int)$_COOKIE['rid']: -1;
}
if($_SESSION['role_id'] == -1){
  header("Location: not_allowed.html");
  die();
}
$auth_id = isset($_GET["idu"])? (int)$_GET["idu"]: (int)$_SESSION['user_id'];

// echo "Get:";
// var_dump($_GET);
// echo "Session:";
// var_dump($_SESSION);
// echo "Cookie:";
// var_dump($_COOKIE);
// echo "uid:";
var_dump($uid);
  require "database/db_operations.php";

try{  
      //Create Database Object
      $dbo = new DBOperation();
      $result = $dbo->execute_query("SELECT name FROM user WHERE uid = ?","i",$auth_id);
      $name = $result[1][0]["name"];
      $result = $dbo->execute_query("SELECT title, modified,body,name,id FROM articles a,user u WHERE auth_id = uid AND uid = ? ORDER BY modified DESC","i",$auth_id);
      if($result[0]==-1){
        echo "<script type='text/javascript'>alert('We are not able to complete your registration, please try again later.');</script>";
      }
      if ($result[0]==1){
        $rows = $result[1];
      }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>User Profile</title>
  </head>
  <body>

<!-- Header -->
<div class="header">
      <a href="index.php" class="logo"> <img src="files/logo.png" alt="Lekhni" height="150"> </a>
      <div class="header-right">
        <a  href="index.php">Home</a>
        <?php
          if($_SESSION["user_id"] != -1){
            echo "<a  href='author.php?idu=".$_SESSION["user_id"]."'>My Articles</a>";
            echo "<a href='logout.php'>Sign Out</a>";
          }
          else{
            ?>
          <div class="dropdown">
             <a  class='active dropbtn' href='edit_author.php/."'>My Profile</a>
             <div class="dropdown-content">  
                <a  href="edit_article.php">Add Article</a>
                <a href='author.php/idu=".$_SESSION["user_id"]."'>My Articles</a>
                <a href='logout.php'>Sign Out</a>
              </div>    
          </div> 
           <?php
            }
         ?>
       </div>
   </div>

    <h1 class="heading"><u> <?php echo "$name"; ?> </u></h1>
    <div class="container">
      <?php 
      if(isset($rows)){
      foreach($rows as $row) {
        $id = $row["id"];
        ?>
      <div class="article_block">
        <h2><?php echo "<a href='view_article.php?ida=$id'>".$row['title']."</a>";  ?></h2>
        <?php echo "Written By:".$row['name']." On: ".$row['modified'].""; ?>
        <p> <?php echo htmlentities(substr($row['body'],0,250))."...<a href='view_article.php?ida=$id'>(Read More)</a>";
        
         ?> </p>
       </div>
        <hr>
<?php
      }// End of foreach
}// End of if
   else{
    ?>
    <h2>No articles yet!</h2>

      <?php
    }
    }


     catch(Exception $e) {
    //Display message on unsuccsessful retrival
    //echo "Error: " . $e->getMessage();
    echo "<script type='text/javascript'>alert('We are not able to complete your registration, please try again later.');</script>";
    }
    ?>
  </div>

<!--Footer-->
<footer >
  <span class="dev-credits">Made with ❤ by Aastha Shrivastava</span>
  </footer>  
</body>
  </html>
