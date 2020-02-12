<?php $title = $article->title ;?>
<?php ob_start() ?>
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
                <figure class='row'>
                    <img class='col-lg-8 col-lg-offset-2 colonne-centree' src="<?php echo $article->imageChapitre ?>" alt="<?php echo $article->imageAlt ?>">
                </figure>
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

    
    <script src="assets/js/scroll.js"></script>
    <?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>