<?php
	/*
		Permet de retourner une connection à la BD
	*/
	function connectDB()
	{
		$dir = 'sqlite:BD/Surveys.db';
		$db = new PDO($dir);
		return $db;
	}

	/*
		Permet de retourner un user et son type de compte
	*/
	function login ($login, $password)
	{
		$db = connectDB(); //se connect à la BD

		$sql = $db->prepare("SELECT useLogin, useType FROM Users WHERE useLogin = :login AND usePassword = :password"); //prépare la requête
		
		$sql->bindValue(":login", $login); //met le login
		$sql->bindValue(":password",  $password ); //met le password
		
		$sql->execute(); //execute la requête et la met dans la variable

		$result =  $sql->fetch(PDO::FETCH_ASSOC);

		$db = null; //vide la connection
		return $result; //retourne le résultat
	}

	/*
		Retourne tous les infos des users (sauf le MDP)
	*/
	function getUsersInfo(){
		$db = connectDB(); //se conenct à la BD

		$sql = $db->prepare("SELECT useLogin, useNom, usePrenom, useDOB, useType FROM Users"); //prépare la requête
		
		
		$sql->execute(); //execute la requête et la met dans la variable

		$result =  $sql->fetchAll(PDO::FETCH_ASSOC); //met les résultat dans un tableau
		
		$db = null; //vide la connection
		return $result; //retourne le résultat
	}

	/*
		Permet de retourner les info d'un user
	*/
	function getUserInfo($ID){
		$db = connectDB(); //se conenct à la BD

		$sql = $db->prepare("SELECT useLogin, useNom, usePrenom, useDOB, useType FROM Users WHERE IDUser = :ID"); //prépare la requête
		$sql->bindValue(":ID",$ID);
		
		$sql->execute(); //execute la requête et la met dans la variable

		$result =  $sql->fetch(PDO::FETCH_ASSOC); //met les résultat dans un tableau
		
		$db = null; //vide la connection
		return $result; //retourne le résultat
	}

	/*
		Permet de créer un nouveau user
	*/
	function addUser($nom, $prenom, $user, $password, $DOB, $type){
		$db = connectDB(); //se conenct à la BD

		if($type == "sondeur"){
			$type = 2;
		}
		else{
			$type = 1;
		}

		$sql = $db->prepare("INSERT INTO Users (useNom, usePrenom, useLogin, usePassword, useDOB, useType) VALUES (:nom, :prenom, :user, :password, :DOB, :type)"); //prépare la requête

		$sql->bindValue(":nom", $nom); //met le nom
		$sql->bindValue(":prenom",  $prenom ); //met le prenom
		$sql->bindValue(":user", $user); //met le login
		$sql->bindValue(":password",  $password ); //met le password
		$sql->bindValue(":DOB", $DOB); //met le Date de naissance
		$sql->bindValue(":type",  $type ); //met le type de compte
		
		
		$sql->execute(); //execute la requête et la met dans la variable
		$db = null; //vide la connection
	}

	/*
		Permet de supprimer un user selon le login
	*/
	function deleteUser($login){
		$db = connectDB(); //se conenct à la BD

		$sql = $db->prepare("DELETE FROM Users WHERE useLogin = :login"); //prépare la requête

		$sql->bindValue(":login", $login); //met le login

		$sql->execute(); //execute la requête et la met dans la variable
		$db = null; //vide la connection
	}

	/*
		créé un nouveau survey vide pour un utilisateur spécifié
	*/
	function createSurvey($user, $titre, $start, $end, $code){
		$db = connectDB(); //se conenct à la BD
 
		//ici on inscrit le nouveau survey
		$sql = $db->prepare("INSERT INTO Surveys (surNom, surStart, surEnd, surCode, FK_User) VALUES (:nom, :start, :end, :code, :FK)"); //prépare la requête
		
		$sql->bindValue(":nom", $titre); //met le titre
		$sql->bindValue(":start", $start); //date de début
		$sql->bindValue(":end", $end); //date de fin
		$sql->bindValue(":code", $code); //code du sondage
		$sql->bindValue(":FK", $user); //user associé au sondage
		$sql->execute(); //execute la requête et la met dans la variable
		$db = null; //vide la connection
	}

	/*
		ajoute les info au survey créé
	*/
	function addSurveyInfo($question, $type){
		$db = connectDB(); //se conenct à la BD

		//ici on trouve l'ID du survey créé
		$sql = $db->prepare("SELECT IDSurvey FROM Surveys ORDER BY IDSurvey Desc"); //prépare la requête
		$sql->execute(); //execute la requête et retourne l'ID du servey créé dans l'autre fonction

		$result =  $sql->fetch(PDO::FETCH_ASSOC); //contient l'ID
		$ID = $result["IDSurvey"];

		//on insert
		$sql = $db->prepare("INSERT INTO SurveyInfo (SIQuestion, SIType, FK_Survey) VALUES (:question, :type, :FK)"); //prépare la requête
		$sql->bindValue(":question", $question); //titre de la question
		$sql->bindValue(":type", $type); //type de la question
		$sql->bindValue(":FK", $ID); //référence vers le survey
		$sql->execute(); //execute la requête et la met dans la variable
		$db = null; //vide la connection
	}

	/*
		Permet de supprimer un survey et ses questions
	*/
	function deleteSurvey($ID){
		$db = connectDB(); //se conenct à la BD

		//supprime les infos du survey
		$sql = $db->prepare("DELETE FROM SurveyInfo WHERE FK_Survey = :fk"); //prépare la requête
		$sql->bindValue(":fk", $ID);
		$sql->execute(); //execute la requête et la met dans la variable


		//supprime le survey
		$sql = $db->prepare("DELETE FROM Surveys WHERE IDSurvey = :id"); //prépare la requête
		$sql->bindValue(":id", $ID); //id du sondage
		$sql->execute(); //execute la requête et la met dans la variable

		$db = null; //vide la connection
	}

	/*
		Permet d'afficher tous les sondages d'un user
	*/
	function GetSondageForUser($login){
		$db = connectDB(); //se conenct à la BD

		$sql = $db->prepare("SELECT * FROM Surveys WHERE FK_User = :user"); //prépare la requête
		$sql->bindValue(":user", $login); //le user

		$sql->execute(); //execute la rêquête

		$result =  $sql->fetchAll(PDO::FETCH_ASSOC); //met le résultat dans un tableau
		
		$db = null; //vide la connection
		return $result; //retourne le résultat
	}

	/*
		Permet de trouver un sondage selon son code
	*/
	function findSurvey($code){
		$db = connectDB(); //se conenct à la BD

		$sql = $db->prepare("SELECT IDSurvey, surCode, surStart, surEnd FROM Surveys WHERE surCode = :code"); //prépare la requête
		$sql->bindValue(":code", $code); //code du sondage
		$sql->execute(); //execute la rêquête

		$result =  $sql->fetch(PDO::FETCH_ASSOC); //met le résultat dans un tableau
		
		$db = null; //vide la connection
		return $result; //retourne le résultat
	}

	/*
		Retourne le nom du sondage selon le code du sondage
	*/
	function getSurveyName($code){
		$db = connectDB(); //se conenct à la BD

		$sql = $db->prepare("SELECT surNom FROM Surveys WHERE surCode = :code"); //prépare la requête
		$sql->bindValue(":code", $code); //code du sondage
		$sql->execute(); //execute la rêquête

		$result =  $sql->fetch(PDO::FETCH_ASSOC); //met le résultat dans le tableau
		$Name = $result["surNom"]; //retourne son nom

		$db = null; //vide la connection
		return $Name; //retourne son nom
	}

	/*
		Permet de retourner les infos d'un server selon son code
	*/
	function getSurveyQuestions($code){
		$db = connectDB(); //se conenct à la BD

		$sql = $db->prepare("SELECT IDSurvey FROM Surveys WHERE surCode = :code"); //prépare la requête
		$sql->bindValue(":code", $code); //titre de la question
		$sql->execute(); //execute la requête
 
		$result =  $sql->fetch(PDO::FETCH_ASSOC);
		$ID = $result["IDSurvey"]; //contient l'ID du survey à avoir les infos

		//va chercher les infos du sondage avec l'ID trouvé
		$sql = $db->prepare("SELECT * FROM SurveyInfo WHERE FK_Survey = :FK"); //prépare la requête
		$sql->bindValue(":FK", $ID); //titre de la question
		$sql->execute(); //execute la requête

		$result =  $sql->fetchALL(PDO::FETCH_ASSOC);
		shuffle($result);
		$db = null; //vide la connection

		return $result; //retourne le résultat
	}

	/*
		Permet de sauvegarder les réponses
	*/
	function SaveAnswer($debut, $fin, $IP, $IDQuestion, $Reponse, $IDSurvey){
		$db= connectDB(); //se conenct à la BD

		//on insert
		$sql = $db->prepare("INSERT INTO SurveyReponses (repDateDebut, repDateFin, repIP, FK_Question, repReponse, FK_Survey) VALUES (:debut, :fin, :IP, :IDQuestion, :reponse, :IDSurvey)"); //prépare la requête
		
		$sql->bindValue(":debut", $debut); //date de debut du sonsage
		$sql->bindValue(":fin", $fin); //date de fin du sondage
		$sql->bindValue(":IP", $IP); //adresse IP du répondant
		$sql->bindValue(":IDQuestion", $IDQuestion); //ID de la question répondu
		$sql->bindValue(":reponse", $Reponse); //Réponse à la question
		$sql->bindValue(":IDSurvey", $IDSurvey); //ID du survey pour les réponses

		$sql->execute(); //execute la requête et la met dans la variable
		
		$db = null; //vide la connection
	}

	/*
		Permet de trouver l'ID d'un question pour un survey
	*/
	function FindIDQuestion($question, $survey){
		$db = connectDB(); //se conenct à la BD

		$sql = $db->prepare("SELECT IDSurvInfo FROM SurveyInfo WHERE SIQuestion = :question AND FK_Survey = :FK"); //prépare la requête
		$sql->bindValue(":question", $question); //titre de la question
		$sql->bindValue(":FK", $survey); //titre de la question
		$sql->execute(); //execute la requête

		$result =  $sql->fetch(PDO::FETCH_ASSOC);
		$db = null; //vide la connection

		return $result; //retourne le résultat
	}

	/*
		Permet de rourner les reponses d'un sondage
	*/
	function GetSurveyAnswers($ID){
		$db = connectDB(); //se conenct à la BD
 
		$sql = $db->prepare("SELECT FK_Question FROM SurveyReponses WHERE FK_Survey = :FK"); //prépare la requête
		$sql->bindValue(":FK", $ID); //ID du sondage
		$sql->execute(); //execute la requête

		$result =  $sql->fetchALL(PDO::FETCH_ASSOC);
		$db = null; //vide la connection

		return $result; //retourne le résultat
	}

	/*
		Permet de retourner les reponses pour une question
	*/
	function GetResultsForQuestion($ID){
		$db = connectDB(); //se conenct à la BD

		$sql = $db->prepare("SELECT repReponse FROM SurveyReponses WHERE FK_Question = :FK"); //prépare la requête
		$sql->bindValue(":FK", $ID); //ID du sondage
		$sql->execute(); //execute la requête

		$result =  $sql->fetchAll(PDO::FETCH_ASSOC);
		$db = null;

		return $result; //retourne le résultat
	}
?>
