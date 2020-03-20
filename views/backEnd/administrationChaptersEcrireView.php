<?php $raccourci = [
    ['Link' => 'administrationHome', 'name' => 'Administration'],
    ['Link' => 'administrationChapters', 'name' => 'Chapters'],
    ['Link' => 'administrationChaptersEcrire', 'name' => 'Nouveau Chapter']
]; ?>

<?php $title = "administration"; ?>
<?php ob_start() ?>


<section id="mainBillet" class="row">
    <div id="mainBilletContainer" class="col-md-8 col-md-offset-2">

        <h1>Billet simple pour l'Alaska</h1>
        <h2>Administration </h2>
        <div id="paragrapheBillet">
            <p>Vous pouvez creer votre nouveau chapitre <br>
                Attention a bien utiliser un chapitre avec un numéro de chapitre non utilisé. </p>

        </div>
    </div>
</section>

<section>
    <div class="row justify-content-center">

        <form enctype="multipart/form-data" action="index.php?action=administrationChapterNouveau" method="POST" id="administrationChapterEcrire">
            <label> Numéro de chapitre déja utilisé </label>
            <p id="ChapterNumberUse"> Vous avez deja utilisé les chapitres :
                <?php foreach ($Chapters as $Chapter) : ?>

                    <?php echo 'N°' . $Chapter['NumberChapter'] . ' '; ?>

                <?php endforeach; ?>
            </p>

            <label for="NumberChapter"> numéro de chapitre :
            </label>
            <input id="numberPossible" type="text" name="NumberChapter">
            <p id="numberPossibleValidate" style="color:red;"></p>
            <label for="title"> Titre du chapitre :</label>
            <input id="Chaptertitle" type="text" name="title">
            <label> Résumé du chapitre :
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
            <div id="imagePossibleValidate">
                <p></p>
                <button type="button">Fermer</button>
            </div> 
       

            <label for="content"> Contenu du chapitre : </label>
            <textarea id="ChapterContent" name="content" id="" cols="300" rows="10"></textarea>
            <label for="brouillon" id="brouillonForm"> Que voulez vous faire pour ce chapitre : </label>
            <select id="ChapterBrouillon" name="brouillon">
                <option value="0">Ce chapitre peut être publié</option>
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