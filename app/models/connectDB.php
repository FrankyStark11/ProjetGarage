<?php
/*
	Classe qui contient les instruction d'une connection vers la BD
*/
class connectDB
{
	/*
		Permet de retourner une connection � la BD
	*/
	function connectDB()
	{
		$dir = 'sqlite:../app/controllers/BD/garage.bd';
		$db = new PDO($dir);
		return $db;
	}
}
?>