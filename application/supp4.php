<?php

include 'class/conf.php';

/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

$idTut=$_GET['idTut'];

$req1="SELECT * FROM `stage` WHERE `idTut` = '$idTut'";
$re1=mysqli_query($conn,$req1);
$num_rows = mysqli_num_rows($re1);

if($num_rows > 0){
	header('location: supp41.php');
}else{
	header('location: supp42.php?idTut='.$idTut );
}



 ?>