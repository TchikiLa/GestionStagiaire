<?php

include 'class/conf.php';

/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

$idSujet=$_GET['idSujet'];

$req1="SELECT * FROM `stage` WHERE `idSujet` ='$idSujet'";

$re1=mysqli_query($conn,$req1);
$n =mysqli_num_rows($re1);
if( $n == 0){
$req="DELETE FROM `sujet` WHERE `idSujet` = '$idSujet'";
$res=mysqli_query($conn,$req);

header('location: tout_sujet.php');

}else{

header('location: supp2-1.php');

}
  

 ?>
