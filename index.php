
<?php
session_start();
try{      //Create connection
      $conn = new mysqli("localhost","pma","pass","lekhni_db");
      //Check connection
      if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
      }
      $result = $conn->query("SELECT title, modified,body,name,id FROM articles a,user u WHERE auth_id = uid ORDER BY modified DESC");
      $rows = $result->fetch_all(MYSQLI_ASSOC);
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
  </head>
  <body>

    <div class="header">
      <a href="index.php" class="logo"> <img src="files/logo.png" alt="Lekhni" height="150"> </a>
      <div class="header-right">
        <a class="active" href="index.php">Home</a>
        <?php
          if(isset($_SESSION["user_id"])){
            echo "<a  href='author.php?idu=".$_SESSION["user_id"]."'>My Articles</a>";
            echo "<a href='logout.php'>Sign Out</a>";
          }
          else{
            echo '<a  href="register.php">Sign Up</a>';
            echo '<a href="login.php">Sign In</a>';
          }
         ?>

      </div>
    </div>


    <h1 class="heading">Welcome! What will you read today...?</h1>

    <div class="container">
      <?php foreach($rows as $row) {
        $id = $row["id"];
        ?>
      <div class="article_block">
        <h2><?php echo "<a href='view_article.php?ida=$id'>".htmlentities($row['title'])."</a>";  ?></h2>
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
