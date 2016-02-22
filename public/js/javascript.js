//permet d'initialiser les composantes
function initialiser(){
	document.getElementById("idpassword").value = "";
}

//permet de remplir le champ password pour la soumission
function feedPassword(e){
	ob = document.getElementById("idpassword");
	ob.value += e.value;
}

function EffacePassword(){
   ob = document.getElementById("idpassword");
   str = ob.value;
   str = str.substring(0, str.length - 1);
   ob.value = str;
}

function AjouterDivInfoPorte(Nom,etat,NoPin){
	
Main = document.getElementById("DivInfo");
if(etat == '0'){
var div_0 = document.createElement('div');
   div_0.align = "center";
   div_0.className = "InfoPorteOuverte";
}
else{
  var div_0 = document.createElement('div');
  div_0.align = "center";
  div_0.className = "InfoPorteFermer";
}

   var input_0 = document.createElement('input');
      input_0.type = "hidden";
      input_0.value = NoPin;
   div_0.appendChild( input_0 );


   var h1_0 = document.createElement('h1');
      h1_0.appendChild( document.createTextNode(Nom) );
   div_0.appendChild( h1_0 );

if(etat == '1'){
   var h2_0 = document.createElement('h2');
      h2_0.appendChild( document.createTextNode(" Etat : Ferm√©e ") );
   div_0.appendChild( h2_0 );
}
else{
	var h2_0 = document.createElement('h2');
	h2_0.appendChild( document.createTextNode(" Etat : Ouvert ") );
	div_0.appendChild( h2_0 );
}

  var button_0 = document.createElement('button');
      button_0.type = "button";
      button_0.id = "Btn"+NoPin;
      button_0.className = "ChangerBtn";
      button_0.value = "Action";
      button_0.onclick = function() { AppelControlePin(NoPin) };

if(etat == '1'){
  var span_0 = document.createElement('span');
      span_0.appendChild( document.createTextNode("Ouvrir") );
    button_0.appendChild( span_0 );
}
else{
	var span_0 = document.createElement('span');
	    span_0.appendChild( document.createTextNode("Fermer") );
	  button_0.appendChild( span_0 );
}
   div_0.appendChild( button_0 );

Main.appendChild( div_0 );

//var btn = document.getElementById("Btn"+NoPin);
//btn.addEventListener("click",function() { AppelControlePin(NoPin)} );

}

function InitialiserPageControle(){
  // AfficherEtatPorte();
   InitialiserPIN();
}

function AppelControlePin(NoPin){

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("POST", "/index.php/Users/AccesPorte", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("PIN=" + NoPin);  
}

function InitialiserPIN(){
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

               var myNode = document.getElementById("DivInfo");
            while (myNode.firstChild) {
            myNode.removeChild(myNode.firstChild);

		    var data = JSON.parse(xmlhttp.responseText);
		}     
	}
        };
        xmlhttp.open("get", "/index.php/Admin/GetAllModePin", true);
        xmlhttp.send();
}

function AfficherEtatPorte(){
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

               var myNode = document.getElementById("DivInfo");
            while (myNode.firstChild) {
            myNode.removeChild(myNode.firstChild);

            var data = JSON.parse(xmlhttp.responseText);
         }     
            //pour toutes les portes detect√© afficher les info et le controle
            for (i = 0; i < data.length; i++) {
               var Nom = data[i]['Nom'] ;
                  var Pin = data[i]['No_pin'] ;

                  AjouterDivInfoPorte(Pin,Nom,'0');
            }
            }
        };
        xmlhttp.open("get", "/index.php/Admin/GetAllPin", true);
        xmlhttp.send();
      }

function AjouterTempsZoneDelais(){

   var ZoneDelais = document.getElementById("DelaisText");
   var tempsAcc = ZoneDelais.value;
   var time = tempsAcc.split(":");

   var MinAcc = parseInt(time[0]);
   var SecAcc = parseInt(time[1]);

   SecAcc = SecAcc + 10 ;

   if(SecAcc == 60){
      MinAcc++;
      SecAcc = "00";
   }

   ZoneDelais.value = MinAcc + ":" + SecAcc;

}

function RetirerTempsZoneDelais(){

   var ZoneDelais = document.getElementById("DelaisText");
   var tempsAcc = ZoneDelais.value;
   var time = tempsAcc.split(":");

   var MinAcc = parseInt(time[0]);
   var SecAcc = parseInt(time[1]);


   SecAcc = SecAcc - 10 ;
      //retire un minute
      if(SecAcc < 0){
         if(MinAcc != 0){
            MinAcc--;
            SecAcc = "50";
         }
         else
         {
            SecAcc = SecAcc+10;
         }
      }

      if(SecAcc == 0)
      {
         //ajuste le visuel du temps
         SecAcc="00";
      }

      ZoneDelais.value = MinAcc + ":" + SecAcc;
}

/*
	Permet de crÈer les inputs pour les distributeurs
*/
function CreerNouvDist(nombre){
	table = document.getElementById("tblDistributeurs");
	
	
	for(i = 0; i < nombre; i++){
		code = makeid();
		
		var tr_0 = document.createElement('tr');
		tr_0.id = "tr" + code;

		var td_0 = document.createElement('td');

		var input_0 = document.createElement('input');
		input_0.type = "textNom";
		input_0.className = "TextMpd";
		input_0.name = "nom" + "-" +code;
		input_0.placeholder = "Distributeur";
		td_0.appendChild( input_0 );

		tr_0.appendChild( td_0 );


		var td_1 = document.createElement('td');

		var input_1 = document.createElement('input');
		input_1.name = "ext" + "-" + code;
		input_1.className = "TextMpd";
		input_1.type = "textExt";
		input_1.placeholder = "@msg.distributeur.com";
		td_1.appendChild( input_1 );

		tr_0.appendChild( td_1 );


		var td_2 = document.createElement('td');

		var input_2 = document.createElement('input');
		input_2.type = "button";
		input_2.className = "ChangerBtn";
		input_2.value = "supp";
		input_2.name = code;
		input_2.onclick=function(){DeleteDistributeur(this.name)}
		
		td_2.appendChild( input_2 );

		tr_0.appendChild( td_2 );

		document.body.appendChild( tr_0 );

		table.appendChild( tr_0 );
		
	}
}

/*
	Supprime un distributeur
*/
function DeleteDistributeur(string){
	tr = document.getElementById("tr" + string);
	table = document.getElementById("tblDistributeurs");
	
	table.removeChild(tr);
}

/*
	GÈnËre une string alÈatoire
*/
function makeid()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 50; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}

/*
	Permet de garnir la liste de distributeurs dans la page des modifications des distributeurs
*/
function GarnirInputDistributeurs(distributeurs){
	table = document.getElementById("tblDistributeurs");
	
	nom = document.querySelectorAll("input[type=textNom]");
	extention = document.querySelectorAll("input[type=textExt]");
	
	for(i = 0; i < distributeurs.length; i++){
		nom[i].value = distributeurs[i]["Nom"];
		extention[i].value = distributeurs[i]["Extention"];
	}
}

/*
	Permet d'initialiser la page des distributeurs
*/
function InitialiserEditDistributeur(nombre, distributeurs){
	CreerNouvDist(nombre);
	GarnirInputDistributeurs(distributeurs);
}