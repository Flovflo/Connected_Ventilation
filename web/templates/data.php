<?php
	if (!valider("connecte","SESSION")) 
		{
			header("Location:../index.php?view=Accueil");
			die("");
		}
?>

<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>

<script>
	
$(document).ready(Init());	
var datas;

function loadLogs(){
		$.ajax({
		        url : "get.php", // on donne l'URL du fichier de traitement
		        type : "GET", // la requête est de type POST
		        data : "action=GetLogs",
		        success:function(oRep){
		        	datas=oRep;
		        	
		        	//$("#Tmax").val(oRep[0].Tmax);
		        	//$("#Tmin").val(oRep[0].Tmin);
		        	
		        	var xVal = datas.map(datas => datas.date);

				//Temperature
				new Chart("Temperature", {
				  type: "line",
				  data: {
				    labels: xVal,
				    datasets: [{
				      data: datas.map(datas => parseInt(datas.T)),
				      borderColor: "red",
				      fill: false
				    }]
				  },
				  options: {
				    legend: {display: false}
				  }
				});
				
				//Humidite
				new Chart("Humidite", {
				  type: "line",
				  data: {
				    labels: xVal,
				    datasets: [{
				      data: datas.map(datas => parseInt(datas.H)),
				      borderColor: "blue",
				      fill: false
				    }]
				  },
				  options: {
				    legend: {display: false}
				  }
				});
				
				//eCO2
				new Chart("eCO2", {
				  type: "line",
				  data: {
				    labels: xVal,
				    datasets: [{
				      data: datas.map(datas => parseInt(datas.eCO2)),
				      borderColor: "black",
				      fill: false
				    }]
				  },
				  options: {
				    legend: {display: false}
				  }
				});
				
				//TVOC
				new Chart("Tvoc", {
				  type: "line",
				  data: {
				    labels: xVal,
				    datasets: [{
				      data: datas.map(datas => parseInt(datas.Tvoc)),
				      borderColor: "green",
				      fill: false
				    }]
				  },
				  options: {
				    legend: {display: false}
				  }
				});
				
				//etatVMC
				/*var temp = 0;
				for(i=0;i<datas.length;i++){
					datas[i].etatVMC=datas[i].etatVMC+temp;
					temp=datas[i].etatVMC;
				}*/
				
				new Chart("etatVMC", {
				  type: "line",
				  data: {
				    labels: xVal,
				    datasets: [{
				      data: datas.map(datas => parseInt(datas.etatVMC)),
				      borderColor: "brown",
				      fill: false
				    }]
				  },
				  options: {
				    legend: {display: false}
				  }
				});
				

			},
			dataType: "json"
		    });
	}

	function Init(){loadLogs();}

</script>

<div id="#catalogue">
	
	<h3>Temperature (°C)</h3>
	<canvas id="Temperature" style="width:100%;max-width:900px; background-color: white;"></canvas> <br></br>

	<h3>Humidite (%)</h3>
	<canvas id="Humidite" style="width:100%;max-width:900px; background-color: white;"></canvas> <br></br>
	
	<h3>Taux équivalent CO2</h3>
	<canvas id="eCO2" style="width:100%;max-width:900px; background-color: white;"></canvas> <br></br>
	
	<h3>Taux de particules organique volatiles</h3>
	<canvas id="Tvoc" style="width:100%;max-width:900px; background-color: white;"></canvas> <br></br>

	<h3>Ma consommation (V)</h3>
	<canvas id="etatVMC" style="width:100%;max-width:900px; background-color: white;"></canvas> <br></br>

</div>
<script>



</script>
