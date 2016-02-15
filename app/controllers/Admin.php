
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

		public function GetAllModePin(){
			$admin = new modAdmins();
			$result = $admin->GetAllModePin();
			$SESSION["PINMODE"] = json_encode($result);
			//return json_encode($result);
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


		/*==============================================
			Gestion de securité
		================================================*/

		public function ChangeCheckSMS(){
			$admin = new modAdmins();

			echo $_POST["check"];

			//$admin->ChangeCheckSMS($_POST["check"]);
			//$this->GestionCodes();
		}

		public function ChangePhone(){
			$admin = new modAdmins();
			$admin->ChangePhone($_POST["telephone"]);
			$this->GestionCodes();
		}

		public function ChangeTimer(){
			$admin = new modAdmins();
			$admin->ChangeTimer($_POST["timer"]);
			$this->GestionCodes();
		}
		
		
	}
?>