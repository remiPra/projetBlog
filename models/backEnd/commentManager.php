<?php
//fonction pour recuperer les commentaires
function getAllComments()
{
     require('models/connect.php');
     $req = $bdd->prepare('SELECT * FROM commentaires WHERE signaler = 0');
     $req->execute(array($id));
     $data = $req->fetchAll();
    return $data;
    $req->cloreCursor();
 }

 function getAllCommentsValidate()
 {
      require('models/connect.php');
      $req = $bdd->prepare('SELECT * FROM commentaires WHERE valider = 1');
      $req->execute(array($id));
      $data = $req->fetchAll();
     return $data;
     $req->cloreCursor();
  }

 // fonction pour recuperer les articles signalés
 function getAllCommentsSignaler()
 {
      require('models/connect.php');
      $req = $bdd->prepare('SELECT * FROM commentaires WHERE signaler = 1');
      $req->execute(array($id));
      $data = $req->fetchAll();
     return $data;
     $req->cloreCursor();
  }

  function changeCommentSignaler($id) {
   require('models/connect.php');
   $req = $bdd->prepare('UPDATE commentaires SET signaler = ?  WHERE id = ?') or die(print_r($bdd->errorInfo()));
   $req->execute(array($_POST['signaler'],$idcomment));
  }
 
 
 
