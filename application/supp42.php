<?php

include 'class/conf.php';
$errors = array();
/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

$idTutt=$_GET['idTut'];


	
	$reqqq="DELETE FROM `tuteur` WHERE tuteur.idTut = '$idTutt'";

	$ress=mysqli_query($conn,$reqqq);

	
	

?>
 <script type="text/javascript">

 	alert("Le tuteur est supprimer ");
   window.location='tuteur_libre.php';
   
   </script>
