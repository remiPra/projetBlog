<?php 
if (($_POST['name']!= null) AND ($_POST['password'])!= null) {
    require 'models/backEnd/contactManager.php';
    require 'models/backEnd/commentManager.php';

    $contactManager = new ContactManager();
    $nbMessages = $contactManager->countMessageNew();
    $commentaires = new Commentaires();
    $nbComments = $commentaires->countCommentsNew();


    $pseudo = $_POST['name'];
    $password = $_POST['password'];
    require 'models/backEnd/administrationManager.php';
    $administrationManager = new AdministrationManager();
    $admin = $administrationManager->getUser($pseudo);


    if($password == $admin['password'] AND $pseudo == $admin['name']) {
        $_SESSION['connect'] = 1;
        $_SESSION['name'] = $admin['name'];
        echo "<script type='text/javascript'>document.location.replace('index.php?action=administrationHome');</script>";
        Exit();
    }    
    else if ($password != $admin['password']) { 
        $notification = "erreur d'identifiant";
        echo "<script type='text/javascript'>document.location.replace('index.php?action=administrationConnexionErreur');</script>";
        Exit();
    }
}
else {
   //echo "<script type='text/javascript'>document.location.replace('index.php?action=index');</script>";
    header('location:index.php?action=index');
    Exit();}       

   