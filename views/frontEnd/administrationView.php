<?php $title = "administration"; ?>
<?php ob_start() ?>


<section id="mainBillet" class="row">
    <div id="mainBilletConteneur" class="col-md-8 col-md-offset-2">

        <h1>Billet simple pour l'Alaska</h1>
        <h2>Administration </h2>
        <div id="paragrapheBillet">
            <p id="erreur"> Vous n'etes pas connecté </p>
            <p>Entrez votre nom et votre mot de passe </p>
            <?php if (isset($notification)) {
                echo $notification;
            }
             if (isset($notification1)) {
                echo $notification1;
            }
             ?>


        </div>
    </div>
</section>
<section id="administration">
    <form action="index.php?action=administrationConnexion" method='POST'>
        <label> Pseudo :
        </label>
        <input name="name" type="text">
        <label> Mot de Passe
        </label>
        <input name="password" type="password">
        <input type="submit" value="Se connecter">
    </form>

</section>


<?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>