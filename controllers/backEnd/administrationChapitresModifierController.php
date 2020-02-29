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
    require 'models/backEnd/commentManager.php';

    $contactManager = new ContactManager();
    $nbMessages = $contactManager->countMessageNew();
    $commentaires = new Commentaires();
    $nbComments = $commentaires->countCommentsNew();



    extract($_GET);
    $id = strip_tags($id);

    require 'models/frontEnd/articleManager.php';

    //recuperaton des articles pour les modifier 
    $articlesManager = new ArticlesManager();
    $article = $articlesManager->getArticleBrouillon($id);
    $chapitres = $articlesManager->numerosChapitre();

    require 'views/backEnd/administrationChapitresModifierView.php';
}
