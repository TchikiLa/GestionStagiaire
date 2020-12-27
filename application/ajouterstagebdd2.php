<?php

include 'class/conf.php';

/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

$idstagiairee=$_POST['stagiaire'];
$idstagiairee2=$_POST['stagiaire2'];
$idsujete=$_POST['Sujet'];
$idTute=$_POST['Tuteur'];
$journe = $_POST['dd'];
$moisne = $_POST['mm'];
$annene = $_POST['yyyy'];
$datedebute=$annene.'-'.$moisne.'-'.$journe;
$journ1e = $_POST['dd1'];
$moisn1e = $_POST['mm1'];
$annen1e = $_POST['yyyy1'];
$datefine=$annen1e.'-'.$moisn1e.'-'.$journ1e;
$etate="affecter";
 $req1= "SELECT `idTut`, `nomTut`, `prenomTut`, `emailTut`, `telTut`, `libelleDep`, `specialite`, `etat` FROM `tuteur` WHERE `idTut` = '$idTute'";
 $res1=mysqli_query($conn,$req1);
$tabress1=mysqli_fetch_assoc($res1);
 $etattutt = $tabress1['etat'];
$etattutt= $etattutt + 2;
	
	
	$req2="INSERT INTO `stage`(`idStage`, `idStagiaire`, `idSujet`, `idTut`, `dateDeb`, `dateFin`) VALUES (NULL,'$idstagiairee','$idsujete','$idTute','$datedebute','$datefine')";
	$res2=mysqli_query($conn,$req2);
	$req3="INSERT INTO `stage`(`idStage`, `idStagiaire`, `idSujet`, `idTut`, `dateDeb`, `dateFin`) VALUES (NULL,'$idstagiairee2','$idsujete','$idTute','$datedebute','$datefine')";
	$res3=mysqli_query($conn,$req3);
	
		$req4 = "UPDATE `stagiaire` SET `etat`= '$etate' WHERE stagiaire.idStagiaire= '$idstagiairee'";
		$res4=mysqli_query($conn,$req4);
		$req5 = "UPDATE `stagiaire` SET `etat`= '$etate' WHERE stagiaire.idStagiaire= '$idstagiairee2'";
		$res5=mysqli_query($conn,$req5);
		$req6="UPDATE `tuteur` SET `etat` = '$etattutt' WHERE tuteur.idTut = '$idTute'";
		$res6=mysqli_query($conn,$req6);


	echo "<script type='text/javascript'>alert('les stagiaires sont affecter');
window.location='tout_stage.php';
</script>";
	
	

?>