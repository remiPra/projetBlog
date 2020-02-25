<?php
//premiere condition pour voir si Id getter est non vide et est un chiffre
if(!isset($_GET['id']) OR !is_numeric($_GET['id'])) {
    // redirection vers header
    header('Location: index.php'); 
    exit();
}
else
{    
    // extraction de $_GET
    extract($_GET);
    $id = strip_tags($id);
    // recupération de l'article concerné par l'id
    require 'models/frontEnd/articleManager.php';
    $allArticles = new ArticlesManager(); 
    $articleBrouillon = $allArticles::brouillonArticle($id);
    
    $notification = "votre chapitre a étét déplacé dans la liste des chapitres brouillon";
    $articles = $allArticles::getArticles();
    $articlesB = $allArticles::getArticlesBrouillon();
    $articlesS = $allArticles::getArticlesSupprimer();
   
require 'views/backEnd/administrationChapitresView.php';
}
  