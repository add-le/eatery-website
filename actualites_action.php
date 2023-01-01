<?php
	//$mysqli = new mysqli('localhost','zle_lanad','fsmysci1','zfl2-zle_lanad'); //Obiwan2
	$mysqli = new mysqli('localhost','root',null,'zfl2-zle_lanad'); //Wamp

	if($_POST['id'])
	{
		$id=htmlspecialchars(addslashes($_POST['id']));

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
		if (!$mysqli->set_charset("utf8")){
			printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
			exit();
		}

		//echo("Connexion BDD réussie !");

		$id_exist = "select act_id from actualite where act_id = '".$_POST['id']."';";
		//echo($id_exist);

		$result_id_exist = $mysqli->query($id_exist);
		if ($result_id_exist == false) //Erreur lors de l’exécution de la requête
		{
		 	// La requête a echoué
			echo "Error: La requête a échoué \n";
			echo "Query: " . $result_id_exist . "\n";
			echo "Errno: " . $mysqli->errno . "\n";
			echo "Error: " . $mysqli->error . "\n";
			exit();
		}
		else
		{
			if($result_id_exist->num_rows == 1)
			{
				$delete = "DELETE FROM actualite WHERE act_id = '".$_POST['id']."';";
				//echo($delete);
				$result_delete = $mysqli->query($delete);
				if ($result_delete == false) //Erreur lors de l’exécution de la requête
				{
				 	// La requête a echoué
					echo "Error: La requête a échoué \n";
					echo "Query: " . $result_delete . "\n";
					echo "Errno: " . $mysqli->errno . "\n";
					echo "Error: " . $mysqli->error . "\n";
					exit();
				}
				else
				{
					header("Location:gestionnaire_actualites.php?ok");
				}
			}
			else
			{
				header("Location:gestionnaire_actualites.php?noactu");
			}
		}

	}
	else
	{
		header("Location:gestionnaire_actualites.php?emptyfield");
	}

	//Ferme la connexion avec la base MariaDB
	$mysqli->close();
?>