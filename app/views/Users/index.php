<!DOCTYPE HTML>
<!--
	Phase Shift by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Garage</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>

		<?php

	// * * * Initialisation des GPIO * * *

	// Initialisation MODE IN|OUT
	for ( $i = 21 ; $i <= 24 ; $i++ ) {  //  Pins : vers In 1 - In 4  Relais
	system ("gpio mode ".$i." out");
	}

	system ("gpio mode 1 out");  // Pin : système armé
	
	for ( $i = 25 ; $i <= 28 ; $i++ ) {  // pins : 4 commuteteurs magnétiques
	system ("gpio mode ".$i." in");
	}

	system ("gpio mode 0 in"); // Pin : petite porte commutateur magnétique

	// Initialisation des pins OUT a ON Relais normalement ouvert
	for ( $i = 21 ; $i <= 24 ; $i++ ) {
	system ("gpio write ".$i." on");
	}

	// * * * Les fonctions * * *

	// Activation porte 1
	function porte1() {
		system ("gpio write 21 off");
		sleep ( 1 );
		system ("gpio write 21 on");
		}

	// Activation porte 2
	function porte2() {
		system ("gpio write 22 off");
		sleep ( 1);
		system ("gpio write 22 on");
		}

	// Activation porte 3
	function porte3() {
		system ("gpio write 23 off");
		sleep ( 1 );
		system ("gpio write 23 on");
		}

	// Activation porte 4
	function porte4() {
		system ("gpio write 24 off");
		sleep ( 1 );
		system ("gpio write 24 on");
		}

	//fermer toutes les portes
	function fermerToutesPortes(){
		for ( $i = 25 ; $i <= 28 ; $i++ ) {
		$gpio=$i-4;
		$porte = system ( "gpio read ".$i);
		if ($porte == "0"){
				system ("gpio write ". $gpio ." off");
				sleep ( 1 );
				system ("gpio write ". $gpio ." on");
			}

		}
	}

	// Lecture du statut des portes
	function statut() {
	for ( $i = 25 ; $i <= 28 ; $i++ ) {
		$porte = system ( "gpio read ".$i);
		if ($porte == "0") {
			?>   <img src="Images/red.jpg" width=15%>
			<?php  } else {
			?>   <img src="Images/green.jpg" width=15%>
			<?php
		}
	}
		$porte = system ( "gpio read 0");
			if ($porte == "0") {
				?><br /><img src="Images/red.jpg" width=10%>
				<?php  } else {
				?> <br /><img src="Images/green.jpg" width=10%>
				<?php
				}
	}
	?>
	</head>
	<body>

	<?php
		// Activation des portes
		switch ($_GET["porte"]) {
		case 1: // Active la porte 1
			porte1();
			break;
		case 2: // Active la porte 2
			porte2();
			break;
		case 3: // Active la porte 3
			porte3();
			break;
		case 4: // Active la porte 4
			porte4();
			break;
		case 5:  //active la fermeture des portes ouvertes
			for ( $i = 25 ; $i <= 28 ; $i++ ) {
			$porte = system ( "gpio read ".$i);
			$gpio=$i-4;
			if ($porte == "0") {
			system ("gpio write ".$gpio." off");
			sleep ( 1 );
			system ("gpio write ".$gpio." on");
			}
			}
			break;
		case 6; // arme|desarme email
			$porte = system ("gpio read 1");
			if ($porte == "0") {
				system ("gpio write 1 1");
			} else {
				system ("gpio write 1 0");
			}
	}
	?>

		<!-- Wrapper -->
			<div class="wrapper style1">

				<!-- Header -->
					<div id="header" class="skel-panels-fixed">
						<div id="logo">
							<h1><a href="index.php">Systeme RPI</a></h1>
						</div>
						<nav id="nav">
							<ul>
								<li class="active"><a href="index.html">déconnexion</a></li>
							</ul>
						</nav>
					</div>
				<!-- Extra -->
					<div id="extra">
						<div class="container">
							<div class="row no-collapse-1">
								<section class="4u"> 
								<a href="index.php?porte=1" class="image featured">
								<?php
								$porte = system ( "gpio read 25");
								if ($porte == "0") {
									?>   <img src="images/red.jpg" width=15%>
									<?php  } else {
									?>   <img src="images/green.jpg" width=15%>
									<?php
								}
								?>

								</a>
									<div class="box">
										<p>Porte # 1 <br> Etat : Fermer</p> 
									</div>
								</section>
								<section class="4u"> <a href="index.php?porte=2" class="image featured">
									<?php
								$porte = system ( "gpio read 26");
								if ($porte == "0") {
									?>   <img src="images/red.jpg" width=15%>
									<?php  } else {
									?>   <img src="images/green.jpg" width=15%>
									<?php
								}
								?>
								</a>
									<div class="box">
										<p>Porte # 2 <br> Etat : Fermer</p></div>
								</section>
								<section class="4u"> <a href="index.php?porte=3" class="image featured">
									<?php
								$porte = system ( "gpio read 27");
								if ($porte == "0") {
									?>   <img src="images/red.jpg" width=15%>
									<?php  } else {
									?>   <img src="images/green.jpg" width=15%>
									<?php
								}
								?>
								</a>
									<div class="box">
										<p>Porte # 3 <br> Etat : Fermer</p></div>
								</section>
							</div>
							<div class="row no-collapse-1">
								<section class="4u"> <a href="index.php?porte=4" class="image featured">
									<?php
								$porte = system ( "gpio read 28");
								if ($porte == "0") {
									?>   <img src="images/red.jpg" width=15%>
									<?php  } else {
									?>   <img src="images/green.jpg" width=15%>
									<?php
								}
								?>
								</a>
									<div class="box">
										<p>Porte # 4 <br> Etat : Fermer</p>
								</section>
								<section class="4u"> <a href="index.php?porte=5" class="image featured">
									<?php
								$porte = system ( "gpio read 0");
								if ($porte == "0") {
									?>   <img src="images/red.jpg" width=15%>
									<?php  } else {
									?>   <img src="images/green.jpg" width=15%>
									<?php
								}
								?>
								</a>
									<div class="box">
										<p>Porte # 5 <br> Etat : Fermer</p>
								</section>
								<section class="4u"> <a href="#" class="image featured"><img src="images/red.jpg" alt=""></a>
									<div class="box">
										<p>Systeme activé</p>
									</div>
								</section>
							</div>
						</div>
					</div>
	</div>
	</body>
</html>