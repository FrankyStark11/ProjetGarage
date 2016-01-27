//permet d'initialiser les composantes
function initialiser(){
	document.getElementById("idpassword").style.display = "none";
	document.getElementById("idpassword").value = "";
}

//permet de remplir le champ password pour la soumission
function feedPassword(e){
	ob = document.getElementById("idpassword");
	ob.value += e.value;
}