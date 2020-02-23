<?php
class ArticlesManager
{
//fonction pour recuperer les articles publiés
public function getArticles()
{
    require('models/connect.php');
    $req = $bdd->prepare('SELECT * FROM chapitres WHERE brouillon = 0 AND supprimer = 0');
    $req->execute();
    $data = $req->fetchAll();
    return $data;
    $req->cloreCursor();
}
//fonction qui va recuperer les chapitres brouillons 
public function getArticlesBrouillon()
{
    require('models/connect.php');
    $req = $bdd->prepare('SELECT * FROM chapitres WHERE brouillon = 1 AND supprimer = 0');
    $req->execute();
    $data = $req->fetchAll();
    return $data;
    $req->cloreCursor();
}

//fonction qui va recuperer les chapitres supprimés 
public function getArticlesSupprimer()
{
    require('models/connect.php');
    $req = $bdd->prepare('SELECT * FROM chapitres WHERE supprimer = 1');
    $req->execute();
    $data = $req->fetchAll();
    return $data;
    $req->cloreCursor();
}


//function pour obtenir le dernier article qui a été publié 
public function getLastArticles()
{
    require('models/connect.php');
    $req = $bdd->prepare('SELECT * FROM chapitres WHERE brouillon = 0 AND supprimer = 0 ORDER BY id DESC LIMIT 0,1');
    $req->execute();
    $data = $req->fetchAll();
    return $data;
    $req->cloreCursor();
}

//function pour obtenir l'article
public function getArticle($id)
{
    require('models/connect.php');
    $req = $bdd->prepare('SELECT * FROM chapitres WHERE id = ? AND brouillon = 0');
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

//function pour obtenir l'article en état de brouillon
public function getArticleBrouillon($id)
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

// fonction pour enregistrer un nouvel article
public function envoyerArticleFini()
{
    require('models/connect.php');
    // traitement de l'image
    $file = $_FILES['imageBlob']['tmp_name'];
    $image = addslashes(file_get_contents($file));
    $imagetype = $_FILES['imageBlob']['type'];

    // condition si l'utilisateur veut que ce soit un brouillon
    if ($_POST['brouillon'] == 1) {
    require('models/connect.php');
    $req = $bdd->prepare('INSERT INTO chapitres (numeroChapitre,title,content,sentence,brouillon,imageBlob,imageBlobType) VALUES(?, ?, ?, ?, ?,?)');
    $req->execute(array($_POST['numeroChapitre'], $_POST['title'], $_POST['content'],$_POST['sentence'],$_POST['brouillon'],$image,$imagetype));
    }
    //sinon il est publié
    else {
        require('models/connect.php');
        $req = $bdd->prepare('INSERT INTO chapitres (numeroChapitre,title,content,sentence,imageBlob,imageBlobType) VALUES(?, ?, ?,?,?,?)');
        $req->execute(array($_POST['numeroChapitre'], $_POST['title'], $_POST['content'],$_POST['sentence'],$image,$imagetype));
    }
}

public function modifierArticle()
{
    require('models/connect.php');
    // traitement de l'image
    $file = $_FILES['imageBlob']['tmp_name'];
    $image = addslashes(file_get_contents($file));
    $imagetype = $_FILES['imageBlob']['type'];

  
    $req = $bdd->prepare('UPDATE chapitres SET numeroChapitre = :numeroChapitre, title = :title, content =:content, sentence =:sentence, brouillon= :brouillon WHERE id =:id ');
    $req->execute(array(
        'numeroChapitre' => $_POST['numeroChapitre'], 
        'title' => $_POST['title'], 
        'content' => $_POST['content'],
        'sentence' => $_POST['sentence'],
        'brouillon' => $_POST['brouillon'],
        'id' => $_POST['id']));
    }
    

public function supprimerArticle($id) {
    require('models/connect.php');
    $req = $bdd->prepare('UPDATE chapitres SET supprimer = 1  WHERE id = ?') or die(print_r($bdd->errorInfo()));
    $req->execute(array($id));
    }

public function brouillonArticle($id) {
    require('models/connect.php');
    $req = $bdd->prepare('UPDATE chapitres SET supprimer = 0,brouillon = 1  WHERE id = ?') or die(print_r($bdd->errorInfo()));
    $req->execute(array($id));
    }

public function supressionFinal($id) {
    require('models/connect.php');
    $req = $bdd->prepare('DELETE FROM chapitres WHERE id = ?') or die(print_r($bdd->errorInfo()));
    $req->execute(array($id));
    }


}



    