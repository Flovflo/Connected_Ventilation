<?php
	
	//session_start();
//===================================================================================================================================

	//fonction verifiant la réponse de l'utilisateur renvoie 1 si bon, renvoie 0 si mauvais
	function Captcha_Verif(/*$Tentative=$_POST['CAPTCHA_ENTREE']*/)
	{
			return $_POST['CAPTCHA_ENTREE']==$_SESSION['captcha'];//}
			return 0;
	}
//===================================================================================================================================	
	//fonction retourne 1 si une réponse a été envoyé, 0 si il n'y en a pas
	function Captcha_Envoi(/*$Captcha_Post="CAPTCHA_ENVOI"*/)
	{
		return (isset($_SESSION['captcha']) /*&& !emptyisset($_POST[$Captcha_Post])*/);
	}
//===================================================================================================================================	
	
	function Captcha_Affiche($Captcha_Id="CAPTCHA", $Captcha_JS="CAPTCHA_GO", $CaptchaPath="Capcha" ,$Captcha_Post="CAPTCHA_ENVOI")
	{
		//CSS
			//Fonction qui Echo le css du captcha
		echo'
			<style>
				#'.$Captcha_Id.'{
					background-color:#d12112;
					right:35%;
					left:35%;
					top:25%;
					width:30%;
					
					padding:1% 5% 1% 5%;
					
					border-radius: 20px;
					border: 5px solid black;
					position:fixed;
					
					display:none;
				}
				
				.CAPTCHA_REFRESH
				{
					background-image:url('.$CaptchaPath.'/icon/close.png);
					background-size: contain;
					background-repeat: no-repeat;
					border:none;
					width: 30px; /* largeur à spécifier */
					height: 30px; /* longueur à spécifier */
					cursor: pointer;
					background-color:#d12112;
					
					/*margin-left:90%;*/
					/*margin-right:10%;*/
					top:3%;right:3%;
					position:absolute;
				}
				
				@media (max-width: 712px) {
				  	#'.$Captcha_Id.'{right:10%;left:10%;padding:1% 40% 0 40%;}
				  	#'.$Captcha_Id.'> table{margin:0 0 0 -100px;position:left;}
				  	.CAPTCHA_REFRESH{}
				 }
				 
				 @media (max-height: 530px) {
				  	#'.$Captcha_Id.'{bottom:10%;top:10%;}
				 }
				 
			</style>';
		
		//SCRIPT
			//fonction Echo une fonction JS qui Affiche Le Captcha
		echo'
		<script>
			function '.$Captcha_JS.'(CAPCHA_onoff)
			{
				var fenetreCaptcha=document.getElementById("'.$Captcha_Id.'");
				if(CAPCHA_onoff==1)
					fenetreCaptcha.style.display=\'block\';
				if(CAPCHA_onoff==0)
					fenetreCaptcha.style.display=\'none\';
			}
		</script>';
	
		//HTML
			//fonction Echo le code html du Captcha
		echo'
		
				<div id="'.$Captcha_Id.'">
					<table align="center">
						<input type="submit" class="CAPTCHA_REFRESH" name="CAPTCHA_REFRESH" value="" onclick="'.$Captcha_JS.'(0)"/>
						<tr align="center">
							<td>
								<div id="CAPTCHA_TXT"> Écrivez ce que vous voyez:</div>
							</td>
						</tr>
						<tr>
							<td>
										<div id="CAPTCHA_IMG" align="center">
											<img src="'.$CaptchaPath.'/ImageCaptcha.php" />
										</div>
							</td>
						</tr>	
						
						<tr>
							<td>	
								<input type="text" placeholder="Ce que vous voyez" id="CAPTCHA_ENTREE" name="CAPTCHA_ENTREE" />
							</td>
						</tr>
						<tr align="center">
							<td>
								<input type="submit" name="'.$Captcha_Post.'" value="Valider"/>
							</td>
						</tr>
					</table>
				</div>
			
		';
	}
//===================================================================================================================================	
?>
