<?php
require 'models/frontEnd/commentManager.php';

$idcomment = $_POST['idComment'];
signalerComment($idcomment);

require 'views/frontEnd/contactRecuView.php';


?>