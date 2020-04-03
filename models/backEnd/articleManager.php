<?php
class ArticlesManager
{
    public function getImages()
    {
        global $bdd;
        $req = $bdd->prepare('SELECT imageChapter FROM chapters WHERE brouillon = 0 AND supprimer = 0');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
    }

    //fonction qui va recuperer les chapters brouillons 
    public function getArticlesBrouillon()
    {
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM chapters WHERE brouillon = 1 AND supprimer = 0');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
    }

    //fonction qui va recuperer les chapters supprimés 
    public function getArticlesSupprimer()
    {
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM chapters WHERE supprimer = 1');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
    }

    public function getArticles()
    {
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM chapters WHERE brouillon = 0 AND supprimer = 0 ORDER BY NumberChapter');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
    }

    //function pour obtenir l'article que l'on veut Modify
    public function getArticleBrouillon($id)
    {
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM chapters WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch();

        return $data;
    }
    //fonction qui recuperer tous les Numbers de chapters 
    public function NumbersChapter()
    {
        global $bdd;
        $req = $bdd->prepare('SELECT NumberChapter FROM chapters ORDER BY NumberChapter');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
    }

    // fonction pour enregistrer un nouvel article
    public function envoyerArticleFini()
    {
        // traitement de l'image
        global $bdd;

        $imgData = basename($_FILES['avatar']['name']);

        global $bdd;
        $req = $bdd->prepare('INSERT INTO chapters (NumberChapter,title,sentence,content,imageChapter,brouillon,supprimer,altImage) VALUES(?, ?, ?, ?,?,?,?,?)');
        $req->execute(array($_POST['NumberChapter'], $_POST['title'],  $_POST['sentence'], $_POST['content'], $imgData, $_POST['brouillon'], 0, $_POST['altImage']));
    }
    // // fonction pour modifier un article
    public function ModifyArticle()
    {
        // on recupere le nom de l'image
        global $bdd;
        $imgData = basename($_FILES['avatar']['name']);

        // si on a pas uloader d'image on a $imgData == null
        if ($imgData == null) {

            $req = $bdd->prepare('UPDATE chapters SET NumberChapter = :NumberChapter, title = :title, content =:content, sentence =:sentence, brouillon= :brouillon,altImage = :altImage WHERE id =:id ');
            $req->execute(array(
                'NumberChapter' => $_POST['NumberChapter'],
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'sentence' => $_POST['sentence'],
                'brouillon' => $_POST['brouillon'],
                'altImage' => $_POST['altImage'],
                'id' => $_POST['id']
            ));
        } else {
            $req = $bdd->prepare('UPDATE chapters SET NumberChapter = :NumberChapter, title = :title, content =:content, sentence =:sentence, brouillon= :brouillon ,imageChapter= :imageChapter,altImage = :altImage WHERE id =:id ');
            $req->execute(array(
                'NumberChapter' => $_POST['NumberChapter'],
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'sentence' => $_POST['sentence'],
                'brouillon' => $_POST['brouillon'],
                'imageChapter' => $imgData,
                'altImage' => $_POST['altImage'],
                'id' => $_POST['id'],
            ));
        }
    }

    //fonction pour passer le Chapter en liste supprimer 
    public function supprimerArticle($id)
    {
        global $bdd;
        $req = $bdd->prepare('UPDATE chapters SET supprimer = 1  WHERE id = ?') or die(print_r($bdd->errorInfo()));
        $req->execute(array($id));
    }

    //fonction pour passer le Chapter en brouillon
    public function brouillonArticle($id)
    {
        global $bdd;
        $req = $bdd->prepare('UPDATE chapters SET supprimer = 0,brouillon = 1  WHERE id = ?') or die(print_r($bdd->errorInfo()));
        $req->execute(array($id));
    }
    //fonction pour supprimer definitivement l'article 
    public function supressionFinal($id)
    {
        global $bdd;
        $req = $bdd->prepare('DELETE FROM chapters WHERE id = ?') or die(print_r($bdd->errorInfo()));
        $req->execute(array($id));
    }
}
