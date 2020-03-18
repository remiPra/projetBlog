<?php
class ConnectManager {

 public function connect() {  
    $host_name = 'db5000267422.hosting-data.io';
   $database = 'dbs260968';
    $user_name = 'dbu246755';
    $password = "Tfctfc3131@";
    

    try {
      global $bdd;
      $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
    } catch (PDOException $e) {
      echo "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
 }
} 

      
 



