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
               <p>Veuillez remplir ce formulaire si vous désirez plus de renseignements </p>

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
        
       
    </section>
    </div>      
        
        <div class="row justify-content-center">
        <div class="col-md-4 d-flex justify-content-center">
            <a class="boutonAdministration" href="index.php?action=administrationContactTransformerNonLu&id='.$messageNonLu['id'].'">Passer en message non lu </a>
        </div>

        <div class="col-md-4 d-flex justify-content-center">
            <a class="boutonAdministration" href="index.php?action=administrationContactTransformerLu&id='.$messageNonLu['id'].'">Passer en message lu</a>
        </div>

        <div class="col-md-4 d-flex justify-content-center">
            <a class="boutonAdministration" href="index.php?action=administrationContactHome">Acceder au message</a>
        </div>
    '?>
    </div>
    <section id="administration">
        <form action="index.php?action=reponseRecu" method="POST">
            <label> Nom : 
            </label>
            <input type="text" name="pseudo">
            <label> Sujet : 
            </label>    
            <input type="text" name="sujet">
            <label> Email : 
            </label>    
            <input type="mail" name="email">
            <input class="inputNone"type="text" name="MessageLu" value=1>
            <label for=""> Message : </label>
            <textarea name="message" id="" cols="30" rows="10"></textarea>
            <input class="formButton" type="submit" value="Envoyer" name="btnContact">
        </form>
        
    </section>
  

 <?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>