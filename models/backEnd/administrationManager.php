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

    public function passwordChange($pseudo,$passwordCrypt) {
        global $bdd;
        $req = $bdd->prepare('UPDATE administrateurs SET password = :password,newPassword = :newPassword WHERE name =:name');
        $req->execute(array(
            'password' => $passwordCrypt ,
            'newPassword' => 1 ,
            'name' => $pseudo
        ));
        var_dump($passwordCrypt);  
        var_dump($pseudo); 
    }


    
  
   
}
        



