<?php
extract($_GET);
$id = strip_tags($id);
require 'models/backEnd/CommentManager.php';
require 'models/backEnd/contactManager.php';
$contactManager = new ContactManager();
$Comments = new Comments();


$contactSuppression  = $contactManager->changeContacNonLu($id);
// recuperation des notifications 
$nbMessages = $contactManager->countMessageNew();
$nbComments = $Comments->countCommentsNew();
$nbCommentsDanger = $Comments->countCommentsDanger();
//recuperation des messages 
$MessagesS = $contactManager->getContactMessages();
$MessagesSLu = $contactManager->getContactMessagesLu();
$MessagesSup = $contactManager->getContactMessagesSupprimer();

require 'views/backEnd/administrationContactHomeView.php';

