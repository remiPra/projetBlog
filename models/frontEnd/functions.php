<?php
//fonction pour recuperer les articles
function getArticles()
{
    require('models/connect.php');
    $req = $bdd->prepare('SELECT * FROM chapitres');
    $req->execute();
    $data = $req->fetchAll();
    return $data;
    $req->cloreCursor();
}

//function pour obtenir le dernier article
function getLastArticles()
{
    require('models/connect.php');
    $req = $bdd->prepare('SELECT * FROM chapitres ORDER BY id DESC LIMIT 0,1');
    $req->execute();
    $data = $req->fetchAll();
    return $data;
    $req->cloreCursor();
}

//function pour obtenir l'article
function getArticle($id)
{
    require('models/connect.php');
    $req = $bdd->prepare('SELECT * FROM chapitres WHERE id = ?');
    $req->execute(array($id));
    //s'il y a une correspondance et une seule 
    if($req->rowCount() == 1) {
        $data = $req->fetch();
        return $data;
    }
    else {
        //redirection vers le menu
        header('location: index.php');
    }
}

function contactForm() 
{    
if(!empty($_POST) && isset($_POST['btnContact'])){
    if(isset($_POST['email']) && isset($_POST['pseudo']) && isset($_POST['sujet']) && isset($_POST['message'])){
        if(!empty($_POST['email']) && !empty($_POST['pseudo']) && !empty($_POST['sujet']) && !empty($_POST['message'])){
            // possibilité de stocker dans la BDD
            require('models/connect.php');
            $req = $bdd->prepare('INSERT INTO contact (pseudo,sujet, email,message) VALUES(?, ?, ?, ?)');
            $req->execute(array($_POST['pseudo'], $_POST['sujet'], $_POST['email'], $_POST['message']  ));
            //possibilité d'enovoyer par mail
            $email = $_POST['email'];
            $firstname = $_POST['firstname'];
            $message = $_POST['message'];

            $message .= ' - email envoyé par: ' . $firstname . ' : ' . $email;
            
           

            // ENVOYER UN EMAIL
            mail('remipradere@gmail.com', 'On me contact sur mon site', $message);

           
        }else{
            echo "Vous devez remplir tous les champs !";
        }
    }else{
        echo  "Une erreur s'est produite. Reessayez !";
    }
}
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



