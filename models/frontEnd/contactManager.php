
<?php

function contactForm() {
                
                // possibilité de stocker dans la BDD
                require('models/connect.php');
                $req = $bdd->prepare('INSERT INTO contact (pseudo,sujet, email,message) VALUES(?, ?, ?, ?)');
                $req->execute(array($_POST['pseudo'], $_POST['sujet'], $_POST['email'], $_POST['message']  ));
                //possibilité d'enovoyer par mail
                $email = $_POST['email'];
                $firstname = $_POST['pseudo'];
                $message = $_POST['message'];

                $message .= ' - email envoyé par: ' . $firstname . ' : ' . $email;
                // ENVOYER UN EMAIL
                mail('remipradere@gmail.com', 'On me contact sur mon site', $message);

    
}
