<?php

Class CommentManagerF {
//fonction pour recuperer les Comments
public function getComment($id)
{
     global $bdd;
    $req = $bdd->prepare('SELECT * FROM Comments WHERE numChapter = ?');
    $req->execute(array($id));
    $data = $req->fetchAll();
    return $data;
   
}
  
  
//fonction pour signaler un Comment
public function signalerComment($idComment)
{
     global $bdd;
    $req = $bdd->prepare('UPDATE Comments SET signaler = ?  WHERE id = ?') or die(print_r($bdd->errorInfo()));
    $req->execute(array($_POST['signaler'], $idComment));
}


//fonction pour envoyer les Comments
public function sendComment()
{
     global $bdd;

    $req = $bdd->prepare('INSERT INTO Comments (pseudo, Comment,numChapter) 
                VALUES(?, ?, ?)');
    $req->execute(array(
        $_POST['pseudo'],
        $_POST['Comment'],
        $_POST['numChapter']
    ));
  
    // Passe la variable get avec le num de Chapter
    $_GET['id'] =   $_POST['numChapter'];
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
       echo "Error!: " . $e->getMessage() . "<br/>";
       die();
   }
}
}