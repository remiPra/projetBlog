<?php 
// recuperation du dernier article publié
require 'models/frontEnd/articleManager.php';
$articles = new ArticlesManager();
$lastArticles = $articles::getLastArticles();

// affichage de la page d'accueil
require 'views/frontEnd/indexView.php';
?>

