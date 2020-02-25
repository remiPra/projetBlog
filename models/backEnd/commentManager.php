<?php
class Commentaires
{
   //fonction pour recuperer les commentaires non valider 
   public function getAllComments()
   {
      require('models/connect.php');
      $req = $bdd->prepare('SELECT * FROM commentaires WHERE valider = 0 AND signaler = 0');
      $req->execute(array($id));
      $data = $req->fetchAll();
      return $data;
      $req->cloreCursor();
   }

   //fonction pour recuperer tous les commentaires validés
   public function getAllCommentsValidate()
   {
      require('models/connect.php');
      $req = $bdd->prepare('SELECT * FROM commentaires WHERE signaler = 0 AND valider = 1');
      $req->execute(array($id));
      $data = $req->fetchAll();
      return $data;
      $req->cloreCursor();
   }

   // fonction pour recuperer les articles signalés
   public function getAllCommentsSignaler()
   {
      require('models/connect.php');
      $req = $bdd->prepare('SELECT * FROM commentaires WHERE signaler = 1');
      $req->execute(array($id));
      $data = $req->fetchAll();
      return $data;
      $req->cloreCursor();
   }

   public function changeCommentSignaler($id)
   {
      require('models/connect.php');
      $req = $bdd->prepare('UPDATE commentaires SET signaler = 1  WHERE id = ?') or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
   }

   public function supressionFinal($id)
   {
      require('models/connect.php');
      $req = $bdd->prepare('DELETE FROM commentaires WHERE id = ?') or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
   }
}
