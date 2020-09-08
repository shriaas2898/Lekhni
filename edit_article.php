<?php
session_start();
if(isset($_COOKIE['uid'])) $_SESSION['user_id'] = $_COOKIE['uid'];
if(!isset($_SESSION["user_id"])){
 header("Location: not_allowed.html");
}
require "database/db_operations.php";

// Function to add new article
  function add_article($dbo){
    $title = $_POST["art_title"];
    $body = $_POST["art_body"];
    $id = (int) $_SESSION["user_id"];
    $result = $dbo->execute_update("INSERT INTO articles (title,body,auth_id) values (?, ?, ?)","ssi", $title,$body,$id);

    
    if($result){
      echo "<script type='text/javascript'>alert('Article Added!');
        window.location.href='index.php';</script>";
      }
      else{
        echo "<script type='text/javascript'>alert('Some error occured please try again.');</script>";
      }
  }


//Function to update article.
  function update_article($dbo,$art_id){
    $title = $_POST["art_title"];
    $body = $_POST["art_body"];
    $id = (int) $art_id;
    $result = $dbo->execute_update("UPDATE articles SET title = ? , body = ?, modified = CURRENT_TIMESTAMP() WHERE id = ?","ssi", $title,$body,$id);
    if($result){
      echo "updated";
      var_dump($result);  
      echo "<script type='text/javascript'>alert('Changes have been saved!');
        window.location.href='index.php';</script>";
      }
      else{
        echo "<script type='text/javascript'>alert('Some error occured please try again.');</script>";
      }
  }

//Function to delete current article.
  function delete_article($dbo,$art_id){
    $id = (int) $art_id;
    $result = $dbo->execute_update("DELETE FROM articles WHERE id = ?","i",$id);
    if($result){
        echo "<script type='text/javascript'>alert('succsessfully deleted!');
        window.location.href='index.php';</script>";
      }
      else{
        echo "<script type='text/javascript'>alert('Some error occured please try again.');</script>";
      }
  }


try{
  //Create Database Object
  $dbo = new DBOperation();
  $title ="";
  $body = "Your text here";
  $heading = "New Article";
  $art_id = -1;
  //If the article exists
  if(isset($_GET["ida"])){
  $art_id = $_GET["ida"];
  
  $result = $dbo->execute_query("SELECT title, body,name,uid FROM articles a,user u WHERE id = ? AND auth_id = uid LIMIT 1","i",$art_id);
  if($result){
      $row = $result[1][0];
      $title = $row['title'];
      $body = $row['body'];
      $time = $row['modified'];
      $author = $row['name'];
      $uid = $row["uid"];
      //Changing the heading of page
      $heading = "Editing: $title";

    if($_SESSION["user_id"] != $uid){
    header("Location: not_allowed.html");
    die();
    }
  }
}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Lekhni Article add</title>
  </head>
  <body>

    <div class="header">
      <a href="index.php" class="logo"> <img src="files/logo.png" alt="Lekhni" height="150"> </a>
      <div class="header-right">
        <a  href="index.php">Home</a>
        <?php echo "<a clas='active' href='author.php?idu=".$_SESSION["user_id"]."'>My Articles</a>"; ?>
        <a href="logout.php">Sign Out</a>

      </div>
    </div>


  <form action="edit_article.php" id="edit_article_form" method="post" style="border:1px solid #ccc; margin:10px 100px 10px 100px;">
    <div class="container">
    <h1> <?php echo "$heading"; ?> </h1>
    <br>

    <label for="art_title"><b>Title</b></label><br>
    <input type="text" placeholder="Enter Title" name="art_title" required value='<?php echo "$title"; ?>'>

    <textarea  name="art_body" form="edit_article_form" rows="50" cols="150" required> <?php echo "$body"; ?> </textarea>
    <input type="hidden" value=" <?php echo "$art_id"; ?>" name="art_id">
    <div class="clearfix">
      <button type="submit" class="cancelbtn" name="del">Delete</button>
      <button type="submit" class="signupbtn" name="submit">Save</button>
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
var_dump($_POST);

 if($_POST["art_id"] != "-1"){
  
    update_article($dbo,$_POST["art_id"]);
    }
    else{
    add_article($dbo);
    }
}


if(isset($_POST["del"])){
  if($_POST["art_id"] != " "){
    delete_article($dbo,$_POST["art_id"]);
      }
  else{
    echo "<script type='text/javascript'>alert('Changes discarded.');
    window.location.href='index.php';</script>";
  }
}

}//End of try block
    catch(Exception $e) {
      //Display message on unsuccsessful registration
      echo "Error: " . $e->getMessage();
    }

   ?>
  </html>
