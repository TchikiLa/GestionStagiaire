<?php

include 'class/conf.php';

/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

$idSujet=$_GET['idSujet'];





	?>

	<script type="text/javascript">

if( confirm("Souhaitez vous vraiment supprimer le sujet ?") ){

window.location="supp2.php?idSujet=<?php echo $idSujet; ?>";

} else {

    window.location='tout_sujet.php';
}

</script>

