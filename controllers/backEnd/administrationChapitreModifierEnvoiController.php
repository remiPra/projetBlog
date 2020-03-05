<?php
require 'models/backEnd/contactManager.php';
require 'models/backEnd/commentManager.php';

$contactManager = new ContactManager();
$nbMessages = $contactManager->countMessageNew();
$commentaires = new Commentaires();
$nbComments = $commentaires->countCommentsNew();
$nbCommentsDanger = $commentaires->countCommentsDanger();




//variable notification
$notification = '<p> votre article a été envoyé </p>';

require  'models/frontEnd/articleManager.php';
$allArticles = new ArticlesManager();
$articleEnv = $allArticles->modifierArticle();



//variable notification
// $notification = '<p> votre article a été envoyé </p>';

// require 'controllers/backEnd/administrationChapitresController.php';

$articles = $allArticles::getArticles();
$articlesB = $allArticles::getArticlesBrouillon();
$articlesS = $allArticles::getArticlesSupprimer();



require 'views/backEnd/administrationChapitresView.php';
