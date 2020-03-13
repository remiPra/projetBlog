<?php $raccourci = [
    ['lien' => 'administrationHome', 'name' => 'Administration'],
    ['lien' => 'administrationChapitres', 'name' => 'Chapitres'],
    ['lien' => 'administrationChapitresEcrire', 'name' => 'Nouveau Chapitre']
]; ?>

<?php $title = "administration"; ?>
<?php ob_start() ?>


<section id="mainBillet" class="row">
    <div id="mainBilletConteneur" class="col-md-8 col-md-offset-2">

        <h1>Billet simple pour l'Alaska</h1>
        <h2>Administration </h2>
        <div id="paragrapheBillet">
            <p>vous pouvez creer votre nouveau chapitre <br>
        Attention a bien utiliser un chapitre avec un numero de chapitre non utilisé. </p>

        </div>
    </div>
</section>

<section>
    <div class="row justify-content-center">

        <form enctype="multipart/form-data" action="index.php?action=administrationChapitreNouveau" method="POST" id="administrationChapitreEcrire">
            <label> Numéro de chapitre déja utilisé </label>
            <p id="chapitreNumberUse"> Vous avez deja utilisé les chapitres :
                <?php foreach ($chapitres as $chapitre) : ?>

                    <?php echo 'N°' . $chapitre['numeroChapitre'] . ' '; ?>

                <?php endforeach; ?>
            </p>

            <label for="numeroChapitre"> Numero de chapitre :
            </label>
            <input id="numberPossible" type="text" name="numeroChapitre">
            <p id="demo" style="color:red;"></p>
            <label for="title"> Titre du chapitre :</label>
            <input id="chapitretitle" type="text" name="title">
            <label> Résumé du chapitre :
            </label>
            <input id="chapitreSentence" type="text" name="sentence">
            <label> Envoyer une image </label>






            <label>Uploader le fichier image:</label>
            <input name="avatar" type="file" />


            <p id="listImages">
                <?php foreach ($images as $image) : ?>
                    <?php echo $image['imageChapitre']; ?>
                <?php endforeach; ?>

            </p>

            <label for="content"> Contenu du chapitre : </label>
            <textarea id="chapitreContent" name="content" id="" cols="300" rows="10"></textarea>
            <label for="brouillon" id="brouillonForm"> Que voulez vous faire pour ce Chapitre : </label>
            <select id="chapitreBrouillon" name="brouillon">
                <option value="0">Ce chapitre peut être publié</option>
                <option value="1">Garder en brouillon</option>
            </select>
            <p id="validationPhrase"> Vous n'avez remplis tous les champs </p>
            <input id="chapitreValidationBtn" class="formButton" type="button" value="envoyer" name="btnAdministrationEcrire">
        </form>
</section>


<script src="assets/js/validationChapitre.js"></script>


<?php $content = ob_get_clean(); ?>
<?php require 'template.php' ?>