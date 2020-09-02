<?php
/**
 *
 */
 echo "Started";
 ini_set('display_errors', 1);
 error_reporting(E_ALL);

class DBOperation
{

  public $dbo;
  public $conn;
  private $dbname = "lekhni";
  private $username = "pma";
  private $pass = "pass";
  private $server = "localhost";



  function get_dbo()
  {
    // If $dbo is empty
    if(!$dbo)
    {
      $dbo = new DBOperation();
      var_dump($dbo);
      $dbo->conn = new mysqli($server, $username, $pass, $dbname);
      // If connection is not established
      if($dbo->conn->connect_error)
      {
        return NULL;
      }
    }
    return $dbo;
  }

  function destroy_dbo(){
    if($dbo){
    $dbo->conn->close();
    $dbo = NULL;}
  }

  /*
* Description: The function precompiles the $query, substitute arguments supplied using ...$args and
  returns  $result which contains a status code:
  1: query executed succsessfully and returned non-empty result.
  0: query returned empty result.
 -1: error encountered.
  set as associative array if the query produces some result.

  * Params: $query -> contains query string.
            ...$args -> variable length argument, the first argument contains the data types eg "ssi" i.e string,string,odbc_fetch_int
            followed by the actual arguments which needs to be substituted in the query string.
  */
  function execute_query($query,...$args){
    $final_result = array(-1,NULL);
    try{
        $stmnt = $dbo->conn->prepare($query);
        if($args) // If args are not empty
        {
          $stmt->bind_param($args);
        }
        $result = $stmnt->execute();
        if($result){
          $final_result[0] = 1;
          $final_result[1] = $result->fetch_assoc();
        }
        else{
          $final_result[0] = 0;
          $final_result[1] = NULL;
        }
    }
    catch(Exception e){
      $final_result[0] = -1;
      $final_result[1] = NULL;
    }
    finally{
      return $final_result;
      }
    }


}
 echo "LOG: loaded";/*
  $obj = DBOperation::get_dbo();
  $q = "SELECT * FROM user";
  $result = $obj->execute_query($q);
  var_dump($result);*/
 ?>
