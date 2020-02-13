<?php 
// on verifie si l'id existe et si c'est bien un nombre
if(!isset($_GET['id']) OR !is_numeric($_GET['id'])) {
    // redirection vers header
    header('Location: index.php'); }

    

 else
{
    
    // extraction de $_GET
    if(!empty($_POST) && isset($_POST['btnComment']))
    { 
    require 'models/frontEnd/functions.php';
  
    extract($_GET);
    $id = strip_tags($id);

    
    sendComment();
    
    
    $article = getArticle($id);
    $comments = getComment($id);
    require 'views/frontEnd/articleView.php';
    }
    if(!empty($_POST) && isset($_POST['btnComment']))
    { 
    require 'models/frontEnd/functions.php';
  
    extract($_GET);
    $id = strip_tags($id);

    
    sendComment();
    
    
    $article = getArticle($id);
    $comments = getComment($id);
    require 'views/frontEnd/articleView.php';
    }
    else 
    {
        require 'models/frontEnd/functions.php';
  
        extract($_GET);
        $id = strip_tags($id);
    
       
        
        
        $article = getArticle($id);
        $comments = getComment($id);
        require 'views/frontEnd/articleView.php';
    } 
}
?>

