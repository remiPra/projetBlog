<?php    
class ArticlesManager{
    public function getImages()
    {
         global $bdd;
        $req = $bdd->prepare('SELECT imageChapitre FROM chapitres');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
      
    }  

    //fonction qui va recuperer les chapitres brouillons 
    public function getArticlesBrouillon()
    {
         global $bdd;
        $req = $bdd->prepare('SELECT * FROM chapitres WHERE brouillon = 1 AND supprimer = 0');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
     
    }

    //fonction qui va recuperer les chapitres supprimés 
    public function getArticlesSupprimer()
    {
         global $bdd;
        $req = $bdd->prepare('SELECT * FROM chapitres WHERE supprimer = 1');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
      
    }

    public function getArticles()
    {
         global $bdd;
        $req = $bdd->prepare('SELECT * FROM chapitres WHERE brouillon = 0 AND supprimer = 0 ORDER BY numeroChapitre');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
       
    }

    //function pour obtenir l'article que l'on veut modifier
    public function getArticleBrouillon($id)
    {
         global $bdd;
        $req = $bdd->prepare('SELECT * FROM chapitres WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch();
        
        return $data;
    }
    //fonction qui recuperer tous les numeros de chapitres 
    public function numerosChapitre()
    {
         global $bdd;
        $req = $bdd->prepare('SELECT numeroChapitre FROM chapitres WHERE supprimer = 0 ORDER BY numeroChapitre');
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
        var_dump(array($_POST['numeroChapitre'], $_POST['title'], $_POST['content'], $_POST['sentence'], $_POST['brouillon'], $imgData));
        // condition si l'utilisateur veut que ce soit un brouillon
        if ($_POST['brouillon'] == 1) {
             global $bdd;
            $req = $bdd->prepare('INSERT INTO chapitres (numeroChapitre,title,content,sentence,brouillon) VALUES(:numeroChapitre,:title,:content,:sentence,:brouillon)');
            var_dump($req);
            $req->execute(array($_POST['numeroChapitre'], $_POST['title'], $_POST['content'], $_POST['sentence'], $_POST['brouillon']));
        }
        //sinon il est publié
        else {
             global $bdd;
            $req = $bdd->prepare('INSERT INTO chapitres (numeroChapitre,title,content,sentence,imageChapitre) VALUES(?, ?, ?, ?, ?)');
            $req->execute(array($_POST['numeroChapitre'], $_POST['title'], $_POST['content'], $_POST['sentence'], $imgData));
            var_dump($req);
        }
    }

    public function modifierArticle()
    {
         global $bdd;
        // traitement de l'image
        // traitement de l'image
         global $bdd;
        $imgData = basename($_FILES['avatar']['name']);
        

        if ($imgData == null) {
        var_dump($imgData); 
        $req = $bdd->prepare('UPDATE chapitres SET numeroChapitre = :numeroChapitre, title = :title, content =:content, sentence =:sentence, brouillon= :brouillon WHERE id =:id ');
        $req->execute(array(
            'numeroChapitre' => $_POST['numeroChapitre'],
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'sentence' => $_POST['sentence'],
            'brouillon' => $_POST['brouillon'],
            'id' => $_POST['id']
        ));
        } else {
        

            $req = $bdd->prepare('UPDATE chapitres SET numeroChapitre = :numeroChapitre, title = :title, content =:content, sentence =:sentence, brouillon= :brouillon ,imageChapitre= :imageChapitre WHERE id =:id ');
            $req->execute(array(
                'numeroChapitre' => $_POST['numeroChapitre'],
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'sentence' => $_POST['sentence'],
                'brouillon' => $_POST['brouillon'],
                'id' => $_POST['id'],
                'imageChapitre' => $imgData
            ));

            require  'models/frontEnd/imageManager.php';

        } 



    }

    //fonction pour passer le chapitre en liste supprimer 
    public function supprimerArticle($id)
    {
         global $bdd;
        $req = $bdd->prepare('UPDATE chapitres SET supprimer = 1  WHERE id = ?') or die(print_r($bdd->errorInfo()));
        $req->execute(array($id));
    }

    //fonction pour passer le chapitre en brouillon
    public function brouillonArticle($id)
    {
         global $bdd;
        $req = $bdd->prepare('UPDATE chapitres SET supprimer = 0,brouillon = 1  WHERE id = ?') or die(print_r($bdd->errorInfo()));
        $req->execute(array($id));
    }
    //fonction pour supprimer definitivement l'article 
    public function supressionFinal($id)
    {
         global $bdd;
        $req = $bdd->prepare('DELETE FROM chapitres WHERE id = ?') or die(print_r($bdd->errorInfo()));
        $req->execute(array($id));
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