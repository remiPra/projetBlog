<?php $raccourci = [['Link' =>'administrationHome','name'=>'Administration'],['Link'=>'administrationContactHome','name'=>'Contact']];?>

<?php $title = "administration"; ?>
<?php ob_start() ?>


<section id="mainBillet" class="row">
    <div id="mainBilletContainer" class="col-md-8 col-md-offset-2">

        <h1>Billet simple pour l'Alaska</h1>
        <h2>Administration </h2>
        <div id="paragrapheBillet">
            <p>Voici la liste de vos messages</p>
            <p><?php if(isset($notification)) {echo $notification;} ?></p>

        </div>
    </div>
</section>
<section>
    <div class="row justify-content-center">
        <div class="col-md-4 d-flex justify-content-center">
            <a class="ButtonAdministration" href="#listesMessagesNonLu">Messages</a>
        </div>

        <div class="col-md-4 d-flex justify-content-center">
            <a class="ButtonAdministration" href="#listesMessagesLu">Messages répondus</a>
        </div>

        <div class="col-md-4 d-flex justify-content-center">
            <a class="ButtonAdministration" href="#listesMessagesSupprimer">Messages supprimés</a>
        </div>
    </div>
    

    <section class="administrationChapter">
        <div class="row justify-content-center " id="listesMessagesNonLu">
            <div>
                <h3>Nouveaux Messages</h3>
                <table>
                    <tr>
                        <th>Pseudo </th>
                        <th>Email</th>
                        <th>subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                    <!-- tableau des Chapters valides -->
                    <?php foreach($MessagesS as $messages) : ?>
                        <?php echo '    <tr>
                    <td>'.$messages['pseudo'].'</td>
                    <td>'.$messages['email'].'</td>
                    <td class="sentenceTableau">'.$messages['subject'].'</td>
                    <td class="sentenceTableau">'.$messages['message'].'</td>
                    <td >
                        <div class="actionTableau">
                            <a class="LinkAdministration" href="index.php?action=administrationContactMessageNonLu&id=' . $messages['id'] . '">Voir le message </a>
                         
                        </div>
                    </td>
                        </tr> ' ?>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </section>

    <section class="administrationChapter">
        <div class="row justify-content-center " id="listesMessagesLu">
            <div>
                <h3>Messages lu</h3>
                <table>
                    <tr>
                        <th>Pseudo </th>
                        <th>Email</th>
                        <th>subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                    <!-- tableau des Chapters valides -->
                    <?php foreach($MessagesSLu as $messagesLu) : ?>
                        <?php echo '    <tr>
                    <td>'.$messagesLu['pseudo'].'</td>
                    <td>'.$messagesLu['email'].'</td>
                    <td class="sentenceTableau">'.$messagesLu['subject'].'</td>
                    <td class="sentenceTableau">'.$messagesLu['message'].'</td>
                    <td >
                        <div class="actionTableau">
                            <a class="LinkAdministration" href="index.php?action=administrationContactMessageNonLu&id=' . $messagesLu['id'] . '">Voir le message </a>
                            <a class="LinkAdministration" href="index.php?action=administrationContactTransformSupprimer&id=' . $messagesLu['id'] . '">Supprimer </a>
                        </div>
                    </td>
                        </tr> ' ?>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </section>

    <section class="administrationChapter">
        <div class="row justify-content-center " id="listesMessagesSupprimer">
            <div>
                <h3>Messages supprimés</h3>
                <table>
                    <tr>
                        <th>Pseudo </th>
                        <th>Email</th>
                        <th>subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                    <!-- tableau des Chapters valides -->
                    <?php foreach($MessagesSup as $messagesSup) : ?>
                        <?php echo '    <tr>
                    <td>'.$messagesSup['pseudo'].'</td>
                    <td>'.$messagesSup['email'].'</td>
                    <td class="sentenceTableau">'.$messagesSup['subject'].'</td>
                    <td class="sentenceTableau">'.$messagesSup['message'].'</td>
                    <td >
                        <div class="actionTableau">
                        <a class="LinkAdministration" href="index.php?action=administrationContactMessageNonLu&id=' . $messagesSup['id'] . '">Voir le message </a>
                            <a class="LinkAdministration" href="index.php?action=administrationContactTransformSuppression&id=' . $messagesSup['id'] . '">Supprimer definitivement </a>
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