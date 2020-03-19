<?php
extract($_GET);
$id = strip_tags($id);


require 'models/backEnd/CommentManager.php';
require 'models/backEnd/contactManager.php';

$contactManager = new ContactManager();
$Comments = new Comments();
$nbMessages = $contactManager->countMessageNew();
$nbComments = $Comments->countCommentsNew();
$nbCommentsDanger = $Comments->countCommentsDanger();

$contactSuppression  = $contactManager->changeContactSupprimer($id);

$MessagesS = $contactManager->getContactMessages();
$MessagesSLu = $contactManager->getContactMessagesLu();
$MessagesSup = $contactManager->getContactMessagesSupprimer();
require 'views/backEnd/administrationContactHomeView.php';