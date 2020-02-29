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

    $contactManager = new ContactManager();
    $nbMessages = $contactManager->countMessageNew();
    $commentaires = new Commentaires();
    $nbComments = $commentaires->countCommentsNew();
    $nbCommentsDanger = $commentaires->countCommentsDanger();


    require 'models/frontEnd/articleManager.php';
    $allArticles = new ArticlesManager();
    $article = $allArticles::supprimerArticle($id);
    $articles = $allArticles::getArticles();
    $articlesB = $allArticles::getArticlesBrouillon();
    $articlesS = $allArticles::getArticlesSupprimer();


    $notification = "votre chapitre est dans la liste des chapitres supprimer";
    require 'views/backEnd/administrationChapitresView.php';
}
