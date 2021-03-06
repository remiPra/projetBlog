<?php $title = "Liste des Chapters"; ?>
<?php ob_start() ?>


<section id="mainBillet" class="row">
    <div id="mainBilletContainer" class="col-md-8 col-md-offset-2">

        <h1 class="ghost">Billet simple pour l'Alaska</h1>
        <h2>Liste des chapitres </h2>
        <div id="paragrapheBillet">
            <p>Retrouvez la liste des chapitres écrits par Jean Forteroche sur les différentes vignettes </p>

        </div>
    </div>
</section>
<section id="listeChapter">  
    <?php
    // boucle pour faire apparaitre nos données
    foreach ($articles as $article) : ?>
        <article class="Chapter col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2">
            <div>
                <?php echo '
                <div class="infoChapter" >
                    <h3 class="titreChapter">' . $article['title'] . '</h3>
                    <h4 class="NumberChapter"> Chapitre : ' . $article['NumberChapter'] . '</h4>
                    <h5 class="Publication">Publié le : '.$article['date'].'' ?>
                          
                <?php echo '       
                    </h5>
                </div>
            </div>
            <figure>
                <img src="images/' . $article['imageChapter'] . '" alt="' . $article['altImage'] . '">
               
                <figcaption >
                    <h6 class="resume">' . $article['sentence'] . '</h5>
                  <div class="lireLaSuite">
                  <a href="index.php?action=article&id=' . $article['NumberChapter'] . '" class="btnS">Lire la suite</a> ' ?>
            </div>
            </figcaption>
            </figure>
        </article>
    <?php endforeach; ?>
</section>


<?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>