<html>

<head>
	<title>Garage à Denis</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/css/style2.css" />
</head>

<body>
	<div class="NavBar">
		<ul>
		  <li><a href="/index.php/Users/ControleSysteme"> Rafraichir </a></li>
		  <li><a href="/index.php/Admin/Accueil"> Quitter</a></li>
		</ul>
	</div>
	<div class="Ctn" align="center">
			<div class="InfoPorte" align="center">
				<h1>Porte 1 </h1>
					<h2> Etat : 
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
					<?php
								$porte = system ( "gpio read 25");
								if ($porte == "0") {
									?> 

									<button type="button" value="Action" class="SauvegarderBtn"><span>Ouvrir</span></button>

									<?php  } else {
									?>  

									<button type="button" value="Action" class="SauvegarderBtn"><span>Fermer</span></button>

									<?php
								}
						?>
				
			</div>
			<div class="InfoPorte" align="center">
				<h1>Porte 2 </h1>
					<h2> Etat : 
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
					<?php
								$porte = system ( "gpio read 26");
								if ($porte == "0") {
									?> 

									<button type="button" value="Action" class="SauvegarderBtn"><span>Ouvrir</span></button>

									<?php  } else {
									?>  

									<button type="button" value="Action" class="SauvegarderBtn"><span>Fermer</span></button>

									<?php
								}
						?>
				
			</div>
			<div class="InfoPorte" align="center">
				<h1>Porte 3 </h1>
					<h2> Etat : 
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
					<?php
								$porte = system ( "gpio read 27");
								if ($porte == "0") {
									?> 

									<button type="button" value="Action" class="SauvegarderBtn"><span>Ouvrir</span></button>

									<?php  } else {
									?>  

									<button type="button" value="Action" class="SauvegarderBtn"><span>Fermer</span></button>

									<?php
								}
						?>
				
			</div>
			<div class="InfoPorte" align="center">
				<h1>Porte 4 </h1>
					<h2> Etat : 
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
					<?php
								$porte = system ( "gpio read 28");
								if ($porte == "0") {
									?> 

									<button type="button" value="Action" class="SauvegarderBtn"><span>Ouvrir</span></button>

									<?php  } else {
									?>  

									<button type="button" value="Action" class="SauvegarderBtn"><span>Fermer</span></button>

									<?php
								}
						?>
				
			</div>
			<div class="InfoPorte" align="center">
				<h1>Porte latéral </h1>
					<h2> Etat : 
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
			</div>
	</div>	

</body>

</html>