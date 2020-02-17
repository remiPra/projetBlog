<?php 

require_once 'models/frontEnd/articleManager.php';

$articles = getArticles();

require_once 'views/frontEnd/livreView.php';
?>