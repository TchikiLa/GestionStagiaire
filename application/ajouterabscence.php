<?php

include 'class/conf.php';
$errors = array();
/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

$stagiaire=$_POST['stagiaire'];
$journe = $_POST['dd'];
$moisne = $_POST['mm'];
$annene = $_POST['yyyy'];
$datedebuta=$annene.'-'.$moisne.'-'.$journe;
$journ1 = $_POST['dd1'];
$moisn1 = $_POST['mm1'];
$annen1 = $_POST['yyyy1'];
$datefina=$annen1.'-'.$moisn1.'-'.$journ1;
$justification=$_POST['justification'];

	
	
	if(count($errors) == 0){
	
	$reqe="INSERT INTO `absence`(`idAbsence`, `dateDeb`, `dateFin`, `justification`, `idStagiaire`) VALUES (NULL,'$datedebuta','$datefina','$justification','$stagiaire')";

	$resu=mysqli_query($conn,$reqe);
	
	if(mysqli_num_rows($resu) != 1){
		echo "insertion success welcom";
		header('location: admin.html');
	}else{
		echo "Erreur d'insertion";
		header('location: ajouterTuteur.html');
	}
	}

?>