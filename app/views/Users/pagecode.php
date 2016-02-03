<html>
	<head>
		<title>Garage</title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<script src="/js/javascript.js"></script>

		<link rel="stylesheet" type="text/css" href="/css/style2.css" />

	</head>
	<body onload="initialiser()">
	<div class="NavBar">
		<ul>
		  <li><a href="/index.php/Users/ControleSysteme"> page de controle </a></li>
		  <li><a href="/index.php/Admin/GestionCodes"> page de gestion codes</a></li>
		  <li><a href="/index.php/Admin/Accueil"> page de Login</a></li>
		</ul>
	</div>
		<div class="CenterCode">
			<form method="post" action="/index.php/Users/Password">
				<table>
					<tr>
						<td><input class="digit" type="button" name="1" value="1" onclick="feedPassword(this)"></td>
						<td><input class="digit" type="button" name="2" value="2" onclick="feedPassword(this)"></td>
						<td><input class="digit" type="button" name="3" value="3" onclick="feedPassword(this)"></td>
					</tr>
					<tr>
						<td><input class="digit" type="button" name="4" value="4" onclick="feedPassword(this)"></td>
						<td><input class="digit" type="button" name="5" value="5" onclick="feedPassword(this)"></td>
						<td><input class="digit" type="button" name="6" value="6" onclick="feedPassword(this)"></td>
					</tr>
					<tr>
						<td><input class="digit" type="button" name="7" value="7" onclick="feedPassword(this)"></td>
						<td><input class="digit" type="button" name="8" value="8" onclick="feedPassword(this)"></td>
						<td><input class="digit" type="button" name="9" value="9" onclick="feedPassword(this)"></td>
					</tr>
					<tr>
						<td><input class="digit" type="button" name="#" value="#" onclick="feedPassword(this)"></td>
						<td><input class="digit" type="button" name="0" value="0" onclick="feedPassword(this)"></td>
						<td><input class="digit" type="button" name="*" value="*" onclick="feedPassword(this)"></td>
					</tr>
				</table>
				<table>
					<tr>
						<td><input type="text" name="password" id="idpassword" readonly></td>
					</tr>
					<tr>
						<td><button type="submit" class="confirmer" style="vertical-align:middle"><span>Confimer </span></button></td>
					</tr>
				</table>
			</form>
		</div>	
	</body >
</html>