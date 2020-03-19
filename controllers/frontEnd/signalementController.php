<?php
//fonction pour signaler le Comment selon le Number de Chapter
require 'models/frontEnd/CommentManager.php';
$idComment = $_POST['idComment'];
$CommentManagerF = new CommentManagerF();
$signalerComment = $CommentManagerF->signalerComment($idComment);
// affichage de la page réussite
require 'views/frontEnd/contactRecuView.php';


?>