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
	<title>Créer votre compte SultanoD</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
	
	<!-- Main style sheet -->
	<link href="style.css" rel="stylesheet">    

	<!-- Google Fonts -->

	<!-- Prata for body  -->
	<link href='https://fonts.googleapis.com/css?family=Prata' rel='stylesheet' type='text/css'>
	<!-- Tangerine for small title -->
	<link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>   
	<!-- Open Sans for title -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


	<style>
	html, body{
		background-color: #222;
		height: 100%;
		width: 100%;
		display: flex;
		flex-direction: column;
		justify-content: center;
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
</style>
</head>

<body>
	<center>
		<div id="contour">
			<h2>Créer votre compte</h2>
			<span id="sultano">SultanoD</span>		
			<!-- formulaire -->
			<form action="action.php" method="post">						
				<p>
					<input class="bar longbar" spellcheck="false" placeholder="Nom d'utilisateur" type="text" name="pseudo" pattern="[a-zA-Z0-9-]+" title="Ne doit pas contenir d'espace." maxlength="32" required>
				</p>

				<p>
					<input style="margin-right: 20px;" class="bar shortbar" spellcheck="false" placeholder="Prénom" type="text" name="prenom" pattern="[a-zA-Z-']+" title="Ne doit pas contenir d'espace." maxlength="32" required>
					<input class="bar shortbar" spellcheck="false" placeholder="Nom" type="text" name="nom" pattern="[a-zA-Z-']+" title="Ne doit pas contenir d'espace, ni de chiffre" maxlength="32" required>
				</p>

				<p>
					<input class="bar longbar" spellcheck="false" placeholder="Email" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="texte@domaine.extension" maxlength="64" required>
				</p>

				<p>
					<input id="mdp_id" style="margin-right: 20px;" class="bar shortbar" spellcheck="false" placeholder="Mot de passe" type="password" name="mdp" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au moins un nombre, une majuscule, une minuscule et au moins 8 caracteres." maxlength="32" required>
					<input id="mdp2_id" class="bar shortbar" spellcheck="false" placeholder="Confirmer" type="password" name="mdp2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au moins un nombre, une majuscule, une minuscule et au moins 8 caracteres." maxlength="32" required >
				</p>

				<?php
					if(isset($_GET['mdpfail'])){
						echo '<p id="resultbox">Les mots de passe ne correspondent pas.</p>';
					}else if(isset($_GET['emptyfield']) ){
						echo '<p id="resultbox">Veuillez remplir le formulaire.</p>';
					}
					else if(isset($_GET['error'])){
						echo '<p id="resultbox">Erreur de requête.</p>';
					}
				?>

				<p>
					<a href="index.php"><button style="float: left;" class="bar sub-btn" type="button">Retour</button></a>
					<button style="float: right;" class="bar sub-btn" type="submit">Valider l'inscription</button>
				</p>
			</form>	
		</div>
	</center>
</body>
</html>