<?php
//fonction pour recuperer les commentaires
function getComment($id)
{
     require('models/connect.php');
     $req = $bdd->prepare('SELECT * FROM commentaires WHERE numChapitre = ?');
     $req->execute(array($id));
     $data = $req->fetchAll();
    return $data;
    $req->cloreCursor();
 }


//fonction pour signaler un commentaire
function signalerComment($idcomment)
{
     require('models/connect.php');
     $req = $bdd->prepare('UPDATE commentaires SET signaler = ?  WHERE id = ?') or die(print_r($bdd->errorInfo()));
     $req->execute(array($_POST['signaler'],$idcomment));
     
 

 }
 ?>
