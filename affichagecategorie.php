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
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">    
	<title>SultanoD</title>

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

</head>
<body>

	<!--START SCROLL TOP BUTTON -->
	<?php include("nav.php") ?>
	<!-- End header section -->

	<style type="text/css">
		html, body{
			background-color: #222;
		}
	</style>


	<section id="mu-reservation">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="mu-reservation-area" style="color: white;">
						<center>

							<style type="text/css">
							.class_actualite{
								font-family: "Open Sans", sans-serif;
							}
							h2{
								font-size: 60pt;
							}
						</style>


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

							//echo("<font color=green>Connexion BDD OK !</font>");

							$nombre_categorie = "select * from categorie;";
							$requete_nombre_categorie = $mysqli->query($nombre_categorie);

							if($requete_nombre_categorie->num_rows != 0){
								if(isset($_GET['indice']))
								{
									//echo ("Valeur de indice : ");
									//echo ($_GET['indice']);
									//echo ("<br />");
								}
									else {
									echo ("Vous avez oublié le paramètre !");
									exit();
								}

								$select_categorie="select ctgr_id from categorie;";
								//echo($select_categorie);

								$result1­ = $mysqli->query($select_categorie);

								if ($result1­ == false) //Erreur lors de l’exécution de la requête
								{
								 	// La requête a echoué
									echo "Error: La requête a échoué \n";
									echo "Query: " . $result1­ . "\n";
									echo "Errno: " . $mysqli->errno . "\n";
									echo "Error: " . $mysqli->error . "\n";
									exit();
								}
								else{
									for ($i=0;$i<$result1­->num_rows;$i++)
									{
									  $cat = $result1­->fetch_assoc(); //récupération d’une ligne de résultat
									  $id[$i]=$cat['ctgr_id']; //affectation de l’ID dans une case du tableau
									  //echo ($id[$i]);
									  //echo ("<br />");
									}

									//----------------------------------------------------------------------------
									$requete2="select info_texte from information join categorie using(ctgr_id) where ctgr_id = ".$id[$_GET['indice']]." and info_etat = 'L';";
									//echo($requete2);

									$result2 = $mysqli->query($requete2);

									if($result2 == false)
									{
										// La requête a echoué
										echo "Error: La requête a échoué \n";
										echo "Query: " . $result2 . "\n";
										echo "Errno: " . $mysqli->errno . "\n";
										echo "Error: " . $mysqli->error . "\n";
										exit();
									}
									else{
	
										$select_cat_nom = "select ctgr_intitule from categorie where ctgr_id =  ".$id[$_GET['indice']].";";
										$result_cat_nom =  $mysqli->query($select_cat_nom);

										if ($result_cat_nom == false) //Erreur lors de l’exécution de la requête
										{
										 	// La requête a echoué
											echo "Error: La requête a échoué \n";
											echo "Query: " . $result_cat_nom . "\n";
											echo "Errno: " . $mysqli->errno . "\n";
											echo "Error: " . $mysqli->error . "\n";
											exit();
										}
										else{
											?>
											<div class="mu-title"><span class="mu-subtitle"><h1>
											<?php
												$cat_nom = $result_cat_nom->fetch_assoc();
													echo ($cat_nom['ctgr_intitule']);
											?>
											</h1></span></div>
											<?php
												if($result2->num_rows == 0){
													echo ("<h2>Aucunes informations.</h2>");
													
												}
												else{
													while ($info = $result2->fetch_assoc())
													{
														echo ("<h2>".$info['info_texte']."</h2>");
														echo ("<br/><br/><br/>");
													}
												}
										}
											
										
									}

									//Actualisation pour le tourniquet
									$numero=$_GET['indice']+1;
									if($result1­->num_rows > $numero){
										header("refresh:5;url=affichagecategorie.php?indice=".$numero."");
									}
									else{
										header("refresh:5;url=visuel.php");
									}

								}
							}else{
								//Affichage d'un message s'il y a pas de categorie
								?><div class="mu-title"><span class="mu-subtitle"><h1>Aucune catégorie</h1></span></div><?php
							}

							//Ferme la connexion avec la base MariaDB
							$mysqli->close();
					?>

					</center>
				</div>
			</div>
		</div>
	</section>





	<!-- jQuery library -->
	<script src="assets/js/jquery.min.js"></script>  
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="assets/js/bootstrap.js"></script>   
	<!-- Slick slider -->
	<script type="text/javascript" src="assets/js/slick.js"></script>
	<!-- Counter -->
	<script type="text/javascript" src="assets/js/simple-animated-counter.js"></script>
	<!-- Gallery Lightbox -->
	<script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- Date Picker -->
	<script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script> 

	<!-- Ajax contact form  -->
	<script type="text/javascript" src="assets/js/app.js"></script>

	<!-- Custom js -->
	<script src="assets/js/custom.js"></script> 

</body>
</html>