<?php $title = "administration" ;?>
<?php ob_start() ?> 
<section id="imageParrallaxBillet" >
        <picture>

            <source srcset="images/fog-on-dark-waters-edge.mobile.mobile.jpg" media="(max-width: 480px)">
                <source srcset="images/fog-on-dark-waters-edge.mobile.jpg" media="(max-width: 900px)">
                <img src="images/fog-on-dark-waters-edge.jpg" alt="">
        </picture>
    </section>     

    <section id="mainBillet" class="row">
        <div id="mainBilletConteneur" class="col-md-8 col-md-offset-2">

            <h1>Billet simple pour l'Alaska</h1>
            <h2>Administration </h2>
            <div id="paragrapheBillet">
               <p>choisissez votre section </p>

            </div>
        </div>
    </section>
    <section>
    <div class="row justify-content-center">
        <div class="col-md-4 d-flex justify-content-center">
            <a class="boutonAdministration" href="index.php?action=administrationChapitres">Acceder aux chapitres </a>
        </div>
       
        <div class="col-md-4 d-flex justify-content-center">
            <a class="boutonAdministration" href="index.php?action=administrationCommentaires">Acceder aux commentaires </a>
        </div>
       
        <div class="col-md-4 d-flex justify-content-center">
            <a class="boutonAdministration" href="">Acceder au message</a>
        </div>

    </div>
    </section>
    <section>
     
    </section>


  
    <script src="scroll.js"></script>

    <?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>