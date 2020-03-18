<?php $raccourci = [['lien' =>'administrationHome','name'=>'Administration'],
['lien'=>'administrationChapters','name'=>'Chapters'],
['lien'=>'administrationChaptersModifier','name'=>'Modifier Chapter']];?>

<?php $title = "administration"; ?>
<?php ob_start() ?>


<section id="mainBillet" class="row">
    <div id="mainBilletContainer" class="col-md-8 col-md-offset-2">

        <h1>Billet simple pour l'Alaska</h1>
        <h2>Administration </h2>
        <div id="paragrapheBillet">
            <p>Voici votre Chapter a modifié</p>


        </div>
    </div>
</section>

<section>
    <div class="row justify-content-center">


        <form enctype="multipart/form-data" action="index.php?action=administrationChapterModifierEnvoi" method="POST" id="administrationChapterEcrire">
            <?php echo '
               <label> Numéro de Chapter déja utilisé </label> 
               <p> Vous avez deja utilisé les Chapters : '?> 
               <?php foreach($Chapters as $Chapter) : ?>
                   
               <?php echo 'N°'.$Chapter['NumberChapter'].' ';?> 
   
               <?php endforeach ; ?>    
               </p> 
            <?php echo '
            <label for="NumberChapter">Number de Chapter : 
            </label>
            <input id="NumberChapter"type="text" name="NumberChapter" value="' . $article['NumberChapter'] . '">
            <label for="title"> Titre du Chapter : 
            </label>    
            <input id="title" type="text" name="title" value="' . $article['title'] . '">
            <label for="sentence"> Résumé du Chapter : 
            </label>    
            <input id="sentence"type="text" name="sentence" value="' . $article['sentence'] . '">
            <input type="text" class="inputNone" name="id" value="' . $article['id'] . '">
            

            <img src="images/'.$article['imageChapter'].' " 
                    alt="'.$article['imageAlt'].'">

       
           

            <label>Uploader le fichier image:</label>
            <input name="avatar" type="file" /> 

            

            <label for="texteeditor"> Contenu du Chapter  : </label>
           
            <textarea name="content" class="tinymce" id="texteditor" cols="300" rows="10" >  <div> '.$article['content'].'</div></textarea>
            <label for="brouillon" id="brouillonForm"> Que voulez vous faire pour ce Chapter : </label>
                <select id="brouillon" name="brouillon">
                    <option value="0">Ce Chapter peut être publié</option>
                    <option value="1">Garder en brouillon</option>
                </select>
            <input class="formButton" type="submit" value="envoyer" name="btnAdministrationEcrire">
        ' ?>
            <div class="inputNone" id="textEditor"> <?php echo $article['content'] ?> </div>
        </form>
</section>



<?php $content = ob_get_clean(); ?>
<?php require 'template.php' ?>