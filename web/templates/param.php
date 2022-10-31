<?php
	if (!valider("connecte","SESSION")) 
		{
			header("Location:../index.php?view=Accueil");
			die("");
		}
?>

<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<style>
	@media (min-width: 712px){#ensemble{margin:0 0 5% 10%;}}
</style>


<p style="font-weight: bold;">Vos Campagnes :</p>
<div id="catalogue">
		
	<div>
			TEMPERATURE (°C)
			<input type='number' placeholder="Seuil Minimum" id='Tmin'> </input>
			<input type='number' placeholder="Seuil Maximum" id='Tmax'> </input>
	</div>
	
	<div>
			HUMIDITE (%)
			<input type='number' placeholder="Seuil Minimum" id='Hmin'> </input>
			<input type='number' placeholder="Seuil Maximum" id='Hmax'> </input>
	</div>
	
	<div>
			Equivalent CO2 
			<input type='number' placeholder="Seuil Minimum" id='eCO2min'> </input>
			<input type='number' placeholder="Seuil Maximum" id='eCO2max'> </input>
	</div>
	
	<div>
			TVOC
			<input type='number' placeholder="Seuil Minimum" id='Tvocmin'> </input>
			<input type='number' placeholder="Seuil Maximum" id='Tvocmax'> </input>
	</div>
	
	<div>
			Temps de ventilation (min)
			<input type='number' placeholder="Seuil Minimum" id='dVentileMin'> </input>
			<input type='number' placeholder="Seuil Maximum" id='dVentileMax'> </input>
	</div>
	
	<div>
			Etat de la vmc
			<br></br>
			<label class="switch">
  			<input type="checkbox" id="etatVMC">
  			<span class="slider round"></span>
			</label>
	</div>
	
	<br></br>
	<input type='button' style="margin-top:50px" value='Valider' onclick='envoie1()' style="/*width:60%;height:80px;*/"></input>
</div>	

<script>
	
$(document).ready(Init());	

function chargerMyparam(){
		$.ajax({
		        url : "get.php", // on donne l'URL du fichier de traitement
		        type : "GET", // la requête est de type POST
		        data : "action=GetParam",
		        success:function(oRep){
		        	console.log(oRep);
		        	
		        	$("#Tmax").val(oRep[0].Tmax);
		        	$("#Tmin").val(oRep[0].Tmin);
		        	
		        	$("#Hmax").val(oRep[0].Hmax);
		        	$("#Hmin").val(oRep[0].Hmin);
		        	
		        	$("#eCO2max").val(oRep[0].eCO2max);
		        	$("#eCO2min").val(oRep[0].eCO2min);
		        	
		        	$("#Tvocmax").val(oRep[0].Tvocmax);
		        	$("#Tvocmin").val(oRep[0].Tvocmin);
		        	
		        	$("#dVentileMax").val(oRep[0].dVentileMax);
		        	$("#dVentileMin").val(oRep[0].dVentileMin);
		        	
		        	if(oRep[0].etatVMC == 1){
		        		$("#etatVMC").prop('checked', true);
		        	}
		        	else{
		        		$("#etatVMC").prop('checked', false);
		        	}
			},
			dataType: "json"
		    });
	}

function envoie1(){
		$.ajax({
			url : "get.php", // on donne l'URL du fichier de traitement
		    type : "POST", // la requête est de type POST
		    data: {"action":"SetParam"
		    		,"Tmax":$('#Tmax').val()
		    		,"Tmin":$('#Tmin').val()
		    		
		    		,"Hmax":$('#Hmax').val()
		    		,"Hmin":$('#Hmin').val()
		    		
		    		,"eCO2max":$('#eCO2max').val()
		    		,"eCO2min":$('#eCO2min').val()
		    		
		    		,"Tvocmax":$('#Tvocmax').val()
		    		,"Tvocmin":$('#Tvocmin').val()
		    		
		    		,"dVentileMax":$('#dVentileMax').val()
		    		,"dVentileMin":$('#dVentileMin').val()
		    		
		    		,"etatVMC":$('#etatVMC').is(":checked")?1:0},
		    success:function(){Init();},
		dataType: "json"
		});
	}

	function Init(){chargerMyparam();}

</script>
