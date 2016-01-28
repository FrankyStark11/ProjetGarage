<?php
/*
	Classe qui contient les instruction d'une connection vers la BD
*/
class connectDB
{
	/*
		Permet de retourner une connection à la BD
	*/
	function connectDB()
	{
		$dir = 'sqlite:../app/bd/garage.sqlite';
		$db = new PDO($dir);
		return $db;
	}
}
?>