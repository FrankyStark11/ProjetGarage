<?php
	//session_start();
	
	//si une fausse accès à la page, on le kick
	if($_SESSION["NomUser"] != "Administrateur"){
		header("Refresh:0; ../Tools/AccesRefuse");
	}

	$distributeur = $data['LstDistributeur'];
	$config = $data['config'];

	//contruit la liste de distributeur
	$LstDistributeur = array();
	array_push($LstDistributeur, $config["Distributeur"]);

	for ($i = 0; $i < count($distributeur); $i++) {
		if($distributeur[$i]["Nom"] != $LstDistributeur[0]){
			array_push($LstDistributeur, $distributeur[$i]["Nom"]);
		}
	}
	//checked sms
	$check = "";
	if($config["SecureOnOff"] == "ON"){
		$check = "checked";
	}
?>
<html>
	<head>
		<title>Garage</title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Kick le user après X temps -->
		<meta http-equiv="refresh" content="6;url=/index.php/Tools/KickUserTimeOut" />

		<script src="/js/javascript.js"></script>

		<link rel="stylesheet" type="text/css" href="/css/style2.css" />

	</head>
	<body onload="initialiser()">
	<div class="NavBar">
		<ul>
		  <li><a class="quit" href="/index.php/Users/Quitter"> Quitter </a></li>
		</ul>
	</div>
	<div class="Ctn" align="center">
			<!-- code section -->	
		<div class="InfoConfig">
			
			<h1>Gestion Utilisateurs</h1>
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
									
									<?php
										echo "<input class='checkConfig' type='checkbox' value='None' name='check'".$check." />"
									?>
									<label class="check">Protection SMS</label>
								</div>
						</td>
						</tr>
						<tr>
							<td>
								<button class="ChangerBtn" type="submit" value="Sauvegarder"><span>Changer </span></button>
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
								<?php
									echo "<td class='config'><input class='TextMpd' type='text' placeholder='# téléphone' name='telephone' value='".$config['Telephone']."'></td>"
								?>
							</tr>
							<tr>
								<td class="config">
									<select class="TextMpd" name="lstDist">
										<?php
											for ($i = 0; $i < count($LstDistributeur); $i++) {
												echo "<option name='". $i."'>". $LstDistributeur[$i] ."</option>";
											}
											
										?>
									</select>
								</td>
								<td>
									 <a href="/index.php/Admin/EditDistributeurs"><img src="/images/add.png" height="25" width="25"></a>
								</td>
							</tr>
							<tr>
								<td>
									<button class="ChangerBtn" type="submit" value="Sauvegarder"><span>Changer </span></button>
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

								<?php
									echo "<td class='config'><input class='TextMpd' id='DelaisText' type='text' placeholder='00:00' name='timer' readonly value='".$config['Delais']."'></td>"
								?>
							</tr>
							<tr>
								<td class="config">
									<button class="ChangerBtnTime" type="button" name="BtnAdd" value="add" onclick="AjouterTempsZoneDelais()">+</button>
									<button class="ChangerBtnTime" type="button" name="BtnSub" value="sub" onclick="RetirerTempsZoneDelais()">-</button>
								</td>
							</tr>
							<tr>
								<td>
									<button class="ChangerBtn" type="submit" value="Sauvegarder"><span>Changer </span></button>
								</td>
							</tr>
						</form>

				</table>
		</div>
			
		<div class="InfoConfig">
			<form method="post" action="">
				<h1>Ajout de GPIO</h1>
				<table >
					<tr>
						<td>
							Numéro PIN :
						</td>
						<td>
							<input name="NoPin" type="number" pattern="\d*" class="TextMpd" placeholder="# PIN"></input>
						</td>
					</tr>
					<tr>
						<td>
							Nom de l'entré :
						</td>
						<td>
							<input name="Nom" type="text" class="TextMpd" placeholder="Nom"></input>
						</td>
					</tr>
					<tr>
						<td>
							Mode I/O :
						</td>
						<td>
							<select name="Mode" class="TextMpd">
								<option selected value="in"> IN </option>
								<option value="out"> OUT </option>
							</select>
						</td>
					</tr>
				</table>
				<table>
					<tr>
						<td>
							<button class="ChangerBtn" type="submit" value="Ajouter"><span>Ajouter</span></button>
						</td>
					</tr>
				</table>
			</form>
		</div>

		<div class="InfoConfig">
			<form method="post" action="">
				<h1>Modification de GPIO</h1>
				<table >
					<tr>
						<td>
							Choix de la PIN :
						</td>
						<td>
							<select name="Mode" class="TextMpd">
								<option selected value="in"> IN </option>
								<option value="out"> OUT </option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<h3>Entrez les nouveaux details</h3>
						</td>
					</tr>
					<tr>
						<td>
							Numéro PIN :
						</td>
						<td>
							<input name="NoPin" type="number" pattern="\d*" class="TextMpd" placeholder="# PIN"></input>
						</td>
					</tr>
					<tr>
						<td>
							Nom de l'entré :
						</td>
						<td>
							<input name="Nom" type="text" class="TextMpd" placeholder="Nom"></input>
						</td>
					</tr>
					<tr>
						<td>
							Mode I/O :
						</td>
						<td>
							<select name="Mode" class="TextMpd">
								<option selected value="in"> IN </option>
								<option value="out"> OUT </option>
							</select>
						</td>
					</tr>
				</table>
				<table>
					<tr>
						<td>
							<button class="ChangerBtn" type="submit" value="Ajouter"><span>Confirmer</span></button>
						</td>
					</tr>
				</table>
			</form>
		</div>
		
	</div>
	</body >
</html>