<?php

class ContactManager
{
    public function countMessageNew()
    {
       require('models/connect.php');
       $req = $bdd->prepare('SELECT COUNT(*) FROM contact WHERE messageLu = 0 ');
       $req->execute(array($id));
       $data = $req->fetchAll();
       return $data;
       $req->cloreCursor();
    }
    
    
    
    
    //fonction qui affiche les messages non lues
    public function getContactMessages() {
        require('models/connect.php');
       
        $req = $bdd->prepare('SELECT * FROM contact WHERE messagelu = 0 AND supprimer = 0');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
        $req->cloreCursor();
    }

    
   //fonction pour recuperer tous les commentaires validés
   public function getContactMessagesSupprimer()
   {
      require('models/connect.php');
      $req = $bdd->prepare('SELECT * FROM contact WHERE supprimer = 1 ORDER BY id DESC');
      $req->execute(array($id));
      $data = $req->fetchAll();
      return $data;
      $req->cloreCursor();
   }
   //fonction pour recuperer tous les commentaires validés
   public function getContactMessagesLu()
   {
      require('models/connect.php');
      $req = $bdd->prepare('SELECT * FROM contact WHERE supprimer = 0 AND messageLu = 1 ORDER BY id DESC');
      $req->execute(array($id));
      $data = $req->fetchAll();
      return $data;
      $req->cloreCursor();
   }

   
    public function getContactMessage($id) {
        require('models/connect.php');
       
        $req = $bdd->prepare('SELECT * FROM contact WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch();
     
        return $data;
       
    }
     //fonction qui transforme en message lu
   public function changeContactLu($id)
   {
      require('models/connect.php');
      $req = $bdd->prepare('UPDATE contact SET messageLu = 1 ,supprimer = 0 WHERE id = ? ') or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
   }
     //fonction qui transforme en message non lu
   public function changeContacNonLu($id)
   {
      require('models/connect.php');
      $req = $bdd->prepare('UPDATE contact SET messageLu = 0,supprimer = 0 WHERE id = ? ') or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
   }

    //fonction qui supprime DEFINITIVEMENT le commentaire
   public function changeContactSupprimer($id)
   {
      require('models/connect.php');
      $req = $bdd->prepare('UPDATE contact SET supprimer = 1 WHERE id = ? ') or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
   }

    //fonction qui supprime DEFINITIVEMENT le commentaire
   public function supressionFinal($id)
   {
      require('models/connect.php');
      $req = $bdd->prepare('DELETE FROM contact WHERE id = ?') or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
   }
}