<?php

include 'class/conf.php';
$errors = array();
/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

$idAbsence=$_GET['idAbsence'];


	if(count($errors) == 0){
	
	$req="DELETE FROM `absence` WHERE `idAbsence` = '$idAbsence'";

	$res=mysqli_query($conn,$req);
	
		header('location: list_abscence.php');
	
	
	}

?>
