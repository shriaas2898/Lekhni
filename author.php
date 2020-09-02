
<?php
session_start();
if(!(isset($_SESSION["user_id"]))){
  header("Location: not_allowed.html");
  die();
}
error_reporting(E_ALL);
/*if(!(isset($_SESSION["user_id"]) && ($_SESSION["user_id"] == $_GET["idu"]))){
  header("Location: not_allowed.html");
  die();
}*/
try{   //Create connection
      $conn = new mysqli("localhost","pma","pass","lekhni_db");
      //Check connection
      if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
      }
      $auth_id = $_SESSION["user_id"];
      $result = $conn->query("SELECT title, modified,body,name,id FROM articles a,user u WHERE auth_id = uid AND uid = $auth_id ORDER BY modified DESC");
      $rows = $result->fetch_all(MYSQLI_ASSOC);

      //Since Author is common for all the articles.
      $name = $rows[0]["name"];
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>User Profile</title>
  </head>
  <body>

    <div class="header">
      <a href="index.php" class="logo"> <img src="files/logo.png" alt="Lekhni" height="150"> </a>
      <div class="header-right">
          <a  href="index.php">Home</a>
          <a  href="edit_article.php">Add Article</a>
            <a  class='active' href='author.php/idu=".$_SESSION["user_id"]."'>My Articles</a>
            <a href='logout.php'>Sign Out</a>
      </div>
    </div>


    <h1 class="heading"><u> <?php echo "$name"; ?> </u></h1>
    <div class="container">
      <?php foreach($rows as $row) {
        $id = $row["id"];
        ?>
      <div class="article_block">
        <h2><?php echo "<a href='view_article.php?ida=$id'>".$row['title']."</a>";  ?></h2>
        <?php echo "Written By:".$row['name']." On: ".$row['modified'].""; ?>
        <p> <?php echo htmlentities(substr($row['body'],0,250))."...<a href='view_article.php?ida=$id'>(Read More)</a>"; ?> </p>
        <hr>
      </div>
      <?php
    }
    $conn->close();
    $result->close();

    } catch(Exception $e) {
    //Display message on unsuccsessful retrival
    //echo "Error: " . $e->getMessage();
    echo "<script type='text/javascript'>alert('We are not able to complete your registration, please try again later.');</script>";
    }
    ?>
  </div>

  </body>
  </html>
