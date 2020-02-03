<?php 
// on verifie si l'id existe et si c'est bien un nombre
if(!isset($_GET['id']) OR !is_numeric($_GET['id'])) {
    // redirection vers header
    header('Location: index.php');
    
} else
{
    // extraction de $_GET
    extract($_GET);
    $id = strip_tags($id);

    require_once('models/frontEnd/functions.php');
    $article = getArticle($id);

    require_once 'views/frontEnd/articleView.php';
}
?>

