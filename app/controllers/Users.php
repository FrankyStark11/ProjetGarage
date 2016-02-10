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
			elseif($retour["Type"] == '1'){
				parent::view('Admin/GestionCode');
			}
			else
			{
				parent::view('Users/Index');
			}
		}

		public function ControleSysteme(){
			parent::view('Users/Controle');

		}
	}
?>