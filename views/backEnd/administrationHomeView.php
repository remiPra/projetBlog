<?php $raccourci = ['Link' => 'administrationHome', 'name' => 'Administration']; ?>

<?php $title = "administration"; ?>
<?php ob_start() ?>



<section id="mainBillet" class="row">
    <div id="mainBilletContainer" class="col-md-8 col-md-offset-2">

        <h1>Billet simple pour l'Alaska</h1>
        <h2>Administration </h2>
        <div id="paragrapheBillet">
            <p class="success"> Vous êtes connecté </p>
            
                    <p>Choisissez votre section </p>



        </div>
    </div>
</section>
<section>
    <div class="row justify-content-center" id="administrationHomeMarginBottom">
        <div class="col-md-4 d-flex justify-content-center">
            <a class="ButtonAdministration" href="index.php?action=administrationChapters">Acceder aux chapitres </a>
        </div>

        <div class="col-md-4 d-flex justify-content-center">
            <a class="ButtonAdministration" href="index.php?action=administrationComments">Acceder aux commentaires </a>
        </div>

        <div class="col-md-4 d-flex justify-content-center">
            <a class="ButtonAdministration" href="index.php?action=administrationContactHome">Acceder au message</a>
        </div>

    </div>
</section>






<?php $content = ob_get_clean(); ?>
<?php require 'template.php' ?>