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

?>