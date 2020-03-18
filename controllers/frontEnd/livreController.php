<?php 
//recuperation de tous les articles 
require 'models/frontEnd/articleManager.php';
$allArticles = new ArticlesManager();
$articles = $allArticles->getArticles();

//affichage de la page Book ou se trouvent tous les Chapters publiées
require 'views/frontEnd/BookView.php';
?>