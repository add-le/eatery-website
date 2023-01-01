
<html>
	<head>
	<!--entête du fichier HTML-->
		
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">    
	<title>R - Rédacteur Accueil</title>

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

			if(!isset($_SESSION['login'])) //Si la session n'est pas ouverte, redirection vers la page du formulaire
			{
				header("Location:session.php");
			}

		?>

		<!--contenu du fichier HTML-->
		<section id="mu-slider">
			<a href="redacteur_informations.php">Gestion des informations</a>
		</section>


		<?php/* Code PHP permettant d’afficher le détail du profil de l’utilisateur connecté*/?>
	</body>
</html>