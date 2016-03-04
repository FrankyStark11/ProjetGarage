<?php
	session_start();
	include_once("../app/models/Tools.php");
	include_once("../app/models/Users.php");
	class Tools extends Controller
	{
		/*
			Kick le user lors du délais dépassé
		*/
		public function KickUserTimeOut(){
			$Users = new modUsers();
			$Users->Quitter();
			parent::view('Tools/UserKick');
		}

		/*
			Redirection vers la page d'accès refusé
		*/
		public function AccesRefuse(){
			parent::view('Tools/refuse');
		}

		
	}
?>