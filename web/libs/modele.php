<?php

/*
Dans ce fichier, on définit diverses fonctions permettant de récupérer des données utiles pour notre TP d'identification. Deux parties sont à compléter, en suivant les indications données dans le support de TP
*/


/********* PARTIE 1 : prise en main de la base de données *********/


// inclure ici la librairie faciliant les requêtes SQL
include_once("maLibSQL.pdo.php");

function verifUserBdd($login,$passe)
{
	// Vérifie l'identité d'un utilisateur 
	// dont les identifiants sont passes en paramètre
	// renvoie faux si user inconnu
	// renvoie l'id de l'utilisateur si succès

	$SQL="SELECT id FROM utilisateur WHERE pseudo='$login' AND passe='$passe'";

	return SQLGetChamp($SQL);
	// si on avait besoin de plus d'un champ
	// on aurait du utiliser SQLSelect
}

//=======================================================================Gestion Utilisateur=======================================================================

function GetUser($Id)
{
	$SQL = "SELECT * FROM utilisateur WHERE id='$Id'"; 
	return parcoursRs(SQLSelect($SQL)); 
}

function ChangePassById($idUser,$passe)
{
	$SQL ="UPDATE `utilisateur` SET `passe` = '$passe' WHERE `id` = '$idUser';";
	return SQLUpdate($SQL); 
}

function ChangePseudoById($idUser,$NewPseudo)
{
	// cette fonction modifie le pseudo d'un utilisateur
	$SQL ="UPDATE `utilisateur` SET `pseudo` = '$NewPseudo' WHERE `id` = '$idUser';";
	return SQLUpdate($SQL); 
}

function ChangePrenomById($idUser,$NewPseudo)
{
	// cette fonction modifie le prenom d'un utilisateur
	$SQL ="UPDATE `utilisateur` SET `prenom` = '$NewPseudo' WHERE `id` = '$idUser';";
	return SQLUpdate($SQL); 
}

function ChangeNomById($idUser,$NewPseudo)
{
	// cette fonction modifie le prenom d'un utilisateur
	$SQL ="UPDATE `utilisateur` SET `nom` = '$NewPseudo' WHERE `id` = '$idUser';";
	return SQLUpdate($SQL); 
}

function ChangeMailById($idUser,$NewMail)
{
	// cette fonction modifie le prenom d'un utilisateur
	$SQL ="UPDATE `utilisateur` SET `mail` = '$NewMail' WHERE `id` = '$idUser';";
	return SQLUpdate($SQL); 
}

function ChangeFieldById($idUser,$NewValue, $Field)
{
	// cette fonction modifie le prenom d'un utilisateur
	$SQL ="UPDATE `utilisateur` SET `$Field` = '$NewValue' WHERE `id` = '$idUser';";
	return SQLUpdate($SQL); 
}

//=======================================================================Gestion Parametres VMC=======================================================================
function GetParam()
{
	$SQL = "SELECT * FROM parametres"; 
	return parcoursRs(SQLSelect($SQL)); 
}

function SetParam($Tmax, $Tmin, $Hmax, $Hmin, $eCO2min, $eCO2max, $Tvocmax, $Tvocmin, $dVentileMax, $dVentileMin, $etatVMC)
{
	$SQL = "DELETE FROM `parametres` WHERE 1=1";
	SQLUpdate($SQL); 
	
	$SQL = "INSERT INTO `parametres`( `Tmax`, `Tmin`, `Hmax`, `Hmin`, `eCO2min`, `eCO2max`, `Tvocmax`, `Tvocmin`, `dVentileMax`, `dVentileMin`, `etatVMC`) VALUES ('$Tmax','$Tmin','$Hmax', '$Hmin', '$eCO2min', '$eCO2max', '$Tvocmax', '$Tvocmin', '$dVentileMax', '$dVentileMin', '$etatVMC')";
	return SQLInsert($SQL); 
}
?>
