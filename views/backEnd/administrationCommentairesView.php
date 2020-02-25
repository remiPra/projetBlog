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
            <a class="boutonAdministration" href="#listesChapitres">Listes des commentaires publiés </a>
        </div>

        <div class="col-md-4 d-flex justify-content-center">
            <a class="boutonAdministration" href="#listesCommentairesSignales">listes des commentaires signalés </a>
        </div>

        <div class="col-md-4 d-flex justify-content-center">
            <a class="boutonAdministration" href="index.php?action=administrationChapitresEcrire">Ecrire un nouveau chapitre</a>
        </div>
    </div>
</section>

<section class="administrationChapitre">
    <div class="row justify-content-center ">
        <div>
            <h3 id="listesCommentaires">Listes des commentaires en attente de publication</h3>
            <table>
                <tr>
                    <th>Id </th>
                    <th>Pseudo</th>
                    <th>Commentaire</th>
                    <th>Action</th>
                </tr>
                <!-- tableau des chapitres -->
                <?php foreach ($comments as $comment) : ?>
                    <?php echo '    <tr>
                    <td>' . $comment['id'] . '</td>
                    <td>' . $comment['pseudo'] . '</td>
                    <td class="sentenceTableau">' ?>
                    <?php
                    echo $comment['commentaire'] ?><?php echo '</td>
                    <td >
                        <div class="actionTableau">
                            <form action="" method="POST"> 
                                <input class="inputNone" type="text" name="id" value="' . $comment['id'] . ' " /> 
                                <input class="inputNone" type="text" name="valider" value="1" />
                                <input type="submit" value="Valider">  
                            </form>
                            
                            <a href="index.php?action=AdministrationCommentairesTransformerSupprimer&id='.$comment['id'].'">
                            Supprimer</a> 
                             

                            
                             
                        </div>
                    </td>
                        </tr> ' ?>
                <?php endforeach; ?>

            </table>
        </div>
    </div>
</section>

<section class="administrationChapitre">
    <div class="row justify-content-center ">
        <div>
            <h3 id="listesCommentaires">Listes des commentaires publiés sur le site</h3>
            <table>
                <tr>
                    <th>Id </th>
                    <th>Pseudo</th>
                    <th>Commentaire</th>
                    <th>Action</th>
                </tr>
                <!-- tableau des chapitres -->
                <?php foreach ($commentsV as $commentV) : ?>
                    <?php echo '    <tr>
                    <td>' . $commentV['id'] . '</td>
                    <td>' . $commentV['pseudo'] . '</td>
                    <td class="sentenceTableau">' ?>
                    <?php
                    echo $commentV['commentaire'] ?><?php echo '</td>
                    <td >
                        <div class="actionTableau">
                            <form action="" method="POST"> 
                                <input class="inputNone" type="text" name="id" value="' . $commentV['id'] . ' " /> 
                                <input class="inputNone" type="text" name="valider" value="0" />
                                <input type="submit" value="En attente">  
                            </form>
                           
                                
                            <a href="index.php?action=AdministrationCommentairesTransformerSupprimer&id='.$commentV['id'].'">
                            Supprimer</a> 
                               

                            
                             
                        </div>
                    </td>
                        </tr> ' ?>
                <?php endforeach; ?>

            </table>
        </div>
    </div>
</section>


<section class="administrationChapitre">
    <div class="row justify-content-center " id="listesChapitres">
        <div>
            <h3 id="listesCommentairesSignales">Listes des commentaires signalés sur le site</h3>
            <table>
                <tr>
                    <th>Id </th>
                    <th>Pseudo</th>
                    <th>Commentaire</th>
                    <th>Action</th>
                </tr>
                <!-- tableau des chapitres -->
                <?php foreach ($commentsS as $commentS) : ?>
                    <?php echo '    
                <tr>
                    <td>' . $commentS['id'] . '</td>
                    <td>' . $commentS['pseudo'] . '</td>
                    <td class="sentenceTableau"> '.$commentS['commentaire'].' </td>
                    <td>
                        <div class="actionTableau">
                        
                            <a href="index.php?action=AdministrationCommentairesTransformerSuppression&id='.$commentS['id'].'">
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