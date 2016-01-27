<html>
	<head>
		<title>Garage</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/javascript.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
	</head>
	<body onload="initialiser()">
		
		<form method="post" action="/index.php/Users/Password">
			<table>
				<tr>
					<td><input type="button" name="1" value="1" onclick="feedPassword(this)"></td>
					<td><input type="button" name="2" value="2" onclick="feedPassword(this)"></td>
					<td><input type="button" name="3" value="3" onclick="feedPassword(this)"></td>
				</tr>
				<tr>
					<td><input type="button" name="4" value="4" onclick="feedPassword(this)"></td>
					<td><input type="button" name="5" value="5" onclick="feedPassword(this)"></td>
					<td><input type="button" name="6" value="6" onclick="feedPassword(this)"></td>
				</tr>
				<tr>
					<td><input type="button" name="7" value="7" onclick="feedPassword(this)"></td>
					<td><input type="button" name="8" value="8" onclick="feedPassword(this)"></td>
					<td><input type="button" name="9" value="9" onclick="feedPassword(this)"></td>
				</tr>
				<tr>
					<td><input type="button" name="#" value="#" onclick="feedPassword(this)"></td>
					<td><input type="button" name="0" value="0" onclick="feedPassword(this)"></td>
					<td><input type="button" name="*" value="*" onclick="feedPassword(this)"></td>
				</tr>
			</table>
			<table>
				<tr>
					<td><input type="text" name="password" id="idpassword" readonly></td>
				</tr>
				<tr>
					<td><input type="submit" value="Confirmer"></td>
				</tr>
			</table>
		</form>
	</body >
</html>