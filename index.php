<?php



if(isset($_GET['action'])) {
    if ($_GET['action'] == 'index') {
        require_once 'controllers/frontEnd/indexController.php';
    }
    else if($_GET['action'] == 'livre') {
        require_once 'controllers/frontEnd/livreController.php';
    }
    else if($_GET['action'] == 'contact') {
        require_once 'controllers/frontEnd/contactController.php';
    }
    else if($_GET['action'] == 'index') {
        require_once 'controllers/frontEnd/indexController.php';
    }
    
    else if(($_GET['action'] == 'article') AND (isset($_GET['id']))) {
        require_once 'controllers/frontEnd/articleController.php';
         
    }
}

else {
    require_once 'controllers/frontEnd/indexController.php';
}



?>

