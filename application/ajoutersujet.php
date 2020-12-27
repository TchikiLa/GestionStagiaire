<?php
 
include 'class/conf.php';
$errors = array();
/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

$titre=$_POST['titre'];
$typestage=$_POST['typestage'];
$specialite=$_POST['specialite'];
$Description=$_POST['Description'];
	
	
	if(count($errors) == 0){
	
	$req = "INSERT INTO `sujet`(`idSujet`, `titreSujet`, `descriptionSujet`, `typeStage`, `specialite`) VALUES (Null,'$titre','$Description','$typestage','$specialite')";
	$res=mysqli_query($conn,$req);


if ($res == true) {
echo "<script type='text/javascript'>alert('Le Sujet est ajouter ');
window.location='tout_sujet.php';
</script>";
	}
	}

?>