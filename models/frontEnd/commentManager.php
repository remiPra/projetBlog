<?php

Class CommentManagerF {
//fonction pour recuperer les commentaires
public function getComment($id)
{
     global $bdd;
    $req = $bdd->prepare('SELECT * FROM commentaires WHERE numChapitre = ?');
    $req->execute(array($id));
    $data = $req->fetchAll();
    return $data;
   
}

  
//fonction pour signaler un commentaire
public function signalerComment($idcomment)
{
     global $bdd;
    $req = $bdd->prepare('UPDATE commentaires SET signaler = ?  WHERE id = ?') or die(print_r($bdd->errorInfo()));
    $req->execute(array($_POST['signaler'], $idcomment));
}


//fonction pour envoyer les commentaires
public function sendComment()
{
     global $bdd;

    $req = $bdd->prepare('INSERT INTO commentaires (pseudo, commentaire,numChapitre) 
                VALUES(?, ?, ?)');
    $req->execute(array(
        $_POST['pseudo'],
        $_POST['commentaire'],
        $_POST['numChapitre']
    ));
    var_dump($_POST);
    // Passe la variable get avec le num de chapitre
    $_GET['id'] =   $_POST['numChapitre'];
}

public function connect(){
    $host_name = 'db5000267422.hosting-data.io';
    $database = 'dbs260968';
     $user_name = 'dbu246755';
     $password = "Tfctfc3131@";
     
 
     try {
      
       $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
        return $bdd; 
    } catch (PDOException $e) {
       echo "Erreur!: " . $e->getMessage() . "<br/>";
       die();
   }
}
}