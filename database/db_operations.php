<?php
/**
 *
 */
ini_set('display_errors', 1);
error_reporting(E_ALL);

class DBOperation
{
 public $conn = NULL;
 public $dbname = "lekhni_db";
 public $username = "phpmyadmin";
 public $pass = "pass";
 public $server = "localhost";

 
 function get_conn(){
   // If connection is not established
   if(!(isset($this->conn))){ 
     
     $this->conn = new mysqli($this->server, $this->username, $this->pass, $this->dbname);
     if($this->conn->connect_error){
         return NULL;
     }
 }
 return $this->conn;
}

function destroy_conn(){
 if($this->conn){
 $this->conn->close();
 $this->conn = NULL;}
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
   $this->conn = $this->get_conn();
   $final_result = array(-1,NULL);
   try{
       
       if($args) // If args are not empty
       { 
         $stmnt = $this->conn->prepare($query);
         $stmnt->bind_param(...$args);
         $stmnt->execute();
         $result = $stmnt->get_result();
         //var_dump($result);
       }
       else{
        $result = $this->conn->query($query);
       }
       
       if($result->num_rows){
         $final_result[0] = 1;
         $final_result[1] = $result->fetch_all(MYSQLI_ASSOC);
       }
       else{
         $final_result[0] = 0;
         $final_result[1] = NULL;
       }
   }
   catch(Exception $e){
     $final_result[0] = -1;
     $final_result[1] = NULL;
   }
   finally{
     $this->destroy_conn();
     return $final_result;
    }
   }

     /*
* Description: The function precompiles the $query, substitute arguments supplied using ...$args and
 returns  $result which contains a status code:
 1: query executed succsessfully.
 0: error encountered.
 * Params: $query -> contains query string.
           ...$args -> variable length argument, the first argument contains the data types eg "ssi" i.e string,string,int
           followed by the actual arguments which needs to be substituted in the query string.
 */
 function execute_update($query,...$args){
   $this->conn = $this->get_conn();
   $final_result = 0;
   try{
        $stmnt = $this->conn->prepare($query);
        $stmnt->bind_param(...$args);
        $result = $stmnt->execute();
        if($result){
          $final_result = 1;
       }
   }
   catch(Exception $e){
     $final_result= 0;
   }
   finally{
    $this->destroy_conn();
    return $final_result;
     }
   }


}

?>