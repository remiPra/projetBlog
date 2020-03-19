<?php 
// on verifie si l'id existe et si c'est bien un nombre
if(!isset($_GET['id']) OR !is_numeric($_GET['id'])) {
    // redirection vers header
    header('Location: index.php'); }
 else
{
    
// condition si un Comment est envoyé sur l'article    
    if(!empty($_POST) && isset($_POST['btnComment']))
    { 
            // recupération de l'article concerné par l'id
        require 'models/frontEnd/articleManager.php';
        require 'models/frontEnd/CommentManager.php';
    // extraction de $_GET
    extract($_GET);
    $id = strip_tags($id);

    //fonction pour envoyer le Comment
    $CommentManagerF = new CommentManagerF();
    $sendComment = $CommentManagerF->sendComment();
    
    //fonction pour recuperer l'article et le Comment seulement le numéro de Chapter
    $articles = new ArticlesManager();
    $article = $articles->getArticle($id);
   
    $Comments = $CommentManagerF->getComment($id);

    // Affichage de la view de l'article
    require 'views/frontEnd/articleView.php';
    }
    if(!empty($_POST) && isset($_POST['btnComment']))
    { 
        require 'models/frontEnd/articleManager.php';
        require 'models/frontEnd/CommentManager.php';
  
    extract($_GET);
    $id = strip_tags($id);

   
    //fonction pour envoyer le Comment
    $CommentManagerF = new CommentManagerF();
    $sendComment = $CommentManagerF->sendComment();
    $Comments = $CommentManagerF->getComment($id);
    
   
    $articles = new ArticlesManager();
    $article = $articles->getArticle($id);
    
    require 'views/frontEnd/articleView.php';
    }
    else 
    {
        require 'models/frontEnd/articleManager.php';
        require 'models/frontEnd/CommentManager.php';
  
        extract($_GET);
        $id = strip_tags($id);
    
       
        
        
       
    $articles = new ArticlesManager();
    $article = $articles->getArticle($id);
    $CommentManagerF = new CommentManagerF();
    $Comments = $CommentManagerF->getComment($id);
        require 'views/frontEnd/articleView.php';
    } 
}
?>

