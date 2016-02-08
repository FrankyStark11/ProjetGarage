
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

		public function GetAllPin(){
			$admin = new modAdmins();
			$result = $admin->GetAllPin();
			echo json_encode($result);
		}
		
		public function ChangeCode(){
			$admin = new modAdmins();
			$admin->ChangeCode($_POST["password"], $_POST["type"]);
			$this->GestionCodes();
		}
		
		public function mdpOublie(){
			$admin = new modAdmins();
			$admin->mdpOublie();
		}
		
		public function resetmdp(){
		}
	}
?>