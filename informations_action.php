<?php
	
	session_start();

	//$mysqli = new mysqli('localhost','zle_lanad','fsmysci1','zfl2-zle_lanad'); //Obiwan2
	$mysqli = new mysqli('localhost','root',null,'zfl2-zle_lanad'); //Wamp

	if($_POST['categorie'] && $_POST['text'])
	{
		$cat=htmlspecialchars(addslashes($_POST['categorie']));
		$text=htmlspecialchars(addslashes($_POST['text']));

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

		$cat_exist = "select * from categorie where ctgr_intitule = '".$_POST['categorie']."';";
		//echo($cat_exist);

		$result_cat_exist = $mysqli->query($cat_exist);
		if ($result_cat_exist == false) //Erreur lors de l’exécution de la requête
		{
		 	// La requête a echoué
			echo "Error: La requête a échoué \n";
			echo "Query: " . $result_cat_exist . "\n";
			echo "Errno: " . $mysqli->errno . "\n";
			echo "Error: " . $mysqli->error . "\n";
			exit();
		}
		else
		{
			if($result_cat_exist->num_rows == 1)
			{
				$cat_id = "select ctgr_id from categorie where ctgr_intitule = '".$_POST['categorie']."';";
				//echo($cat_id);

				$result_cat_id = $mysqli->query($cat_id);
				if ($result_cat_id == false) //Erreur lors de l’exécution de la requête
				{
				 	// La requête a echoué
					echo "Error: La requête a échoué \n";
					echo "Query: " . $result_cat_id . "\n";
					echo "Errno: " . $mysqli->errno . "\n";
					echo "Error: " . $mysqli->error . "\n";
					exit();
				}
				else{

					$cat_id_fetch = $result_cat_id->fetch_assoc();

					//echo($cat_id_fetch['ctgr_id']);

					$ajout_info = "insert into information values(null, '".$_POST['text']."', sysdate(), 'L', '".$_SESSION['login']."', ".$cat_id_fetch['ctgr_id'].");";
					//echo($ajout_info);

					$result_ajout_info = $mysqli->query($ajout_info);
					if ($result_ajout_info == false) //Erreur lors de l’exécution de la requête
					{
					 	// La requête a echoué
						echo "Error: La requête a échoué \n";
						echo "Query: " . $result_ajout_info . "\n";
						echo "Errno: " . $mysqli->errno . "\n";
						echo "Error: " . $mysqli->error . "\n";
						exit();
					}
					else
					{
						header('Location:redacteur_informations.php?ok');
					}

				}

			}
			else
			{
				header('Location:redacteur_informations.php?nocat');
				exit();
			}
		}

	}
	else
	{
		header('Location:redacteur_informations.php?emptyfield');
		exit();
	}


	//Ferme la connexion avec la base MariaDB
	$mysqli->close();
?>