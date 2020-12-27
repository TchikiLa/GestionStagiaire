
<?php

include 'class/conf.php';

/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

$idTut=$_GET['idTut'];


	?>

	<script type="text/javascript">

if( confirm("Souhaitez vous vraiment supprimer le tuteur ?") ){

window.location="supp4.php?idTut=<?php echo $idTut; ?>";

} else {

    window.location='tout_tuteur.php';
}

</script>

