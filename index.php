<!-- <?php echo "Projet : garage sur Web"; ?> -->
<center>
<br />
<?php echo date('Y-m-d H:i:s');?>
<html>
	<center>
	<head>
	<title>Garage à Denis</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
		sleep ( 1 );
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
		<br />
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
	<br />
	<div class="GARAGE">
	<button class="dropbtn">ACTIVER</button>
	<div class="garage-content">
		<a href="index.php?porte=1">Porte 1</a>
		<a href="index.php?porte=2">Porte 2</a>
		<a href="index.php?porte=3">Porte 3</a>
		<a href="index.php?porte=4">Porte 4</a>
		<a href="index.php?porte=5">Fermer les portes</a>
		<a href="index.php?porte=6">Alerte email</a>
        </div>
	</div>
	<br />
	<a href="index.php?porte=0">
		<img src="Images/garage.jpg" width=90%>
		<br />
	</a>
	<?php
	// Lecture du statut des portes
	statut();
	$email = system ("gpio read 1") ;
	if ($email == "1") {
		?>
		<img src="Images/email.jpg" width=10% >
		<?php
	}
	?>
	</body>
	</center>
</html>