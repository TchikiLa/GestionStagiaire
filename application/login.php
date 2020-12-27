<?php
include 'class/conf.php';

/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

	$user = $_POST['username'];
	$pass = $_POST['password'];
	

	$req="SELECT * FROM compte WHERE login='$user' AND motDePass='$pass'";
	$res=mysqli_query($conn,$req);
	
if ($res == true) {
		$tabres=mysqli_fetch_assoc($res);
		if($tabres['role'] == "admin"){
			header('location: admin.html');
		}
		if($tabres['role'] == 'secretaire'){
			header('location: secretaire.html');
		}

	}else{
		header('location: login.html'); 
	}
	

?>