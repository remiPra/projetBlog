<?php 
require_once('models/frontEnd/functions.php');

$lastArticles = getLastArticles();

require_once 'views/frontEnd/indexView.php';
?>

