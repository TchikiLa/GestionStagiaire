<?php

$header="MIME-Version: 1.0\r\n";
$header.='From:"SEAAL.com<RHM@SEAAL.com>'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';


		$message='
		<html>
			<body>
				<div align="center">
				
					<u>Mail de l\'expéditeur :</u>'.$_POST['email'].'<br />
					<br />
					'.nl2br($_POST['message']).'
					<br />
			
				</div>
			</body>
		</html>
		';

		mail($_POST['email'], "CONTACT - SEAAL.com", $message, $header);
		
	echo "<script type='text/javascript'>alert('Le Message est envoyer ');
window.location='messagerie.php';
</script>";
?>