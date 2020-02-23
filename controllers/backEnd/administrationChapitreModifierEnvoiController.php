<?php

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
// var_dump($article);


require 'views/backEnd/administrationChapitresView.php';