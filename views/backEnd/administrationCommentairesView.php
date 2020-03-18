<?php $raccourci = [['lien' =>'administrationHome','name'=>'Administration'],['lien'=>'administrationCommentaires','name'=>'Commentaires']];?>


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
            <a class="boutonAdministration" href="#listesCommentaires">Listes des commentaires publiés </a>
        </div>

        <div class="col-md-4 d-flex justify-content-center">
            <a class="boutonAdministration" href="#listesCommentairesSignales">Listes des commentaires signalés </a>
        </div>

        <div class="col-md-4 d-flex justify-content-center">
            <a class="boutonAdministration" href="#listesCommentairesEnCours">Liste des commentaires en cours de validation</a>
        </div>
    </div>
</section>



<section id="listesCommentairesSignales" class="administrationChapter">
    <div class="row justify-content-center " id="listesChapters">
        <div>
            <h3 >Listes des commentaires signalés sur le site</h3>
            <table>
                <tr>
                    <th>Id </th>
                    <th>Number Chapter</th>
                    <th>Pseudo</th>
                    <th>Commentaire</th>
                    <th>Action</th>
                </tr>
                <!-- tableau des Chapters -->
                <?php foreach ($commentsS as $commentS) : ?>
                    <?php echo '    
                <tr>
                    <td>' . $commentS['id'] . '</td>
                    <td>' . $commentS['numChapter'] . '</td>
                    <td>' . $commentS['pseudo'] . '</td>
                    <td class="sentenceTableau"> '.$commentS['commentaire'].' </td>
                    <td>
                        <div class="actionTableau">
                            <a class="lienAdministration" href="index.php?action=AdministrationCommentairesTransformerEnCours&id='.$commentS['id'].'">
                            Passer en cours</a> 
                       
                            <a class="lienAdministration" href="index.php?action=AdministrationCommentairesTransformerSuppression&id='.$commentS['id'].'">
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


<section id="listesCommentairesEnCours" class="administrationChapter">
    <div class="row justify-content-center ">
        <div>
            <h3 >Liste des commentaires publiées sur le site en attente de votre validation</h3>
           
            <table>
                <tr>
                    <th>Id </th>
                    <th>Number Chapter</th>
                    <th>Pseudo</th>
                    <th>Commentaire</th>
                    <th>Action</th>
                </tr>
                <!-- tableau des Chapters -->
                <?php foreach ($comments as $comment) : ?>
                    <?php echo '    <tr>
                    <td>' .htmlspecialchars($comment['id']) . '</td>
                    <td>' .htmlspecialchars($comment['numChapter']) . '</td>
                    <td>' .htmlspecialchars($comment['pseudo']) . '</td>
                    <td class="sentenceTableau">' ?>
                    <?php
                    echo htmlspecialchars($comment['commentaire']) ?><?php echo '</td>
                    <td >
                        <div class="actionTableau">
                            <a class="lienAdministration" href="index.php?action=AdministrationCommentairesTransformerValider&id='.$comment['id'].'">
                            Valider</a> 
                            
                            <a class="lienAdministration" href="index.php?action=AdministrationCommentairesTransformerSupprimer&id='.$comment['id'].'">
                            Supprimer</a> 
                             

                            
                             
                        </div>
                    </td>
                        </tr> ' ?>
                <?php endforeach; ?>

            </table>
        </div>
    </div>
</section>

<section id="listesCommentaires" class="administrationChapter">
    <div class="row justify-content-center ">
        <div>
            <h3 >Listes des commentaires validés et publiés sur le site</h3>
            <table>
                <tr>
                    <th>Id </th>
                    <th>Number Chapter</th>   
                    <th>Pseudo</th>
                    <th>Commentaire</th>
                    <th>Action</th>
                </tr>
                <!-- tableau des Chapters -->
                <?php foreach ($commentsV as $commentV) : ?>
                    <?php echo '    <tr>
                    <td>' .htmlspecialchars($commentV['id']) . '</td>
                    <td>' .htmlspecialchars($commentV['numChapter']) . '</td>
                    <td>' .htmlspecialchars($commentV['pseudo']) . '</td>
                    <td class="sentenceTableau">' ?>
                    <?php
                    echo htmlspecialchars($commentV['commentaire']) ?><?php echo '</td>
                    <td >
                        <div class="actionTableau">
                            <a class="lienAdministration" href="index.php?action=AdministrationCommentairesTransformerEnCours&id='.htmlspecialchars($commentV['id']).'">Passer en cours
                            </a> 
                           
                                
                            <a class="lienAdministration" href="index.php?action=AdministrationCommentairesTransformerSupprimer&id='.htmlspecialchars($commentV['id']).'">
                            Supprimer</a> 
                               

                            
                             
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
<?php require_once 'template.php' ?>