<?php
session_start();
session_destroy();
setcookie("uid", "", time() - 3600);
setcookie("rid", "", time() - 3600);
header("Location: index.php");

 ?>
