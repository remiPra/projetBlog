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
            <p><?php echo $notification ?></p>

        </div>
    </div>
</section>
<section>
    <div class="row justify-content-center">
        <div class="col-md-4 d-flex justify-content-center">
            <a class="boutonAdministration" href="#listesChapitres">Listes des Chapitres </a>
        </div>

        <div class="col-md-4 d-flex justify-content-center">
            <a class="boutonAdministration" href="#chapitresbrouillons">Chapitres en cours d'ecriture </a>
        </div>

        <div class="col-md-4 d-flex justify-content-center">
            <a class="boutonAdministration" href="index.php?action=administrationChapitresEcrire">Ecrire un nouveau chapitre</a>
        </div>
    </div>
    <section>

        <section class="administrationChapitre" id="listesChapitres" >
            <div class="row justify-content-center " >
                <div>
                    <h3>Listes des chapitres </h3>
                    <table>
                        <tr>
                            <th>Numéro chapitre </th>
                            <th>Titre</th>
                            <th>Extrait</th>
                            <th>Action</th>
                        </tr>
                        <!-- tableau des chapitres valides -->
                        <?php foreach ($articles as $article) : ?>
                            <?php echo '    <tr>
                    <td>' . $article['numeroChapitre'] . '</td>
                    <td>' . $article['title'] . '</td>
                    <td class="sentenceTableau">' ?>
                            <?php
                            echo $article['sentence'] ?><?php echo '</td>
                    <td >
                        <div class="actionTableau">
                            <a class="lienAdministration" href="index.php?action=article&id=' . $article['id'] . '">Lire </a>
                            <a class="lienAdministration" href="index.php?action=administrationChapitresModifier&id=' . $article['id'] . '">Modifier </a>
                            <a class="lienAdministration" href="index.php?action=administrationChapitresSupprimer&id=' . $article['id'] . '"">Supprimer </a>

                        </div>
                    </td>
                        </tr> ' ?>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
        </section>
        <div class="row justify-content-center chapitreEnCours" id="chapitresbrouillons">
            <div>
                <h3> Chapitres en cours d'ecriture </h3>
                <table>
                    <tr>
                        <th>Numéro chapitre </th>
                        <th>Titre</th>
                        <th>Extrait</th>
                        <th>Action</th>
                    </tr>
                    <!-- tableau des chapitres brouillon -->
                    <?php foreach ($articlesB as $articleB) : ?>
                        <?php echo '    <tr>
                    <td>' . $articleB['numeroChapitre'] . '</td>
                    <td>' . $articleB['title'] . '</td>
                    <td class="sentenceTableau">' . $articleB['content'] . '</td>
                    <td>
                        <div class="actionTableau">
                            <a class="lienAdministration" href="index.php?action=administrationChapitresModifier&id=' . $articleB['id'] . '">Modifier </a>
                            <a class="lienAdministration" href="index.php?action=administrationChapitresSupprimer&id=' . $articleB['id'] . '"">Supprimer </a>
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
                <h3>Listes des chapitres supprimés</h3>
                <table>
                    <tr>
                        <th>Numéro chapitre </th>
                        <th>Titre</th>
                        <th>Extrait</th>
                        <th>Action</th>
                    </tr>
                    <!-- tableau des chapitres valides -->
                    <?php foreach ($articlesS as $articleS) : ?>
                        <?php echo '    <tr>
                    <td>' . $articleS['numeroChapitre'] . '</td>
                    <td>' . $articleS['title'] . '</td>
                    <td class="sentenceTableau">' ?>
                        <?php
                        echo $articleS['sentence'] ?><?php echo '</td>
                    <td >
                        <div class="actionTableau">
                           
                            <a class="lienAdministration" href="index.php?action=administrationChapitreTransformerBrouillon&id=' . $articleS['id'] . '">Passer en brouillon </a>
                            <a class="lienAdministration" href="index.php?action=administrationChapitreTransformerSupprimer&id=' . $articleS['id'] . '">Supprimer </a>
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