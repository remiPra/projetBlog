<?php
class AdministrationManager 
{
    
    public function getUser($pseudo) {

        global $bdd;
    $req = $bdd->prepare('SELECT * FROM administrateurs WHERE name = ?');
    $req->execute(array($pseudo));
    $data = $req->fetch();
    return $data;    
    } 
    
  
   
}
        



