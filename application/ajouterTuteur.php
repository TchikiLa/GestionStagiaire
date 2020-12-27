<?php

include 'class/conf.php';

/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

$idTut=$_POST['idTuteur'];
$nomTut=$_POST['nom'];
$prenomTut=$_POST['prenom'];
$emailTut=$_POST['email']; 
$telTut=$_POST['tel'];
$specialitee=$_POST['specialite'];
$libelleDepp=$_POST['departement'];
$etatt=0;
	
	

	$req="INSERT INTO `tuteur` (`idTut`, `nomTut`, `prenomTut`, `emailTut`, `telTut`, `libelleDep`, `specialite`, `etat`) VALUES ('$idTut', '$nomTut', '$prenomTut', '$emailTut', '$telTut', '$libelleDepp', '$specialitee', '$etatt')";
	$res=mysqli_query($conn,$req);
	if ($res == true) {

echo "<script type='text/javascript'>alert('Le Tuteur est ajouter ');
window.location='tuteur_libre.php';
</script>";

}else{

	?>
	<script type="text/javascript">
		alert('ID Tuteur Exist Déja');
	history.go(-1);
</script>
	<?php
}
?>