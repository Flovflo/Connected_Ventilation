//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//																MINUS																							//
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function Onglet(onglet)
{
	var div=document.getElementById(onglet);
	
	var temp=div.parentNode;
	var plus=temp.getElementsByClassName("plus")[0];
	var moins=temp.getElementsByClassName("moins")[0];

	if(div.style.display=="none")
	{
		div.style.display="inline";
		
		plus.style.display="none";
		moins.style.display="block";
		
	}
	else
	{
		div.style.display="none";
		
		plus.style.display="block";
		moins.style.display="none";
		
	}	
	//<div class="MINUS"> titre <div id="onglet">    code    </div> <img class="moins" src="ressources/favicon/minus.png" onclick="Onglet(onglet);"></img> <img class="plus" style="display:none;" src="ressources/favicon/plus.png" onclick="Onglet(onglet);"></img> </div>
}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//																ALERT																							//
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

function my_alert(On)
{
	var div=document.getElementById("ALERT");
	if(On==1)
	{
		div.style.display="block";
		
	}
	else
	{
		div.style.display="none";
	}
}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//														INFO-BULLE																								//
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

var oInfobulle = {
  'boutonMaj': 'Cliquez pour mettre à jour',
  'chkAuto': 'Permet de mettre à jour le rendu automatiquement',
  'labelChkAuto': 'Permet de mettre à jour le rendu automatiquement',
  'rendu': 'Le rendu de votre code',
  'code': 'Tapez votre code HTML ici',
  'themecolor':'n\'abimez pas vos yeux'
};

// Afficher l'info-bulle pour un élément
// e : gestionnaire d'événement (objet event)
// oDOM : objet déclenchant l'événement (objet this)
function afficher_infobulle(e) {
  //console.log('fonction
  var sourisX, sourisY;
  var idDOM = e.target.id;
  refInfobulle = document.getElementById('infobulle');
  // Si l'identifiant de l'objet cible de l'événement est
  //   connus dans l'objet JSON oInfobulle...
  if (oInfobulle[idDOM] !== undefined) {
    // Afficher l'info-bulle grâce à l'attribut CSS display
    refInfobulle.style.display = 'block';
    // Changer le texte de l'info-bulle
    refInfobulle.innerHTML = oInfobulle[idDOM];
    // Stopper la propagation de l'événement aux élément parents
    e.stopPropagation();
  }
  // Récupérer les coordonnées de la souris
  sourisX = (e.clientX + 10) + 'px';
  sourisY = (e.clientY + 10) + 'px';
  // Positionner l'info-bulle aux coordonnées de la souris
  refInfobulle.style.left = sourisX;
  refInfobulle.style.top = sourisY;
}

// Cacher l'info-bulle du bouton
function cacher_infobulle(e) {
	refInfobulle = document.getElementById('infobulle');
  //console.log('fonction : cacher_infobulle');
  // Dans le cas de l'événement onmouseout :
  //   e.target = élément quitté par la souris
  //     (par exemple, le div rendu)
  //   e.relatedTarget = élément ayant maintenant la souris
  //     (par exemple, un p dans le rendu)
  // Si la souris n'a pas été déplacée sur un élément fils...
  if (!e.target.contains(e.relatedTarget)) {
    // Cacher l'info-bulle grâce à l'attribut CSS display
    refInfobulle.style.display = 'none';
  }
}

/* faire <body onload="init();" onmousemove="afficher_infobulle(event);" onmouseout="cacher_infobulle(event);">
<div id="infobulle" class="infobulle">(info-bulle)</div>*/





//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//																																								//
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//function init() {var refInfobulle=null;}
