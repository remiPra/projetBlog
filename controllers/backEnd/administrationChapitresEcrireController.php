<?php 
require 'models/frontEnd/articleManager.php';


require 'models/backEnd/contactManager.php';
require 'models/backEnd/CommentManager.php';

$contactManager = new ContactManager();
$nbMessages = $contactManager->countMessageNew();
$Comments = new Comments();
$nbComments = $Comments->countCommentsNew();
$nbCommentsDanger = $Comments->countCommentsDanger();



$articlesManager = new ArticlesManager();
$Chapters = $articlesManager->NumbersChapter();

//Affichage du l'administration pour ecrire un nouveau Chapter
require 'views/backEnd/administrationChaptersEcrireView.php';

