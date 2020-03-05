<?php
extract($_GET);
$id = strip_tags($id);
require 'models/backEnd/commentManager.php';
require 'models/backEnd/contactManager.php';
$contactManager = new ContactManager();
$commentaires = new Commentaires();

$contactChangeLu  = $contactManager->changeContactLu($id);

// recuperation des notifications 
$nbMessages = $contactManager->countMessageNew();
$nbComments = $commentaires->countCommentsNew();
$nbCommentsDanger = $commentaires->countCommentsDanger();
//recuperation des messages 
$MessagesS = $contactManager->getContactMessages();
$MessagesSLu = $contactManager->getContactMessagesLu();
$MessagesSup = $contactManager->getContactMessagesSupprimer();


require 'views/backEnd/administrationContactHomeView.php';

