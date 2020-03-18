<?php $raccourci = [
    ['lien' => 'administrationHome', 'name' => 'Administration'],
    ['lien' => 'administrationChapters', 'name' => 'Chapters'],
    ['lien' => 'administrationChaptersEcrire', 'name' => 'Nouveau Chapter']
]; ?>

<?php $title = "administration"; ?>
<?php ob_start() ?>


<section id="mainBillet" class="row">
    <div id="mainBilletContainer" class="col-md-8 col-md-offset-2">

        <h1>Billet simple pour l'Alaska</h1>
        <h2>Administration </h2>
        <div id="paragrapheBillet">
            <p>vous pouvez creer votre nouveau Chapter <br>
                Attention a bien utiliser un Chapter avec un Number de Chapter non utilisé. </p>

        </div>
    </div>
</section>

<section>
    <div class="row justify-content-center">

        <form enctype="multipart/form-data" action="index.php?action=administrationChapterNouveau" method="POST" id="administrationChapterEcrire">
            <label> Numéro de Chapter déja utilisé </label>
            <p id="ChapterNumberUse"> Vous avez deja utilisé les Chapters :
                <?php foreach ($Chapters as $Chapter) : ?>

                    <?php echo 'N°' . $Chapter['NumberChapter'] . ' '; ?>

                <?php endforeach; ?>
            </p>

            <label for="NumberChapter"> Number de Chapter :
            </label>
            <input id="numberPossible" type="text" name="NumberChapter">
            <p id="numberPossibleValidate" style="color:red;"></p>
            <label for="title"> Titre du Chapter :</label>
            <input id="Chaptertitle" type="text" name="title">
            <label> Résumé du Chapter :
            </label>
            <input id="ChapterSentence" type="text" name="sentence">
            <label> Envoyer une image </label>






            <label>Uploader le fichier image:</label>
            <input name="avatar" type="file" />


            <p id="listImages">
                <?php foreach ($images as $image) : ?>
                    <?php echo $image['imageChapter']; ?>
                <?php endforeach; ?>

            </p>
            <p id="imagePossibleValidate" style="color:red;"></p>


            <label for="content"> Contenu du Chapter : </label>
            <textarea id="ChapterContent" name="content" id="" cols="300" rows="10"></textarea>
            <label for="brouillon" id="brouillonForm"> Que voulez vous faire pour ce Chapter : </label>
            <select id="ChapterBrouillon" name="brouillon">
                <option value="0">Ce Chapter peut être publié</option>
                <option value="1">Garder en brouillon</option>
            </select>
            <div id=blocValidate>
                <p id="validationPhrase"> Vous n'avez remplis tous les champs </p>
                
                <button type="button" id="prepareSend"> Envoyer </button>
            </div>
            <div id=confirmValidate>
                <p></p>
                <div id="confirmValidateButton">
                    <button type="button" id="closeConfirmValidate">Fermer</button>
                    <input id="ChapterValidationBtn" class="formButton" type="submit" value="oui" name="btnAdministrationEcrire">
                    <button type="button" id="returnChapter">Non</button>
                </div>
   
            </div>
        </form>
</section>


<script src="assets/js/validationChapter.js"></script>


<?php $content = ob_get_clean(); ?>
<?php require 'template.php' ?>