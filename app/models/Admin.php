<?php
	/*
		classe reor.sentant les models pour un user
	*/
	require_once '../app/models/connectDB.php';
	
	class modAdmins extends connectDB
	{
		function GetNomDistributeurs(){
			$db = $this->connectDB();

			if (is_null($db)) {
				echo "erreur de la BD";
			}
			else
			{
				$sql = $db->prepare("SELECT Nom FROM Distributeur");
				$sql->execute();

				$result = $sql->fetchAll(PDO::FETCH_ASSOC);
				$db = null;

				return $result;
			}
		}

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
		
		function ChangeCode($password, $type){

			$db = $this->connectDB();
			
			$sql = $db->prepare("UPDATE Utilisateurs SET Code = :password WHERE Nom = :type");
			
			$sql->bindValue(":password", crypt($password,"st"));
			$sql->bindValue(":type", $type);
			
			$sql->execute();
			$db = null;
		}
		
		/*
			Permet de changer le mot de passe admin
		*/
		function ResetAdmin($password){
			$db = $this->connectDB();
			
			$sql = $db->prepare("UPDATE Utilisateurs SET Code = :password WHERE Nom = 'Administrateur'");
			
			$sql->bindValue(":password", crypt($password,"st"));
			
			$sql->execute();
			$db = null;

		}
		
		/*
			Permet d'envoyer un email de modification du mot de passe
		*/
		function mdpOublie(){
			$lecode = $this->generateRandomString();

			//inscrit le code temporaire dans la bd
			$db = $this->connectDB();
			$sql = $db->prepare("INSERT INTO mdpOublie(String, PWDate) VALUES(:string, DATETIME('now','localtime'))");

			$sql->bindValue(":string", $lecode);
			
			$sql->execute();
			$db = null;
			$sql = null;

			//information d'envoie de couriel
			$prov = $_SERVER['REMOTE_ADDR'];
			$ip = "http://".$_SERVER['SERVER_ADDR'];
			
			$message = "\n\nUne demande de réinitialisation du mot de passe à été envoyée par ".$prov."\n\nPour initialiser le mot de passe, cliquer sur le lien suivant :\n\n".$ip."/index.php/Admin/showResetPassword?code=".$lecode."\n\nSi vous n'avez pas fait cette demande, s.v.p. ignorer ce message.";
			$to      = $this->getCurrentEmail();

			$subject = 'Réinitialisation administrateur';
			$headers = 'From: webmaster@example.com' . "\r\n" .
			'Reply-To: webmaster@example.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

			//envoie le email
			mail($to, $subject, $message, $headers);
		}

		function generateRandomString($length = 10) {
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}

		function getCurrentEmail(){
			$db = $this->connectDB();

			//va chercher le téléphone et le nom du distributeur
			$sql = $db->prepare("SELECT Telephone, Distributeur FROM Securite");
			$sql->execute();
			$info =  $sql->fetch(PDO::FETCH_ASSOC);

			//va chercher l'extention du distributeur selon le nom envoyé
			$sql = $db->prepare("SELECT Extention FROM Distributeur WHERE Nom = :exten");
			$sql->bindValue(":exten", $info["Distributeur"]);
			$sql->execute();
			$dist = $sql->fetch(PDO::FETCH_ASSOC);

			//retourne la string vers qui envoyer le email
			return $info["Telephone"].$dist["Extention"];
		}


		//Permet de changer si oui ou non en envoie des alertes SMS
		function ChangeCheckSMS($value){
			$db = $this->connectDB();

			$sql = $db->prepare("UPDATE Securite SET SecureOnOff = :OnOff");
			$sql->bindValue(":OnOff", $value);

			$sql->execute();
			$db = null;
		}

		//Permet de changer le numero de téléphone
		function ChangePhone($phone, $dist){
			$db = $this->connectDB();

			$sql = $db->prepare("UPDATE Securite SET Telephone = :phone, Distributeur = :dist");
			$sql->bindValue(":phone", $phone);
			$sql->bindValue(":dist", $dist);

			$sql->execute();
			$db = null;
		}

		//Permet de changer le delais avant la fermeture automatique des portes
		function ChangeTimer($value){
			$db = $this->connectDB();

			$sql = $db->prepare("UPDATE Securite SET Delais = :timer");
			$sql->bindValue(":timer", $value);

			$sql->execute();
			$db = null;
		}
		
		
		function GetDistributeursCount(){
			$db = $this->connectDB();

			$sql = $db->prepare("SELECT COUNT(ID) AS COUNT FROM Distributeur");
			
			$sql->execute();
			$nombre =  $sql->fetch(PDO::FETCH_ASSOC);
			
			$db = null;
			
			return $nombre["COUNT"];
		}
		
		function GetDistributeurs(){
			$db = $this->connectDB();

			$sql = $db->prepare("SELECT Nom, Extention FROM Distributeur");
			
			$sql->execute();
			$distributeurs =  $sql->fetchAll(PDO::FETCH_ASSOC);
			
			$db = null;
			
			return $distributeurs;
		}
		
		function UpdateDistributeurs($distributeurs){
			//Construit les tableaux
			$nom=array();
			$ext=array();
			
			
			foreach($distributeurs as $key => $value){
				if($value != ""){
					$exp_key = explode('-',$key);
					if($exp_key[0] == 'nom'){
						array_push($nom, $value);
					}
					elseif($exp_key[0] == 'ext'){
						array_push($ext, $value);
					}
				}
			}
			
			//Insert les valeurs dans la BD
			
			$db = $this->connectDB();

			$sql = $db->prepare("DELETE FROM Distributeur");
			$sql->execute();
			
			
			for($i = 0; $i < count($nom); $i++){
				$sql = $db->prepare("INSERT INTO Distributeur ('Nom','Extention') VALUES (:nom, :extention)");
				$sql->bindValue(":nom", $nom[$i]);
				$sql->bindValue(":extention", $ext[$i]);
				
				$sql->execute();
			}
		}

		/*
			Retourne les paramètre de configuration admin
		*/
		function GetConfig(){
			$db = $this->connectDB();

			$sql = $db->prepare("SELECT SecureOnOff, Telephone, Distributeur, Delais FROM Securite");
			$sql->execute();
			$config =  $sql->fetch(PDO::FETCH_ASSOC);
			
			$db = null;
			$sql = null;

			return $config;		
		}	

		function ValiderToken($string){
			$db = $this->connectDB();

			$sql = $db->prepare("SELECT * FROM mdpOublie WHERE String = :token AND  PWDate > DATETIME('now','localtime','-10 minutes')");
			$sql->bindValue(":token", $string);
			
			$sql->execute();
			
			$config =  $sql->fetch(PDO::FETCH_ASSOC);
			
			print_r($config);

			if($config["String"] != ""){
				$retour = true;
			}
			else{
				$retour = false;
			}
			
			$db = null;
			$sql = null;

			return $retour;	
		}

	}
?>