<?php

if(!empty($_POST) && isset($_POST['btnContact'])){
    if(isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['message'])){
        if(!empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['message'])){
            $email = str_secur($_POST['email']);
            $firstname = str_secur($_POST['firstname']);
            $message = str_secur($_POST['message']);

            $message .= ' - email envoyé par: ' . $firstname . ' : ' . $email;
            debug($message);

            // ENVOYER UN EMAIL
            mail('remipradere@gmail.com', 'On me contact sur mon site', $message);
        }else{
            $error = "Vous devez remplir tous les champs !";
        }
    }else{
        $error = "Une erreur s'est produite. Reessayez !";
    }
}

?>
