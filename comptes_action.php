<?php
	//$mysqli = new mysqli('localhost','zle_lanad','fsmysci1','zfl2-zle_lanad'); //Obiwan2
	$mysqli = new mysqli('localhost','root',null,'zfl2-zle_lanad'); //Wamp

	if($_POST['pseudo'])
	{
		$id=htmlspecialchars(addslashes($_POST['pseudo']));

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

		$test_pseudo = "select cmpt_pseudo from user_compte where cmpt_pseudo = '".$_POST['pseudo']."';";
		//echo($test_pseudo);

		$result_test = $mysqli->query($test_pseudo);
		if ($result_test == false) //Erreur lors de l’exécution de la requête
		{
		 	// La requête a echoué
			echo "Error: La requête a échoué \n";
			echo "Query: " . $result_test . "\n";
			echo "Errno: " . $mysqli->errno . "\n";
			echo "Error: " . $mysqli->error . "\n";
			exit();
		}
		else
		{
			if($result_test->num_rows == 1)
			{
				$etat = "select prfl_validite from user_profile where cmpt_pseudo = '".$_POST['pseudo']."';";
				//echo($etat);

				$result_etat = $mysqli->query($etat);
				if ($result_etat == false) //Erreur lors de l’exécution de la requête
				{
				 	// La requête a echoué
					echo "Error: La requête a échoué \n";
					echo "Query: " . $result_etat . "\n";
					echo "Errno: " . $mysqli->errno . "\n";
					echo "Error: " . $mysqli->error . "\n";
					exit();
				}
				else
				{
					$validite = $result_etat->fetch_assoc();
					if($validite['prfl_validite'] == 'A'){
						$desact = "update user_profile set prfl_validite = 'D' where cmpt_pseudo = '".$_POST['pseudo']."';";
						//echo($desact);
						$result_desact = $mysqli->query($desact);
						header('Location:gestionnaire_comptes.php?ok');
					}
					else if($validite['prfl_validite'] == 'D')
					{
						$act = "update user_profile set prfl_validite = 'A' where cmpt_pseudo = '".$_POST['pseudo']."';";
						//echo($act);
						$result_desact = $mysqli->query($act);
						header('Location:gestionnaire_comptes.php?ok');
					}
				}

			}
			else
			{
				header('Location:gestionnaire_comptes.php?noexist');
				exit();
			}
		}
	}
	else
	{
		header('Location:gestionnaire_comptes.php');
		exit();
	}

	//Ferme la connexion avec la base MariaDB
	$mysqli->close();
?>