<?php $raccourci = [['Link' =>'administrationHome','name'=>'Administration'],['Link'=>'administrationComments','name'=>'Comments']];?>


<?php $title = "administration"; ?>
<?php ob_start() ?>


<section id="mainBillet" class="row">
    <div id="mainBilletContainer" class="col-md-8 col-md-offset-2">

        <h1>Billet simple pour l'Alaska</h1>
        <h2>Administration </h2>
        <div id="paragrapheBillet">
            <p>Voici la liste des commentaires </p>
            <p id="success"><?php if(isset($notification)) {echo $notification;} ?></p>
        </div>
    </div>
</section>
<section>
    <div class="row justify-content-center">
        <div class="col-md-4 d-flex justify-content-center">
            <a class="ButtonAdministration" href="#listesComments">Listes des commentaires publiés </a>
        </div>

        <div class="col-md-4 d-flex justify-content-center">
            <a class="ButtonAdministration" href="#listesCommentsSignales">Listes des commentaires signalés </a>
        </div>

        <div class="col-md-4 d-flex justify-content-center">
            <a class="ButtonAdministration" href="#listesCommentsEnCours">Liste des commentaires en cours de validation</a>
        </div>
    </div>
</section>



<section id="listesCommentsSignales" class="administrationChapter">
    <div class="row justify-content-center " id="listesChapters">
        <div>
            <h3 >Listes des commentaires signalés sur le site</h3>
            <table>
                <tr>
                    <th>Id </th>
                    <th>Number Chapter</th>
                    <th>Pseudo</th>
                    <th>Comment</th>
                    <th>Action</th>
                </tr>
                <!-- tableau des Chapters -->
                <?php foreach ($CommentsS as $CommentS) : ?>
                    <?php echo '    
                <tr>
                    <td>' . $CommentS['id'] . '</td>
                    <td>' . $CommentS['numChapter'] . '</td>
                    <td>' . $CommentS['pseudo'] . '</td>
                    <td class="sentenceTableau"> '.$CommentS['Comment'].' </td>
                    <td>
                        <div class="actionTableau">
                            <a class="LinkAdministration" href="index.php?action=AdministrationCommentsTransformEnCours&id='.$CommentS['id'].'">
                            Passer en cours</a> 
                       
                            <a class="LinkAdministration" href="index.php?action=AdministrationCommentsTransformSuppression&id='.$CommentS['id'].'">
                            Suppression</a> 
                            
                        </div>
                    </td>
                </tr>
                         ' ?>
                <?php endforeach; ?>

            </table>
        </div>
    </div>
</section>


<section id="listesCommentsEnCours" class="administrationChapter">
    <div class="row justify-content-center ">
        <div>
            <h3 >Liste des commentaires publiées sur le site en attente de votre validation</h3>
           
            <table>
                <tr>
                    <th>Id </th>
                    <th>Numero chapitre</th>
                    <th>Pseudo</th>
                    <th>Commentaire</th>
                    <th>Action</th>
                </tr>
                <!-- tableau des Chapters -->
                <?php foreach ($CommentsP as $Comment) : ?>
                    <?php echo '    <tr>
                    <td>' .htmlspecialchars($Comment['id']) . '</td>
                    <td>' .htmlspecialchars($Comment['numChapter']) . '</td>
                    <td>' .htmlspecialchars($Comment['pseudo']) . '</td>
                    <td class="sentenceTableau">' ?>
                    <?php
                    echo htmlspecialchars($Comment['Comment']) ?><?php echo '</td>
                    <td >
                        <div class="actionTableau">
                            <a class="LinkAdministration" href="index.php?action=AdministrationCommentsTransformValider&id='.$Comment['id'].'">
                            Valider</a> 
                            
                            <a class="LinkAdministration" href="index.php?action=AdministrationCommentsTransformSuppression&id='.$Comment['id'].'">
                            Suppression</a> 
                             

                            
                             
                        </div>
                    </td>
                        </tr> ' ?>
                <?php endforeach; ?>

            </table>
        </div>
    </div>
</section>

<section id="listesComments" class="administrationChapter">
    <div class="row justify-content-center ">
        <div>
            <h3 >Listes des commentaires validés et publiés sur le site</h3>
            <table>
                <tr>
                    <th>Id </th>
                    <th>Numero chapitre</th>   
                    <th>Pseudo</th>
                    <th>Commentaire</th>
                    <th>Action</th>
                </tr>
                <!-- tableau des Chapters -->
                <?php foreach ($CommentsV as $CommentV) : ?>
                    <?php echo '    <tr>
                    <td>' .htmlspecialchars($CommentV['id']) . '</td>
                    <td>' .htmlspecialchars($CommentV['numChapter']) . '</td>
                    <td>' .htmlspecialchars($CommentV['pseudo']) . '</td>
                    <td class="sentenceTableau">' ?>
                    <?php
                    echo htmlspecialchars($CommentV['Comment']) ?><?php echo '</td>
                    <td >
                        <div class="actionTableau">
                            <a class="LinkAdministration" href="index.php?action=AdministrationCommentsTransformEnCours&id='.htmlspecialchars($CommentV['id']).'">Passer en cours
                            </a> 
                           
                                
                            <a class="LinkAdministration" href="index.php?action=AdministrationCommentsTransformSuppression&id='.htmlspecialchars($CommentV['id']).'">
                            Suppression</a> 
                               

                            
                             
                        </div>
                    </td>
                        </tr> ' ?>
                <?php endforeach; ?>

            </table>
        </div>
    </div>
</section>






<?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>