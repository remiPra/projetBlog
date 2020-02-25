<?php
extract($_GET);
$id = strip_tags($id);
// Recuperation de tous les commentaires publiés et signalés
require 'models/backEnd/commentManager.php';
$commentaires = new Commentaires();
$commentsEnCours = $commentaires->changeCommentEnCours($id);
$notification = 'le commentaire a été placé dans les commentaires en cours';
$comments = $commentaires->getAllComments();
$commentsV = $commentaires->getAllCommentsValidate();
$commentsS = $commentaires->getAllCommentsSignaler();
// affichage de la partie administration des commentaires 
require 'views/backEnd/administrationCommentairesView.php';