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
	<title>Se connecter à votre compte SultanoD</title>

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
			<h2>Connexion à</h2>
			<span id="sultano">SultanoD</span>		
			<!-- formulaire -->	
				<form action="session_action.php" method="post">
					<p>
				 		<input class="bar longbar" spellcheck="false" placeholder="Nom d'utilisateur" type="text" name="pseudo"  maxlength="32" required>
					</p>

					<p>
						<input id="mdp_id" class="bar longbar" spellcheck="false" placeholder="Mot de passe" type="password" name="mdp" maxlength="32" required>
				 	</p>

					<?php
						if(isset($_GET['emptyfield'])){
							echo '<p id="resultbox">Veuillez remplir le formulaire.</p>';
						}
						else if(isset($_GET['error'])){
							echo '<p id="resultbox">Nom d\'utilisateur/mot de passe incorrect(s) ou profil inconnu/désactivé !</p>';
						}
					?>

					<p>
						<a href="index.php"><button style="float: left;" class="bar sub-btn" type="button">Retour</button></a>
						<button style="float: right;" class="bar sub-btn" type="submit">Valider la connexion</button>
					</p>
				
				</form>
		</div>
	</center>
</body>
</html>