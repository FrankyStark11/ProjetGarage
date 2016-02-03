
<?php
	class Admin extends Controller
	{
		public function Accueil(){
			parent::view('Users/PageCode');
		}

		public function GestionCodes(){
			parent::view('Users/Code');
		}
	}
?>