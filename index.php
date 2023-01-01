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
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">    
	<title>SultanoD</title>

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

	</head>
	<body>

		<?php include("nav.php"); ?>

		<!-- Start slider  -->
		<section id="mu-slider">
			<div class="mu-slider-area"> 

				<!-- Top slider -->
				<div class="mu-top-slider">

					<!-- Top slider single slide -->
					<div class="mu-top-slider-single">
						<img src="assets/img/slider/1.jpeg" alt="img">
						<!-- Top slider content -->
						<div class="mu-top-slider-content">
							<span class="mu-slider-small-title">Bienvenue</span>
							<h2 class="mu-slider-title">Chez SultanoD</h2>
							<p></p>
							<a href="#mu-reservation" class="mu-readmore-btn mu-reservation-btn">RÉSERVER UNE TABLE</a>
						</div>
						<!-- / Top slider content -->
					</div>
					<!-- / Top slider single slide -->    

					<!-- Top slider single slide -->
					<div class="mu-top-slider-single">
						<img src="assets/img/slider/2.jpeg" alt="img">
						<!-- Top slider content -->
						<div class="mu-top-slider-content">
							<span class="mu-slider-small-title">Le Plus Élégant</span>
							<h2 class="mu-slider-title">Restaurant Italien</h2>
							<p></p>
							<a href="#mu-reservation" class="mu-readmore-btn mu-reservation-btn">RÉSERVER UNE TABLE</a>
						</div>
						<!-- / Top slider content -->
					</div>
					<!-- / Top slider single slide --> 

					<!-- Top slider single slide -->
					<div class="mu-top-slider-single">
						<img src="assets/img/slider/3.jpeg" alt="img">
						<!-- Top slider content -->
						<div class="mu-top-slider-content">
							<span class="mu-slider-small-title">Étoilé en</span>
							<h2 class="mu-slider-title">Spécialité Turque</h2>
							<p></p>
							<a href="#mu-reservation" class="mu-readmore-btn mu-reservation-btn">RÉSERVER UNE TABLE</a>
						</div>
						<!-- / Top slider content -->
					</div>
					<!-- / Top slider single slide -->   

				</div>
			</div>
		</section>
		<!-- End slider  -->

		<section id="mu-reservation">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-reservation-area" style="color: white;">

							<div class="mu-title">
								<span class="mu-subtitle">Actualités</span>
							</div>
							<center>

								<style type="text/css">
									.class_actualite{
										font-family: "Open Sans", sans-serif;
									}
								</style>

							<?php
							// $mysqli = new mysqli('localhost','zle_lanad','fsmysci1','zfl2-zle_lanad'); //Obiwan2
							$mysqli = new mysqli('localhost','root',null,'zfl2-zle_lanad'); //Wamp

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

							//echo("<font color=green>Connexion BDD OK !</font>");

							$all_actualite="SELECT * FROM actualite where act_etat = 'L' order by act_datePublication desc;";
							//echo ($all_actualite);

							$result_actualite = $mysqli ->query($all_actualite);
							if ($result_actualite == false) //Erreur lors de l'execution de la rêquete
							{ // La requête a echoué
								echo "Error: La requête a echoué \n";
								echo "Errno:" . $mysqli->errno . "\n";
								echo "Error:" . $mysqli->error ."\n";
								exit();
							}
							else //la requête s'est bien exécutée (<=> couleur verte dans phpmyadmin)
							{
								//echo($result_actualite->num_rows); //Donne le bon nombre de lignes récupérées
								while ($personne = $result_actualite->fetch_assoc())
								{
									?>
									<h3 style="font-weight: 700; text-shadow: rgba(255, 255, 255, 0.1) 0px 4px 16px;" class="class_actualite"><?php echo (stripslashes($personne['act_titre'])); ?></h3>
									<h6 class="class_actualite">Ajouté par <?php echo (stripslashes($personne['cmpt_pseudo']). ' le ' . $personne['act_datePublication']); ?></h6>
									<h4><?php echo (stripslashes($personne['act_texte']). '<br/><br/>'); ?></h4>
									<hr/>
									<?php
								}
							}

							// On quitte la base
							$mysqli->close();
							
							?>
						</center>
						</div>
					</div>
				</div>
			</section>

			<!-- Start Restaurant Menu -->
			<section id="mu-restaurant-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="mu-restaurant-menu-area">

								<div class="mu-title">
									<span class="mu-subtitle">Découvrez</span>
									<h2>NOTRE MENU</h2>
								</div>

								<div class="mu-restaurant-menu-content">
									<ul class="nav nav-tabs mu-restaurant-menu">
										<li class="active"><a href="#breakfast" data-toggle="tab">Petits Déjeuners</a></li>
										<li><a href="#meals" data-toggle="tab">Repas</a></li>
										<li><a href="#drinks" data-toggle="tab">Boissons</a></li>
									</ul>

									<!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane fade in active" id="breakfast">
											<div class="mu-tab-content-area">
												<div class="row">

													<div class="col-md-6">
														<div class="mu-tab-content-left">
															<ul class="mu-menu-item-nav">
																<li>
																	<div class="media">
																		<div class="media-left">
																			<a href="#">
																				<img class="media-object" src="assets/img/menu/item-1.jpg" alt="img">
																			</a>
																		</div>
																		<div class="media-body">
																			<h4 class="media-heading"><a href="#">Burger</a></h4>
																			<span class="mu-menu-price">€7.25</span>
																			<p>Découvrez notre unique Burger, revisté à la façon italienne, du pain traditionnel aux de légumes napolitains.</p>
																		</div>
																	</div>
																</li>
															</ul>   
														</div>
													</div>

													<div class="col-md-6">
														<div class="mu-tab-content-right">
															<ul class="mu-menu-item-nav">                          
																<li>
																	<div class="media">
																		<div class="media-left">
																			<a href="#">
																				<img class="media-object" src="assets/img/menu/item-2.jpg" alt="img">
																			</a>
																		</div>
																		<div class="media-body">
																			<h4 class="media-heading"><a href="#">Crêpes italiennes</a></h4>
																			<span class="mu-menu-price">€2.95</span>
																			<p>De délicieuses crêpes italiano-bretonnes, offrent un délice sucré pour débuter la journée.</p>
																		</div>
																	</div>
																</li>                         
															</ul>   
														</div>
													</div>

												</div>
											</div>
										</div>

										<div class="tab-pane fade" id="meals">
											<div class="mu-tab-content-area">
												<div class="row">
													<div class="col-md-6">
														<div class="mu-tab-content-left">
															<ul class="mu-menu-item-nav">
																<li>
																	<div class="media">
																		<div class="media-left">
																			<a href="#">
																				<img class="media-object" src="assets/img/menu/item-3.jpg" alt="img">
																			</a>
																		</div>
																		<div class="media-body">
																			<h4 class="media-heading"><a href="#">Fenouille</a></h4>
																			<span class="mu-menu-price">€5.50</span>
																			<p>Plante herbacée, glabre, à odeur forte et pénétrante, enlacera parfaitement votre estomac et vous mettra de bonne humeur.</p>
																		</div>
																	</div>
																</li>
															</ul>   
														</div>
													</div>

													<div class="col-md-6">
														<div class="mu-tab-content-right">
															<ul class="mu-menu-item-nav">
																<li>
																	<div class="media">
																		<div class="media-left">
																			<a href="#">
																				<img class="media-object" src="assets/img/menu/item-4.jpg" alt="img">
																			</a>
																		</div>
																		<div class="media-body">
																			<h4 class="media-heading"><a href="#">Paella</a></h4>
																			<span class="mu-menu-price">€8.50</span>
																			<p>La paella, plat traditionnel de Valence est mise en valeur grâce aux succulentes sauces tomates italiennes.</p>
																		</div>
																	</div>
																</li>
															</ul>   
														</div>
													</div>

												</div>
											</div>
										</div>

										<div class="tab-pane fade" id="drinks">
											<div class="mu-tab-content-area">
												<div class="row">
													<div class="col-md-6">
														<div class="mu-tab-content-left">
															<ul class="mu-menu-item-nav">
																<li>
																	<div class="media">
																		<div class="media-left">
																			<a href="#">
																				<img class="media-object" src="assets/img/menu/item-9.jpg" alt="img">
																			</a>
																		</div>
																		<div class="media-body">
																			<h4 class="media-heading"><a href="#">Jus d'Orange</a></h4>
																			<span class="mu-menu-price">€0.85</span>
																			<p>Les meilleurs oranges d'outre-mer réunies en un verre au goût profond et renversant.</p>
																		</div>
																	</div>
																</li>
															</ul>   
														</div>
													</div>
													<div class="col-md-6">
														<div class="mu-tab-content-right">
															<ul class="mu-menu-item-nav">
																<li>
																	<div class="media">
																		<div class="media-left">
																			<a href="#">
																				<img class="media-object" src="assets/img/menu/item-10.jpg" alt="img">
																			</a>
																		</div>
																		<div class="media-body">
																			<h4 class="media-heading"><a href="#">Glacé à la fraise</a></h4>
																			<span class="mu-menu-price">€1.20</span>
																			<p>Un mélange sensationnel entre la fraicheur des glaçons et des fraises saisonnières.</p>
																		</div>
																	</div>
																</li>
															</ul>   
														</div>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Restaurant Menu -->

			<!-- Start Counter Section -->
			<section id="mu-counter">
				<div class="mu-counter-overlay">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="mu-counter-area">

									<ul class="mu-counter-nav">

										<li class="col-md-3 col-sm-3 col-xs-12">
											<div class="mu-single-counter">
												<h3><span class="counter-value" data-count="150">0</span><sup>+</sup></h3>
												<span>Déjeuners Frais</span>
											</div>
										</li>

										<li class="col-md-3 col-sm-3 col-xs-12">
											<div class="mu-single-counter">
												<h3><span class="counter-value" data-count="60">0</span><sup>+</sup></h3>
												<span>Déclieux Repas</span>
											</div>
										</li>

										<li class="col-md-3 col-sm-3 col-xs-12">
											<div class="mu-single-counter">
												<h3><span class="counter-value" data-count="45">0</span><sup>+</sup></h3>
												<span>Cafés Chauds</span>
											</div>
										</li>

										<li class="col-md-3 col-sm-3 col-xs-12">
											<div class="mu-single-counter">
												<h3><span class="counter-value" data-count="6560">0</span><sup>+</sup></h3>
												<span>Clients Satisfaits</span>
											</div>
										</li>

									</ul>

								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Counter Section --> 

			<!-- Start Reservation section -->
			<section id="mu-reservation">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="mu-reservation-area">

								<div class="mu-title">
									<span class="mu-subtitle">Faire une</span>
									<h2>Réservation</h2>
								</div>

								<div class="mu-reservation-content">

									<div class="col-md-6">
										<div class="mu-reservation-left">
											<form class="mu-reservation-form">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">                       
															<input type="text" class="form-control" placeholder="Nom Complet">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">                        
															<input type="email" class="form-control" placeholder="Email">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">                        
															<input type="text" class="form-control" placeholder="Numéro de Télphone">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<select class="form-control">
																<option value="0">Pour combien ?</option>
																<option value="1 Person">1 Personne</option>
																<option value="2 People">2 Personnes</option>
																<option value="3 People">3 Personnes</option>
																<option value="4 People">4 Personnes</option>
																<option value="5 People">5 Personnes</option>
																<option value="6 People">6 Personnes</option>
																<option value="7 People">7 Personnes</option>
																<option value="8 People">8 Personnes</option>
																<option value="9 People">9 Personnes</option>
																<option value="10 People">10 Personnes</option>
															</select>                      
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<input type="text" class="form-control" id="datepicker" placeholder="Date">              
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<textarea class="form-control" cols="30" rows="10" placeholder="Votre Message"></textarea>
														</div>
													</div>
													<button type="submit" class="mu-readmore-btn">FAIRE UNE RÉSERVATION</button>
												</div>
											</form>    
										</div>
									</div>

									<div class="col-md-5 col-md-offset-1">
										<div class="mu-reservation-right">
											<div class="mu-opening-hour">
												<h2>Heures d'ouverture</h2>
												<ul class="list-unstyled">
													<li>
														<p>Lundi &amp; Mardi</p>
														<p>9:00 - 16:00</p>
													</li>
													<li>
														<p>Mercredi &amp; Jeudi</p>
														<p>9:00 - Minuit</p>
													</li>
													<li>
														<p>Vendredi &amp; Samedi</p>
														<p>9:00 - Minuit</p>
													</li>
													<li>
														<p>Dimanche</p>
														<p>9:00 - 23:00</p>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>  
			<!-- End Reservation section -->

			<!-- Start Gallery -->
			<section id="mu-gallery">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="mu-gallery-area">

								<div class="mu-title">
									<span class="mu-subtitle">Découvrez</span>
									<h2>Notre Galerie</h2>
								</div>

								<div class="mu-gallery-content">

									<!-- Start gallery image -->
									<div class="mu-gallery-body">
										<!-- start single gallery image -->
										<div class="mu-single-gallery col-md-4">
											<div class="mu-single-gallery-item">
												<figure class="mu-single-gallery-img">
													<a class="mu-imglink" href="assets/img/gallery/1.jpg">
														<img alt="img" src="assets/img/gallery/1.jpg">
														<div class="mu-single-gallery-info">
															<img class="mu-view-btn" src="assets/img/plus.png" alt="plus icon img">
														</div> 
													</a>
												</figure>            
											</div>
										</div>
										<!-- End single gallery image -->

										<!-- start single gallery image -->
										<div class="mu-single-gallery col-md-4">
											<div class="mu-single-gallery-item">
												<figure class="mu-single-gallery-img">
													<a class="mu-imglink" href="assets/img/gallery/2.jpg">
														<img alt="img" src="assets/img/gallery/2.jpg">
														<div class="mu-single-gallery-info">
															<img class="mu-view-btn" src="assets/img/plus.png" alt="plus icon img">
														</div> 
													</a>
												</figure>            
											</div>
										</div>               
										<!-- End single gallery image -->

										<!-- start single gallery image -->
										<div class="mu-single-gallery col-md-4">                  
											<div class="mu-single-gallery-item">
												<figure class="mu-single-gallery-img">
													<a class="mu-imglink" href="assets/img/gallery/3.jpg">
														<img alt="img" src="assets/img/gallery/3.jpg">
														<div class="mu-single-gallery-info">
															<img class="mu-view-btn" src="assets/img/plus.png" alt="plus icon img">
														</div> 
													</a>
												</figure>            
											</div>
										</div>               
										<!-- End single gallery image -->

										<!-- start single gallery image -->
										<div class="mu-single-gallery col-md-4">                  
											<div class="mu-single-gallery-item">
												<figure class="mu-single-gallery-img">
													<a class="mu-imglink" href="assets/img/gallery/4.jpg">
														<img alt="img" src="assets/img/gallery/4.jpg">
														<div class="mu-single-gallery-info">
															<img class="mu-view-btn" src="assets/img/plus.png" alt="plus icon img">
														</div> 
													</a>
												</figure>            
											</div>
										</div>
										<!-- End single gallery image -->

										<!-- start single gallery image -->
										<div class="mu-single-gallery col-md-4">                  
											<div class="mu-single-gallery-item">
												<figure class="mu-single-gallery-img">
													<a class="mu-imglink" href="assets/img/gallery/5.jpg">
														<img alt="img" src="assets/img/gallery/5.jpg">
														<div class="mu-single-gallery-info">
															<img class="mu-view-btn" src="assets/img/plus.png" alt="plus icon img">
														</div> 
													</a>
												</figure>            
											</div>
										</div>               
										<!-- End single gallery image -->  

										<!-- start single gallery image -->
										<div class="mu-single-gallery col-md-4">                  
											<div class="mu-single-gallery-item">
												<figure class="mu-single-gallery-img">
													<a class="mu-imglink" href="assets/img/gallery/6.jpg">
														<img alt="img" src="assets/img/gallery/6.jpg">
														<div class="mu-single-gallery-info">
															<img class="mu-view-btn" src="assets/img/plus.png" alt="plus icon img">
														</div> 
													</a>
												</figure>            
											</div>
										</div>
										<!-- End single gallery image -->

										<!-- start single gallery image -->
										<div class="mu-single-gallery col-md-4">                  
											<div class="mu-single-gallery-item">
												<figure class="mu-single-gallery-img">
													<a class="mu-imglink" href="assets/img/gallery/7.jpg">
														<img alt="img" src="assets/img/gallery/7.jpg">
														<div class="mu-single-gallery-info">
															<img class="mu-view-btn" src="assets/img/plus.png" alt="plus icon img">
														</div> 
													</a>
												</figure>            
											</div>
										</div>               
										<!-- End single gallery image -->

										<!-- start single gallery image -->
										<div class="mu-single-gallery col-md-4">                  
											<div class="mu-single-gallery-item">
												<figure class="mu-single-gallery-img">
													<a class="mu-imglink" href="assets/img/gallery/8.jpg">
														<img alt="img" src="assets/img/gallery/8.jpg">
														<div class="mu-single-gallery-info">
															<img class="mu-view-btn" src="assets/img/plus.png" alt="plus icon img">
														</div> 
													</a>
												</figure>            
											</div>
										</div>               
										<!-- End single gallery image -->

										<!-- start single gallery image -->
										<div class="mu-single-gallery col-md-4">                  
											<div class="mu-single-gallery-item">
												<figure class="mu-single-gallery-img">
													<a class="mu-imglink" href="assets/img/gallery/9.jpg">
														<img alt="img" src="assets/img/gallery/9.jpg">
														<div class="mu-single-gallery-info">
															<img class="mu-view-btn" src="assets/img/plus.png" alt="plus icon img">
														</div> 
													</a>
												</figure>            
											</div>
										</div>
										<!-- End single gallery image -->  

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Gallery -->

			<!-- Start Client Testimonial section -->
			<section id="mu-client-testimonial">
				<div class="mu-overlay">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="mu-client-testimonial-area">

									<div class="mu-title">
										<span class="mu-subtitle">Avis</span>
										<h2>Que Pensent les Clients</h2>
									</div>

									<!-- testimonial content -->
									<div class="mu-testimonial-content">
										<!-- testimonial slider -->
										<ul class="mu-testimonial-slider">
											<li>
												<div class="mu-testimonial-single">                   
													<div class="mu-testimonial-info">
														<p>De l'entrée au dessert, en passant par le vin, rien n'échappe à Simon qui connaît très bien ses produits ! Les explications de plat donne envie de tout goûter. Excellent repas, la burrata tout simplement à tomber, et le jambon de parme.... Je n'ai pas de mot. On y a fait le plein de saveur italienne... On y retournera avec grand plaisir !</p>
													</div>
													<div class="mu-testimonial-bio">
														<p>- Arvid Muller</p>                      
													</div>
												</div>
											</li>
											<li>
												<div class="mu-testimonial-single">                   
													<div class="mu-testimonial-info">
														<p>Excellent restaurant italien, sans pizzas ! Deux fois que j’y vais et jamais déçu. Tigelles très bonnes, pâtes excellentes et l’entrée jambon/fromage est à tomber ! Les saveurs et la texture sont vraiment au dessus du lot (surtout pour pâtes et jambon/fromage). Restaurant petit par contre donc penser bien à réserver. J’y retournerai avec plaisir.</p>
													</div>
													<div class="mu-testimonial-bio">
														<p>- Danielle Davidson</p>                      
													</div>
												</div>
											</li>
											<li>
												<div class="mu-testimonial-single">                   
													<div class="mu-testimonial-info">
														<p>Nous avons dejeuner avec un groupe d'ami en passant par hasard devant le resto, un acceuil chaleureux on prend le temps de prendre la commande et de nous conseiller. Je n'ai pas laisser une miette dans mon assiette.</p>
													</div>
													<div class="mu-testimonial-bio">
														<p>- Mylla Henri</p>                      
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Client Testimonial section -->

			<!-- Start Chef Section -->
			<section id="mu-chef">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="mu-chef-area">

								<div class="mu-title">
									<span class="mu-subtitle">Notre Équipe</span>
									<h2>MAÎTRE CUISINIER</h2>
								</div>

								<div class="mu-chef-content">
									<ul class="mu-chef-nav">
										<li>
											<div class="mu-single-chef">
												<figure class="mu-single-chef-img">
													<img src="assets/img/chef/chef-1.jpg" alt="chef img">
												</figure>
												<div class="mu-single-chef-info">
													<h4>Simon Jonson</h4>
													<span>Chef Cuisine</span>
												</div>
												<div class="mu-single-chef-social">
													<a href="#"><i class="fa fa-facebook"></i></a>
													<a href="#"><i class="fa fa-twitter"></i></a>
													<a href="#"><i class="fa fa-google-plus"></i></a>
													<a href="#"><i class="fa fa-linkedin"></i></a>
												</div>
											</div>
										</li>

										<li>
											<div class="mu-single-chef">
												<figure class="mu-single-chef-img">
													<img src="assets/img/chef/chef-2.jpg" alt="chef img">
												</figure>
												<div class="mu-single-chef-info">
													<h4>Kelly Wenzel</h4>
													<span>Chef Pizza</span>
												</div>
												<div class="mu-single-chef-social">
													<a href="#"><i class="fa fa-facebook"></i></a>
													<a href="#"><i class="fa fa-twitter"></i></a>
													<a href="#"><i class="fa fa-google-plus"></i></a>
													<a href="#"><i class="fa fa-linkedin"></i></a>
												</div>
											</div>
										</li>

										<li>
											<div class="mu-single-chef">
												<figure class="mu-single-chef-img">
													<img src="assets/img/chef/chef-3.jpg" alt="chef img">
												</figure>
												<div class="mu-single-chef-info">
													<h4>Greg Hong</h4>
													<span>Chef Grill</span>
												</div>
												<div class="mu-single-chef-social">
													<a href="#"><i class="fa fa-facebook"></i></a>
													<a href="#"><i class="fa fa-twitter"></i></a>
													<a href="#"><i class="fa fa-google-plus"></i></a>
													<a href="#"><i class="fa fa-linkedin"></i></a>
												</div>
											</div>
										</li>

										<li>
											<div class="mu-single-chef">
												<figure class="mu-single-chef-img">
													<img src="assets/img/chef/chef-4.jpg" alt="chef img">
												</figure>
												<div class="mu-single-chef-info">
													<h4>Marty Fukuda</h4>
													<span>Chef Burger</span>
												</div>
												<div class="mu-single-chef-social">
													<a href="#"><i class="fa fa-facebook"></i></a>
													<a href="#"><i class="fa fa-twitter"></i></a>
													<a href="#"><i class="fa fa-google-plus"></i></a>
													<a href="#"><i class="fa fa-linkedin"></i></a>
												</div>
											</div>
										</li>  

										<li>
											<div class="mu-single-chef">
												<figure class="mu-single-chef-img">
													<img src="assets/img/chef/chef-5.jpg" alt="chef img">
												</figure>
												<div class="mu-single-chef-info">
													<h4>Simon Jonson</h4>
													<span>Chef Cuisine</span>
												</div>
												<div class="mu-single-chef-social">
													<a href="#"><i class="fa fa-facebook"></i></a>
													<a href="#"><i class="fa fa-twitter"></i></a>
													<a href="#"><i class="fa fa-google-plus"></i></a>
													<a href="#"><i class="fa fa-linkedin"></i></a>
												</div>
											</div>
										</li>

										<li>
											<div class="mu-single-chef">
												<figure class="mu-single-chef-img">
													<img src="assets/img/chef/chef-1.jpg" alt="chef img">
												</figure>
												<div class="mu-single-chef-info">
													<h4>Kelly Wenzel</h4>
													<span>Chef Pizza</span>
												</div>
												<div class="mu-single-chef-social">
													<a href="#"><i class="fa fa-facebook"></i></a>
													<a href="#"><i class="fa fa-twitter"></i></a>
													<a href="#"><i class="fa fa-google-plus"></i></a>
													<a href="#"><i class="fa fa-linkedin"></i></a>
												</div>
											</div>
										</li>

										<li>
											<div class="mu-single-chef">
												<figure class="mu-single-chef-img">
													<img src="assets/img/chef/chef-2.jpg" alt="chef img">
												</figure>
												<div class="mu-single-chef-info">
													<h4>Greg Hong</h4>
													<span>Chef Grill</span>
												</div>
												<div class="mu-single-chef-social">
													<a href="#"><i class="fa fa-facebook"></i></a>
													<a href="#"><i class="fa fa-twitter"></i></a>
													<a href="#"><i class="fa fa-google-plus"></i></a>
													<a href="#"><i class="fa fa-linkedin"></i></a>
												</div>
											</div>
										</li>

										<li>
											<div class="mu-single-chef">
												<figure class="mu-single-chef-img">
													<img src="assets/img/chef/chef-3.jpg" alt="chef img">
												</figure>
												<div class="mu-single-chef-info">
													<h4>Marty Fukuda</h4>
													<span>Chef Burger</span>
												</div>
												<div class="mu-single-chef-social">
													<a href="#"><i class="fa fa-facebook"></i></a>
													<a href="#"><i class="fa fa-twitter"></i></a>
													<a href="#"><i class="fa fa-google-plus"></i></a>
													<a href="#"><i class="fa fa-linkedin"></i></a>
												</div>
											</div>
										</li>                      
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Chef Section -->



			<!-- Start Contact section -->
			<section id="mu-contact">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="mu-contact-area">

								<div class="mu-title">
									<span class="mu-subtitle">Entrez en Contact</span>
									<h2>Informations</h2>
								</div>

								<div class="mu-contact-content">
									<div class="row">

										<div class="col-md-6">
											<div class="mu-contact-left">
												<!-- Email message div -->
												<div id="form-messages"></div>
												<!-- Start contact form -->
												<form id="ajax-contact" method="post" action="mailer.php" class="mu-contact-form">
													<div class="form-group">
														<label for="name">Votre Nom</label>
														<input type="text" class="form-control" id="name" name="name" placeholder="Nom" required>
													</div>
													<div class="form-group">
														<label for="email">Adresse Email</label>
														<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
													</div>                      
													<div class="form-group">
														<label for="subject">Objet</label>
														<input type="text" class="form-control" id="subject" name="subject" placeholder="Objet" required>
													</div>
													<div class="form-group">
														<label for="message">Message</label>                        
														<textarea class="form-control" id="message" name="message"  cols="30" rows="10" placeholder="Entrez Votre Message" required></textarea>
													</div>                      
													<button type="submit" class="mu-send-btn">Envoyer Message</button>
												</form>
											</div>
										</div>

										<div class="col-md-6">
											<div class="mu-contact-right">
												<div class="mu-contact-widget">
													<h3>Adresse du Restaurant</h3>
													<p></p>
													<address>
														<p><i class="fa fa-phone"></i> 02 98 56 14 37</p>
														<p><i class="fa fa-envelope-o"></i>contact@markups.io</p>
														<p><i class="fa fa-map-marker"></i>44 Rue de Rivoli, 75004 Paris, Île-de-France, France</p>
													</address>
												</div>
												<div class="mu-contact-widget">
													<h3>Heures d'ouverture</h3>                      
													<address>
														<p><span>Lundi - Mardi</span> 9:00 à 00:00</p>
														<p><span>Samedi</span> 9.00 à 22:00</p>
														<p><span>Dimanche</span> 10.00 à 00:00</p>
													</address>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Contact section -->

			<!-- Start Map section -->
			<section id="mu-map">
				<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9207.358598888495!2d-85.64847801496286!3d30.183918972289003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x2320479d70eb6202!2sDillard&#39;s!5e0!3m2!1sbn!2sbd!4v1462359735720" width="100%" height="100%" frameborder="0"allowfullscreen></iframe> -->
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d656.2709228064251!2d2.3547145881428375!3d48.85661299869909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1d51c4b471%3A0x923e699db3364a43!2s44%20Rue%20de%20Rivoli%2C%2075004%20Paris!5e0!3m2!1sen!2sfr!4v1570794069126!5m2!1sen!2sfr" width="100%" height="100%" frameborder="0"allowfullscreen=""></iframe>
			</section>
			<!-- End Map section -->

			<!-- Start Footer -->
			<footer id="mu-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="mu-footer-area">
								<div class="mu-footer-social">
									<a href="#"><span class="fa fa-facebook"></span></a>
									<a href="#"><span class="fa fa-twitter"></span></a>
									<a href="#"><span class="fa fa-google-plus"></span></a>
									<a href="#"><span class="fa fa-linkedin"></span></a>
									<a href="#"><span class="fa fa-youtube"></span></a>
								</div>
								<div class="mu-footer-copyright">
									<p>&copy; Copyright <a rel="nofollow" href="http://markups.io">markups.io</a>. All right reserved.</p>
								</div>         
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- End Footer -->

			<!-- jQuery library -->
			<script src="assets/js/jquery.min.js"></script>  
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="assets/js/bootstrap.js"></script>   
			<!-- Slick slider -->
			<script type="text/javascript" src="assets/js/slick.js"></script>
			<!-- Counter -->
			<script type="text/javascript" src="assets/js/simple-animated-counter.js"></script>
			<!-- Gallery Lightbox -->
			<script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
			<!-- Date Picker -->
			<script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script> 
			<!-- Ajax contact form  -->
			<script type="text/javascript" src="assets/js/app.js"></script>

			<!-- Custom js -->
			<script src="assets/js/custom.js"></script> 

		</body>
		</html>