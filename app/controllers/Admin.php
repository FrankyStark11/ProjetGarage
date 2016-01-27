
<?php
	include_once("../app/models/Admin.php");
	class Admin extends Controller
	{
		public function Accueil(){
			parent::view('Users/PageCode');
		}

		public function GestionCodes(){
			parent::view('Users/Code');
		}
		
		public function ChangeCode(){
			$admin = new modAdmins();
			$admin->ChangeCode($_POST["password"], $_POST["type"]);
			//$this->GestionCodes();
		}
	}
?>