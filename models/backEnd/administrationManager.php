<?php
class AdministrationManager 
{
    
    public function getUser($pseudo) {

        $bdd = $this->connect();
    $req = $bdd->prepare('SELECT * FROM administrateurs WHERE name = ?');
    $req->execute(array($pseudo));
    $data = $req->fetch();
    return $data;
    } 
    
    public function connect(){
        $host_name = 'db5000267422.hosting-data.io';
        $database = 'dbs260968';
         $user_name = 'dbu246755';
         $password = "Tfctfc3131@";
         
     
         try {
          
           $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
            return $bdd; 
        } catch (PDOException $e) {
           echo "Erreur!: " . $e->getMessage() . "<br/>";
           die();
       }
    }
   
}
        



