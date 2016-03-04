<?php
	//si une fausse accès à la page, on le kick

	if($_SESSION["NomUser"] != "Proprio"){
		header("Refresh:0; ../Tools/AccesRefuse");
	}
?>
<html>

<head>
	<title>Garage à Denis</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Kick le user après X temps -->
	<meta http-equiv="refresh" content="6;url=/index.php/Tools/KickUserTimeOut" />
	<link rel="stylesheet" type="text/css" href="/css/style2.css" />
	<script src="/js/javascript.js"></script>
	<script src="/js/jquery-1.12.1.min.js"></script>

	<?php

		// * * * Initialisation des GPIO * * *
		$data = $_SESSION['PINMODE'];

		system ("gpio mode 1 out");  // Pin : système armé
		system ("gpio mode 0 in"); // Pin : petite porte commutateur magnétique

		$temp = 0;
		$Mode = "";

		for ($i = 0; $i < count($data); $i++) {

    		$Mode = $data[$i]["Mode"];
    		$temp = intval($data[$i]["No_pin"]);

    		system ("gpio mode ". $temp ." ". $Mode );

    		if($Mode == "out"){
    			system ("gpio write ". $temp." on");
    		}
		}

		function AfficherPorte(){
			$data = $_SESSION['PINMODE'];
			
			for ($i = 0; $i < count($data); $i++) {
			
				$Mode = $data[$i]["Mode"];
				
				if($Mode == 'in'){
				
				$pin = intval($data[$i]["No_pin"]);
				$porte = system ( "gpio read ". $pin);
				$nom = $data[$i]["Nom"];
				
				echo '<script> AjouterDivInfoPorte("'.$nom.'","'.$porte.'","'.$pin.'"); </script>';
				}
			}
		}

	?>
</head>

<body >
	<div class="NavBar">

	<div name="porte" class="Ctn_Message" id="DivMessage">
		Action ajouté 
	</div>

		<ul>
			<li><a class="quit" href="/index.php/Users/Quitter"> Quitter</a></li>
		</ul>
	</div>

	<div class="Ctn" align="center" id="DivInfo">
	<?php 
		AfficherPorte();
	?>		
	</div>	

</body>

</html>