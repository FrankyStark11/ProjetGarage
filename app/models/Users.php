<?php
	/*
		classe reor.sentant les models pour un user
	*/
	require_once '../app/models/connectDB.php';
	
	class modUsers extends connectDB
	{
		function ValiderPassword($password){

			$dir = 'sqlite:../app/bd/garage.sqlite';
			$db = new PDO($dir);

			if (is_null($db)) {
				$password = "erreur de la BD";
			}
			else
			{
				$sql = $db->prepare("SELECT Type FROM Utilisateurs WHERE Code = :password"); //prépare la requête

				$sql->bindValue(":password", crypt($password,"st")); //met le login

				$sql->execute(); //execute la requête et la met dans la variable
				$result =  $sql->fetch(PDO::FETCH_ASSOC);

				$db = null; //vide la connection
			}

			return $result;
		}

		function GetAllModePin(){

			$db = $this->connectDB();

			if (is_null($db)) {
				echo "erreur de la BD";
			}
			else
			{
				$sql = $db->prepare("SELECT Nom,No_pin,Mode FROM GPIO"); 
				$sql->execute(); 

				$result =  $sql->fetchAll(PDO::FETCH_ASSOC);

				$db = null; //vide la connection
			}
			return $result;
		}

		function AjouterUtilisateur(){

			$dir = 'sqlite:../app/bd/garage.sqlite';
			$db = new PDO($dir);

			$NOM = "";
			$CODE = crypt("","st");
			$TYPE = 0;

			if(is_null($db)){
				echo "Erreur de connextion";
			}
			else
			{
				//creation de la requete preparé
				$sql = $db->prepare("INSERT INTO Utilisateurs (Nom,Code,Type) VALUES (:nom,:code,:type)");

				//ajout des valeurs pa variable predefinie
				$sql->bindValue(":nom",$NOM);
				$sql->bindValue(":code",$CODE);
				$sql->bindValue(":type",$TYPE);

				//execution de la requete d'ajout
				$sql->execute();
			}

		}
	}
?>