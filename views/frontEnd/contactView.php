<?php $title = "Contact"; ?>
<?php ob_start() ?>


<section id="mainBillet" class="row">
    <div id="mainBilletConteneur" class="col-md-8 col-md-offset-2">

        <h1>Billet simple pour l'Alaska</h1>
        <h2>Formulaire de contact</h2>
        <div id="paragrapheBillet">
           
            <?php if(isset($notificationErreur)){
                echo '<p class="notificationErreur">'.$notificationErreur.'</p>';
            }
            else {echo '<p>Veuillez remplir ce formulaire si vous désirez plus de renseignements </p>';}?>

        </div>
    </div>
</section>
<section id="administration">
    <form action="index.php?action=contactRecu" method="POST">
        <label  for="pseudo"> Nom :
        </label>
        <input type="text" name="pseudo" id="pseudo">
        <label  for="sujet"> Sujet :
        </label>
        <input type="text" name="sujet" id="sujet">
        <label> Email :
        </label  for="email">
        <input type="mail" name="email" id="email">
        <label for="message"> Message : </label>
        <textarea name="message" id="message" cols="30" rows="10"></textarea>
        <input class="formButton" type="submit" value="Envoyer" name="btnContact">
    </form>
<script>
    

</script>
</section>


<?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>