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
 

//fonction pour envoyer les commentaires
function sendComment() {
    require('models/connect.php');

                $req = $bdd->prepare('INSERT INTO commentaires (pseudo, commentaire,numChapitre) 
                VALUES(?, ?, ?)');
                $req->execute(array(
                    $_POST['pseudo'],
                    $_POST['commentaire'], 
                    $_POST['numChapitre']
                ));   
                $_GET['id'] =   $_POST['numChapitre'];
                $_GET['action'] = 'article';
            }
