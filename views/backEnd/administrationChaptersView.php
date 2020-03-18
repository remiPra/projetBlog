    <?php $raccourci = [['lien' =>'administrationHome','name'=>'Administration'],['lien'=>'administrationChapters','name'=>'Chapters']];?>
<?php $title = "administrationChapter"; ?>
<?php ob_start() ?>


<section id="mainBillet" class="row">
    
    <div id="mainBilletContainer" class="col-md-8 col-md-offset-2">
       
        
        <h1>Billet simple pour l'Alaska</h1>
        <h2>Administration </h2>
        <div id="paragrapheBillet">
            <p>Voici la liste des Chapters </p>
            
            <p><?php if(isset($notification)) echo $notification ;?></p>
 
        </div>
    </div>
</section>
<section>
    <div class="row justify-content-center">
        <div class="col-md-4 d-flex justify-content-center">
            <a class="boutonAdministration" href="#listesChapters">Listes des Chapters </a>
        </div>

        <div class="col-md-4 d-flex justify-content-center">
            <a class="boutonAdministration" href="#Chaptersbrouillons">Chapters en cours d'ecriture </a>
        </div>

        <div class="col-md-4 d-flex justify-content-center">
            <a class="boutonAdministration" href="index.php?action=administrationChaptersEcrire">Ecrire un nouveau Chapter</a>
        </div>
    </div>
    <section>

        <section class="administrationChapter" id="listesChapters" >
            <div class="row justify-content-center " >
                <div>
                    <h3>Listes des Chapters </h3>
                    <table>
                        <tr>
                            <th>Numéro Chapter </th>
                            <th>Titre</th>
                            <th>Extrait</th>
                            <th>Action</th>
                        </tr>
                        <!-- tableau des Chapters valides -->
                        <?php foreach ($articles as $article) : ?>
                            <?php echo '    <tr>
                    <td>' . $article['NumberChapter'] . '</td>
                    <td>' . $article['title'] . '</td>
                    <td class="sentenceTableau">' ?>
                            <?php
                            echo $article['sentence'] ?><?php echo '</td>
                    <td >
                        <div class="actionTableau">
                            <a class="lienAdministration" href="index.php?action=article&id=' . $article['NumberChapter'] . '">Lire </a>
                            <a class="lienAdministration" href="index.php?action=administrationChaptersModifier&id=' . $article['id'] . '">Modifier </a>
                            <a class="lienAdministration" href="index.php?action=administrationChaptersSupprimer&id=' . $article['id'] . '"">Supprimer </a>

                        </div>
                    </td>
                        </tr> ' ?>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
        </section>
        <div class="row justify-content-center ChapterEnCours" id="Chaptersbrouillons">
            <div>
                <h3> Chapters en cours d'ecriture </h3>
                <table>
                    <tr>
                        <th>Numéro Chapter </th>
                        <th>Titre</th>
                        <th>Extrait</th>
                        <th>Action</th>
                    </tr>
                    <!-- tableau des Chapters brouillon -->
                    <?php foreach ($articlesB as $articleB) : ?>
                        <?php echo '    <tr>
                    <td>' . $articleB['NumberChapter'] . '</td>
                    <td>' . $articleB['title'] . '</td>
                    <td class="sentenceTableau">' . $articleB['sentence'] . '</td>
                    <td>
                        <div class="actionTableau">
                            <a class="lienAdministration" href="index.php?action=administrationChaptersModifier&id=' . $articleB['id'] . '">Modifier </a>
                            <a class="lienAdministration" href="index.php?action=administrationChaptersSupprimer&id=' . $articleB['id'] . '"">Supprimer </a>
                        </div>
                        </td>
                </tr> ' ?>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>


    </section>

    <section class="administrationChapter">
        <div class="row justify-content-center " id="listesChapters">
            <div>
                <h3>Listes des Chapters supprimés</h3>
                <table>
                    <tr>
                        <th>Numéro Chapter </th>
                        <th>Titre</th>
                        <th>Extrait</th>
                        <th>Action</th>
                    </tr>
                    <!-- tableau des Chapters valides -->
                    <?php foreach ($articlesS as $articleS) : ?>
                        <?php echo '    <tr>
                    <td>' . $articleS['NumberChapter'] . '</td>
                    <td>' . $articleS['title'] . '</td>
                    <td class="sentenceTableau">' ?>
                        <?php
                        echo $articleS['sentence'] ?><?php echo '</td>
                    <td >
                        <div class="actionTableau">
                           
                            <a class="lienAdministration" href="index.php?action=administrationChapterTransformerBrouillon&id=' . $articleS['id'] . '">Passer en brouillon </a>
                            <a class="lienAdministration" href="index.php?action=administrationChapterTransformerSupprimer&id=' . $articleS['id'] . '">Supprimer </a>
                        </div>
                    </td>
                        </tr> ' ?>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </section>



    <script src="scroll.js"></script>

    <?php $content = ob_get_clean(); ?>
    <?php require 'template.php' ?>