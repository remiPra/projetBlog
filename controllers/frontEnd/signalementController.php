<?php
require 'models/frontEnd/functions.php';

$idcomment = $_POST['idComment'];
signalerComment($idcomment);

require 'views/frontEnd/contactRecuView.php';


?>