<?php 

require_once 'models/frontEnd/functions.php';

$articles = getArticles();

require_once 'views/frontEnd/livreView.php';
?>