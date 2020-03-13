<?php $title = "Contact" ;?>
<?php ob_start() ?>
     

    <section id="mainBillet" class="row">
        <div id="mainBilletConteneur" class="col-md-8 col-md-offset-2">

            <h1>Billet simple pour l'Alaska</h1>
            <h2>Formulaire de contact</h2>
            <div id="paragrapheBillet">
              <?php  if (isset($messageEnvoye)) 
              { echo $messageEnvoye;} else if 
              (isset($messageSignalement)) {echo $messageSignalement;} ?>

            </div>
        </div>
</section>
 
  
     
   

 <?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>