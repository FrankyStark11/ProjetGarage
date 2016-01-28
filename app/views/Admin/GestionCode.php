<html>
	<head>
		<title>Garage</title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<script src="/js/javascript.js"></script>

		<link rel="stylesheet" type="text/css" href="/css/style2.css" />

	</head>
	<body onload="initialiser()">
	<div class="NavBar">
		<ul>
		  <li><a class="quit" href="/index.php/Admin/Accueil"> Quitter </a></li>
		</ul>
	</div>
	<div class="Ctn" align="center">
			<!-- code section -->	
		<div class="InfoConfig">
			
			<h1>Gestion des codes Utilisateurs</h1>
			<table class="config">

				<form method="post" action="/index.php/Admin/ChangeCode">
					<tr>
						<td class="config">
							<h2>Administration</h2>
							<input type="hidden" name="type" value="Administrateur" readonly>
						</td>
					</tr>
					<tr>
						<td class="config"><input class="TextMpd" type="number" pattern="\d*" placeholder="mot de passe" name="password"></td>
					</tr>
					<tr>
						<td class="config"><button class="ChangerBtn" type="submit" value="Sauvegarder"><span>Changer </span></button></td>
					</tr>
				</form>

				<form method="post" action="/index.php/Admin/ChangeCode">
					<tr>
						<td class="config">
							<h2>Proprio</h2>
							<input type="hidden" name="type" value="Proprio" readonly>
						</td>
					</tr>
					<tr>
						<td class="config"><input class="TextMpd" type="number" pattern="\d*" type="text" placeholder="mot de passe" name="password"></td>
					</tr>
					<tr>
						<td class="config"><button class="ChangerBtn" type="submit" value="Sauvegarder"><span>Changer </span></button></td>
					</tr>
				</form>

				<form method="post" action="/index.php/Admin/ChangeCode">
					<tr >
						<td class="config">
							<h2>Ami</h2>
							<input type="hidden" name="type" value="Ami" readonly>
						</td>
					</tr>
					<tr>
						<td class="config"><input class="TextMpd" type="number" pattern="\d*" type="text" placeholder="mot de passe" name="password"></td>
					</tr>
					<tr>
						<td class="config"><button class="ChangerBtn" type="submit" value="Sauvegarder"><span>Changer </span></button></td>
					</tr>
				</form>
			</table>
		</div>	
			<div class="InfoConfig">
				<form method="post" action="">
				<h1>Gestion de la sécurité</h1>
					<table class="config">
						
						<form method="post" action="/index.php/Admin/ChangeCheckSMS">
							<tr>
								<td class="config">
									<h2>Sécurité SMS</h2>
								</td>
							</tr>
							<!-- <input type="checkbox" name="active" value="active">Activé -->
							<tr>
								<td class="config">

									<div class="Check">
										<input class="checkConfig" type="checkbox" value="None" name="check" /><label class="check">Protection SMS</label>
									</div>
								</td>
							</tr>
						</form>


						<form method="post" action="/index.php/Admin/ChangePhone">
							<tr>
								<td class="config">
									<h2>Configuration SMS</h2>
								</td>
							</tr>
							<tr>
								<td class="config"><input class="TextMpd" type="text" placeholder="# téléphone" name="telephone"></td>
							</tr>
							<tr>
								<td class="config">
									<select class="TextMdp" name="lstDist">
										
									</select>
								</td>
							</tr>
						</form>


						<form method="post" action="/index.php/Admin/ChangeTimer">
							<tr>
								<td class="config">
									<h2>Délais</h2>
								</td>
							</tr>
							<tr>
								<td class="config"><input class="TextMpd" id="DelaisText" type="text" placeholder="00:00" value="1:00" readonly name="timer"></td>
							</tr>
							<tr>
								<td class="config">
									<button class="ChangerBtnTime" type="submit" name="BtnAdd" value="add" onclick="AjouterTempsZoneDelais()">+</button>
									<button class="ChangerBtnTime" type="submit" name="BtnSub" value="sub" onclick="RetirerTempsZoneDelais()">-</button>
								</td>
							</tr>
						</form>

					</table>
				</form>
			</div>
		</div>
	</body >
</html>