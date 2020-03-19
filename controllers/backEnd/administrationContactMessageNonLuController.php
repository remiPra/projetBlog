<?php
extract($_GET);
$id = strip_tags($id);

require 'models/backEnd/CommentManager.php';
require 'models/backEnd/contactManager.php';
$contactManager = new ContactManager();
$nbMessages = $contactManager->countMessageNew();
$Comments = new Comments();
$nbComments = $Comments->countCommentsNew();
$nbCommentsDanger = $Comments->countCommentsDanger();

$messageNonLu = $contactManager->getContactMessage($id);

require 'views/backEnd/administrationContactMessageNonLuView.php';