<?php
//fonction pour signaler le commentaire selon le numero de chapitre
require 'models/frontEnd/commentManager.php';
$idcomment = $_POST['idComment'];
$CommentManagerF = new CommentManagerF();
$signalerComment = $CommentManagerF->signalerComment($idcomment);
// affichage de la page réussite
require 'views/frontEnd/contactRecuView.php';


?>