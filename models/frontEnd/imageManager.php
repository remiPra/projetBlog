<?php
 if(isset($_GET['id'])) {
   
        require('models/connect.php');
        $req = $bdd->prepare('SELECT imageBlob,imageBlobType FROM chapitres WHERE id = ?');
        $req->execute(array($_GET['id']));
        $dataImage = $req->fetch();
    
        //header('Content-type: image/jpg');
        header('Content-type: '.$dataImage["imageBlobType"].'');
        print_r( $dataImage["imageBlob"]) ;
 }
?>