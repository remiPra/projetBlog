<?php

function getArticles()
{
    require('models/connect.php');
    $req = $bdd->prepare('SELECT * FROM livre');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->cloreCursor();
}


function getLastArticles()
{
    require('models/connect.php');
    $req = $bdd->prepare('SELECT * FROM livre ORDER BY id DESC LIMIT 0,1');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->cloreCursor();
}


function getArticle($id)
{
    require('models/connect.php');
    $req = $bdd->prepare('SELECT * FROM livre WHERE id = ?');
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



