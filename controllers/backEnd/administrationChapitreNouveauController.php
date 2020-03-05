<?php
require 'models/backEnd/contactManager.php';
require 'models/backEnd/commentManager.php';

$contactManager = new ContactManager();
$nbMessages = $contactManager->countMessageNew();
$commentaires = new Commentaires();
$nbComments = $commentaires->countCommentsNew();
$nbCommentsDanger = $commentaires->countCommentsDanger();
//Envoie de l'article fini 
require  'models/frontEnd/articleManager.php';
$ArticlesManager = new ArticlesManager();
$articleEnv = $ArticlesManager->envoyerArticleFini();


require  'models/frontEnd/imageManager.php';
$imagemanager =  new imageManager();
$imageUpload = $imagemanager->uploadImage();


//variable notification
$notification = '<p> votre article a été envoyé </p>';

$articles = $ArticlesManager::getArticles();
$articlesB = $ArticlesManager::getArticlesBrouillon();
$articlesS = $ArticlesManager::getArticlesSupprimer();



require 'views/backEnd/administrationChapitresView.php';
