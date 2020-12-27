<?php

include 'class/conf.php';

/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

$idstagiairee=$_POST['stagiaire'];
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
 $req4= "SELECT `idTut`, `nomTut`, `prenomTut`, `emailTut`, `telTut`, `libelleDep`, `specialite`, `etat` FROM `tuteur` WHERE `idTut` = '$idTute'";
 $res4=mysqli_query($conn,$req4);
$tabress4=mysqli_fetch_assoc($res4);
 $etattutt = $tabress4['etat'];
$etattutt= $etattutt + 1;
	
	
	$req="INSERT INTO `stage`(`idStage`, `idStagiaire`, `idSujet`, `idTut`, `dateDeb`, `dateFin`) VALUES (NULL,'$idstagiairee','$idsujete','$idTute','$datedebute','$datefine')";
$res=mysqli_query($conn,$req);

	$req2 = "UPDATE `stagiaire` SET `etat`= '$etate' WHERE stagiaire.idStagiaire= '$idstagiairee'";
		$res2=mysqli_query($conn,$req2);
	$req3 ="UPDATE `tuteur` SET `etat` = '$etattutt' WHERE tuteur.idTut = '$idTute'";
$res3=mysqli_query($conn,$req3);


	echo "<script type='text/javascript'>alert('le stagiaire est affecter');
window.location='tout_stage.php';
</script>";
	
	

?>