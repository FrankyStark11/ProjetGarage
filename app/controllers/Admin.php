
<?php
	include_once("../app/models/Admin.php");
	class Admin extends Controller
	{
		public function Accueil(){
			parent::view('Users/Index');
		}

		public function GestionCodes(){
			parent::view('Admin/GestionCode');
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
			parent::view('Users/Index');
		}
		
		public function showResetPassword(){
			parent::view('Admin/ResetPassword');
		}
		
		public function resetmdp(){
			$admin = new modAdmins();
			$admin->ResetAdmin($_POST["password"]);
			parent::view('Users/Index');
		}
		
		
	}
?>