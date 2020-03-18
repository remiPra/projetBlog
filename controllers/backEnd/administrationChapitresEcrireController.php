<?php 
require 'models/frontEnd/articleManager.php';


require 'models/backEnd/contactManager.php';
require 'models/backEnd/commentManager.php';

$contactManager = new ContactManager();
$nbMessages = $contactManager->countMessageNew();
$commentaires = new Commentaires();
$nbComments = $commentaires->countCommentsNew();
$nbCommentsDanger = $commentaires->countCommentsDanger();



$articlesManager = new ArticlesManager();
$Chapters = $articlesManager->NumbersChapter();

//Affichage du l'administration pour ecrire un nouveau Chapter
require 'views/backEnd/administrationChaptersEcrireView.php';

