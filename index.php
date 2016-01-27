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

		<!-- Wrapper -->
			<div class="wrapper style1">

				<!-- Header -->
					<div id="header" class="skel-panels-fixed">
						<div id="logo">
							<h1><a href="index.html">Systeme RPI</a></h1>
						</div>
					</div>

				<!-- Extra -->
					<div id="extra">
						<div class="container">
							<div class="row no-collapse-1">
								<section class="4u"> 
								<a href="#" class="image featured">
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
								<section class="4u"> <a href="#" class="image featured">
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
								<section class="4u"> <a href="#" class="image featured">
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
								<section class="4u"> <a href="#" class="image featured">
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
								<section class="4u"> <a href="#" class="image featured">
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
								<section class="4u"> <a href="#" class="image featured"><img src="images/garage.jpg" alt=""></a>
									<div class="box">
										<p>Toutes les portes</p>
										<a href="#" class="button">Fermer</a></div>
								</section>
							</div>
						</div>
					</div>
	</div>
	<!-- Copyright -->
		<div id="copyright">
			<div class="container">
				<div class="copyright">
					<p>Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)</p>
					<ul class="icons">
						<li><a href="#" class="fa fa-facebook"><span>Facebook</span></a></li>
						<li><a href="#" class="fa fa-twitter"><span>Twitter</span></a></li>
						<li><a href="#" class="fa fa-google-plus"><span>Google+</span></a></li>
					</ul>
				</div>
			</div>
		</div>

	</body>
</html>