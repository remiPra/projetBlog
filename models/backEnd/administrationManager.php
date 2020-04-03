<?php
class AdministrationManager 
{
    // recuperation du nom de l'administrateur pour verifier si match marche 
    public function getUser($pseudo) {

        global $bdd;
    $req = $bdd->prepare('SELECT * FROM administrateurs WHERE name = ?');
    $req->execute(array($pseudo));
    $data = $req->fetch();
    return $data;    
    } 
    // méthode pour changer le password pour plus de sécurité
    public function passwordChange($pseudo,$passwordCrypt) {
        global $bdd;
        $req = $bdd->prepare('UPDATE administrateurs SET password = :password,newPassword = :newPassword,email = :email  WHERE name =:name');
        $req->execute(array(
            'password' => $passwordCrypt ,
            'newPassword' => 1 ,
            'email' => $_POST['email'],
            'name' => $pseudo,

        ));
    }
    // reinitialisation du password
    public function alertPassword($link,$firstname) {
        global $bdd;
        $req = $bdd->prepare('UPDATE administrateurs SET newPassword = :newPassword, date=:date ,link=:link WHERE name =:name');
        $req->execute(array(
            'newPassword' => 1 ,
            'date'=>$_POST['date'],
            'link'=>$link,
            'name'=>$firstname
        ));
    }

    // verification du nom avant l'ajout du password
    public function checkUser($name) {
        global $bdd;
        $req = $bdd->prepare('SELECT * from administrateurs WHERE name=:name' );
        $req->execute(array($name));
        $data = $req->fetchAll();
        return $data;
    }
   
}
        



