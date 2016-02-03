<?php
	/*
		classe reor.sentant les models pour un user
	*/
	require_once '../app/models/connectDB.php';
	
	class modUsers extends connectDB
	{
		function ValiderPassword($password){
			//il restera ici à faire la validation du code dans la BD...
			//ceci n'est pas bon pour l'instant

			$dir = 'sqlite:../app/bd/garage.bd.sqlite';
			$db = new PDO($dir);

			if (is_null($db)) {
				$password = "erreur de la BD";
			}
			else
			{
				$sql = $db->prepare("SELECT Type FROM Utilisateurs WHERE Code = :password"); //prépare la requête
				$sql->bindValue(":password", $password); //met le login

				$sql->execute(); //execute la requête et la met dans la variable
				$result =  $sql->fetch(PDO::FETCH_ASSOC);

				$db = null; //vide la connection
			}


			return $result;
		}
	}
?>