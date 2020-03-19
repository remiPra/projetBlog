<?php
//premiere condition pour voir si Id getter est non vide et est un chiffre
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    // redirection vers header
    header('Location: index.php');
    exit();
} else {
    // recupération de l'article concerné par l'id 
    // extraction de $_GET

    require 'models/backEnd/contactManager.php';
    require 'models/backEnd/CommentManager.php';

    $contactManager = new ContactManager();
    $nbMessages = $contactManager->countMessageNew();
    $Comments = new Comments();
    $nbComments = $Comments->countCommentsNew();
    $nbCommentsDanger = $Comments->countCommentsDanger();


    extract($_GET);
    $id = strip_tags($id);

    require 'models/frontEnd/articleManager.php';

    //recuperaton des articles pour les Modify 
    $articlesManager = new ArticlesManager();
    $article = $articlesManager->getArticleBrouillon($id);
    $Chapters = $articlesManager->NumbersChapter();

    require 'views/backEnd/administrationChaptersModifyView.php';
}
