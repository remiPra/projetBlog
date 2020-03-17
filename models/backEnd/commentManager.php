<?php
class Commentaires
{
   
   //nombres de commentaires nouveaux 
   public function countCommentsNew()
   {
       global $bdd;
      $req = $bdd->prepare('SELECT COUNT(*) FROM commentaires WHERE valider = 0 AND signaler = 0 ');
      $req->execute();
      $data = $req->fetchAll();
      return $data; 
   }
   public function countCommentsDanger()
   {
       global $bdd;
      $req = $bdd->prepare('SELECT COUNT(*) FROM commentaires WHERE valider = 0 AND signaler = 1 ');
      $req->execute();
      $data = $req->fetchAll();
      return $data; 
   }
   
   
   
   
   //fonction pour recuperer les commentaires non valider 
   public function getAllComments()
   {
       global $bdd;
      $req = $bdd->prepare('SELECT * FROM commentaires WHERE valider = 0 AND signaler = 0 ORDER BY id DESC');
      $req->execute();
      $data = $req->fetchAll();
      return $data;
    
   }

   //fonction pour recuperer tous les commentaires validés
   public function getAllCommentsValidate()
   {
       global $bdd;
      $req = $bdd->prepare('SELECT * FROM commentaires WHERE signaler = 0 AND valider = 1 ORDER BY id DESC');
      $req->execute();
      $data = $req->fetchAll();
      return $data;
     
   }

   // fonction pour recuperer les articles signalés
   public function getAllCommentsSignaler()
   {
       global $bdd;
      $req = $bdd->prepare('SELECT * FROM commentaires WHERE signaler = 1 ORDER BY id DESC');
      $req->execute();
      $data = $req->fetchAll();
      return $data;
     
   }


   //fonction qui passe le commentaire a validé
   public function changeCommentEnCours($id)
   {
       global $bdd;
      $req = $bdd->prepare('UPDATE commentaires SET valider = 0, signaler = 0  WHERE id = ? ' ) or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
   }
   //fonction qui passe le commentaire a validé
   public function changeCommentValider($id)
   {
       global $bdd;
      $req = $bdd->prepare('UPDATE commentaires SET valider = 1, signaler = 0 WHERE id = ? ') or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
   }

   //fonction qui passe le commentaire a signaler 
   public function changeCommentSignaler($id)
   {
       global $bdd;
      $req = $bdd->prepare('UPDATE commentaires SET signaler = 1, valider = 0 WHERE id = ? ') or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
   }
   //fonction qui supprime DEFINITIVEMENT le commentaire
   public function supressionFinal($id)
   {
       global $bdd;
      $req = $bdd->prepare('DELETE FROM commentaires WHERE id = ?') or die(print_r($bdd->errorInfo()));
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
         echo "Erreur!: " . $e->getMessage() . "<br/>";
         die();
     }
  }
 
}
