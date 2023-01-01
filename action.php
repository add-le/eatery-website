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
		color: #34A853;
		text-shadow: rgba(255, 255, 255, 0.1) 0px 4px 16px;
	}
</style>
</head>

<?php

//$mysqli = new mysqli('localhost','zle_lanad','fsmysci1','zfl2-zle_lanad'); //Obiwan2
$mysqli = new mysqli('localhost','root',null,'zfl2-zle_lanad'); //Wamp

if($_POST['pseudo'] && $_POST['mdp'] && $_POST['mdp2'] && $_POST['nom'] && $_POST['prenom'] && $_POST['email']){
	$id=htmlspecialchars(addslashes($_POST['pseudo']));
	$mdp=htmlspecialchars(addslashes($_POST['mdp']));
	$mdp2=htmlspecialchars(addslashes($_POST['mdp2']));
	$nom=htmlspecialchars(addslashes($_POST['nom']));
	$prenom=htmlspecialchars(addslashes($_POST['prenom']));
	$email=htmlspecialchars(addslashes($_POST['email']));

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

	// echo ("Connexion BDD réussie !");
	// Les mots de passe ne correspondent pas.
	if (strcmp($mdp, $mdp2) != 0){
		header('Location: inscription.php?mdpfail');
		exit();
	}

	//Préparation de la requête à partir des chaînes saisies =>
	//concaténation (avec le point) des différents éléments composant la
	//requête

	$insert_compte="INSERT INTO user_compte VALUES('" .$id. "',md5('" .$mdp. "'));";
	//echo($insert_compte);

	$insert_profile="INSERT INTO user_profile VALUES('" .$nom. "','" .$prenom. "','" .$email. "', 'D' , 'R' ,sysdate(),'" .$id. "');";
	//echo($insert_profile);
	$delete_compte="DELETE FROM user_compte where cmpt_pseudo ='".$id."';";
	//echo($delete_compte);

	//Exécution de la requête d'ajout d'un compte dans la table des comptes
	$result_compte = $mysqli->query($insert_compte);

if ($result_compte == false) //Erreur lors de l’exécution de la requête
{
 	// La requête a echoué
	echo "Error: La requête a échoué \n";
	echo "Query: " . $result_compte . "\n";
	echo "Errno: " . $mysqli->errno . "\n";
	echo "Error: " . $mysqli->error . "\n";
	exit();
}
else{
	$result_profile = $mysqli->query($insert_profile);
	if  ($result_profile == false)
	{
		// La requête a echoué
		echo "Error: La requête a échoué \n";
		echo "Query: " . $result_profile . "\n";
		echo "Errno: " . $mysqli->errno . "\n";
		echo "Error: " . $mysqli->error . "\n";
		$result_delete = $mysqli->query($delete_compte);
		header('Location: inscription.php?error');
		exit();
	}
	else
	{
		echo ('<body>
				<center>
					<div id="contour">
						<h2>Créer votre compte</h2>
						<span id="sultano">SultanoD</span>		
						<!-- formulaire -->
						<form action="action.php" method="post">						
							
							<p id="resultbox">Inscription validée.</p>

							<p>
								<a href="index.php"><button style="float: left;" class="bar sub-btn" type="button">Retour</button></a>
							</p>
						</form>	
					</div>
				</center>
			</body>');
	}
}

}
else
{
	header('Location:inscription.php?emptyfield');
	exit();
}

//Ferme la connexion avec la base MariaDB
$mysqli->close();
?>

</html>