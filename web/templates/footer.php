<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}

?>

<div id="footer">

<?php
// TODO:  Si l'utilisateur est connecte, on affiche un lien de deconnexion 
// tprint($_SESSION);
/*
Array
(
    [pseudo] => Tom
    [idUser] => 3
    [connecte] => 1
    [heureConnexion] => 16:20:09
    [isAdmin] => 1
    [blacklist] => 0
)
*/
if (valider("connecte","SESSION")) {
	echo "Utilisateur $_SESSION[pseudo]"; 
	echo " connecte depuis $_SESSION[heureConnexion]"; 
	echo ' <a href="controleur.php?action=logout" >Se déconnecter</a>';
}
?>
</div>

</body>
</html>










