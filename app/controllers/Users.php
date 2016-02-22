<?php
	include_once("../app/models/Users.php");
	include_once("../app/models/Admin.php");
	class Users extends Controller
	{
		public function Accueil(){
			
		}

		public function AccesPorte(){

			$NoPin = $_POST["PIN"];

			$NoPin = $NoPin -4;

			system ("gpio write " . $NoPin . " off");
			sleep ( 1 );
			system ("gpio write  " . $NoPin . " on");
			
		}
		
		public function Password(){

			$users = new modUsers();
			$retour = $users->ValiderPassword($_POST["password"]);

			//echo json_encode($retour);
			if ($retour["Type"] == '2') {

				$User = new modUsers();
				$result = $User->GetAllModePin();
				$_SESSION["PINMODE"] = $result;

				parent::view('Users/Controle');
			}
			elseif($retour["Type"] == '1'){
				$admin = new modAdmins();
				$result = $admin->GetNomDistributeurs();
				$config = $admin->GetConfig();

				parent::view('Admin/GestionCode',['LstDistributeur'=>$result, 'config'=>$config ]);
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