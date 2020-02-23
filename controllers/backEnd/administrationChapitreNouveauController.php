<?php

//Envoie de l'article fini 
require  'models/frontEnd/articleManager.php';
$articleEnvoye = new ArticlesManager;
$articleEnv = $articleEnvoye->envoyerArticleFini();


//variable notification
$notification = '<p> votre article a été envoyé </p>';
$allArticles = new ArticlesManager();
$articles = $allArticles::getArticles();
$articlesB = $allArticles::getArticlesBrouillon();
$articlesS = $allArticles::getArticlesSupprimer();
var_dump($article);


require 'views/backEnd/administrationChapitresView.php';
