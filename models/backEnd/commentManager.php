<?php
class Commentaires
{
   
   //nombres de commentaires nouveaux 
   public function countCommentsNew()
   {
      require('models/connect.php');
      $req = $bdd->prepare('SELECT COUNT(*) FROM commentaires WHERE valider = 0 AND signaler = 0 ');
      $req->execute(array($id));
      $data = $req->fetchAll();
      return $data; 
   }
   public function countCommentsDanger()
   {
      require('models/connect.php');
      $req = $bdd->prepare('SELECT COUNT(*) FROM commentaires WHERE valider = 0 AND signaler = 1 ');
      $req->execute(array($id));
      $data = $req->fetchAll();
      return $data; 
   }
   
   
   
   
   //fonction pour recuperer les commentaires non valider 
   public function getAllComments()
   {
      require('models/connect.php');
      $req = $bdd->prepare('SELECT * FROM commentaires WHERE valider = 0 AND signaler = 0 ORDER BY id DESC');
      $req->execute(array($id));
      $data = $req->fetchAll();
      return $data;
    
   }

   //fonction pour recuperer tous les commentaires validés
   public function getAllCommentsValidate()
   {
      require('models/connect.php');
      $req = $bdd->prepare('SELECT * FROM commentaires WHERE signaler = 0 AND valider = 1 ORDER BY id DESC');
      $req->execute(array($id));
      $data = $req->fetchAll();
      return $data;
      $req->cloreCursor();
   }

   // fonction pour recuperer les articles signalés
   public function getAllCommentsSignaler()
   {
      require('models/connect.php');
      $req = $bdd->prepare('SELECT * FROM commentaires WHERE signaler = 1 ORDER BY id DESC');
      $req->execute(array($id));
      $data = $req->fetchAll();
      return $data;
      $req->cloreCursor();
   }


   //fonction qui passe le commentaire a validé
   public function changeCommentEnCours($id)
   {
      require('models/connect.php');
      $req = $bdd->prepare('UPDATE commentaires SET valider = 0, signaler = 0  WHERE id = ? ' ) or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
   }
   //fonction qui passe le commentaire a validé
   public function changeCommentValider($id)
   {
      require('models/connect.php');
      $req = $bdd->prepare('UPDATE commentaires SET valider = 1, signaler = 0 WHERE id = ? ') or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
   }

   //fonction qui passe le commentaire a signaler 
   public function changeCommentSignaler($id)
   {
      require('models/connect.php');
      $req = $bdd->prepare('UPDATE commentaires SET signaler = 1, valider = 0 WHERE id = ? ') or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
   }
   //fonction qui supprime DEFINITIVEMENT le commentaire
   public function supressionFinal($id)
   {
      require('models/connect.php');
      $req = $bdd->prepare('DELETE FROM commentaires WHERE id = ?') or die(print_r($bdd->errorInfo()));
      $req->execute(array($id));
   }
}
