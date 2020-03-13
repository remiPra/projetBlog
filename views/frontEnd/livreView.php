<?php $title = "Liste des chapitres"; ?>
<?php ob_start() ?>


<section id="mainBillet" class="row">
    <div id="mainBilletConteneur" class="col-md-8 col-md-offset-2">

        <h1 class="ghost">Billet simple pour l'Alaska</h1>
        <h2>Liste des Chapitres </h2>
        <div id="paragrapheBillet">
            <p>Retrouvez la liste des chapitres écrites par jean Laroche sur les differentes vignettes </p>

        </div>
    </div>
</section>
<section id="listeChapitre">
    <?php
    // boucle pour faire apparaitre nos données
    foreach ($articles as $article) : ?>
        <article class="chapitre col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2">
            <div>
                <?php echo '
                <div class="infoChapitre" >
                    <h3 class="titreChapitre">' . $article['title'] . '</h3>
                    <h4 class="numeroChapitre"> Chapitre : ' . $article['numeroChapitre'] . '</h4>
                    <h5 class="Publication">Publié le : ' ?>

                <?php 
               var_dump($article['date']);
               //$allArticles->dateFormat($str);
              

               ?>



                <?php echo '       
                    </h5>
                </div>
            </div>
            <figure>
                <img src="images/' . $article['imageChapitre'] . '" alt="' . $article['imageAlt'] . '">
               
                <figcaption >
                    <h6 class="resume">' . $article['sentence'] . '</h5>
                  <div class="lireLaSuite">
                  <a href="index.php?action=article&id=' . $article['numeroChapitre'] . '" class="btnS">Lire la suite</a> ' ?>
            </div>
            </figcaption>
            </figure>
        </article>
    <?php endforeach; ?>
</section>


<?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>