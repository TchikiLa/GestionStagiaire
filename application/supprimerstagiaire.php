<?php

include 'class/conf.php';

/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

$idstg=$_GET['idStagiaire'];





	?>

	<script type="text/javascript">

if( confirm("Souhaitez vous vraiment supprimer le stagiaire ?") ){

window.location="supp1.php?idStagiaire=<?php echo $idstg; ?>";

} else {

    window.location='tout_stagiaire.php';
}

</script>

