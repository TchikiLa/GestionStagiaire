
<?php 
include 'class/conf.php';
$errors = array();
/*lien to bd*/  $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Erreur : Acces a la base de donnees est impossible");
/*selection de la base de donnee*/mysqli_select_db($conn,$dbname) or die("Erreur : Nom de base de donnees incorrect");

$idStagiaire=$_GET['idStagiaire'];
$req="SELECT * FROM stage , stagiaire , tuteur , sujet WHERE stage.idStagiaire = stagiaire.idStagiaire AND stage.idTut = tuteur.idTut AND stage.idSujet = sujet.idSujet AND stagiaire.idStagiaire = '$idStagiaire'";

$res=mysqli_query($conn,$req);
$tabress=mysqli_fetch_assoc($res);
														$nom=$tabress['nom'];
														$prenom=$tabress['prenom'];
														$dateDeb=$tabress['dateDeb'];
														$dateFin=$tabress['dateFin'];
														$typeStage=$tabress['typeStage'];
														$dat = new DateTime();
														$datsys = $dat->format('Y-m-d');

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$a = $nom.' '.$prenom;
$b = $dateDeb;
$c = $dateFin;
$d = $typeStage;
$e = $datsys;

//cell(width,height,text,border,end line,[aline])


$pdf->Image("logo.jpg",1,1,40,25);

$pdf->Cell(189,30,"",0,1);

$pdf->SetFont("Arial", "B", 16);
$pdf->Cell(0,10,"ATTESTATION DE STAGE",0,1,'C');
$pdf->Cell(189,10,"",0,1);

$pdf->setFont("Arial", "", 12);
$pdf->Cell(33,10,"Je soussigne, Mr ",0,0);
$pdf->setFont("Arial", "B", 12);
$pdf->Cell(42,10,"Ahmed Mohammed, ",0,0);
$pdf->setFont("Arial", "", 12);
$pdf->Cell(42,10,"chef de Division RHM. ",0,1);

$pdf->setFont("Arial", "", 12);
$pdf->Cell(42,10,"Certifie que Monsieur ",0,0);
$pdf->setFont("Arial", "B", 12);
$pdf->Cell(33,10,"{$a}",0,0);
$pdf->setFont("Arial", "", 12);
$pdf->Cell(189,10," a effectuer un stage {$d} au sein de SEAAL-Kouba",0,1);

$pdf->Cell(51,10," Durant la periode allant du",0,0);
$pdf->setFont("Arial", "B", 12);
$pdf->Cell(189,10," {$b} au {$c} ",0,1);

$pdf->setFont("Arial", "", 12);
$pdf->Cell(10,10," ",0,0);
$pdf->Cell(60,10,"La presente attention est delivree pour servir et valoir ce que de droit ",0,1);

$pdf->setFont("Arial", "B", 12);
$pdf->Cell(189,20,"",0,1);
$pdf->Cell(100,10," ",0,0);
$pdf->Cell(33,10,"Fait a Kouba, le",0,0);
$pdf->setFont("Arial", "", 12);
$pdf->Cell(189,10,"{$e}",0,1);


$pdf->output();
?>