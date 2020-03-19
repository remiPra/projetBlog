<?php

//recuperer articles et articles brouillons 

require 'models/backEnd/contactManager.php';
require 'models/backEnd/CommentManager.php';

$contactManager = new ContactManager();
$nbMessages = $contactManager->countMessageNew();
$Comments = new Comments();
$nbComments = $Comments->countCommentsNew();
$nbCommentsDanger = $Comments->countCommentsDanger();



require 'models/frontEnd/articleManager.php';
$allArticles = new ArticlesManager();

$articlesS = $allArticles::getArticlesSupprimer();
$articles = $allArticles::getArticles();
$articlesB = $allArticles::getArticlesBrouillon();

//affichage des Chapters dans l'administration
require 'views/backEnd/administrationChaptersView.php';
