<?php    
class ArticlesManager{
    public function getImages()
    {
         global $bdd;
        $req = $bdd->prepare('SELECT imageChapter FROM Chapters');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
      
    }  

    //fonction qui va recuperer les Chapters brouillons 
    public function getArticlesBrouillon()
    {
         global $bdd;
        $req = $bdd->prepare('SELECT * FROM Chapters WHERE brouillon = 1 AND supprimer = 0');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
     
    }

    //fonction qui va recuperer les Chapters supprimés 
    public function getArticlesSupprimer()
    {
         global $bdd;
        $req = $bdd->prepare('SELECT * FROM Chapters WHERE supprimer = 1');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
      
    }

    public function getArticles()
    {
         global $bdd;
        $req = $bdd->prepare('SELECT * FROM Chapters WHERE brouillon = 0 AND supprimer = 0 ORDER BY NumberChapter');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
       
    }

    //function pour obtenir l'article que l'on veut modifier
    public function getArticleBrouillon($id)
    {
         global $bdd;
        $req = $bdd->prepare('SELECT * FROM Chapters WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch();
        
        return $data;
    }
    //fonction qui recuperer tous les Numbers de Chapters 
    public function NumbersChapter()
    {
         global $bdd;
        $req = $bdd->prepare('SELECT NumberChapter FROM Chapters WHERE supprimer = 0 ORDER BY NumberChapter');
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
        var_dump(array($_POST['NumberChapter'], $_POST['title'], $_POST['content'], $_POST['sentence'], $_POST['brouillon'], $imgData));
        // condition si l'utilisateur veut que ce soit un brouillon
        if ($_POST['brouillon'] == 1) {
             global $bdd;
            $req = $bdd->prepare('INSERT INTO Chapters (NumberChapter,title,content,sentence,brouillon) VALUES(:NumberChapter,:title,:content,:sentence,:brouillon)');
            var_dump($req);
            $req->execute(array($_POST['NumberChapter'], $_POST['title'], $_POST['content'], $_POST['sentence'], $_POST['brouillon']));
        }
        //sinon il est publié
        else {
             global $bdd;
            $req = $bdd->prepare('INSERT INTO Chapters (NumberChapter,title,content,sentence,imageChapter) VALUES(?, ?, ?, ?, ?)');
            $req->execute(array($_POST['NumberChapter'], $_POST['title'], $_POST['content'], $_POST['sentence'], $imgData));
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
        $req = $bdd->prepare('UPDATE Chapters SET NumberChapter = :NumberChapter, title = :title, content =:content, sentence =:sentence, brouillon= :brouillon WHERE id =:id ');
        $req->execute(array(
            'NumberChapter' => $_POST['NumberChapter'],
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'sentence' => $_POST['sentence'],
            'brouillon' => $_POST['brouillon'],
            'id' => $_POST['id']
        ));
        } else {
        

            $req = $bdd->prepare('UPDATE Chapters SET NumberChapter = :NumberChapter, title = :title, content =:content, sentence =:sentence, brouillon= :brouillon ,imageChapter= :imageChapter WHERE id =:id ');
            $req->execute(array(
                'NumberChapter' => $_POST['NumberChapter'],
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'sentence' => $_POST['sentence'],
                'brouillon' => $_POST['brouillon'],
                'id' => $_POST['id'],
                'imageChapter' => $imgData
            ));

            require  'models/frontEnd/imageManager.php';

        } 



    }

    //fonction pour passer le Chapter en liste supprimer 
    public function supprimerArticle($id)
    {
         global $bdd;
        $req = $bdd->prepare('UPDATE Chapters SET supprimer = 1  WHERE id = ?') or die(print_r($bdd->errorInfo()));
        $req->execute(array($id));
    }

    //fonction pour passer le Chapter en brouillon
    public function brouillonArticle($id)
    {
         global $bdd;
        $req = $bdd->prepare('UPDATE Chapters SET supprimer = 0,brouillon = 1  WHERE id = ?') or die(print_r($bdd->errorInfo()));
        $req->execute(array($id));
    }
    //fonction pour supprimer definitivement l'article 
    public function supressionFinal($id)
    {
         global $bdd;
        $req = $bdd->prepare('DELETE FROM Chapters WHERE id = ?') or die(print_r($bdd->errorInfo()));
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
           echo "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
    }
   

}