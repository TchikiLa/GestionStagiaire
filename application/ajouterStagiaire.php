
<?php

include 'class/conf.php';

/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

$idStagiaire=$_POST['idstagiair'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$adress=$_POST['adress'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$niveau=$_POST['niveau'];
$cv_tmp=$_FILES['file']['tmp_name'];
$extention =strrchr($_FILES['file']['name'], '.');


if($extention == '.pdf' || $extention == '.PDF') { 
	$cv="cv/".$idStagiaire.'.pdf';
	move_uploaded_file($cv_tmp,$cv);
}
elseif($extention == '.jpg' || $extention == '.JPG'){
  $cv="cv/".$idStagiaire.'.jpg';
move_uploaded_file($cv_tmp,$cv);
}
elseif($extention == '.png' || $extention == '.PNG') {
 $cv="cv/".$idStagiaire.'.PNG';
move_uploaded_file($cv_tmp,$cv);
}
else
{
	?>
	<script type="text/javascript">
		alert('Vous devez UPLODER un fichier de type PDF ou Image(scanné)');
	history.go(-1);
</script>
	<?php
}

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
$etat='';

$req="INSERT INTO `stagiaire`(`idStagiaire`, `nom`, `prenom`, `dateNaissance`, `sexe`, `email`, `tel`, `adress`, `niveau`, `cv`, `typeStage`, `denominationOrganisme`, `adressOrganisme`, `libelleSpecialite`, `etat`, `dateDepot`)VALUES ('$idStagiaire','$nom','$prenom','$dateNaissance','$sexe','$email','$tel','$adress','$niveau','$cv','$typeStage','$denominationOrganisme','$adressOrganisme','$specialite','$etat','$dateDepot')";
$res = mysqli_query($conn,$req);

if ($res == true) {

$header="MIME-Version: 1.0\r\n";
$header.='From:"SEAAL.com<RHM@SEAAL.com>'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';


$message='
<html>
	<body>
		<div align="center">
			Bonjour '.$prenom.'<br />
			Votre demande de stage au sein de notre scociété est encours du traitement <br />
			
		</div>
	</body>
</html>
';

mail($email, "CONTACT - SEAAL.com", $message, $header);


echo "<script type='text/javascript'>alert('Le stagiaire est ajouter ');
window.location='tout_stagiaire.php';
</script>";

}else{

	?>
	<script type="text/javascript">
		alert('ID stagiaire Exist Déja');
	history.go(-1);
</script>
	<?php
}

?>
