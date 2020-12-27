<?php

include 'class/conf.php';

/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

$idStage=$_GET['idStage'];

$req1="SELECT * FROM `stage` WHERE `idStage` = '$idStage'";
$re1=mysqli_query($conn,$req1);
$tabress=mysqli_fetch_assoc($re1);
$idSujet=$tabress['idSujet'];
$req2="SELECT * FROM `stage` WHERE `idSujet` = '$idSujet'";
$re2=mysqli_query($conn,$req2);
						if($re2 && $number2=mysqli_num_rows($re2)>0){
							while($tabres2=mysqli_fetch_assoc($re2)){
							$idStagee=$tabres2['idStage'];
							$idStagiairee=$tabres2['idStagiaire'];
							$idTut=$tabres2['idTut'];
							$req7 = "SELECT * FROM `tuteur` WHERE `idTut` = '$idTut'";
							$res8=mysqli_query($conn,$req7);
							$tabress3=mysqli_fetch_assoc($res8);
							$etat=$tabress3['etat'];
							$etat = $etat - 1;
							$req9 ="UPDATE `tuteur` SET `etat` = '$etat' WHERE tuteur.idTut = '$idTut'";
							$res10=mysqli_query($conn,$req9);
							$etate='';
							$req11 = "UPDATE `stagiaire` SET `etat`= '$etate' WHERE stagiaire.idStagiaire= '$idStagiairee'";
							$res12=mysqli_query($conn,$req11);
							$req3 = "DELETE FROM `absence` WHERE `idStagiaire` = '$idStagiairee'";
							$res5=mysqli_query($conn,$req3);
							$req4 = "DELETE FROM `stage` WHERE `idStage` = '$idStagee'";
							$res6=mysqli_query($conn,$req4);


								}
							}  

  

 ?>
 <script type="text/javascript">

 	alert("Le stage est supprimer supprimé");
   window.location='tout_stage.php';
   
   </script>