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
    $article = $allArticles::supprimerArticle($id);
    $articles = $allArticles::getArticles();
    $articlesB = $allArticles::getArticlesBrouillon();
    $articlesS = $allArticles::getArticlesSupprimer();
    var_dump($article);

    $notification = "votre chapitre est dans la liste des chapitres modifier";
require 'views/backEnd/administrationChapitresView.php';
}
  