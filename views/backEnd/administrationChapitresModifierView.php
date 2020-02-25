<?php $title = "administration"; ?>
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
        <h2>Administration </h2>
        <div id="paragrapheBillet">
            <p>Section Chapitres </p>


        </div>
    </div>
</section>

<section>
    <div class="row justify-content-center">


        <form enctype="multipart/form-data" action="index.php?action=administrationChapitreModifierEnvoi" method="POST" id="administrationChapitreEcrire">
            <?php echo '
            <label>Numero de chapitre : 
            </label>
            <input type="text" name="numeroChapitre" value="' . $article['numeroChapitre'] . '">
            <label> Titre du chapitre : 
            </label>    
            <input type="text" name="title" value="' . $article['title'] . '">
            <label> Résumé du chapitre : 
            </label>    
            <input type="text" name="sentence" value="' . $article['sentence'] . '">
            <input type="text" class="inputNone" name="id" value="' . $article['id'] . '">
            
            <label> Envoyer une image </label>

            
       
           

            <label>Uploader le fichier image:</label>
            <input name="imageBlob" type="file" /> 

            

            <label for="content"> Contenu du chapitre  : </label>
           
            <textarea name="content" class="tinymce" id="texteditor" cols="300" rows="10" >  <div> '.$article['content'].'</div></textarea>
            <label for="brouillon" id="brouillonForm"> Que voulez vous faire pour ce Chapitre : </label>
                <select id="brouillon" name="brouillon">
                    <option value="0">Ce chapitre peut être publié</option>
                    <option value="1">Garder en brouillon</option>
                </select>
            <input class="formButton" type="submit" value="envoyer" name="btnAdministrationEcrire">
        ' ?>
            <div class="inputNone" id="textEditor"> <?php echo $article['content'] ?> </div>
        </form>
</section>



<?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>