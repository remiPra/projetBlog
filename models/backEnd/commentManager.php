<?php
class Comments
{
   
   //nombres de Comments nouveaux 
   public function countCommentsNew()
   {
       global $bdd;
      $req = $bdd->prepare('SELECT COUNT(*) FROM Comments WHERE valider = 0 AND signaler = 0 ');
      $req->execute();
      $data = $req->fetchAll();
      return $data; 
   }
   public function countCommentsDanger()
   {
       global $bdd;
      $req = $bdd->prepare('SELECT COUNT(*) FROM Comments WHERE valider = 0 AND signaler = 1 ');
      $req->execute();
      $data = $req->fetchAll();
      return $data; 
   }
   
   
   
   
   //fonction pour recuperer les Comments non valider 
   public function getAllComments()
   {
       global $bdd;
      $req = $bdd->prepare('SELECT * FROM Comments WHERE valider = 0 AND signaler = 0 ORDER BY id DESC');
      $req->execute();
      $data = $req->fetchAll();
      return $data;
    
   }

   //fonction pour recuperer tous les Comments validés
   public function getAllCommentsValidate()
   {  
      global $bdd;
      $req = $bdd->prepare('SELECT * FROM Comments WHERE signaler = 0 AND valider = 1 ORDER BY id DESC');
      $req->execute();
      $data = $req->fetchAll();
      return $data;
     
   }

   // fonction pour recuperer les articles signalés
   public function getAllCommentsSignaler()
   {
       global $bdd;
      $req = $bdd->prepare('SELECT * FROM Comments WHERE signaler = 1 ORDER BY id DESC');
      $req->execute();
      $data = $req->fetchAll();
      return $data;
     
   }


   //fonction qui passe le Comment a validé
   public function changeCommentEnCours($id)
   {
       global $bdd;
      $req = $bdd->prepare('UPDATE Comments SET valider = 0, signaler = 0  WHERE id = ? ' ) or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
   }
   //fonction qui passe le Comment a validé
   public function changeCommentValider($id)
   {
       global $bdd;
      $req = $bdd->prepare('UPDATE Comments SET valider = 1, signaler = 0 WHERE id = ? ') or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
   }

   //fonction qui passe le Comment a signaler 
   public function changeCommentSignaler($id)
   {
       global $bdd;
      $req = $bdd->prepare('UPDATE Comments SET signaler = 1, valider = 0 WHERE id = ? ') or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
   }
   //fonction qui supprime DEFINITIVEMENT le Comment
   public function supressionFinal($id)
   {
       global $bdd;
      $req = $bdd->prepare('DELETE FROM Comments WHERE id = ?') or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
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
         echo "Error!: " . $e->getMessage() . "<br/>";
         die();
     }
  }
 
}
