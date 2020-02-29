<?php 
require 'models/frontEnd/articleManager.php';


require 'models/backEnd/contactManager.php';
require 'models/backEnd/commentManager.php';

$contactManager = new ContactManager();
$nbMessages = $contactManager->countMessageNew();
$commentaires = new Commentaires();
$nbComments = $commentaires->countCommentsNew();




$articlesManager = new ArticlesManager();
$chapitres = $articlesManager->numerosChapitre();

//Affichage du l'administration pour ecrire un nouveau chapitre
require 'views/backEnd/administrationChapitresEcrireView.php';

