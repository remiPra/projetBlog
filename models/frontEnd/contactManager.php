
<?php
class ContactManager
{

    public function contactForm()
    {

        // possibilité de stocker dans la BDD
         global $bdd;
        $req = $bdd->prepare('INSERT INTO contact (pseudo,sujet, email,message) VALUES(?, ?, ?, ?)');
        $req->execute(array($_POST['pseudo'], $_POST['sujet'], $_POST['email'], $_POST['message']));
        //possibilité d'enovoyer par mail
        $email = $_POST['email'];
        $firstname = $_POST['pseudo'];
        $message = $_POST['message'];

        $message .= '<h1>Jean forteroche </h1>
        <p> Mon tres cher amis vous a recu un email envoyé par: ' . $firstname . ' <p>
        <p> Voici son mail : <br/> ' . $email.' </>';
        // ENVOYER UN EMAIL
        mail('remipradere@gmail.com', 'On me contact sur mon site', $message);
    }

    public function connect(){
        $host_name = 'db5000267422.hosting-data.io';
        $database = 'dbs260968';
         $user_name = 'dbu246755';
         $password = "Tfctfc3131@";
         
     
         try {
          
           $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
            return $bdd; 
        } catch (PDOException $e) {
           echo "Error!: " . $e->getMessage() . "<br/>";
           die();
       }
    }
   
}
