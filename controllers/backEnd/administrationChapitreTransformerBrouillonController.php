<?php
//premiere condition pour voir si Id getter est non vide et est un chiffre
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    // redirection vers header
    header('Location: index.php');
    exit();
} else {
    require 'models/backEnd/contactManager.php';
    require 'models/backEnd/CommentManager.php';

    $contactManager = new ContactManager();
    $nbMessages = $contactManager->countMessageNew();
    $Comments = new Comments();
    $nbComments = $Comments->countCommentsNew();
    $nbCommentsDanger = $Comments->countCommentsDanger();


    // extraction de $_GET
    extract($_GET);
    $id = strip_tags($id);
    // recupération de l'article concerné par l'id
    require 'models/frontEnd/articleManager.php';
    $allArticles = new ArticlesManager();
    $articleBrouillon = $allArticles::brouillonArticle($id);

    $notification = "votre Chapter a étét déplacé dans la liste des Chapters brouillon";
    $articles = $allArticles::getArticles();
    $articlesB = $allArticles::getArticlesBrouillon();
    $articlesS = $allArticles::getArticlesSupprimer();

    require 'views/backEnd/administrationChaptersView.php';
}
