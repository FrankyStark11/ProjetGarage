<?php
	include_once("../app/models/Users.php");
	class Users extends Controller
	{
		public function Accueil(){
			
		}
		
		public function Password(){
			$users = new modUsers();
			$retour = $users->ValiderPassword($_POST["password"]);
			echo $retour;
		}

		public function ControleSysteme(){
			parent::view('Users/Controle');
		}
	}
?>