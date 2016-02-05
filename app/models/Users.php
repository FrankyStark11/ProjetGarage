<?php
	/*
		classe reor.sentant les models pour un user
	*/
	require_once '../app/models/connectDB.php';
	
	class modUsers extends connectDB
	{
		function ValiderPassword($password){

			$dir = 'sqlite:../app/bd/garage.bd.sqlite';
			$db = new PDO($dir);

			if (is_null($db)) {
				$password = "erreur de la BD";
			}
			else
			{
				$sql = $db->prepare("SELECT Type FROM Utilisateurs WHERE Code = :password"); //pr�pare la requ�te

				$sql->bindValue(":password", crypt($password,"st")); //met le login

				$sql->execute(); //execute la requ�te et la met dans la variable
				$result =  $sql->fetch(PDO::FETCH_ASSOC);

				$db = null; //vide la connection
			}

			return $result;
		}
	}
?>