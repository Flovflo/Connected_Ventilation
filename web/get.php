<?php
header('Content-type: application/json');
session_start();

	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/modele.php"; 
	
	
	
	$qs = "";

	if ($action = valider("action"))
	{
		ob_start ();
		//echo "Action = '$action' <br />";

		// Un paramètre action a été soumis, on fait le boulot...
		switch($action)
		{
//=======================================================================Gestion Utilisateur=======================================================================

			case 'GetUser':
				echo json_encode(GetUser($_SESSION["idUser"]));
			break;
			
			case 'modifMyUser':
				if($_POST["Change"]==0)
				ChangePseudoById($_SESSION["idUser"],$_POST["NewValue"]);
				elseif($_POST["Change"]==1)
				ChangePassById($_SESSION["idUser"],$_POST["NewValue"]);
				elseif($_POST["Change"]==2)
				ChangePrenomById($_SESSION["idUser"],$_POST["NewValue"]);
				elseif($_POST["Change"]==3)
				ChangeNomById($_SESSION["idUser"],$_POST["NewValue"]);
				elseif($_POST["Change"]==4)
				ChangeMailById($_SESSION["idUser"],$_POST["NewValue"]);
			break;
//=======================================================================Gestion Parametres VMC=======================================================================
			
			case 'SetParam':
			
				SetParam(
						$_POST["Tmax"],$_POST["Tmin"],
						$_POST["Hmax"],$_POST["Hmin"],
						$_POST["eCO2min"],$_POST["eCO2max"],
						$_POST["Tvocmax"],$_POST["Tvocmin"],
						$_POST["dVentileMax"],$_POST["dVentileMin"],
						$_POST["etatVMC"]
					);
			break;	
			
			case 'GetParam':
				echo json_encode(GetParam());
			break;	
			
		}

	}

	// On redirige toujours vers la page index, mais on ne connait pas le répertoire de base
	// On l'extrait donc du chemin du script courant : $_SERVER["PHP_SELF"]
	// Par exemple, si $_SERVER["PHP_SELF"] vaut /chat/data.php, dirname($_SERVER["PHP_SELF"]) contient /chat

	$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";
	// On redirige vers la page index avec les bons arguments

	//header("Location:" . $urlBase . $qs);

	// On écrit seulement après cette entête
	ob_end_flush();
	
?>
