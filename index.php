<?php



if(isset($_GET['action'])) {
    if ($_GET['action'] == 'index') {
        require 'controllers/frontEnd/indexController.php';
    }
    else if($_GET['action'] == 'livre') {
        require 'controllers/frontEnd/livreController.php';
    }
    else if($_GET['action'] == 'administrationHome') {
        require 'controllers/backEnd/administrationHomeController.php';
    }
    else if($_GET['action'] == 'administration') {
        require 'controllers/frontEnd/administrationController.php';
    }
    else if($_GET['action'] == 'bibliographie') {
        require 'controllers/frontEnd/bibliographieController.php';
    }
    else if($_GET['action'] == 'contact') {
        require 'controllers/frontEnd/contactController.php';
    }
    else if($_GET['action'] == 'contactRecu') {
        require 'controllers/frontEnd/contactRecuController.php';
    }
    else if($_GET['action'] == 'signalementRecu') {
        require 'controllers/frontEnd/signalementController.php';
    }
    





    else if($_GET['action'] == 'index') {
        require 'controllers/frontEnd/indexController.php';
    }
    
    else if(($_GET['action'] == 'article') AND (isset($_GET['id']))) {
        require 'controllers/frontEnd/articleController.php';
         
    }
}

else {
    require 'controllers/frontEnd/indexController.php';
}



?>

