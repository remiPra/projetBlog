<?php 
require 'models/frontEnd/articleManager.php';

$lastArticles = getLastArticles();

require 'views/frontEnd/indexView.php';
?>

