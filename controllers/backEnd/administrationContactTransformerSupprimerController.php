<?php
extract($_GET);
$id = strip_tags($id);


require 'models/backEnd/commentManager.php';
require 'models/backEnd/contactManager.php';

$contactManager = new ContactManager();
$commentaires = new Commentaires();
$nbMessages = $contactManager->countMessageNew();
$nbComments = $commentaires->countCommentsNew();
$nbCommentsDanger = $commentaires->countCommentsDanger();

$contactSuppression  = $contactManager->changeContactSupprimer($id);

$MessagesS = $contactManager->getContactMessages();
$MessagesSLu = $contactManager->getContactMessagesLu();
$MessagesSup = $contactManager->getContactMessagesSupprimer();
require 'views/backEnd/administrationContactHomeView.php';