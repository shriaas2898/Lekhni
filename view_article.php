<?php
session_start();
if(isset($_COOKIE['uid'])) $_SESSION['user_id'] = $_COOKIE['uid'];
require "database/db_operations.php";
//Retriving article based on query parameter.
try{
      //Create Database Object
       $dbo = new DBOperation();
      $art_id = (int)$_GET["ida"];
      $result = $dbo->execute_query("SELECT title, modified,body,name,uid FROM articles a,user u WHERE id = ? AND auth_id = uid LIMIT 1","i",$art_id);
      if($result[0]==-1){
        die("Internal Error occured");
      }
      if ($result[0]==0){
        header("Location: not_found.html");
        die();
      }
      else{
      if ($result[0]==1){
        $row = $result[1][0];
      }
    }
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
    <title> <?php echo "$title"; ?> </title>
  </head>
  <body>
    <!-- Header -->
    <div class="header">
      <a href="index.php" class="logo"> <img src="files/logo.png" alt="Lekhni" height="150"> </a>
      <div class="header-right">
        <a class="active" href="index.php">Home</a>
        <?php
          if($_SESSION["user_id"] == -1){
            echo '<a  href="register.php">Sign Up</a>';
            echo '<a href="login.php">Sign In</a>';
          }
          else{
            ?>
          <div class="dropdown">
             <a  class='dropbtn' href='edit_author.php?idu=<?php echo $_SESSION["user_id"];?>'>My Profile</a>
             <div class="dropdown-content">  
                <a  href="edit_article.php">Add Article</a>
                <a href='author.php?idu=<?php echo $_SESSION["user_id"];?>'>My Articles</a>
                <a href='logout.php'>Sign Out</a>
              </div>    
          </div> 
           <?php
            }
         ?>
       </div>
   </div>


    <div class="article_block">

       <?php
       echo "<h1 class='art_title'>$title</h1>";
        echo "<span>Last Modified: $time</span>";
        ?>
        <p class="art_body"> <?php echo "$body"; ?> </p>
        <span ><?php echo "Written By : <a href='author.php?idu=$uid'>$author</a>"; ?></span>
    </div>
<!--Footer-->
<footer >
  <span class="dev-credits">Made with ❤ by Aastha Shrivastava</span>
  </footer>
  </body>
  <?php
   $dbo->destroy_conn();

  } catch(Exception $e) {
    //Display message on unsuccsessful registration
    echo "Error: " . $e->getMessage();
    //echo "<script type='text/javascript'>alert('We are not able to complete your registration, please try again later.');</script>";
  }

   ?>
</html>
