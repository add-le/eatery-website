<!DOCTYPE html>
<html>
	<head>
	<!--entête du fichier HTML-->
		
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">    
	<title>R - Gestion des informations</title>

	<!-- Favicon -->
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
		body{
			background-color: #EFD1D3;
		}
		table{
				border-collapse: collapse;
		}
		td{
			border-bottom: 1px solid white;
			padding: 5px 10px;
		}

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
		height: 25px;
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
		color: green;
		text-shadow: rgba(255, 255, 255, 0.1) 0px 4px 16px;
	}
</style>
	</style>

	</head>
	<body>

		<?php include("nav.php"); ?>

		<?php 
			/* Vérification   ci-dessous   à   faire   sur   toutes   les   pages  dont   l'accès   estautorisé à un utilisateur connecté. Il   faut   aussi   vérifier   le   contenu   de  $_SESSION['statut']  pour   empêcher   ungestionnaire connecté d’avoir accès aux pages de l’espace privé des rédacteurset inversement */

			if($_SESSION['statut'] == 'G') //Si c'est un gestionnaire, redirection vers la page du formulaire
			{
				header("Location:session.php");
			}

		?>

		<section id="mu-slider">
			<center>
				<table>
				<tr>
					<td>Id Catégorie</td>
					<td>Intitulé</td>
					<td>Statut (R/G)</td>
					<td>Date d'ajout Catégorie</td>
					<td>Id Information</td>
					<td>Texte</td>
					<td>Date d'ajout Information</td>
					<td>Etat (L/C)</td>
					<td>Posté par</td>
				</tr>
			<?php
				/* Code PHP permettant d’afficher le détail du profil de l’utilisateur connecté*/

				//$mysqli = new mysqli('localhost','zle_lanad','fsmysci1','zfl2-zle_lanad'); //Obiwan2
				$mysqli = new mysqli('localhost','root',null,'zfl2-zle_lanad'); //Wamp

				if ($mysqli->connect_errno)
				{
					// Affichage d'un message d'erreur
					echo "Error: Problème de connexion à la BDD \n";
					echo "Errno: " . $mysqli->connect_errno . "\n";
					echo "Error: " . $mysqli->connect_error . "\n";
					// Arrêt du chargement de la page
					exit();
				}

				// Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
				if (!$mysqli->set_charset("utf8"))
				{
					printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
					exit();
				}

				//echo ("Connexion BDD réussie !");

				$sql = "select * from categorie left outer join information using(ctgr_id);";
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
				else{
					while ($info = $result->fetch_assoc())
					{
						echo("<tr>");
						echo("<td>".$info['ctgr_id']."</td>");
						echo("<td>".$info['ctgr_intitule']."</td>");
						echo("<td>".$info['ctgr_statut']."</td>");
						echo("<td>".$info['ctgr_dateAjout']."</td>");
						echo("<td>".$info['info_id']."</td>");
						echo("<td>".$info['info_texte']."</td>");
						echo("<td>".$info['info_dateAjout']."</td>");
						echo("<td>".$info['info_etat']."</td>");
						echo("<td>".$info['cmpt_pseudo']."</td>");
						echo("</tr>");
					}
					echo("Résultats : ".$result->num_rows);
				}

			?>
			</table>

			<br/>
			<p>Ajouter une information :</p>

			<form action="informations_action.php" method="post">
				<input spellcheck="false" list="cat" placeholder="Choix Catégorie" name="categorie">
				<datalist id="cat">
					<?php
						$aff_cat = "select ctgr_intitule from categorie;";
						//echo($aff_cat);

						$result_aff = $mysqli->query($aff_cat);
						if ($result_aff == false) //Erreur lors de l’exécution de la requête
						{
							// La requête a echoué
							echo "Error: La requête a échoué \n";
							echo "Query: " . $result_aff . "\n";
							echo "Errno: " . $mysqli->errno . "\n";
							echo "Error: " . $mysqli->error . "\n";
							exit();
						}
						else
						{
							while ($caff = $result_aff->fetch_assoc())
							{
								echo('<option value="'.$caff['ctgr_intitule'].'">');
							}
						}

						//Ferme la connexion avec la base MariaDB
						$mysqli->close();
					?>
				</datalist>
				<br/>
				<?php
 					if(isset($_GET['emptyfield']) ){
						echo '<p id="resultbox">Veuillez remplir le formulaire.</p>';
					}
					else if(isset($_GET['nocat']) ){
						echo '<p id="resultbox">Catégorie inexistante.</p>';
					}
					else if(isset($_GET['ok']) ){
						echo '<p id="resultok">Information ajouté.</p>';
					}
				?>
				<textarea name="text" placeholder="Entrez votre information ici..." style="height: 300px;width: 60%;"></textarea>
				<br/>
				<button type="submit">Valider l'information</button>
			</form>


		</center>
		</section>
		<!--contenu du fichier HTML-->
		
		
	</body>
</html>