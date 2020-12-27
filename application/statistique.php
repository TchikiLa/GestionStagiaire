<?php
 
include 'class/conf.php';
$errors = array();
/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

	
	$req1="SELECT * FROM `stagiaire` WHERE `etat` = ''";
	$req2="SELECT * FROM `stagiaire` WHERE `etat` = 'affecter'";
	$req3="SELECT * FROM `stagiaire` WHERE `etat` = 'archive'";
	$req4="SELECT * FROM `stagiaire` ";
	$req5="SELECT * FROM `tuteur` ";
	$res1=mysqli_query($conn,$req1);
	$res2=mysqli_query($conn,$req2);
	$res3=mysqli_query($conn,$req3);
	$res4=mysqli_query($conn,$req4);
	$res5=mysqli_query($conn,$req5);
	$a = mysqli_num_rows($res1);
	$b = mysqli_num_rows($res2);
	$c = mysqli_num_rows($res3);
	$d = mysqli_num_rows($res4);
	$libre =0;
	$occupe =0;
$Licence = 0;
$Master = 0;
$Experiance = 0;
$Découverte = 0;
	while($tabress=mysqli_fetch_assoc($res5)){

				$etat=$tabress['etat'];
				if($etat <= 0){  $libre =$libre+1;}
				else{  $occupe =$occupe+1;}  }
	while($tabress2=mysqli_fetch_assoc($res4)){

				$typeStage=$tabress2['typeStage'];
				if($typeStage == 'PFE licence'){ $Licence= $Licence + 1;  }
				else if($typeStage == 'PFE Master'){  $Master= $Master + 1; } 
				else if($typeStage == 'Experiance'){  $Experiance= $Experiance + 1; }
				else if($typeStage == 'Découverte'){ $Découverte= $Découverte + 1; }
				}

?><!DOCTYPE html>
<!-- Template Name: Rapido - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.0 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<<title>Gestion Stagiaire SEAAL</title>
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
		<link rel="stylesheet" href="assets/plugins/weather-icons/css/weather-icons.min.css">
		<link rel="stylesheet" href="assets/plugins/nvd3/nv.d3.min.css">
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE CSS -->
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/styles-responsive.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-default.css" type="text/css" id="skin_color">
		<link rel="stylesheet" href="assets/css/print.css" type="text/css" media="print"/>
		<!-- end: CORE CSS -->
		<link rel="shortcut icon" href="favicon.ico" />

<?php echo '	<script language=javascript>
window.onload = function () {
	
	var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Statut des Stagiaires"
	},
	data: [{
		type: "doughnut",
		startAngle: 60,
		//innerRadius: 60,
		indexLabelFontSize: 17,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: [


			{ y:'.$a.', label: "en attente" },
			{ y:'.$b.', label: "en cours" },
			{ y:'.$c.', label: "archive" }

			

		]
	}]
});
	chart.render();
/*-----------------------*/
var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Nembre de Stagiaires inscrit par années"

	},
	axisY: {
		title: "le nombre de stagiaires ces dernierre années"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		dataPoints: [      
			{ y: '.$d.', label: "2018" },
			{ y: 0,  label: "2019" },
			{ y: 0,  label: "2020" }
		]
	}]
});
chart1.render();
/*--------------------------*/

var chart2 = new CanvasJS.Chart("chartContainer2", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Statut des Tuteurs"
	},
	data: [{
		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y} (#percent%)",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}",
		dataPoints: [
			{ y:'.$libre.' , label: "disponible" },
			{ y:'.$occupe.' , label: "occupé" }
		]
	}]
});
chart2.render();
/*-------------------*/
var chart3 = new CanvasJS.Chart("chartContainer3", {
	
	exportFileName: "Doughnut Chart",
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "Type de stage en cours "
	},
	legend:{
		cursor: "pointer",
		itemclick: explodePie
	},
	data: [{
		type: "doughnut",
		innerRadius: 90,
		showInLegend: true,
		toolTipContent: "<b>{name}</b>: {y} Personness (#percent%)",
		indexLabel: "{name} - #percent%",
		dataPoints: [
			{ y:'.$Licence.', name: "PFE Licence" },
			{ y: '.$Master.', name: "PFE Master" },
			{ y: '.$Experiance.', name: "Experiance" },
			{ y: '.$Découverte.', name: "Découverte" }
		]
	}]
});
chart3.render();

function explodePie (e) {
	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
	} else {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
	}
	e.chart3.render();
}

}
</script>'; ?>
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
								<a href="admin.html"><i class="fa fa-home"></i> <span class="title"> Acceuil</span> </a>
							</li>
							<li>
								<a href="javascript:void(0)"><i class="fa fa-graduation-cap"></i> <span class="title"> Stagiaire </span><i class="icon-arrow"></i> </a>
								<ul class="sub-menu">
									<li>
										
											<li>
												<a href="ajouterStagiaire.html">
													<i class="fa fa-edit"></i> Ajouter Stagiaire
												</a>
											</li>
											<li>
												<a href="tout_stagiaire.php">
													<i class="fa-list-ul"></i>Tout les stagiaires
												</a>
											</li>
											<li>
												<a href="sagiaire_non_affecte.php">
													<i class="fa-list-ul"></i>Stagiaires non affecté
												</a>
											</li>
											<li>
												<a href="stagiaire_affecter.php">
													<i class="fa-list-ul"></i>Stagiaires affecté
												</a>
											</li>
											<li>
												<a href="stagiaire_Archive.php">
													<i class="fa-list-ul"></i>Stagiaires en archives
												</a>
											</li>
										
									</li>
								</ul>
							</li>
							<li>
								<a href="javascript:void(0)"><i class="fa fa-copy"></i> <span class="title"> Stage </span><i class="icon-arrow"></i> </a>
								<ul class="sub-menu">
									<li>
										<a href="tout_stage.php">
											<i class="fa-list-ul"></i> Tout les stages 
										</a>
									</li>
									<li>
										<a href="ajouterstage.php">
											<i class="fa fa-edit"></i> Ajouter Stage 
										</a>
									</li>
									<li>
										<a href="tout_sujet.php">
											<i class="fa-list-ul"></i> Tout les sujet 
										</a>
									</li>
									<li>
										<a href="ajoutersujet.html">
											<i class="fa fa-edit"></i> Ajouter Sujet 
										</a>
									
								</ul>
							</li>
							<li>
								<a href="javascript:void(0)"><i class="fa fa-group"></i> <span class="title"> Tuteur </span><i class="icon-arrow"></i> </a>
								<ul class="sub-menu">
									<li>
										<a href="ajouterTuteur.html">
											<i class="fa fa-edit"></i> Ajouter Tuteur 
										</a>
									</li>
									<li>
										<a href="tout_tuteur.php">
											<i class="fa-list-ul"></i> Liste Tuteur
										</a>
									</li>
									<li>
										<a href="tuteur_libre.php">
											<i class="fa-list-ul"></i> Tuteur libre
										</a>
									</li>
																	</ul>
							</li>
							<li>
								<a href="javascript:void(0)"><i class="fa fa-pencil-square-o"></i> <span class="title"> Abscence </span><i class="icon-arrow"></i> </a>
								<ul class="sub-menu">
									<li>
										<a href="marquerabscence.php">
											<span class="title">Marquer l'absence</span>
										</a>
									</li>
									<li>
										<a href="list_abscence.php">
											<span class="title">Liste d'absence</span>
										</a>
									</li>
								</ul>
							</li>

							<li class="active open">
								<a href="statistique.php"><i class="fa fa-bar-chart-o"></i> <span class="title">statistiques</span> </a>
							</li>
							
							<li>
								<a href="messagerie.php"><i class="fa fa-envelope"></i> <span class="title">Envoyer email</span> </a>
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
									<h1>statistiques </h1>
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
													<a href="marquerabscence.php" class="new-event"><span class="fa-stack"> <i class="fa fa-calendar-o fa-stack-1x fa-lg"></i> <i class="fa fa-plus fa-stack-1x stack-right-bottom text-danger"></i> </span> Marquer abscence</a>
												</li>
						

												<li class="dropdown-header">
													Stagiaire
												</li>
												<li>
													<a href="ajouterStagiaire.html" class="new-contributor"><span class="fa-stack"> <i class="fa fa-user fa-stack-1x fa-lg"></i> <i class="fa fa-plus fa-stack-1x stack-right-bottom text-danger"></i> </span> Ajouter stagiaire</a>
												</li>
												<li>
													<a href="tout_stagiaire.php" class="show-contributors"><span class="fa-stack"> <i class="fa fa-user fa-stack-1x fa-lg"></i> <i class="fa fa-share fa-stack-1x stack-right-bottom text-danger"></i> </span> Liste stagiaire</a>
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
					
						<!-- end: BREADCRUMB -->
						<!-- start: PAGE CONTENT -->
<table class="table">					
<tr>
	<td>
		<div id="chartContainer1" style="height: 300px; width: 100%;" align="middle"></div><br>
	</td>
	<td>
		<div id="chartContainer" style="height: 300px; width: 100%;"></div><br>
	</td>
</tr>
<tr>
	<td>
		<div id="chartContainer3" style="height: 300px; width: 100%;"></div><br>

	</td>
	<td>
		<div id="chartContainer2" style="height: 300px; width: 100%;"></div><br>
	</td>
</tr>
</table>												

<script src="canvasjs.min.js"></script>

						<!-- end: PAGE CONTENT-->
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
		<script src="assets/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
		<script src="assets/plugins/nvd3/lib/d3.v3.js"></script>
		<script src="assets/plugins/nvd3/nv.d3.min.js"></script>
		<script src="assets/plugins/nvd3/src/models/historicalBar.js"></script>
		<script src="assets/plugins/nvd3/src/models/historicalBarChart.js"></script>
		<script src="assets/plugins/nvd3/src/models/stackedArea.js"></script>
		<script src="assets/plugins/nvd3/src/models/stackedAreaChart.js"></script>
		<script src="assets/plugins/jquery.sparkline/jquery.sparkline.js"></script>
		<script src="assets/plugins/easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
		<script src="assets/js/index.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE JAVASCRIPTS  -->
		<script src="assets/js/main.js"></script>
		<!-- end: CORE JAVASCRIPTS  -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				SVExamples.init();
				Index.init();
			});
		</script>
	</body>
	<!-- end: BODY -->
</html>