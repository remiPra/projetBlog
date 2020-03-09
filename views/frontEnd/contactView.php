<?php $title = "Contact"; ?>
<?php ob_start() ?>
<section id="imageParrallaxBillet">
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
            <?php if($notificationErreur != null){
                echo '<p class="notificationErreur">'.$notificationErreur.'</p>';
            }?>

        </div>
    </div>
</section>
<section id="administration">
    <form action="index.php?action=contactRecu" method="POST">
        <label> Nom :
        </label>
        <input type="text" name="pseudo">
        <label> Sujet :
        </label>
        <input type="text" name="sujet">
        <label> Email :
        </label>
        <input type="mail" name="email">
        <label for=""> Message : </label>
        <textarea name="message" id="" cols="30" rows="10"></textarea>
        <input class="formButton" type="submit" value="Envoyer" name="btnContact">
    </form>
<script>
    

</script>
</section>


<?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>