<!--
Addwyn LE LANN L2 Info 3 e21800309 lic181
13/11/2019
Site web de restaurant italien spécialisé dans la cuisine turque
situé dans le marais à paris.
-->

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>SultanoD</title>

	<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
	<link href="assets/css/bootstrap.css" rel="stylesheet">   
	<link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">     
	<link href="style.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Prata' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

	<style type="text/css">
		html, body{
			background-color: #222;
			height: 100%;
			width: 100%;
			display: flex;
			flex-direction: column;
			justify-content: center;
			color: white;
		}
	</style>

	</head>

	<body>

		<?php include("nav.php") ?>
		<!-- End header section -->

		<section class="middle">
			<center class="middle" >
				
					<?php
					// $mysqli = new mysqli('localhost','zle_lanad','fsmysci1','zfl2-zle_lanad'); //Obiwan2
					$mysqli = new mysqli('localhost','root',null,'zfl2-zle_lanad'); //Wamp

					if ($mysqli->connect_errno){
						 // Affichage d'un message d'erreur
						echo "Error: Problème de connexion à la BDD \n";
						echo "Errno: " . $mysqli->connect_errno . "\n";
						echo "Error: " . $mysqli->connect_error . "\n";
							// Arrêt du chargement de la page
						exit();
					}

						// Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
					if (!$mysqli->set_charset("utf8")){
						printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
						exit();
					}

					//echo("<font color=lime>Connexion BDD OK !</font>");

					$sql = "select * from visuel where vsl_visibilite = 'L';";
					//echo($sql);

					$result = $mysqli->query($sql);
					if ($result == false) //Erreur lors de l'execution de la rêquete
					{ // La requête a echoué
						echo "Error: La requête a echoué \n";
						echo "Errno:" . $mysqli->errno . "\n";
						echo "Error:" . $mysqli->error ."\n";
						exit();
					}
					else
					{
						while ($visuel = $result->fetch_assoc())
						{
							echo('<img width="30%" src="'.$visuel['vsl_fichierImage'].'" alt="'.$visuel['vsl_fichierImage'].'" />');
						}
					}

					header("refresh:5;url=affichagecategorie.php?indice=0");
						
					// On quitte la base
					$mysqli->close();

				?>
				
			</center>
		</section>

	</body>
</html>