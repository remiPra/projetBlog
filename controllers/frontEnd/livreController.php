<?php 
//recuperation de tous les articles 
require 'models/frontEnd/articleManager.php';
$allArticles = new ArticlesManager();
$articles = $allArticles->getArticles();

//affichage de la page livre ou se trouvent tous les chapitres publiées
require 'views/frontEnd/livreView.php';
?>