<?php
	/*
		classe reor.sentant les models pour un user
	*/
	require_once '../app/models/connectDB.php';
	
	class modUsers extends connectDB
	{
		function ValiderPassword($password){
			return $password;
		}
	}
?>