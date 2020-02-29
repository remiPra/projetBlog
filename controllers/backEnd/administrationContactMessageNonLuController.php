<?php
extract($_GET);
$id = strip_tags($id);

require 'models/backEnd/commentManager.php';
require 'models/backEnd/contactManager.php';
$contactManager = new ContactManager();
$nbMessages = $contactManager->countMessageNew();
$commentaires = new Commentaires();
$nbComments = $commentaires->countCommentsNew();


$messageNonLu = $contactManager->getContactMessage($id);

require 'views/backEnd/administrationContactMessageNonLuView.php';