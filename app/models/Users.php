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
			return $password;
		}
	}
?>