<?php

class CommentManagerF
{
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

        $req = $bdd->prepare('INSERT INTO Comments (pseudo, Comment,numChapter,valider,signaler) 
                VALUES(?, ?,?,?, ?)');
        $req->execute(array(
            $_POST['pseudo'],
            $_POST['Comment'],
            $_POST['numChapter'],
            0,0
            
        ));

        // Passe la variable get avec le num de Chapter pour recuperer la page de l'article désiré
        $_GET['id'] =   $_POST['numChapter'];
    }
}
