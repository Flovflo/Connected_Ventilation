<?php

//C'est la propriété php_self qui nous l'indique : 
// Quand on vient de index : 
// [PHP_SELF] => /chatISIG/index.php 
// Quand on vient directement par le répertoire templates
// [PHP_SELF] => /chatISIG/templates/accueil.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
// Pas de soucis de bufferisation, puisque c'est dans le cas où on appelle directement la page sans son contexte
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}

?>


<div id="corps">

<h1>Accueil</h1>

<h3>
Bienvenue sur votre Espace personnel, vous pouvez ici programmer votre VMC et analyser la qualité de votre air intérieur à distance.
</h3>
<br></br>
<h4>
	
</h4>
</div>
