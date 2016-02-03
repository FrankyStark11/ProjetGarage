<?php
	include_once("../app/models/Users.php");
	class Users extends Controller
	{
		public function Accueil(){
			
		}
		
		public function Password(){
			$users = new modUsers();
			$retour = $users->ValiderPassword($_POST["password"]);

			//echo json_encode($retour);
			if ($retour["Type"] == '2') {
				parent::view('Users/Controle');
			}
			else
			{
				parent::view('Users/Code');
			}
		}

		public function ControleSysteme(){
			parent::view('Users/Controle');
		}
	}
?>