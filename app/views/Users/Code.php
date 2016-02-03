<html>
	<head>
		<title>Garage</title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<script src="js/javascript.js"></script>

		<link rel="stylesheet" type="text/css" href="/css/style2.css" />

	</head>
	<body onload="initialiser()">
	<a href="/index.php/Users/ControleSysteme"> page de controle </a><br>
			<a href="/index.php/Admin/GestionCodes"> page de gestion codes</a><br>
			<a href="/index.php/Admin/Accueil"> page de Login</a>
			<!-- code section -->	
		<div class="LeftBox" align="center">
			<form method="post" action="">
			<h1>Gestion des codes Utilisateurs</h1>
				<table>
					<tr>
						<td>
							<h2>Administration</h2>
						</td>
					</tr>
					<tr>
						<td><input class="TextMpd" type="text" placeholder="MPD"></td>
						<td><button class="SauvegarderBtn" type="button" name="4" value="Sauvegarder" onclick="feedPassword(this)"><span>Sauvegarder </span></button></td>
					</tr>
					<tr>
						<td>
							<h2>Proprio</h2>
						</td>
					</tr>
					<tr>
						<td><input class="TextMpd" type="text" placeholder="MPD"></td>
						<td><button class="SauvegarderBtn" type="button" name="4" value="Sauvegarder" onclick="feedPassword(this)"><span>Sauvegarder </span></button></td>
					</tr>
					<tr>
						<td>
							<h2>Ami</h2>
						</td>
					</tr>
					<tr>
						<td><input class="TextMpd" type="text" placeholder="MPD"></td>
						<td><button class="SauvegarderBtn" type="button" name="4" value="Sauvegarder" onclick="feedPassword(this)"><span>Sauvegarder </span></button></td>
					</tr>
				</table>
			</form>
		</div>	
		<div class="RightBox" align="center">
			<form method="post" action="">
			<h1>Gestion de la <br> sécurité</h1>
				<table>
					<tr>
						<td>
							<h2>Protection SMS</h2>
						</td>
					</tr>
					<tr>
						<td>Protection par SMS : </td>
						<td><input type="checkbox" name="active" value="active">Activé</td>
					</tr>
					<tr>
						<td>
							<h2>Configuration SMS</h2>
						</td>
					</tr>
					<tr>
						<td><input class="TextMpd" type="text" placeholder="# téléphone"></td>
						<td><button class="SauvegarderBtn" type="button" name="4" value="Sauvegarder" onclick="feedPassword(this)"><span>Sauvegarder </span></button></td>
					</tr>
					<tr>
						<td>
							<h2>Délais fermeture portes</h2>
						</td>
					</tr>
					<tr>
						<td><input class="TextMpd" type="text" value="00:00" readonly></td>
						<td>
							<button class="digit-time" type="button" name="BtnAdd" value="add" onclick="">+</button>
							<button class="digit-time" type="button" name="BtnSub" value="sub" onclick="">-</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body >
</html>