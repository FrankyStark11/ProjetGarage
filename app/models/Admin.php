<?php
	/*
		classe reor.sentant les models pour un user
	*/
	require_once '../app/models/connectDB.php';
	
	class modAdmins extends connectDB
	{
		function ValiderPassword($password){
			//il restera ici � faire la validation du code dans la BD...
			//ceci n'est pas bon pour l'instant

			$db = $this->connectDB();

			if (is_null($db)) {
				$password = "erreur de la BD";
			}
			else
			{
				$sql = $db->prepare("SELECT Type FROM Utilisateurs WHERE Code = :password"); //pr�pare la requ�te
				$sql->bindValue(":password", $password); //met le login

				$sql->execute(); //execute la requ�te et la met dans la variable
				$result =  $sql->fetch(PDO::FETCH_ASSOC);

				$db = null; //vide la connection
			}


			return $result;
		}
		
		function ChangeCode($password, $type){
			echo $password;
			echo $type;
			
			$db = $this->connectDB();
			
			print_r($db);
			
			$sql = $db->prepare("UPDATE Utilisateurs SET Code = :password WHERE Nom = :type");
			
			$sql->bindValue(":password", $password);
			$sql->bindValue(":type", $type);
			
			$sql->execute();
			$db = null;
			
			print_r($sql);
			
			echo "allo";
		}
	}
?>