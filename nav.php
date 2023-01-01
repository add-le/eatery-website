<?php
	session_start();
?>

		<a class="scrollToTop" href="#">
			<i class="fa fa-angle-up"></i>
		</a>
		<!-- END SCROLL TOP BUTTON -->

		<!-- Start header section -->
		<header id="mu-header">  
			<nav class="navbar navbar-default mu-main-navbar" role="navigation">  
				<div class="container">
					<div class="navbar-header">
						<!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<!-- LOGO -->       
						<!--  Text based logo  -->
						<a class="navbar-brand" href="index.php">Sultano<span>D</span></a> 

					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul id="top-menu" class="nav navbar-nav navbar-right mu-main-nav">
							<li><a href="index.php">ACCUEIL</a></li>
							<li><a href="affichagecategorie.php?indice=0">DISPLAY</a></li>
							<?php
								if(!isset($_SESSION['login']))
								{
									$page = basename($_SERVER["PHP_SELF"]);
									if(strcmp($page, "gestionnaire_comptes.php") == 0) // On empeche quelqu'un de non log d'aller sur gestionnaire comptes
									{
										header("Location:session.php");
									}
									else if(strcmp($page, "redacteur_informations.php") == 0) // On empeche quelqu'un de non log d'aller sur redacteur informations
									{
										header("Location:session.php");
									}
									echo('<li><a href="session.php">SE CONNECTER</a></li>');
									echo('<li><a href="inscription.php">S\'INSCRIRE</a></li>');
									
								}
								else
								{
									if($_SESSION['statut'] == 'G')
									{
										$page = basename($_SERVER["PHP_SELF"]);
										if(strcmp($page, "redacteur_informations.php") == 0)
										{
											header("Location:session.php");
										}
										echo('<li><a href="end.php">SE DÉCONNECTER</a></li>');
										echo('<li><a href="gestionnaire_accueil.php">GESTIONNAIRE</a></li>');
									}
									else if($_SESSION['statut'] == 'R')
									{
										$page = basename($_SERVER["PHP_SELF"]);
										if(strcmp($page, "gestionnaire_comptes.php") == 0)
										{
											header("Location:session.php");
										}
										else if(strcmp($page, "gestionnaire_actualites.php") == 0)
										{
											header("Location:session.php");
										}
										echo('<li><a href="end.php">SE DÉCONNECTER</a></li>');
										echo('<li><a href="redacteur_accueil.php">REDACTEUR</a></li>');
									}
								}
							?>
								
						</ul>                            
					</div><!--/.nav-collapse -->       
				</div>          
			</nav> 
		</header>
		<!-- End header section -->
