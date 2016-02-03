<html>

<head>
	<title>Garage à Denis</title>
	<link rel="stylesheet" type="text/css" href="/css/style2.css" />
</head>

<body>
	<div class="NavBar">
		<ul>
		  <li><a href="/index.php/Users/ControleSysteme"> page de controle </a></li>
		  <li><a href="/index.php/Admin/GestionCodes"> page de gestion codes</a></li>
		  <li><a href="/index.php/Admin/Accueil"> page de Login</a></li>
		</ul>
	</div>
	<div class="CtnPorte">
			<div class="InfoPorte" align="center">
				<table>
					<tr>
						<td>
							Etat de la porte 1 : 
						</td>
						<td>
						<?php
								$porte = system ( "gpio read 25");
								if ($porte == "0") {
									?> 

									<div class="slideThree">	
										<input checked type="checkbox" value="None" id="slideThree" name="check" checked />
										<label for="slideThree"></label>
									</div>

									<?php  } else {
									?>  

									<div class="slideThree">	
										<input type="checkbox" value="None" id="slideThree" name="check" checked />
										<label for="slideThree"></label>
									</div>

									<?php
								}
								?>
						</td>
					</tr>
				</table>
			</div>
			<div class="InfoPorte" align="center">
				<table>
					<tr>
						<td>
							Etat de la porte 2 : 
						</td>
						<td>
						<?php
								$porte = system ( "gpio read 26");
								if ($porte == "0") {
									?> 

									<div class="slideThree">	
										<input checked type="checkbox" value="None" id="slideThree" name="check" checked />
										<label for="slideThree"></label>
									</div>

									<?php  } else {
									?>  

									<div class="slideThree">	
										<input type="checkbox" value="None" id="slideThree" name="check" checked />
										<label for="slideThree"></label>
									</div>

									<?php
								}
								?>
						</td>
					</tr>
				</table>
			</div>
			<div class="InfoPorte" align="center">
				<table>
					<tr>
						<td>
							Etat de la porte 3 : 
						</td>
						<td>
						<?php
								$porte = system ( "gpio read 27");
								if ($porte == "0") {
									?> 

									<div class="slideThree">	
										<input checked type="checkbox" value="None" id="slideThree" name="check" checked />
										<label for="slideThree"></label>
									</div>

									<?php  } else {
									?>  

									<div class="slideThree">	
										<input type="checkbox" value="None" id="slideThree" name="check" checked />
										<label for="slideThree"></label>
									</div>

									<?php
								}
								?>
						</td>
					</tr>
				</table>
			</div>
			<div class="InfoPorte" align="center">
				<table>
					<tr>
						<td>
							Etat de la porte 4 : 
						</td>
						<td>
						<?php
								$porte = system ( "gpio read 28");
								if ($porte == "0") {
									?> 

									<div class="slideThree">	
										<input checked type="checkbox" value="None" id="slideThree" name="check" checked />
										<label for="slideThree"></label>
									</div>

									<?php  } else {
									?>  

									<div class="slideThree">	
										<input type="checkbox" value="None" id="slideThree" name="check" checked />
										<label for="slideThree"></label>
									</div>

									<?php
								}
								?>
						</td>
					</tr>
				</table>
			</div>
			<div class="InfoPorte" align="center">
				<table>
					<tr>
						<td>
							Etat de la porte 5 : 
						</td>
						<td>
						<?php
								$porte = system ( "gpio read 0");
								if ($porte == "0") {
									?> 

									<div class="slideThree">	
										<input checked type="checkbox" value="None" id="slideThree" name="check" checked />
										<label for="slideThree"></label>
									</div>

									<?php  } else {
									?>  

									<div class="slideThree">	
										<input type="checkbox" value="None" id="slideThree" name="check" checked />
										<label for="slideThree"></label>
									</div>

									<?php
								}
								?>
						</td>
					</tr>
				</table>
			</div>
	</div>	

</body>

</html>