<?php $title = "administration"; ?>
<?php ob_start() ?>



<section id="mainBillet" class="row">
    <div id="mainBilletConteneur" class="col-md-8 col-md-offset-2">

        <h1>Billet simple pour l'Alaska</h1>
        <h2>Administration </h2>
        <div id="paragrapheBillet">
            <p>Choisissez votre section </p>
           


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
            <a class="boutonAdministration" href="index.php?action=administrationContactHome">Acceder au message</a>
        </div>

    </div>
</section>






<?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>