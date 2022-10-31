<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}

// Pose qq soucis avec certains serveurs...
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- **** H E A D **** -->
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="icon" type="image/png" href="images/favicon/Favicon.png" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/Inputs.css" />
	<meta name="viewport" content="width=device-width"/>
</head>
<!-- **** F I N **** H E A D **** -->

<body style="background-color:#132b42;">
<!-- **** B O D Y **** -->

<!--<h1 id="chatisig"> BIENVENUE </h1> <!--TODO:  Changer le titre -->


<!--div class="espace">
</div-->

	<header id="header" >
				<a href="index.php?view=accueil" class="title">VMC Connecté</a>
				<nav>
					<ul>
						<?php
							if (!valider("connecte","SESSION")) {
								echo '<li><a href="index.php?view=login" >Connexion</a></li>'; 
								
							}
							if (valider("connecte","SESSION")) 
							{
								echo '<li> <a href="index.php?view=account">Mon compte</a> </li>';
								echo '<li> <a href="index.php?view=param">Ma VMC</a> </li>';
								echo '<li> <a href="index.php?view=data">Mes données</a> </li>';
								
							}
							echo '</div> </ul>';
						?>
					</ul>
				</nav>
	</header>
	
	



