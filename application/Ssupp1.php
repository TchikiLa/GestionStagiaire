<?php

include 'class/conf.php';

/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

$idstgg=$_GET['idStagiaire'];

$req1="SELECT * FROM `stagiaire` WHERE `idStagiaire` = '$idstgg'";
$re1=mysqli_query($conn,$req1);
$tabress=mysqli_fetch_assoc($re1);
$etat=$tabress['etat'];
if( $etat == ''){
$req="DELETE FROM `stagiaire` WHERE `idStagiaire` = '$idstgg'";
$res=mysqli_query($conn,$req);
}else{
	$req2 = "DELETE FROM `absence` WHERE `idStagiaire` = '$idstgg'";
	$req3 = "DELETE FROM `stage` WHERE `idStagiaire` = '$idstgg'";
	$req4 = "DELETE FROM `stagiaire` WHERE `idStagiaire` = '$idstgg'";
	$res=mysqli_query($conn,$req2);
	$res=mysqli_query($conn,$req3);
	$res=mysqli_query($conn,$req4);


}
  

 ?>
 <script type="text/javascript">

 	alert("Le stagiaire est supprimer supprimé");
   window.location='secretaire.html';
   
   </script>