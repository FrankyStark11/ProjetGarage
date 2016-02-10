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