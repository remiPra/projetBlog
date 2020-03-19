<?php
require 'models/backEnd/contactManager.php';
require 'models/backEnd/CommentManager.php';

$contactManager = new ContactManager();
$nbMessages = $contactManager->countMessageNew();
$Comments = new Comments();
$nbComments = $Comments->countCommentsNew();
$nbCommentsDanger = $Comments->countCommentsDanger();




//variable notification
$notification = '<p> votre article a été envoyé </p>';

require  'models/frontEnd/articleManager.php';
$allArticles = new ArticlesManager();
$articleEnv = $allArticles->ModifyArticle();



//variable notification
// $notification = '<p> votre article a été envoyé </p>';

// require 'controllers/backEnd/administrationChaptersController.php';

$articles = $allArticles::getArticles();
$articlesB = $allArticles::getArticlesBrouillon();
$articlesS = $allArticles::getArticlesSupprimer();



require 'views/backEnd/administrationChaptersView.php';
