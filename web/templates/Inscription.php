<?php

	include_once("libs/modele.php"); // listes
include_once("libs/maLibUtils.php");// tprint
include_once("libs/maLibForms.php");// mkTable, mkLiens, mkSelect ...

//bibliothèque capcha
include_once("libs/Capcha/FonctionCaptcha.php");
	
	
	if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=Inscription");
	die("");
}





		if(isset($_POST["envoiinscription"]))
		{
			if(Captcha_Verif())//On vérifie si le capcha est bien validé par l'utilisateur
			{
					if(!empty($_POST["pseudo"]) AND !empty($_POST["mdp"]) AND !empty($_POST["mdp2"]) AND !empty($_POST["nom"]) AND !empty($_POST["prenom"]))  //si les champs ne sont pas vides
				{
					empty($erreur);
					$pseudo= htmlspecialchars($_POST['pseudo']);
					$mdp= /*sha1*/($_POST['mdp']);
					$mdp= /*sha1*/($_POST['mdp2']);
					
					$reqpseudo = $bdd->prepare("SELECT * FROM 'users' WHERE pseudo = ?");
					$reqpseudo->execute(array($pseudo));
					$pseudoExist = $reqpseudo->rowCount();
					
					if(($_POST["mdp"])!=($_POST["mdp2"]))  //possible : $mdp != $mdp2 (plus sur avec $mdp) //si les mdp sont les mêmes
					{		
						$erreur="attention : les mots de passes doivent être identique !";
					}
					elseif($pseudoExist != 0) 
					{
						$erreur="attention : votre pseudo est déjà utilisé !";
						
						
					}
					else		//toutes les conditions sont validés
					{
						empty($erreur);
						//$insertMembre = $bdd->prepare("INSERT INTO users(pseudo,mot_de_passe) VALUE (?,?) ");
						//$insertMembre->execute(array($pseudo,$mdp));
			//$SQL="INSERT INTO \"users\" (\"id\",\"pseudo\", \"passe\", \"blacklist\", \"admin\", \"connecte\", \"couleur\") VALUES (NULL,\"$_POST[\"pseudo\"]\",\"$_POST[\"mdp\"]\",0,0,0,\"black\")";
						$SQL="INSERT INTO `User` (`IdUser`, `Pseudo`, `Passe`, `Admin`,`Blacklist`,`Sudo`,`Nom`,`Prenom`) VALUES (NULL,'".$_POST["pseudo"]."','".$_POST["mdp"]."','0','1','0','".$_POST["nom"]."','".$_POST["prenom"]."')";
						SQLUpdate($SQL);
						$erreur="votre demande à bien été prise en compte";
					}
				}
					else
					{
						$erreur="attention : tous les champs doivent être validé !";
					}
			}else{$erreur="attention : NON capcha valide !";}	
		}

?>







<html>


	<head>
	
		<title>INSCRIPTION</title>
		<meta charset="utf-8">
		
			<style>	
				#inscription{border-width:1px;/*border-style:dashed;*/}
			</style>
	
	</head>







	<body>

		<div id="corps">
		
					<?php
						if(isset($erreur))
						{
							echo '<font color="red" size="5%" style="background-color:white; padding:1%;">'.$erreur.'</font>';
						}
					?>
		
			<h1>Inscription</h1>
		<div id="inscription">
			<br />
			
			<form method="POST" action="">
			
				<tr>
			
				<td>
					<label for="pseudo">pseudo :</label>
				</td>
				<td>
					<input type="text" placeholder="pseudo" id="pseudo" name="pseudo" />
				</td>
				
				</tr>
				<tr>
				
				<td>
					<label for="mdp">mot de passe :</label>
				</td>
				<td>	
					<input type="password" placeholder="mot de passe" id="mdp" name="mdp" />
				</td>
				
				</tr>
				<tr>
	
				<td>
					<label for="mdp2">confirmer mot de passe :</label>
				</td>
				<td>	
					<input type="password" placeholder="confirmer mot de passe" id="mdp2" name="mdp2" />
				</td>
				
				<td>
					<label for="nom">votre nom :</label>
				</td>
				<td>	
					<input type="text" placeholder="Votre nom" id="nom" name="nom" />
				</td>
				
				</tr>	<!-- -------------------- -->
				<tr>
				
				<td>
					<label for="prenom">votre prénom :</label>
				</td>
				<td>	
					<input type="text" placeholder="Votre prenom" id="prenom" name="prenom" />
				</td>
				
				</tr>
				<tr><td align="center"><input type="button" name="envoiinscription" value="je m'inscris" Onclick="Active_captcha(1)"/></td></tr>	
				
			<?php Captcha_Affiche("Id_captcha", "Active_captcha", "libs/Capcha", "envoiinscription"); //Captcha_Affiche(Id du capcha, nom de la fonction JS qui active le capcha (1) ou le désactive 0, chemin de la bibliotheque du captcha , nom du $_POST[] de la réponse au capcha, par defaut : CAPTCHA_ENVOI") ?>
			</form>
			
			
		</div>
	
	</div>
	
	
	
	</body>





</html>

