<html>

<head>
	<title>Garage à Denis</title>
	<link rel="stylesheet" type="text/css" href="/css/style2.css" />
</head>

<body>
	<div class="NavBar">
		<ul>
		  <li><a href="/index.php/Users/ControleSysteme"> Rafraichir </a></li>
		  <li><a href="/index.php/Admin/Accueil"> Quitter</a></li>
		</ul>
	</div>
	<div class="CtnPorte">
			<div class="InfoPorte" align="center">
				<h1>Etat de la porte 1 </h1>
					<h2>
						<?php
								$porte = system ( "gpio read 25");
								if ($porte == "0") {
									?> 

									Fermer

									<?php  } else {
									?>  

									Ouvert

									<?php
								}
						?>
					</h2>
				<button type="button" value="Action" class="SauvegarderBtn"><span>Go</span></button>
			</div>
			<div class="InfoPorte" align="center">
				<h1>Etat de la porte 2 </h1>
					<h2>
						<?php
								$porte = system ( "gpio read 26");
								if ($porte == "0") {
									?> 

									Fermer

									<?php  } else {
									?>  

									Ouvert

									<?php
								}
						?>
					</h2>
				<button type="button" value="Action" class="SauvegarderBtn"><span>Go</span></button>
			</div>
			<div class="InfoPorte" align="center">
				<h1>Etat de la porte 3 </h1>
					<h2>
						<?php
								$porte = system ( "gpio read 27");
								if ($porte == "0") {
									?> 

									Fermer

									<?php  } else {
									?>  

									Ouvert

									<?php
								}
						?>
					</h2>
				<button type="button" value="Action" class="SauvegarderBtn"><span>Go</span></button>
			</div>
			<div class="InfoPorte" align="center">
				<h1>Etat de la porte 4 </h1>
					<h2>
						<?php
								$porte = system ( "gpio read 28");
								if ($porte == "0") {
									?> 

									Fermer

									<?php  } else {
									?>  

									Ouvert

									<?php
								}
						?>
					</h2>
				<button type="button" value="Action" class="SauvegarderBtn"><span>Go</span></button>
			</div>
			<div class="InfoPorte" align="center">
				<h1>Etat de la porte latéral </h1>
					<h2>
						<?php
								$porte = system ( "gpio read 0");
								if ($porte == "0") {
									?> 

									Fermer

									<?php  } else {
									?>  

									Ouvert

									<?php
								}
						?>
					</h2>
				<button type="button" value="Action" class="SauvegarderBtn"><span>Go</span></button>
			</div>
	</div>	

</body>

</html>