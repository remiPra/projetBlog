<?php
require 'models/backEnd/contactManager.php';
require 'models/backEnd/CommentManager.php';

$contactManager = new ContactManager();
$nbMessages = $contactManager->countMessageNew();
$Comments = new Comments();
$nbComments = $Comments->countCommentsNew();
$nbCommentsDanger = $Comments->countCommentsDanger();

$MessagesS = $contactManager->getContactMessages();
$MessagesSLu = $contactManager->getContactMessagesLu();
$MessagesSup = $contactManager->getContactMessagesSupprimer();
require 'views/backEnd/administrationContactHomeView.php';