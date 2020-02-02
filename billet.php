<?php 
require_once('models/functions.php');

$articles = getArticles();
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

    <title>Document</title>
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
                <h2>Liste des Chapitres </h2>
                <div id="paragrapheBillet">
                   <p>Retrouvez la liste des chapitres écrites par jean Laroche sur les differentes vignettes </p>
    
                </div>
            </div>
    </section>
    <section id="listeChapitre" >
    <?php 
        // boucle pour faire apparaitre nos données
         foreach($articles as $article): ?>   
        <div class="chapitre col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2">
            <div >
                <div class="infoChapitre" >
                    <h3 class="titreChapitre"><?php echo $article->title ?></h3>
                    <h4 class="numeroChapitre"> Chapitre : <?php echo $article->numeroChapitre ?></h4>
                    <h5 class="Publication">Publié le : <?php echo $article->date ?></h4>
                </div>
            </div>
            <figure>
                <img src="<?php echo $article->imageChapitre ?>" alt="">
                <!-- <a href='article.php?id=<?php echo $article->id ?>' class="buttonChapitre">Decouvrir ce chapitre </a>     -->
                <figcaption >
                    <h6 class="resume"><?php echo $article->sentence ?></h5>
                    <div class='lireLaSuite'>
                        <a href='article.php?id=<?php echo $article->id ?>'class="btnS">Lire la suite</a>
                    </div> 
                </figcaption>
            </figure>
        </div>
        <?php endforeach; ?>      

     
    </section>
    <?php include("includes/footer.php") ?>
    <script src="scroll.js"></script>



</body>
</html>
