<?php

class ContactManager
{
    public function countMessageNew()
    {
        global $bdd;
       $req = $bdd->prepare('SELECT COUNT(*) FROM contact WHERE messageLu = 0 ');
       $req->execute();
       $data = $req->fetchAll();
       return $data;
      
    }
    
    
    
    
    //fonction qui affiche les messages non lues
    public function getContactMessages() {
         global $bdd;
       
        $req = $bdd->prepare('SELECT * FROM contact WHERE messagelu = 0 AND supprimer = 0');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
       
    }

    
   //fonction pour recuperer tous les commentaires validés
   public function getContactMessagesSupprimer()
   {
       global $bdd;
      $req = $bdd->prepare('SELECT * FROM contact WHERE supprimer = 1 ORDER BY id DESC');
      $req->execute();
      $data = $req->fetchAll();
      return $data;
     
   }
   //fonction pour recuperer tous les commentaires validés
   public function getContactMessagesLu()
   {
       global $bdd;
      $req = $bdd->prepare('SELECT * FROM contact WHERE supprimer = 0 AND messageLu = 1 ORDER BY id DESC');
      $req->execute();
      $data = $req->fetchAll();
      return $data;
     
   }

   
    public function getContactMessage($id) {
         global $bdd;
       
        $req = $bdd->prepare('SELECT * FROM contact WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch();
     
        return $data;
       
    }
     //fonction qui transforme en message lu
   public function changeContactLu($id)
   {
       global $bdd;
      $req = $bdd->prepare('UPDATE contact SET messageLu = 1 ,supprimer = 0 WHERE id = ? ') or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
   }
     //fonction qui transforme en message non lu
   public function changeContacNonLu($id)
   {
       global $bdd;
      $req = $bdd->prepare('UPDATE contact SET messageLu = 0,supprimer = 0 WHERE id = ? ') or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
   }

    //fonction qui supprime DEFINITIVEMENT le commentaire
   public function changeContactSupprimer($id)
   {
       global $bdd;
      $req = $bdd->prepare('UPDATE contact SET supprimer = 1 WHERE id = ? ') or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
   }

    //fonction qui supprime DEFINITIVEMENT le commentaire
   public function supressionFinal($id)
   {
       global $bdd;
      $req = $bdd->prepare('DELETE FROM contact WHERE id = ?') or die(print_r($bdd->errorInfo()));
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