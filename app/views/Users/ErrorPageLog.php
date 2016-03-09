<?php 

?>
<html>
	<head>
		<title>Garage</title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta http-equiv="refresh" content="5;url=/index.php/Users/Index" />


		<script src="/js/javascript.js"></script>

		<link rel="stylesheet" type="text/css" href="/css/style2.css" />
		
	</head>
	<body onload="initialiser()">
		<div class="CenterCode">
			<form method="post" action="/index.php/Users/Password">
				<table>
					<tr>
						<td><input type="password" class="MDP" name="password" id="idpassword" readonly></td>
					</tr>
				</table>
				<table>
					<tr>
						<td><button class="digit" type="button" name="1" value="1"><span>1</span></button></td>
						<td><button class="digit" type="button" name="2" value="2"><span>2</span></button></td>
						<td><button class="digit" type="button" name="3" value="3"><span>3</span></button></td>
					</tr>
					<tr>
						<td><button class="digit" type="button" name="4" value="4"><span>4</span></button></td>
						<td><button class="digit" type="button" name="5" value="5"><span>5</span></button></td>
						<td><button class="digit" type="button" name="6" value="6"><span>6</span></button></td>
					</tr>
					<tr>
						<td><button class="digit" type="button" name="7" value="7"><span>7</span></button></td>
						<td><button class="digit" type="button" name="8" value="8"><span>8</span></button></td>
						<td><button class="digit" type="button" name="9" value="9"><span>9</span></button></td>
					</tr>
					<tr align="center">
						<td><button class="digit" type="button" name="0" value="" ></td>
						<td><button class="digit" type="button" name="0" value="0"><span>0</span></button></td>
						<td><button class="digit" type="button" name="9" value="<="><span>Back</span></button></td>
					</tr>
				</table>
				<table>
					<tr>
						<td><button type="button" class="ErreurBtn" style="vertical-align:middle"><span>Erreur </span></button></td>
					</tr>
				</table>
			</form>
		</div>	
	</body >
</html>