<?php

include 'class/conf.php';

/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

$idStage=$_GET['idStage'];





	?>

	<script type="text/javascript">

if( confirm("Souhaitez vous vraiment supprimer le stage ?") ){

window.location="supp3.php?idStage=<?php echo $idStage; ?>";

} else {

    window.location='tout_stage.php';
}

</script>

