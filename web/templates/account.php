<?php
	if (!valider("connecte","SESSION")) 
		{
			header("Location:../index.php?view=Accueil");
			die("");
		}
?>

<style>
	@media (min-width: 712px){#ensemble{margin:0 0 5% 10%;}}
</style>

<div id="ensemble">
	<!-------------------------Gestion Mon Compte--------------------------------><div style="padding:10px 0 10px 0;"></div><br></br>
	<fieldset> <legend><h1>Mon Compte:</h1></legend>
		
		
		<select id='Action' onchange="chargerMyUser()" style="/*width:60%;height:80px;*/">
			<option value="0">Changer de Pseudo</option>
			<option value="1">Changer de Mot de passe</option>
			<option value="2">Changer de Prenom</option>
			<option value="3">Changer de Nom</option>
			<option value="4">Changer de mail</option>
		</select>
		
		<input type='text' placeholder="Nouvelle Valeur" id='MyNewVal'> </input>
		
		<br></br>

		<input type='button' value='Valider' onclick='envoie1()' style="/*width:60%;height:80px;*/"></input>
	</fieldset>	
</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

<script>
	
$(document).ready(Init());	

function chargerMyUser(){
		$.ajax({
		        url : "get.php", // on donne l'URL du fichier de traitement
		        type : "GET", // la requête est de type POST
		        data : "action=GetUser",
		        success:function(oRep){
		        	console.log(oRep);
		        	//$("#MyNewVal").attr("placeholder",oRep.pseudo);
		        	if($('#Action').val()=='0')
		        		$("#MyNewVal").val(oRep[0].pseudo);
		        	if($('#Action').val()=='1')
		        		$("#MyNewVal").val("Votre Nouveau Mot de Passe");
		        	if($('#Action').val()=='2')
		        		$("#MyNewVal").val(oRep[0].prenom);
		        	if($('#Action').val()=='3')
		        		$("#MyNewVal").val(oRep[0].nom);
		        	if($('#Action').val()=='4')
		        		$("#MyNewVal").val(oRep[0].mail);
			},
			dataType: "json"
		    });
	}
	
	function envoie1(){
		$.ajax({
			url : "get.php", // on donne l'URL du fichier de traitement
		    type : "POST", // la requête est de type POST
		    data: {"action":"modifMyUser"
		    		,"NewValue":$('#MyNewVal').val()
		    		,"Change":$('#Action').val()},
		    success:function(){Init();},
		dataType: "json"
		});
	}	

	
	function Init(){chargerMyUser();}

</script>
