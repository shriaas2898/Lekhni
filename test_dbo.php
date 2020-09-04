<?php
require "database/db_operations.php";
$obj = DBOperation::get_dbo();
var_dump($obj->conn);

?>