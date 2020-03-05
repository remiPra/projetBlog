<?php
//premiere condition pour voir si Id getter est non vide et est un chiffre
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    // redirection vers header
    header('Location: index.php');
    exit();
} else {
    // extraction de $_GET
    extract($_GET);
    $id = strip_tags($id);
    // recupération de l'article concerné par l'id
    require 'models/backEnd/contactManager.php';
    require 'models/backEnd/commentManager.php';
    require 'models/frontEnd/articleManager.php';

    $contactManager = new ContactManager();
    $commentaires = new Commentaires();
    
    $allArticles = new ArticlesManager();
    $article = $allArticles::supprimerArticle($id);
    
    $nbMessages = $contactManager->countMessageNew();
    $nbComments = $commentaires->countCommentsNew();
    $nbCommentsDanger = $commentaires->countCommentsDanger();
    
    
    
    $articles = $allArticles::getArticles();
    $articlesB = $allArticles::getArticlesBrouillon();
    $articlesS = $allArticles::getArticlesSupprimer();


    $notification = "votre chapitre est dans la liste des chapitres supprimer";
    require 'views/backEnd/administrationChapitresView.php';
}
