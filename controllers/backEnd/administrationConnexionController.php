<?php 
if (($_POST['name']!= null) AND ($_POST['password'])!= null) {
    require 'models/backEnd/contactManager.php';
    require 'models/backEnd/CommentManager.php';

    $contactManager = new ContactManager();
    $nbMessages = $contactManager->countMessageNew();
    $Comments = new Comments();
    $nbComments = $Comments->countCommentsNew();
    $nbCommentsDanger = $Comments->countCommentsDanger();


    $pseudo = $_POST['name'];
    $password = $_POST['password'];
    require 'models/backEnd/administrationManager.php';
    $administrationManager = new AdministrationManager();
    $admin = $administrationManager->getUser($pseudo);
    $nbCommentsDanger = $Comments->countCommentsDanger();

    if($password == $admin['password'] AND $pseudo == $admin['name']) {
        $_SESSION['connect'] = 1;
        $_SESSION['name'] = $admin['name'];
        echo "<script type='text/javascript'>document.location.replace('index.php?action=administrationHome');</script>";
        Exit();
    }    
    else if ($password != $admin['password']) { 
        $notification = "Error d'identifiant";
        echo "<script type='text/javascript'>document.location.replace('index.php?action=administrationConnexionError');</script>";
        Exit();
    }
}
else {
    $notification = "veuillez rentrer vos identifiants svp";
    echo "<script type='text/javascript'>document.location.replace('index.php?action=administration');</script>";
    Exit();}       

   