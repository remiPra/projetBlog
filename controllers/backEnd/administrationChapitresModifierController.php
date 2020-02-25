<?php
//premiere condition pour voir si Id getter est non vide et est un chiffre
if(!isset($_GET['id']) OR !is_numeric($_GET['id'])) {
    // redirection vers header
    header('Location: index.php'); 
    exit();
}
else
{   
    // recupération de l'article concerné par l'id 
    // extraction de $_GET
    extract($_GET);
    $id = strip_tags($id);
   
    require 'models/frontEnd/articleManager.php';
   
   //require 'models/frontEnd/imageManager.php';  

   
    //recuperaton des articles pour les modifier 
    $articles = new ArticlesManager();
    $article = $articles->getArticleBrouillon($id);
    
require 'views/backEnd/administrationChapitresModifierView.php';
}
  
