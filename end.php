<?php
	
	session_start();

	// Fin de session
	session_destroy();
	// Libération des variables globales associées à la session
	unset($_SESSION['login']);
	// Redirection
	header("Location:index.php");
?>