<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">    
		<title>G - Gestion des comptes</title>
		<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
		<!-- Font awesome -->
		<link href="assets/css/font-awesome.css" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="assets/css/bootstrap.css" rel="stylesheet">   
		<!-- Slick slider -->
		<link rel="stylesheet" type="text/css" href="assets/css/slick.css">    
		<!-- Date Picker -->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datepicker.css">   
		<!-- Gallery Lightbox -->
		<link href="assets/css/magnific-popup.css" rel="stylesheet"> 
		<!-- Theme color -->
		<link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">     

		<!-- Main style sheet -->
		<link href="style.css" rel="stylesheet">

		<!-- Prata for body  -->
		<link href='https://fonts.googleapis.com/css?family=Prata' rel='stylesheet' type='text/css'>
		<!-- Tangerine for small title -->
		<link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>   
		<!-- Open Sans for title -->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<style type="text/css">
			html, body{
				background-color: #222;
				color: white;
			}
			table{
				border-collapse: collapse;
			}
			td{
				border-bottom: 1px solid #FFA500;
				padding: 5px 10px;
			}
		</style>
		<style>

	h2{
		color: white;
	}

	#contour{
		border: 1px solid white;
		display: inline-block;
		border-radius: 10px;
		padding: 50px;
	}

	#sultano{
		font-size: 50px;
		font-family: "Tangerine", cursive;
		line-height: 30px;
		color: #FFA500;
	}

	.bar{
		height: 39px;
		font-family: "Open Sans", sans-serif;
		color: #333333;
		font-size: 15px;
		line-height: 24px;
		padding: 6px 12px;
		border: 1px solid #ccc;
		box-shadow: rgba(255, 255, 255, 0.1) 0px 4px 16px;
		transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
	}

	.bar:focus{
		border-color: #FFA500;
		outline: none;
	}

	.longbar{
		width: 400px;
	}

	.shortbar{
		width: 175px;
	}

	.sub-btn{
		background-color: transparent;
		color: white;
		height: 39px;
		cursor: pointer;
		transition: all 0.5s;
		border-style: solid;
	}

	.sub-btn:hover{
		background-color: #FFA500;
		border-color: #FFA500;
	}

	#resultbox{
		font-family: "Open Sans", sans-serif;
		font-size: 15px;
		line-height: 24px;
		color: #DB4437;
		text-shadow: rgba(255, 255, 255, 0.1) 0px 4px 16px;
	}

	#resultok{
		font-family: "Open Sans", sans-serif;
		font-size: 15px;
		line-height: 24px;
		color: lime;
		text-shadow: rgba(255, 255, 255, 0.1) 0px 4px 16px;
	}
</style>
	</head>

	<body>

		<?php include("nav.php"); ?>

		<section id="mu-slider">
<style>
				#barre-gestionnaire{
			height: 60px;
			background-color: #FFA500;
			display: flex;
			flex-direction: column;
			justify-content: center;
			font-family: "Open Sans", sans-serif;
		}
		#barre-gestionnaire a{
			text-decoration: none;
			margin: 0px 12px;
			transition: all .5s;
			color :white;
		}
		#barre-gestionnaire a:hover{
			color: black;
		}
	</style>
			<nav id="barre-gestionnaire">
				<center>
					<a id="gestion" href="gestionnaire_comptes.php">GESTION DES COMPTES</a>
					<a id="gestion" href="gestionnaire_actualites.php">GESTION DES ACTUALITÉS</a>
				</center>
			</nav>
		<br/>
<center>
		<table>
			<tr>
				<td>Nom d'utilisateur</td>
				<td>Nom</td>
				<td>Prénom</td>
				<td>Adresse email</td>
				<td>Validité (A-D)</td>
				<td>Statut (G-R)</td>
				<td>Date de création</td>
			</tr>
			<?php

				// $mysqli = new mysqli('localhost','zle_lanad','fsmysci1','zfl2-zle_lanad'); //Obiwan2
				$mysqli = new mysqli('localhost','root',null,'zfl2-zle_lanad'); //Wamp

				//Test connexion BDD
				if ($mysqli->connect_errno)
				{
					//Affichage d'un message d'erreur
					echo "Error: Problème de connexion à la BDD \n";
				 	//Arrêt du chargement de la page
				 	exit();
				}
				//Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
				if (!$mysqli->set_charset("utf8"))
				{
					printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
					exit();
				}
				//echo ("Connexion BDD réussie !");

				$sql = "select * from user_compte left outer join user_profile using(cmpt_pseudo);";
				//echo($sql);

				$result = $mysqli->query($sql);
				if ($result == false) //Erreur lors de l’exécution de la requête
				{
			 	// La requête a echoué
				echo "Error: La requête a échoué \n";
				echo "Query: " . $result . "\n";
				echo "Errno: " . $mysqli->errno . "\n";
				echo "Error: " . $mysqli->error . "\n";
				exit();
				}
				else
				{
					while ($user = $result->fetch_assoc())
					{
						echo("<tr>");
						echo("<td>".$user['cmpt_pseudo']."</td>");
						echo("<td>".$user['prfl_nom']."</td>");
						echo("<td>".$user['prfl_prenom']."</td>");
						echo("<td>".$user['prfl_email']."</td>");
						echo("<td>".$user['prfl_validite']."</td>");
						echo("<td>".$user['prfl_statut']."</td>");
						echo("<td>".$user['prfl_dateCreation']."</td>");
						echo("</tr>");
					}
					echo("Nombre de compte : ".$result->num_rows);
				}

				//Ferme la connexion avec la base MariaDB
				$mysqli->close();
			?>
		</table>

		<br/>
		<p>Désactivé / Activé un compte :</p>

		<?php
			if(isset($_GET['noexist']))
			{
				echo '<p id="resultbox">Ce nom d\'utilisateur n\'existe pas.</p>';
			}
			else if(isset($_GET['ok']))
			{
				echo('<p id="resultok">Désactivation / Activation correctement exécutée.</p>');
			}
		?>

		<form action="comptes_action.php" method="post">
			<input name="pseudo" spellcheck="false" class="bar longbar" placeholder="Nom d'utilisateur" type="text" />
			<br/><br/>
			<button type="submit" class="sub-btn">Validé</button>
		</form>





</center>







		</section>

	</body>
</html>