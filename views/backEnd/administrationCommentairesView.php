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
            <?php echo $notification ?>
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

<section id="listesCommentairesEnCours" class="administrationChapitre">
    <div class="row justify-content-center ">
        <div>
            <h3 >Listes des commentaires en attente de publication</h3>
            <h4><?php echo count($nbComments); ?></h4>
            <table>
                <tr>
                    <th>Id </th>
                    <th>Numero chapitre</th>
                    <th>Pseudo</th>
                    <th>Commentaire</th>
                    <th>Action</th>
                </tr>
                <!-- tableau des chapitres -->
                <?php foreach ($comments as $comment) : ?>
                    <?php echo '    <tr>
                    <td>' . $comment['id'] . '</td>
                    <td>' . $comment['numChapitre'] . '</td>
                    <td>' . $comment['pseudo'] . '</td>
                    <td class="sentenceTableau">' ?>
                    <?php
                    echo $comment['commentaire'] ?><?php echo '</td>
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

<section id="listesCommentaires" class="administrationChapitre">
    <div class="row justify-content-center ">
        <div>
            <h3 >Listes des commentaires publiés sur le site</h3>
            <table>
                <tr>
                    <th>Id </th>
                    <th>Numero chapitre</th>   
                    <th>Pseudo</th>
                    <th>Commentaire</th>
                    <th>Action</th>
                </tr>
                <!-- tableau des chapitres -->
                <?php foreach ($commentsV as $commentV) : ?>
                    <?php echo '    <tr>
                    <td>' . $commentV['id'] . '</td>
                    <td>' . $commentV['numChapitre'] . '</td>
                    <td>' . $commentV['pseudo'] . '</td>
                    <td class="sentenceTableau">' ?>
                    <?php
                    echo $commentV['commentaire'] ?><?php echo '</td>
                    <td >
                        <div class="actionTableau">
                            <a class="lienAdministration" href="index.php?action=AdministrationCommentairesTransformerEnCours&id='.$commentV['id'].'">Passer en cours
                            </a> 
                           
                                
                            <a class="lienAdministration" href="index.php?action=AdministrationCommentairesTransformerSupprimer&id='.$commentV['id'].'">
                            Supprimer</a> 
                               

                            
                             
                        </div>
                    </td>
                        </tr> ' ?>
                <?php endforeach; ?>

            </table>
        </div>
    </div>
</section>


<section id="listesCommentairesSignales" class="administrationChapitre">
    <div class="row justify-content-center " id="listesChapitres">
        <div>
            <h3 >Listes des commentaires signalés sur le site</h3>
            <table>
                <tr>
                    <th>Id </th>
                    <th>Numero chapitre</th>
                    <th>Pseudo</th>
                    <th>Commentaire</th>
                    <th>Action</th>
                </tr>
                <!-- tableau des chapitres -->
                <?php foreach ($commentsS as $commentS) : ?>
                    <?php echo '    
                <tr>
                    <td>' . $commentS['id'] . '</td>
                    <td>' . $commentS['numChapitre'] . '</td>
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




<script src="scroll.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require_once 'template.php' ?>