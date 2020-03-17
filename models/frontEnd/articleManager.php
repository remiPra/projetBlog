<?php
class ArticlesManager
{
    //function pour obtenir le dernier article qui a été publié 
    public function getLastArticles()
    {
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM chapitres WHERE brouillon = 0 AND supprimer = 0 ORDER BY id DESC LIMIT 0,1');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
        
    }

    //function pour obtenir l'article
    public function getArticle($id)
    {
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM chapitres WHERE numeroChapitre = ? AND brouillon = 0');
        $req->execute(array($id));
        //s'il y a une correspondance et une seule 
        if ($req->rowCount() == 1) {
            $data = $req->fetch();
            return $data;
        } else {
            //redirection vers le menu
            header('location: index.php');
        }
    }

    //fonction pour recuperer les articles publiés
    public function getArticles()
    {
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM chapitres WHERE brouillon = 0 AND supprimer = 0 ORDER BY numeroChapitre');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
       
    }

    public function dateFormat($str)
    {
        list($date1,$date2) = explode(" ", $str);
        list($y,$m,$d) = explode("-", $date1);
        list($h,$min,$s) = explode("-", $date2);
        echo ''.$d.'/'.$m.'/'.$y.' à '.$h.''.$min.''.$s.'';
    }

   
   
}
