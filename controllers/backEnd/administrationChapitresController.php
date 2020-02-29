<?php

//recuperer articles et articles brouillons 

require 'models/backEnd/contactManager.php';
require 'models/backEnd/commentManager.php';

$contactManager = new ContactManager();
$nbMessages = $contactManager->countMessageNew();
$commentaires = new Commentaires();
$nbComments = $commentaires->countCommentsNew();
$nbCommentsDanger = $commentaires->countCommentsDanger();



require 'models/frontEnd/articleManager.php';
$allArticles = new ArticlesManager();

$articlesS = $allArticles::getArticlesSupprimer();
$articles = $allArticles::getArticles();
$articlesB = $allArticles::getArticlesBrouillon();

//affichage des chapitres dans l'administration
require 'views/backEnd/administrationChapitresView.php';
