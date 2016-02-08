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

function AjouterDivInfoPorte(NoPin,Nom){


Main = document.getElementById("DivInfo");

var div_0 = document.createElement('div');
   div_0.align = "center";
   div_0.className = "InfoPorte";

   var input_0 = document.createElement('input');
      input_0.type = "hidden";
      input_0.value = Nom;
   div_0.appendChild( input_0 );


   var h1_0 = document.createElement('h1');
      h1_0.appendChild( document.createTextNode(Nom) );
   div_0.appendChild( h1_0 );


   var h2_0 = document.createElement('h2');
      h2_0.appendChild( document.createTextNode(" Etat : Fermer ") );
   div_0.appendChild( h2_0 );


   var button_0 = document.createElement('button');
      button_0.type = "button";
      button_0.className = "SauvegarderBtn";
      button_0.value = "Action";

      var span_0 = document.createElement('span');
         span_0.appendChild( document.createTextNode("Ouvrir") );
      button_0.appendChild( span_0 );

   div_0.appendChild( button_0 );

Main.appendChild( div_0 );

}