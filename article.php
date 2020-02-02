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

    require_once('models/functions.php');
    $article = getArticle($id);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css?family=Ramaraja&display=swap" rel="stylesheet">

    <title><?php echo $article->title ?></title>
</head>
<body>
    <?php include("includes/header.php") ?>
    <section id="imageParrallaxBillet" >
        <picture>

            <source srcset="images/fog-on-dark-waters-edge.mobile.jpg" media="(max-width: 480px)">
            <source srcset="images/fog-on-dark-waters-edge.mobile.jpg" media="(max-width: 1000px)">       
            <img src="images/fog-on-dark-waters-edge.jpg" alt="">
        </picture>
    </section>     

    <section id="mainBillet" class="row">
        <div id="mainBilletContainer" class="col-md-8 col-md-offset-2">

            <h1>Billet simple pour l'Alaska</h1>
            <h2>chapitre <?php echo $article->numeroChapitre ?> : <?php echo $article->title ?></h2>
            <div id="paragrapheBillet">
               
            </div>
        </div>
</section>
    <section id="chapitreContainer">
        <div id="billetContainer"class="row">
            <div class="chapitretemplate col-md-8 col-md-offset-2 ">
      
              
            
                <div class=contenuChapitre>
                <p>
                   <?php echo $article->content ?>
                </p>
                </div>
                
                <div class="commentaire">
                    <div class="trait"></div>
                    <h3>Commentaires</h3>
                    <h4>Pseudo : </h4>
                    <h5>Publié le :  </h5>
                    <p>c'est vraiment super ce bouquin , j'ai adoré</p>
                    <form action="">
                     
                        <label for=""><input type="checkbox">Signaler ce commentaire.</label>
                    </form>
                    <div class="trait"></div>

                <div>

                <form action="">
                    <h3>Laisser un commentaire</h3>
                    <label for="">Pseudo :</label>
                    <input type="text">                    
                    <label for="">Message:</label>
                    <textarea name="" id="" cols="30" rows="10"></textarea>                    
                    <input type="submit">
                </form>
            </div>
        </div>
    </section>

    
   <?php include("includes/footer.php") ?>
    
    <script src="scroll.js"></script>
</body>
</html>