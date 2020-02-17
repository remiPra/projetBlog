
<?php

function contactForm() 
{    
if(!empty($_POST) && isset($_POST['btnContact'])){
    if(isset($_POST['email']) && isset($_POST['pseudo']) && isset($_POST['sujet']) && isset($_POST['message'])){
        if(!empty($_POST['email']) && !empty($_POST['pseudo']) && !empty($_POST['sujet']) && !empty($_POST['message'])){
            // possibilité de stocker dans la BDD
            require('models/connect.php');
            $req = $bdd->prepare('INSERT INTO contact (pseudo,sujet, email,message) VALUES(?, ?, ?, ?)');
            $req->execute(array($_POST['pseudo'], $_POST['sujet'], $_POST['email'], $_POST['message']  ));
            //possibilité d'enovoyer par mail
            $email = $_POST['email'];
            $firstname = $_POST['firstname'];
            $message = $_POST['message'];

            $message .= ' - email envoyé par: ' . $firstname . ' : ' . $email;
            
           

            // ENVOYER UN EMAIL
            mail('remipradere@gmail.com', 'On me contact sur mon site', $message);

           
        }else{
            echo "Vous devez remplir tous les champs !";
        }
    }else{
        echo  "Une erreur s'est produite. Reessayez !";
    }
}
?>