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
        <div id="mainBilletContainer" class="col-md-8 col-md-offset-2">

            <h1>Billet simple pour l'Alaska</h1>
            <h2>Administration </h2>
            <div id="paragrapheBillet">
               <p>Entrez votre nom et votre mot de passe </p>

            </div>
        </div>
    </section>
    <section>
    <div class="row justify-content-center">
        <div class="col-md-3 d-flex justify-content-center">
            <a class="boutonAlaska" href="tinyMCE/index.php">Nouveau Chapitre</a>
        </div>
       
        <div class="col-md-3 d-flex justify-content-center">
            <a class="boutonAlaska" href="">Modifier Chapitre</a>
        </div>
       
        <div class="col-md-3 d-flex justify-content-center">
            <a class="boutonAlaska" href="">Effacer Chapitre</a>
        </div>
       
        <div class="col-md-3 d-flex justify-content-center">
            <a class="boutonAlaska" href="">Nouveau Chapitre</a>
        </div>
       
      



    </div>

    </section>
  
    <script src="scroll.js"></script>

    <?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>