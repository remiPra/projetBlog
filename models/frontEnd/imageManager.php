<?php

class imageManager
{
	// fonction pour uploader l'image 
	public function uploadImage()
	{

		if (isset($_FILES['avatar'])) {

			print_r($_FILES['avatar']);
			// mise ne place du dossie et et du nom
			$dossier = 'images/';
			$fichier = basename($_FILES['avatar']['name']);

			$taille_max = 10000000;
			$taille = filesize($_FILES['avatar']['tmp_name']);

			$extensions = array('png', 'gif', 'jpg', 'jpeg');
			$extension_fichier = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));

			global $Error;
			if($taille == 0){
				return $Error = 'il n y a pas eu d\'upload de nouvelles images'; 
			}
			if ($taille > $taille_max) {
				return $Error = 'Le fichier est trop gros...';
			}
			if (!in_array($extension_fichier, $extensions)) {
				return $Error = "Vous devez transférer un fichier de type PNG, GIF, JPG ou JPEG";
	
			}
			if (!isset($Error)) //S'il n'y a pas d'Error, on upload
			{
				//On formate le nom du fichier ici...
				$fichier = strtr(
					$fichier,
					'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
					'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
				);
				$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
				
				//on fait un essai
				$envoie = move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier);
				
				if (move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
				{
					return 'l\'image a bien été envoyé';
				} else //Sinon (la fonction renvoie FALSE).
				{
					return 'l\'image a bien été envoyé';
				}
			} else {
				return  'Upload succès !';
			}
		} else {
			return $Error = 'Upload effectué ';

		}
	}

	// fonction pour supprimer l'image uploader
	public function deleteImageSrc($id)
	{
		global $bdd;
		$req = $bdd->prepare('SELECT imageChapter FROM Chapters  WHERE id = ?');
		$req->execute(array($id));
		$data = $req->fetch();

		$repertoire = 'images/' . $data[0] . '';

		unlink($repertoire);
	}
}
