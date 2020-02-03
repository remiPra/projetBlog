<?php

function getArticles()
{
    require('models/connect.php');
    $req = $bdd->prepare('SELECT * FROM chapitres');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->cloreCursor();
}


function getLastArticles()
{
    require('models/connect.php');
    $req = $bdd->prepare('SELECT * FROM chapitres ORDER BY id DESC LIMIT 0,1');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->cloreCursor();
}


function getArticle($id)
{
    require('models/connect.php');
    $req = $bdd->prepare('SELECT * FROM chapitres WHERE id = ?');
    $req->execute(array($id));
    //s'il y a une correspondance 
    if($req->rowCount() == 1) {
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    else {
        header('location: index.php');
    }
}

function contactForm() 
{    
if(!empty($_POST) && isset($_POST['btnContact'])){
    if(isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['message'])){
        if(!empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['message'])){
            $email = str_secur($_POST['email']);
            $firstname = str_secur($_POST['firstname']);
            $message = str_secur($_POST['message']);

            $message .= ' - email envoyé par: ' . $firstname . ' : ' . $email;
            debug($message);

            // ENVOYER UN EMAIL
            mail('remipradere@gmail.com', 'On me contact sur mon site', $message);
        }else{
            $error = "Vous devez remplir tous les champs !";
        }
    }else{
        $error = "Une erreur s'est produite. Reessayez !";
    }
}





}



