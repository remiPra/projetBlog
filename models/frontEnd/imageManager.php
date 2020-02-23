<?php

function sendImage() {
        //Récupérer le contenu de l'image
         // traitement de l'image
        $file = $_FILES['imageBlob']['tmp_name'];
        $image = addslashes(file_get_contents($file));
        $imagetype = $_FILES['imageBlob']['type'];  
        
        //Insérer l'image dans la base de données
        require('models/connect.php');
        $req = $bdd->prepare("INSERT into gallery (imageBlob,imageBlobType,numeroChapitre) VALUES ('?,?,?')");
        $req->execute(array($image,$imagetype,$_POST['numeroChapitre']));
}
           
function getImage($id)
require('models/connect.php');
//Récupérer l'image à partir du base de données
    $req = $bdd->query("SELECT (imageBlob,imageBlobType) FROM gallery WHERE numeroChapitre = ?");
    $req->execute(array($id));
    if($res->num_rows > 0){
        $img = $res->fetch_assoc();
        
        //Rendre l'image
        // header("Content-type: $img['imageBlobType']"); 
        // echo $img['imageBlob']; 
    }else{
        echo 'Image non trouvée...';
    }
