<?php $raccourci = [['Link' =>'administrationHome','name'=>'Administration'],['Link'=>'administrationContactHome','name'=>'Contact'],
['Link'=>'administrationContactMessageNonLu','name'=>'Message']];?>

<?php $title = "Contact" ;?>
<?php ob_start() ?>
  

    <section id="mainBillet" class="row">
        <div id="mainBilletContainer" class="col-md-8 col-md-offset-2">

            <h1>Billet simple pour l'Alaska</h1>
            <h2>Message </h2>
            <div id="paragrapheBillet">
                    <p> Message de <?php echo $messageNonLu['pseudo'] ?> </p>

            </div>
        </div>
</section>
<section class="administrationChapter row">
        <div class="col-md-8 col-md-offset-2 message">
       <?php echo'
        <h4> Nom : '.$messageNonLu['pseudo'].'
            </h4>
            
            <h4> Sujet : '.$messageNonLu['subject'].'
            </h4>    
            
            <h4> Email : '.$messageNonLu['email'].' 
            </h4>    
            
            <h4> Message : '.$messageNonLu['message'].' </h4>
        
       
            </div>      
    </section>
        
        <div class="row justify-content-center">
        <div class="col-md-6 d-flex justify-content-center">
            <a class="ButtonAdministration" href="index.php?action=administrationContactTransformNonLu&id='.$messageNonLu['id'].'">Passer en message non lu </a>
        </div>

        <div class="col-md-6 d-flex justify-content-center">
            <a class="ButtonAdministration" href="index.php?action=administrationContactTransformLu&id='.$messageNonLu['id'].'">Passer en message lu</a>
        </div>

    '?>
    </div>
  
  

 <?php $content = ob_get_clean(); ?>
<?php require 'template.php' ?>