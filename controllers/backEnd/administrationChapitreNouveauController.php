<?php
require 'models/backEnd/contactManager.php';
require 'models/backEnd/commentManager.php';

$contactManager = new ContactManager();
$nbMessages = $contactManager->countMessageNew();
$commentaires = new Commentaires();
$nbComments = $commentaires->countCommentsNew();

//Envoie de l'article fini 
require  'models/frontEnd/articleManager.php';
$ArticlesManager = new ArticlesManager();
$articleEnv = $ArticlesManager->envoyerArticleFini();


//variable notification
$notification = '<p> votre article a été envoyé </p>';

$articles = $ArticlesManager::getArticles();
$articlesB = $ArticlesManager::getArticlesBrouillon();
$articlesS = $ArticlesManager::getArticlesSupprimer();



require 'views/backEnd/administrationChapitresView.php';
