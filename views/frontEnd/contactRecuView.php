<?php $title = "Contact" ;?>
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
            <h2>Formulaire de contact</h2>
            <div id="paragrapheBillet">
               <p>Votre message a bien été envoyé </p>

            </div>
        </div>
</section>
 
  
     
   

 <?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>