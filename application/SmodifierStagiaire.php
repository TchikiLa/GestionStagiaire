<?php

include 'class/conf.php';
$errors = array();
/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

$idStagiaire=$_GET['idStagiaire'];
$req2 = "SELECT * FROM stagiaire WHERE `idStagiaire`='$idStagiaire'";
$res2=mysqli_query($conn,$req2);
$tab2=mysqli_fetch_assoc($res2);

if (isset($_POST['valider'])) {
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$adress=$_POST['adress'];
$email=$_POST['email'];
$tel=$_POST['tel']; 
$niveau=$_POST['niveau'];
$cv_tmp=$_FILES['file']['tmp_name'];
$cv="cv/".$idStagiaire.'.jpg';
move_uploaded_file($cv_tmp,$cv);
$journ = $_POST['dd'];
$moisn = $_POST['mm'];
$annen = $_POST['yyyy'];
$dateNaissance=$annen.'-'.$moisn.'-'.$journ;
$sexe=$_POST['sexe'];
$denominationOrganisme=$_POST['denomorganism'];
$adressOrganisme=$_POST['adressorganism'];
$specialite=$_POST['specialite'];
$typeStage=$_POST['typestage'];
$journ1 = $_POST['dd1'];
$moisn1 = $_POST['mm1'];
$annen1 = $_POST['yyyy1'];
$dateDepot=$annen1.'-'.$moisn1.'-'.$journ1;


	if(count($errors) == 0){
	
	$req="UPDATE `stagiaire` SET `nom`='$nom',`prenom`='$prenom',`dateNaissance`='$dateNaissance',`sexe`='$sexe',`email`='$email',`tel`='$tel',`adress`='$adress',`niveau`='$niveau',`cv`='$cv',`denominationOrganisme`='$denominationOrganisme',`adressOrganisme`='$adressOrganisme',`libelleSpecialite`='$specialite',`typeStage`='$typeStage',`dateDepot`='$dateDepot' WHERE `idStagiaire`='$idStagiaire'";
	$res=mysqli_query($conn,$req);
	echo "<script type='text/javascript'>alert('Le stagiaire est Modifier ');
window.location='tout_stagiaire.php';
</script>";

	
	}
}
?>

<!DOCTYPE html>
<!-- Template Name: Rapido - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.0 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>Gestion Stagiaire SEAAL</title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,200,100,800' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/plugins/iCheck/skins/all.css">
		<link rel="stylesheet" href="assets/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
		<link rel="stylesheet" href="assets/plugins/animate.css/animate.min.css">
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR SUBVIEW CONTENTS -->
		<link rel="stylesheet" href="assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">
		<link rel="stylesheet" href="assets/plugins/owl-carousel/owl-carousel/owl.theme.css">
		<link rel="stylesheet" href="assets/plugins/owl-carousel/owl-carousel/owl.transitions.css">
		<link rel="stylesheet" href="assets/plugins/summernote/dist/summernote.css">
		<link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar/fullcalendar.css">
		<link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
		<link rel="stylesheet" href="assets/plugins/bootstrap-select/bootstrap-select.min.css">
		<link rel="stylesheet" href="assets/plugins/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
		<link rel="stylesheet" href="assets/plugins/DataTables/media/css/DT_bootstrap.css">
		<link rel="stylesheet" href="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
		<link rel="stylesheet" href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css">
		<!-- end: CSS REQUIRED FOR THIS SUBVIEW CONTENTS-->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE CSS -->
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/styles-responsive.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-default.css" type="text/css" id="skin_color">
		<link rel="stylesheet" href="assets/css/print.css" type="text/css" media="print"/>
		<!-- end: CORE CSS -->
		<link rel="shortcut icon" href="favicon.ico" />
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body>
		<!-- start: SLIDING BAR (SB) -->
		
		<!-- end: SLIDING BAR -->
		<div class="main-wrapper">
			<!-- start: TOPBAR -->
			<header class="topbar navbar navbar-inverse navbar-fixed-top inner" style="height: 45px;">
				<!-- start: TOPBAR CONTAINER -->
				<div class="container">
					<div class="navbar-header">
						
						<!-- start: LOGO -->
						<a class="navbar-brand"  style="left: 40px;">
							<img src="assets/images/seaal.jpg" alt="SEAAL"/>
						</a>
						<!-- end: LOGO -->
					</div>
					
						<!-- start: TOP NAVIGATION MENU -->
						
							<!-- start: USER DROPDOWN -->
							
							<!-- end: USER DROPDOWN -->
							
						<!-- end: TOP NAVIGATION MENU -->
					
				<!-- end: TOPBAR CONTAINER -->
			</header>
			<!-- end: TOPBAR -->
			<!-- start: PAGESLIDE LEFT -->
			<a class="closedbar inner hidden-sm hidden-xs" href="#">
			</a>
			<nav id="pageslide-left" class="pageslide inner">
				<div class="navbar-content">
					<!-- start: SIDEBAR -->
					<div class="main-navigation left-wrapper transition-left">
						<div class="navigation-toggler hidden-sm hidden-xs">
							<a href="#main-navbar" class="sb-toggle-left">
							</a>
						</div>
						
						<!-- start: MAIN NAVIGATION MENU -->
						<ul class="main-navigation-menu">
							<li class="active open">
								<a href="secretaire.html"><i class="fa fa-home"></i> <span class="title"> Acceuil</span> </a>
							</li>
							<li>
								<a href="javascript:void(0)"><i class="fa fa-graduation-cap"></i> <span class="title"> Stagiaire </span><i class="icon-arrow"></i> </a>
								<ul class="sub-menu">
									<li>
										
											<li>
												<a href="SajouterStagiaire.html">
													<i class="fa fa-edit"></i> Ajouter Stagiaire
												</a>
											</li>
											<li>
												<a href="Stout_stagiaire.php">
													<i class="fa-list-ul"></i>Tout les stagiaires
												</a>
											</li>
											<li>
												<a href="Ssagiaire_non_affecte.php">
													<i class="fa-list-ul"></i>Stagiaires non affecté
												</a>
											</li>
											<li>
												<a href="Sstagiaire_affecter.php">
													<i class="fa-list-ul"></i>Stagiaires affecté
												</a>
											</li>
											<li>
												<a href="Sstagiaire_archive.php">
													<i class="fa-list-ul"></i>Stagiaires En archives
												</a>
											</li>
										
									</li>
								</ul>
							</li>
							<li>
								<a href="javascript:void(0)"><i class="fa fa-copy"></i> <span class="title"> Sujet </span><i class="icon-arrow"></i> </a>
								<ul class="sub-menu">
								
									<li>
										<a href="Stout_sujet.php">
											<i class="fa-list-ul"></i> Tout les sujet 
										</a>
									</li>
								</ul>	
							</li>
							
							<li>
								<a href="javascript:void(0)"><i class="fa fa-pencil-square-o"></i> <span class="title"> Abscence </span><i class="icon-arrow"></i> </a>
								<ul class="sub-menu">
									<li>
										<a href="Smarquerabscence.php">
											<span class="title">Marquer l'absence</span>
										</a>
									</li>
									<li>
										<a href="Slist_abscence.php">
											<span class="title">Liste d'absence</span>
										</a>
									</li>
								</ul>
							</li>
							
							
							<li>
								<a href="Smessagerie.php"><i class="fa fa-envelope"></i> <span class="title">Envoyer email</span> </a>
							</li>
							
						</ul>
						<!-- end: MAIN NAVIGATION MENU -->
					</div>
					<!-- end: SIDEBAR -->
				</div>
				<div class="slide-tools">
					<div class="col-xs-6 text-left no-padding">
						<a class="btn btn-sm status" href="#">
							Statut <i class="fa fa-dot-circle-o text-green"></i> <span>Online</span>
						</a>
					</div>
					<div class="col-xs-6 text-right no-padding">
						<a class="btn btn-sm log-out text-right" href="login.html">
							<i class="fa fa-power-off"></i> Déconnexion
						</a>
					</div>
				</div>
			</nav>
			<!-- end: PAGESLIDE LEFT -->
			<!-- start: PAGESLIDE RIGHT -->
			
			<!-- end: PAGESLIDE RIGHT -->
			<!-- start: MAIN CONTAINER -->
			<div class="main-container inner">
				<!-- start: PAGE -->
				<div class="main-content">
					<!-- start: PANEL CONFIGURATION MODAL FORM -->
					
					<!-- /.modal -->
					<!-- end: SPANEL CONFIGURATION MODAL FORM -->
					<div class="container">
						<!-- start: PAGE HEADER -->
						<!-- start: TOOLBAR -->
						<div class="toolbar row">
							<div class="col-sm-6 hidden-xs">
								<div class="page-header">
									<h1>Gestion Stagiaires </h1>
								</div>
							</div>
							<div class="col-sm-6 col-xs-12">
								
								<div class="toolbar-tools pull-right">
									<!-- start: TOP NAVIGATION MENU -->
									<ul class="nav navbar-right">
										<!-- start: TO-DO DROPDOWN -->
										<li class="dropdown">
											<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
												<i class="fa fa-plus"></i> AJOUTER
												
											</a>
											<ul class="dropdown-menu dropdown-light dropdown-subview">
												
												<li class="dropdown-header">
													Abscence
												</li>
												<li>
													<a href="Smarquerabscence.php" class="new-event"><span class="fa-stack"> <i class="fa fa-calendar-o fa-stack-1x fa-lg"></i> <i class="fa fa-plus fa-stack-1x stack-right-bottom text-danger"></i> </span> Marquer abscence</a>
												</li>
						

												<li class="dropdown-header">
													Stagiaire
												</li>
												<li>
													<a href="SajouterStagiaire.html" class="new-contributor"><span class="fa-stack"> <i class="fa fa-user fa-stack-1x fa-lg"></i> <i class="fa fa-plus fa-stack-1x stack-right-bottom text-danger"></i> </span> Ajouter stagiaire</a>
												</li>
												<li>
													<a href="Stout_stagiaire.php" class="show-contributors"><span class="fa-stack"> <i class="fa fa-user fa-stack-1x fa-lg"></i> <i class="fa fa-share fa-stack-1x stack-right-bottom text-danger"></i> </span> Liste stagiaire</a>
												</li>
											</ul>
										</li>
										<li class="dropdown">
											<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="messagerie.php">
												 <i class="fa fa-envelope"></i> MESSAGES
											</a>
											<ul class="dropdown-menu dropdown-light dropdown-messages">
												
												
												<li class="view-all">
													<a href="#">
														Voir Touts
													</a>
												</li>
											</ul>
										</li>
										
									</ul>
									<!-- end: TOP NAVIGATION MENU -->
								</div>
							</div>
						</div>

						<!-- end: TOOLBAR -->
						<!-- end: PAGE HEADER -->
						<!-- start: BREADCRUMB -->
						<div class="row">
							<div class="col-md-12">
								<ol class="breadcrumb">
									<li>
										<a href="#">
											Tableau de bord
										</a>
									</li>
									<li class="active">
										Modifier Stagiaire
									</li>
								</ol>
							</div>
						</div>
						<!-- end: BREADCRUMB -->
						<!-- start: PAGE CONTENT -->
						<div class="row">
							<div class="col-md-12">
								<!-- start: FORM VALIDATION 1 PANEL -->
								<div class="panel panel-white">
									<div class="panel-heading">
										<h4 class="panel-title">Modifier <span class="text-bold">Stagiair</span></h4>
										
									</div>
									<div class="panel-body">
										
										<form  role="form" id="form" enctype="multipart/form-data" method="POST">
											<div class="row">
												<div class="col-md-12">
													<div class="errorHandler alert alert-danger no-display">
														<i class="fa fa-times-sign"></i> Vous avez des erreurs de formulaire. S'il vous plaît vérifier ci-dessous.
													</div>
													<div class="successHandler alert alert-success no-display">
														<i class="fa fa-ok"></i> Votre validation de formulaire est réussie!
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															Nom <span class="symbol required"></span>
														</label>
														<input type="text" placeholder="Entrer le Nom du stagiaire " class="form-control" id="nom" name="nom" value="<?php echo $tab2['nom'];  ?>">
													</div>
													<div class="form-group">
														<label class="control-label">
															Prénom <span class="symbol required"></span>
														</label>
														<input type="text" placeholder="Entrer le prénom du stagiaire " class="form-control" id="prenom" name="prenom" value="<?php echo $tab2['prenom'];  ?>" >
													</div>
													<div class="form-group">
														<label class="control-label">
															Adresse <span class="symbol required"></span>
														</label>
														<input type="text" placeholder="Entrer l'adress du stagiaire" class="form-control" id="adress" name="adress" value="<?php echo $tab2['adress'];  ?>">
													</div>
													<div class="form-group">
														<label class="control-label">
															Address Email <span class="symbol required"></span>
														</label>
														<input type="email" placeholder="Entrer l'adress email du stagiaire" class="form-control" id="email" name="email" value="<?php echo $tab2['email'];  ?>">
													</div>
													<div class="form-group">
														<label class="control-label">
															Tel <span class="symbol required"></span>
														</label>
														<input type="text" placeholder="Entrer le numéro de téléphone du stagiaire" class="form-control" id="tel" name="tel" value="<?php echo $tab2['tel'];  ?>">
													</div>
													<div class="form-group">
														<label class="control-label">
															Niveau <span class="symbol required"></span>
														</label>
														<select class="form-control" id="niveau" name="niveau">
															<option value="">sélectionné</option>
															<option value="BAC">BAC</option>
															<option value="BAC+1">BAC+1</option>
															<option value="BAC+2">BAC+2</option>
															<option value="BAC+3">BAC+3</option>
															<option value="BAC+4">BAC+4</option>
															<option value="BAC+5">BAC+5</option>
															<option value="autre">autre</option>
														</select>
													</div>
													<div class="form-group">
														<div class="col-sm-12">
																<label class="control-label">
															CV <span class="symbol required"></span>
														</label>
																<div data-provides="fileupload" class="fileupload fileupload-new">
																	<span class="btn btn-file btn-light-grey"><i class="fa fa-folder-open-o"></i> <span class="fileupload-new">sélectionner fichier</span><span class="fileupload-exists">Changement</span>
																		<input type="file" name="file">
																	</span>
																	<span class="fileupload-preview"></span>
																	<a data-dismiss="fileupload" class="close fileupload-exists float-none" href="#">
																		&times;
																	</a>
																</div>
														</div>
													</div>
													
												</div>
												<div class="col-md-6">
													<div class="form-group connected-group">
														<label class="control-label">
															Date de naissance <span class="symbol required"></span>
														</label>
														<div class="row">
															<div class="col-md-3">
																<select name="dd" id="dd" class="form-control" >
																	<option value="">DD</option>
																	<option value="01">1</option>
																	<option value="02">2</option>
																	<option value="03">3</option>
																	<option value="04">4</option>
																	<option value="05">5</option>
																	<option value="06">6</option>
																	<option value="07">7</option>
																	<option value="08">8</option>
																	<option value="09">9</option>
																	<option value="10">10</option>
																	<option value="11">11</option>
																	<option value="12">12</option>
																	<option value="13">13</option>
																	<option value="14">14</option>
																	<option value="15">15</option>
																	<option value="16">16</option>
																	<option value="17">17</option>
																	<option value="18">18</option>
																	<option value="19">19</option>
																	<option value="20">20</option>
																	<option value="21">21</option>
																	<option value="22">22</option>
																	<option value="23">23</option>
																	<option value="24">24</option>
																	<option value="25">25</option>
																	<option value="26">26</option>
																	<option value="27">27</option>
																	<option value="28">28</option>
																	<option value="29">29</option>
																	<option value="30">30</option>
																	<option value="31">31</option>
																</select>
															</div>
															<div class="col-md-3">
																<select name="mm" id="mm" class="form-control" >
																	<option value="">MM</option>
																	<option value="01">1</option>
																	<option value="02">2</option>
																	<option value="03">3</option>
																	<option value="04">4</option>
																	<option value="05">5</option>
																	<option value="06">6</option>
																	<option value="07">7</option>
																	<option value="08">8</option>
																	<option value="09">9</option>
																	<option value="10">10</option>
																	<option value="11">11</option>
																	<option value="12">12</option>
																</select>
															</div>
															<div class="col-md-3">
																<input type="text" placeholder="YYYY" id="yyyy" name="yyyy" class="form-control">
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label">
															Sexe <span class="symbol required"></span>
														</label>
														<div>
															<label class="radio-inline">
																<input type="radio" class="grey" value="femme" name="sexe" id="sexe_femme">
																Femme
															</label>
															<label class="radio-inline">
																<input type="radio" class="grey" value="Homme" name="sexe"  id="sexe_homme">
																Homme
															</label>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label">
															Dénomination organisme <span class="symbol required"></span>
														</label>
														<input type="text" placeholder="Entrer la dénomination de l'organisme" class="form-control" id="denomorganism" name="denomorganism" value="<?php echo $tab2['denominationOrganisme'];  ?>">
													</div>
													<div class="form-group">
														<label class="control-label">
															Adresse organisme <span class="symbol required"></span>
														</label>
														<input type="text" placeholder="Entrer l'identifiant du stagiaire" class="form-control" id="adressorganism" name="adressorganism" value="<?php echo $tab2['adressOrganisme'];  ?>">
													</div>
													
													<div class="form-group">
														<label class="control-label">
															Type Stage <span class="symbol required"></span>
														</label>
														<select class="form-control" id="typestage" name="typestage">
															<option value="">Sélectionner type</option>
															<option value="PFE lucence">PFE licence</option>
															<option value="PFE Master">PFE Master</option>
															<option value="Experiance">Experiance</option>
															<option value="Découverte">Découverte</option>
															
														</select>
													</div>
													<div class="form-group">
														<label class="control-label">
															Spécialité <span class="symbol required"></span>
														</label>
														<select class="form-control" id="specialite" name="specialite">
															<option value="">Sélectionner Spécialité</option>
															<option value="Informatique">Informatique</option>
															<option value="Electronique">Electronique</option>
															<option value="Mécanique">Mécanique</option>
															<option value="Hydrolique">Hydrolique</option>
														</select>
													</div>
													<div class="form-group connected-group">
														<label class="control-label">
															Date de Depot <span class="symbol required"></span>
														</label>
														<div class="row">
															<div class="col-md-3">
																<select name="dd1" id="dd1" class="form-control" >
																	<option value="">DD</option>
																	<option value="01">1</option>
																	<option value="02">2</option>
																	<option value="03">3</option>
																	<option value="04">4</option>
																	<option value="05">5</option>
																	<option value="06">6</option>
																	<option value="07">7</option>
																	<option value="08">8</option>
																	<option value="09">9</option>
																	<option value="10">10</option>
																	<option value="11">11</option>
																	<option value="12">12</option>
																	<option value="13">13</option>
																	<option value="14">14</option>
																	<option value="15">15</option>
																	<option value="16">16</option>
																	<option value="17">17</option>
																	<option value="18">18</option>
																	<option value="19">19</option>
																	<option value="20">20</option>
																	<option value="21">21</option>
																	<option value="22">22</option>
																	<option value="23">23</option>
																	<option value="24">24</option>
																	<option value="25">25</option>
																	<option value="26">26</option>
																	<option value="27">27</option>
																	<option value="28">28</option>
																	<option value="29">29</option>
																	<option value="30">30</option>
																	<option value="31">31</option>
																</select>
															</div>
															<div class="col-md-3">
																<select name="mm1" id="mm1" class="form-control" >
																	<option value="">MM</option>
																	<option value="01">1</option>
																	<option value="02">2</option>
																	<option value="03">3</option>
																	<option value="04">4</option>
																	<option value="05">5</option>
																	<option value="06">6</option>
																	<option value="07">7</option>
																	<option value="08">8</option>
																	<option value="09">9</option>
																	<option value="10">10</option>
																	<option value="11">11</option>
																	<option value="12">12</option>
																</select>
															</div>
															<div class="col-md-3">
																<input type="text" placeholder="YYYY" id="yyyy1" name="yyyy1" class="form-control">
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div>
														<span class="symbol required"></span>Champs obligatoires
														<hr>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-8">
													
												</div>
												<div class="col-md-4">
													<button class="btn btn-yellow btn-block" type="submit" name="valider">
														Modifier <i class="fa fa-arrow-circle-right"></i>
													</button>
												</div>
											</div>
										</form>
									</div>
								</div>
								<!-- end: FORM VALIDATION 1 PANEL -->
							</div>
						</div>
						<!-- end: PAGE CONTENT-->
					</div>
					<div class="subviews">
						<div class="subviews-container"></div>
					</div>
				</div>
				<!-- end: PAGE -->
			</div>
			<!-- end: MAIN CONTAINER -->
			<!-- start: FOOTER -->
			<footer class="inner">
				<div class="footer-inner">
					<div class="pull-left">
						2018 &copy; Gestion de Stagiaire.
					</div>
					<div class="pull-right">
						<span class="go-top"><i class="fa fa-chevron-up"></i></span>
					</div>
				</div>
			</footer>
			<!-- end: FOOTER -->
			<!-- start: SUBVIEW SAMPLE CONTENTS -->
			
			<!-- *** READ NOTE *** -->
			<div id="readNote">
				<div class="noteWrap col-md-8 col-md-offset-2">
					<div class="panel panel-note">
						<div class="e-slider owl-carousel owl-theme">
							<div class="item">
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- *** SHOW CALENDAR *** -->
			
			<!-- end: SUBVIEW SAMPLE CONTENTS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="assets/plugins/respond.min.js"></script>
		<script src="assets/plugins/excanvas.min.js"></script>
		<script type="text/javascript" src="assets/plugins/jQuery/jquery-1.11.1.min.js"></script>
		<![endif]-->
		<!--[if gte IE 9]><!-->
		<script src="assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
		<!--<![endif]-->
		<script src="assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/plugins/blockUI/jquery.blockUI.js"></script>
		<script src="assets/plugins/iCheck/jquery.icheck.min.js"></script>
		<script src="assets/plugins/moment/min/moment.min.js"></script>
		<script src="assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
		<script src="assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
		<script src="assets/plugins/bootbox/bootbox.min.js"></script>
		<script src="assets/plugins/jquery.scrollTo/jquery.scrollTo.min.js"></script>
		<script src="assets/plugins/ScrollToFixed/jquery-scrolltofixed-min.js"></script>
		<script src="assets/plugins/jquery.appear/jquery.appear.js"></script>
		<script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
		<script src="assets/plugins/velocity/jquery.velocity.min.js"></script>
		<script src="assets/plugins/TouchSwipe/jquery.touchSwipe.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
		<script src="assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
		<script src="assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
		<script src="assets/plugins/toastr/toastr.js"></script>
		<script src="assets/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
		<script src="assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
		<script src="assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
		<script src="assets/plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
		<script src="assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
		<script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<script src="assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
		<script src="assets/plugins/truncate/jquery.truncate.js"></script>
		<script src="assets/plugins/summernote/dist/summernote.min.js"></script>
		<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
		<script src="assets/js/subview.js"></script>
		<script src="assets/js/subview-examples.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="assets/plugins/ckeditor/ckeditor.js"></script>
		<script src="assets/plugins/ckeditor/adapters/jquery.js"></script>
		<script src="assets/js/ajouterustagiaire.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE JAVASCRIPTS  -->
		<script src="assets/js/main.js"></script>
		<!-- end: CORE JAVASCRIPTS  -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				SVExamples.init();
				FormValidator.init();
			});
		</script>
	</body>
	<!-- end: BODY -->
</html>