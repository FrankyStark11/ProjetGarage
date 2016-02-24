//permet d'initialiser les composantes
function initialiser(){
	document.getElementById("idpassword").value = "";
}

//permet de remplir le champ password pour la soumission
function feedPassword(e){
	ob = document.getElementById("idpassword");
	ob.value += e.value;
}

//efface un caractere dans le champs de mot de passe
function EffacePassword(){
   ob = document.getElementById("idpassword");
   str = ob.value;
   str = str.substring(0, str.length - 1);
   ob.value = str;
}

//ajoute une porte dans la page de controle selon 3 param
//Nom : nom que porte la porte
//etat : savoir si la porte est ouverte = 0 ou fermé = 1
//NoPin : numero de la pin pour y associer le controle de fermeture/ouverture
function AjouterDivInfoPorte(Nom,etat,NoPin){
	
Main = document.getElementById("DivInfo");
if(etat == '0'){
var div_0 = document.createElement('div');
   div_0.align = "center";
   div_0.className = "InfoPorteOuverte";
   div_0.name = "porte";
}
else{
  var div_0 = document.createElement('div');
  div_0.align = "center";
  div_0.className = "InfoPorteFermer";
  div_0.id = "porte";
}

   var input_0 = document.createElement('input');
      input_0.type = "hidden";
      input_0.value = NoPin;
   div_0.appendChild( input_0 );


   var h1_0 = document.createElement('h1');
      h1_0.appendChild( document.createTextNode(Nom) );
   div_0.appendChild( h1_0 );

div_0.onclick = function() { AppelControlePin(NoPin,Nom) };

Main.appendChild( div_0 );

}

//sur le chargement de la page de controle, demare les initialisation necesaire
function InitialiserPageControle(){
   InitialiserPIN();
}

//sur appel, envoie le numero de pin appeler au controle par ajax
function AppelControlePin(NoPin,Nom){

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {  
      InscrireAction("Action sur porte " + Nom);           
    }
  };
  xmlhttp.open("POST", "/index.php/Users/AccesPorte", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("PIN=" + NoPin);

      
}

function InscrireAction(ActionP){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("POST", "/index.php/Users/AjouterEntreeLog", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("Action=" + ActionP);

  $("#DivMessage").fadeIn();
  $("#DivMessage").fadeOut(3000);


}

//initialise les pin, vide la page de controle et appel la fonction qui remplie la page
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

//remplir la page de controle avec les portes 
function AfficherEtatPorte(){
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

               var myNode = document.getElementById("DivInfo");
            while (myNode.firstChild) {
            myNode.removeChild(myNode.firstChild);

            var data = JSON.parse(xmlhttp.responseText);
         }     
            //pour toutes les portes detectÃ© afficher les info et le controle
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

//augmente le delais de 10 secondes
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

//reduit le delais de 10 secondes
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
	Permet de créer les inputs pour les distributeurs
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
	Génère une string aléatoire
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