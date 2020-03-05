<?php $title = "administration"; ?>
<?php ob_start() ?>


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

        <form enctype="multipart/form-data" action="index.php?action=administrationChapitreNouveau" method="POST" id="administrationChapitreEcrire">
            <label> Numéro de chapitre déja utilisé </label> 
            <p> Vous avez deja utilisé les chapitres : 
            <?php foreach($chapitres as $chapitre) : ?>
                
            <?php echo 'N°'.$chapitre['numeroChapitre'].' ';?> 

            <?php endforeach ; ?>    
            </p>
            <label> Numero de chapitre :
            </label>
            <input type="text" name="numeroChapitre">
            <label> Titre du chapitre :
            </label>
            <input type="text" name="title">
            <label> Résumé du chapitre :
            </label>
            <input type="text" name="sentence">
            <label> Envoyer une image </label>
             
            <!-- <label> Renseigner le nom du fichier de l\'image avec extension :  </label>
            <input name="imageChapitre" type="text" placeholder="image.jpg"/>  -->
            
       
           

            <label>Uploader le fichier image:</label>
            <input name="avatar" type="file" /> 




            <label for="content"> Contenu du chapitre : </label>
            <textarea name="content" id="" cols="300" rows="10"></textarea>
            <label for="brouillon" id="brouillonForm"> Que voulez vous faire pour ce Chapitre : </label>
            <select id="brouillon" name="brouillon">
                <option value="0">Ce chapitre peut être publié</option>
                <option value="1">Garder en brouillon</option>
            </select>
            <input class="formButton" type="submit" value="envoyer" name="btnAdministrationEcrire">
        </form>
</section>




<?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>