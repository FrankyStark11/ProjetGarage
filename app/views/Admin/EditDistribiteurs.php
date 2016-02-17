<?php
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
		<form method="post" action="/index.php/Admin/UpdateDistributeurs">
			
			<div class="InfoConfig">
				<table id="tblDistributeurs">
			
				</table>
				
				<input type="button" onclick="CreerNouvDist(1)" value="Ajouter">
				<input type="submit" value="Confirmer">
			</div>
		</form>
	</body>
</html>