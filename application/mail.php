<?php
include 'class/conf.php';
													$errors = array();
													/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
													/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect"); 
$req1="SELECT * FROM stage , stagiaire , tuteur , sujet WHERE stage.idStagiaire = stagiaire.idStagiaire AND stage.idTut = tuteur.idTut AND stage.idSujet = sujet.idSujet";
													$res1=mysqli_query($conn,$req1);

													$dat = new DateTime();
													$datsys = $dat->format('Y-m-d');
													while($tabress1=mysqli_fetch_assoc($res1)){
														$dateFinn=$tabress1['dateFin']; 
														$idStagiairearchv=$tabress1['idStagiaire'];
														if(strtotime($datsys) > strtotime($dateFinn)){
															$archive = "UPDATE `stagiaire` SET `etat`='archive' WHERE `idStagiaire` = '$idStagiairearchv'";
															$archivee=mysqli_query($conn,$archive);
														}
													}

?>
