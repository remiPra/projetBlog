<?php $raccourci = [
    ['Link' => 'administrationHome', 'name' => 'Administration'],
    ['Link' => 'administrationChapters', 'name' => 'Chapters'],
    ['Link' => 'administrationChaptersModify', 'name' => 'Modify Chapter']
]; ?>

<?php $title = "administration"; ?>
<?php ob_start() ?>


<section id="mainBillet" class="row">
    <div id="mainBilletContainer" class="col-md-8 col-md-offset-2">

        <h1>Billet simple pour l'Alaska</h1>
        <h2>Administration </h2>
        <div id="paragrapheBillet">
            <p>Voici votre chapitre a modifié</p>


        </div>
    </div>
</section>

<section>
    <div class="row justify-content-center">


        <form enctype="multipart/form-data" action="index.php?action=administrationChapterModifyEnvoi" method="POST" id="administrationChapterEcrire">
            <?php echo '
               <label> Numéro de chapitre déja utilisé </label> ' ?>
           
            </p>
            <p id="ChapterNumberUse"> Vous avez deja utilisé les chapitres :<span id="ChapterNumberUseList">
          
            <?php foreach($Chapters as $Chapter) :
                if($Chapter['NumberChapter'] != $article['NumberChapter']  ) 
                    { echo '<span>'.$Chapter['NumberChapter'].'</span>;'; }
                    endforeach; ?>
            </p>
            <p class="success">Reecrivez svp le numero de chapitre en cours ou un autre numéro de chapitre possible</p>
            <?php echo '
            <label for="numberPossible">Numéro de chapitre : ' . $article['NumberChapter'] . '
            </label>
            <input id="numberPossible"type="text" name="NumberChapter" value="' . $article['NumberChapter'] . '">
           
            <p id="numberPossibleValidate"></p>
            <label for="title"> Titre du chapitre : 
            </label>    
            <input id="title" type="text" name="title" value="' . $article['title'] . '">
            <label for="sentence"> Résumé du chapitre : 
            </label>    
            <input id="sentence"type="text" name="sentence" value="' . $article['sentence'] . '">
            <input type="text" class="inputNone" name="id" value="' . $article['id'] . '">
            <label for="texteeditor"> Contenu du chapitre  : </label>
            <label for="texteeditor"> Contenu du Chapter  : </label>
           
            <textarea name="content" class="tinymce" id="texteditor" cols="300" rows="10" >  <div> '.$article['content'].'</div></textarea>

            <img id="imgSource" src="images/' . $article['imageChapter'] . ' " >

           
           

            <label>Uploader le fichier image:</label>
            <input name="avatar" type="file" /> '?> 
             <p id="listImages">
                <?php foreach ($images as $image) : ?>
                    <?php echo $image['imageChapter']; ?>
                <?php endforeach; ?>

            </p>
            <div id="imagePossibleValidate">
                <p></p>
                <button type="button">Fermer</button>
            </div> 
            
            <?php '        
            <label for="texteeditor"> Contenu du Cchapitre  : </label>
           
            <textarea name="content" class="tinymce" id="texteditor" cols="300" rows="10" >  <div> ' . $article['content'] . '</div></textarea>
           
            '?>
             <label for="altImage"> Description de l'image : </label>
            <input id="altImage" type="text" name="altImage">
            <label for="brouillon" id="brouillonForm"> Que voulez vous faire pour ce chapitre : </label>
                <select id="brouillon" name="brouillon">
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
                    <input id="ChapterValidationBtn" class="formButton" type="button" value="oui" name="btnAdministrationEcrire">
                    <button type="button" id="returnChapter">Non</button>
                </div>
   
            </div>
            <div class="inputNone" id="textEditor"> <?php echo $article['content'] ?> </div>
        </form>
        <script src="assets/js/validationChapter.js"></script>
</section>



<?php $content = ob_get_clean(); ?>
<?php require 'template.php' ?>