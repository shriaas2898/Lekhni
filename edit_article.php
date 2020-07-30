<?php
session_start();
if(!isset($_SESSION["user_id"])){
  header("Location: not_allowed.html");

}
// Function to add new article
  function add_article($conn){
    $stmnt = $conn->prepare("INSERT INTO articles (title,body,auth_id) values (?, ?, ?)");
    $stmnt->bind_param("ssi", $title,$body,$id);

    $title = $_POST["art_title"];
    $body = $_POST["art_body"];
    $id = (int) $_SESSION["user_id"];
    if($stmnt->execute()){
        echo "<script type='text/javascript'>alert('Changes have been saved!');
        window.location.href='index.php';</script>";
      }
      else{
        echo "<script type='text/javascript'>alert('Some error occured please try again.');</script>";
      }
  }


//Function to update article.
  function update_article($conn,$art_id){
    $stmnt = $conn->prepare("UPDATE articles SET title = ? , body = ?, modified = CURRENT_TIMESTAMP() WHERE id = ?");
    $stmnt->bind_param("ssi", $title,$body,$id);

    $title = $_POST["art_title"];
    $body = $_POST["art_body"];
    $id = (int) $art_id;
    if($stmnt->execute()){
        echo "<script type='text/javascript'>alert('Changes have been saved!');
        window.location.href='index.php';</script>";
      }
      else{
        echo "<script type='text/javascript'>alert('Some error occured please try again.');</script>";
      }
  }

//Function to delete current article.
  function delete_article($conn,$art_id){
    $stmnt = $conn->prepare("DELETE FROM articles WHERE id = ?");
    $stmnt->bind_param("i",$id);
    $id = (int) $art_id;
    if($stmnt->execute()){
        echo "<script type='text/javascript'>alert('succsessful deleted!');
        window.location.href='index.php';</script>";
      }
      else{
        echo "<script type='text/javascript'>alert('Some error occured please try again.');</script>";
      }
  }


try{
  //Create connection
  $conn = new mysqli("localhost","pma","pass","lekhni_db");
  //Check connection
  if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
  }
  $title ="";
  $body = "Your text here";
  $heading = "New Article";
  //If the article exists
  if(isset($_GET["ida"])){


  $art_id =   $_GET["ida"];
  $result = $conn->query("SELECT title, body,name,uid FROM articles a,user u WHERE id = $art_id AND auth_id = uid LIMIT 1");
  if($result){
      $row = $result->fetch_assoc();
      $title = $row['title'];
      $body = $row['body'];
      $time = $row['modified'];
      $author = $row['name'];
      $uid = $row["uid"];
      //Changing the heading of page
      $heading = "Editing: $title";
      $result->close();
  }
}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Lekhni Article</title>
  </head>
  <body>

    <div class="header">
      <a href="index.php" class="logo"> <img src="files/logo.png" alt="Lekhni" height="150"> </a>
      <div class="header-right">
        <a  href="index.php">Home</a>
        <a class="active" href="user.php">My Profile</a> <!--ToDo-->
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

    <div class="clearfix">
      <button type="button" class="cancelbtn" name="del">Delete</button>
      <button type="submit" class="signupbtn" name="submit">Save</button>
    </div>
  </div>
  </form>
  </body>
  <?php
if(isset($_GET["ida"])){
  if(isset($_POST["submit"])){
      update_article($conn,$art_id);
    }
  if(isset($_POST["del"])){
    delete_article($conn,$art_id);
  }
  }

  $conn->close();
}//End of try block
    catch(Exception $e) {
      //Display message on unsuccsessful registration
      echo "Error: " . $e->getMessage();
      //echo "<script type='text/javascript'>alert('We are not able to complete your registration, please try again later.');</script>";
    }

   ?>
  </html>
