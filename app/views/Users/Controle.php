<?php
	
?>
<html>

<head>
	<title>Garage à Denis</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/css/style2.css" />
	<script src="/js/javascript.js"></script>

	<script type="text/javascript">
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            	//var myNode = document.getElementById("DivInfo");
				//while (myNode.firstChild) {
    			//myNode.removeChild(myNode.firstChild);
}
                for (x in xmlhttp.responseText ){
                	var Nom = x['Nom'] ;
                	var Pin = x['No_pin'] ;

                	AjouterDivInfoPorte(Pin,Nom);
                }
            }
        };
        xmlhttp.open("get", "/index.php/Admin/GetAllPin", true);
        xmlhttp.send();
	</script>

</head>

<body>
	<div class="NavBar">
		<ul>
		<li><a class="quit" href="/index.php/Admin/Accueil"> Quitter</a></li>
		<li><a href="/index.php/Users/ControleSysteme"> Rafraichir </a></li>
		</ul>
	</div>
	<div class="Ctn" align="center" id="DivInfo">
			<div class="InfoPorte" align="center">
			<input type="hidden" value="MP1">
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

									<button type="button" value="Action" class="ChangerBtn"><span>Ouvrir</span></button>

									<?php  } else {
									?>  

									<button type="button" value="Action" class="ChangerBtn"><span>Fermer</span></button>

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

									<button type="button" value="Action" class="ChangerBtn"><span>Ouvrir</span></button>

									<?php  } else {
									?>  

									<button type="button" value="Action" class="ChangerBtn"><span>Fermer</span></button>

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

									<button type="button" value="Action" class="ChangerBtn"><span>Ouvrir</span></button>

									<?php  } else {
									?>  

									<button type="button" value="Action" class="ChangerBtn"><span>Fermer</span></button>

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

									<button type="button" value="Action" class="ChangerBtn"><span>Ouvrir</span></button>

									<?php  } else {
									?>  

									<button type="button" value="Action" class="ChangerBtn"><span>Fermer</span></button>

									<?php
								}
						?>
				
			</div>
			<div class="InfoPorte" align="center">
				<h1>Porte latérale </h1>
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
					<?php
								$porte = system ( "gpio read 0");
								if ($porte == "0") {
									?> 

									<button disabled type="button" value="Action" class="ChangerBtn"><span>Ouvrir</span></button>

									<?php  } else {
									?>  

									<button disabled type="button" value="Action" class="ChangerBtn"><span>Fermer</span></button>

									<?php
								}
						?>			
			</div>
			<div class="InfoPorte" align="center">
				<h1>Ajouter </h1>
				<h2> nouvelle entrée 
					</h2>
				<button type="button" value="Action" onclick="AjouterDivInfoPorte(21,'MP1')" class="ChangerBtn"><span> + </span></button>			
			</div>
	</div>	

</body>

</html>