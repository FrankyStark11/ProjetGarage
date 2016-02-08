<?php
	/*
		classe reor.sentant les models pour un user
	*/
	require_once '../app/models/connectDB.php';
	
	class modAdmins extends connectDB
	{
		function ValiderPassword($password){
			//il restera ici à faire la validation du code dans la BD...
			//ceci n'est pas bon pour l'instant

			$db = $this->connectDB();

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

		function GetAllPin(){

			$db = $this->connectDB();

			if (is_null($db)) {
				echo "erreur de la BD";
			}
			else
			{
				$sql = $db->prepare("SELECT No_pin,Nom FROM GPIO WHERE Mode = :mode"); 
				$sql->bindValue(":mode","in"); 
				$sql->execute(); 

				$result =  $sql->fetchAll(PDO::FETCH_ASSOC);

				$db = null; //vide la connection
			}
			return $result;
		}
		
		function ChangeCode($password, $type){

			$db = $this->connectDB();
			
			$sql = $db->prepare("UPDATE Utilisateurs SET Code = :password WHERE Nom = :type");
			
			$sql->bindValue(":password", crypt($password,"st"));
			$sql->bindValue(":type", $type);
			
			$sql->execute();
			$db = null;
		}
	}
?>