<?php
class AdministrationManager 
{
    
    public function getUser($pseudo) {

    require 'models/connect.php';
    $req = $bdd->prepare('SELECT * FROM administrateurs WHERE name = ?');
    $req->execute(array($pseudo));
    $data = $req->fetch();
    return $data;
    } 
    
}
        



