<?php


    //$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    
    
  
   
   
  $host_name = 'db5000267422.hosting-data.io';
  $database = 'dbs260968';
  $user_name = 'dbu246755';
  $password = "Tfctfc3131@";
  
  $dbh = null;

  try {
    $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
  } catch (PDOException $e) {
    echo "Erreur!: " . $e->getMessage() . "<br/>";
    die();
  }
?>
  
      
 



