<?php
	//Ouverture d'une session
	session_start();
	/*Affectation dans des variables du pseudo/mot de passe s'ils existent,
	affichage d'un message sinon*/
	if ($_POST["pseudo"] && $_POST["mdp"]){ //Test des champs vides

		$id=htmlspecialchars(addslashes($_POST['pseudo']));
		$mdp=htmlspecialchars(addslashes($_POST['mdp']));

		// Connexion à la base MariaDB
		// $mysqli = new mysqli('localhost','zle_lanad','fsmysci1','zfl2-zle_lanad'); //Obiwan2
		$mysqli = new mysqli('localhost','root',null,'zfl2-zle_lanad'); //Wamp
		if ($mysqli->connect_errno)
		{
			// Affichage d'un message d'erreur
			echo "Error: Problème de connexion à la BDD \n";
		 	// Arrêt du chargement de la page
		 	exit();
		}

		/* On prépare plutôt une requête avec une jointure pour
		rechercher si un compte utilisateur valide (‘A’) existe dans la table des
		données des profils et récupérer aussi son statut à partir du pseudo / mot de
		passe saisis */
		$sql="select prfl_statut, cmpt_pseudo from user_profile join user_compte using(cmpt_pseudo) where cmpt_pseudo = '".$id."' and cmpt_password = '".md5($mdp)."' and prfl_validite = 'A';";
		echo($sql);
		
		/* Exécution de la requête pour vérifier si le compte (=pseudo+mdp) existe !*/
		$resultat = $mysqli->query($sql);
		if ($resultat==false)
		{
			// La requête a echoué
			echo "Error: La requête a échoué \n";
			echo "Query: " . $resultat . "\n";
			echo "Errno: " . $mysqli->errno . "\n";
			echo "Error: " . $mysqli->error . "\n";
			exit();
		}
		else //La requete a réussi
		{
			//On test si le compte existe bien
			if($resultat->num_rows == 1)
			{
				$retour = $resultat->fetch_assoc();

				//Mise à jour des données de la session
				$_SESSION['login']=$id;
				$_SESSION['statut']=$retour['prfl_statut'];

				if($_SESSION['statut'] == 'R')
				{
					header("Location:redacteur_accueil.php");
				}
				else if($_SESSION['statut'] == 'G')
				{
					header("Location:gestionnaire_accueil.php");
				}

			}
			else
			{
				// aucune ligne retournée
				// => le compte n'existe pas ou n'est pas valide
				header('Location:session.php?error');
				exit();
			}
		}
	}
	else
	{
		//Redirection si champs vide
		header('Location:session.php?emptyfield');
		exit();
	}

	//Fermeture de la communication avec la base MariaDB
	$mysqli->close();
?>