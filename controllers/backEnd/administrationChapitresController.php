<?php

//recuperer articles et articles brouillons 
require 'models/frontEnd/articleManager.php';
$allArticles = new ArticlesManager();
$articlesS= $allArticles::getArticlesSupprimer();
$articles = $allArticles::getArticles();
$articlesB = $allArticles::getArticlesBrouillon();

//affichage des chapitres dans l'administration
require 'views/backEnd/administrationChapitresView.php';