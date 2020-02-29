<?php
extract($_GET);
$id = strip_tags($id);
require 'models/backEnd/commentManager.php';
require 'models/backEnd/contactManager.php';
$contactManager = new ContactManager();
$nbMessages = $contactManager->countMessageNew();
$commentaires = new Commentaires();
$nbComments = $commentaires->countCommentsNew();
$nbCommentsDanger = $commentaires->countCommentsDanger();


$contactSuppression  = $contactManager->changeContacNonLu($id);

$MessagesS = $contactManager->getContactMessages();
$MessagesSLu = $contactManager->getContactMessagesLu();
$MessagesSup = $contactManager->getContactMessagesSupprimer();

require 'views/backEnd/administrationContactHomeView.php';

