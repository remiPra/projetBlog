<?php

class imageManager
{
	// fonction pour uploader l'image 
	public function uploadimage()
	{
		if (isset($_FILES['avatar'])) {

			print_r($_FILES['avatar']);

			$dossier = 'images/';
			$fichier = basename($_FILES['avatar']['name']);

			$taille_max = 104857600;
			$taille = filesize($_FILES['avatar']['tmp_name']);

			$extensions = array('png', 'gif', 'jpg', 'jpeg');
			$extension_fichier = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
			echo "<br/><strong>";
			echo $extension_fichier;
			echo "</strong><br/>";
			if (!in_array($extension_fichier, $extensions)) {
				$erreur = "Vous devez transférer un fichier de type PNG, GIF, JPG ou JPEG";
			}
			if ($taille > $taille_max) {
				$erreur = 'Le fichier est trop gros...';
			}
			if (!isset($erreur)) //S'il n'y a pas d'erreur, on upload
			{
				//On formate le nom du fichier ici...
				$fichier = strtr(
					$fichier,
					'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
					'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
				);
				$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

				if (move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
				{
					echo 'Upload effectué avec succès !';
				} else //Sinon (la fonction renvoie FALSE).
				{
					echo 'Echec de l\'upload !';
				}
			} else {
				echo $erreur;
			}
		} else {
		}
	}

	// fonction pour supprimer l'image uploader
	public function deleteImageSrc($id)
	{
		 $bdd = $this->connect();
		$req = $bdd->prepare('SELECT imageChapitre FROM chapitres  WHERE id = ?');
		$req->execute(array($id));
		$data = $req->fetch();
		var_dump($data);
		$repertoire = 'images/'.$data[0].'';
		var_dump($repertoire);
		unlink($repertoire);
		var_dump("coucoucoucouc");

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
           echo "Erreur!: " . $e->getMessage() . "<br/>";
           die();
       }
    }
   
}
