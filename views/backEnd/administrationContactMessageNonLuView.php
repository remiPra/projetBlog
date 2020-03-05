<?php $title = "Contact" ;?>
<?php ob_start() ?>
  

    <section id="mainBillet" class="row">
        <div id="mainBilletConteneur" class="col-md-8 col-md-offset-2">

            <h1>Billet simple pour l'Alaska</h1>
            <h2>Formulaire de contact</h2>
            <div id="paragrapheBillet">
                    <p> Message de <?php echo $messageNonLu['pseudo'] ?> </p>

            </div>
        </div>
</section>
<section class="administrationChapitre row">
        <div class="col-md-8 col-md-offset-2 message">
       <?php echo'
        <h4> Nom : '.$messageNonLu['pseudo'].'
            </h4>
            
            <h4> Sujet : '.$messageNonLu['sujet'].'
            </h4>    
            
            <h4> Email : '.$messageNonLu['email'].' 
            </h4>    
            
            <h4> Message : '.$messageNonLu['message'].' </h4>
        
       
            </div>      
    </section>
        
        <div class="row justify-content-center">
        <div class="col-md-6 d-flex justify-content-center">
            <a class="boutonAdministration" href="index.php?action=administrationContactTransformerNonLu&id='.$messageNonLu['id'].'">Passer en message non lu </a>
        </div>

        <div class="col-md-6 d-flex justify-content-center">
            <a class="boutonAdministration" href="index.php?action=administrationContactTransformerLu&id='.$messageNonLu['id'].'">Passer en message lu</a>
        </div>

    '?>
    </div>
  
  

 <?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>