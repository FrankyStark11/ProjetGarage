<?php
	//si une fausse accès à la page, on le kick
	if($_SESSION["NomUser"] != "Administrateur"){
		header("Refresh:0; ../Users/AccesRefuse");
	}

	$nombre = $data['nombre'];
	$distributeurs = $data['distributeurs'];
?>
<html>
	<head>
		<title>Garage</title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<script src="/js/javascript.js"></script>

		<link rel="stylesheet" type="text/css" href="/css/style2.css" />
		
		<script>
			var nombre = <?php echo json_encode($nombre); ?>;
			var distributeurs = <?php echo json_encode($distributeurs); ?>;
		</script>
		
	</head>
	<body onload="InitialiserEditDistributeur(nombre, distributeurs)">
		<div class="NavBar">
			<ul>
			  <li><a class="quit" href="/index.php/Admin/GestionCodes"> Retour </a></li>
			</ul>
		</div>
		<form method="post" action="/index.php/Admin/UpdateDistributeurs">
			
			<div class="GestionEmailBox">
				<table id="tblDistributeurs">
			
				</table>
				<br>				
				<input class="ChangerBtn" type="button" onclick="CreerNouvDist(1)" value="Ajouter">
				<input class="ChangerBtn" type="submit" value="Confirmer">
			</div>
		</form>
	</body>
</html>