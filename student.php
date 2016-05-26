<?php
//je crée le PDO
require 'inc/db.php';



print_r($_GET);
if (!empty($_GET['stu_id'])){
	$studentID=intval($_GET['stu_id']);
	//echo $studentID;


$sql = '
		SELECT stu_id, stu_name, stu_firstname, cou_name, cit_name, mar_name, stu_email, stu_birthdate AS birthdate, stu_is_leader, ses_id
		FROM student
		LEFT OUTER JOIN country ON country.cou_id = student.cou_id
		LEFT OUTER JOIN city ON city.cit_id = student.cit_id
		LEFT OUTER JOIN marital_status ON marital_status.mar_id = student.mar_id
		WHERE stu_id= :studentAnneMarie
	';
	$pdoStatement = $pdo->prepare($sql);
	$pdoStatement->bindValue(':studentAnneMarie', $studentID, PDO::PARAM_INT);

	// Si erreur
if ($pdoStatement ->execute()===false) {
		print_r($pdo->errorInfo());
	}
	else if ($pdoStatement->rowCount() > 0) {
		$etudiantListe = $pdoStatement->fetch();
		print_r($etudiantListe);

		if ($etudiantListe['stu_is_leader']==1){
			$etudiantListe['delegue'] = 'yes';
		}
		else{
			$etudiantListe['delegue']='no';
		}

	}
}




//Fonction qui récupère le jour et le mois à partir de la date de naissance
$maDateFromDB=$etudiantListe['birthdate'];
$jour=$maDateFromDB[8].$maDateFromDB[9]; 
$mois=$maDateFromDB[5].$maDateFromDB[6];
echo $jour.'<br/>';
echo $mois.'<br/>';

//inclut automatiquement tous les packages de Composer (fichier zodiac.pphp que l'on détruit ensuite)

//calcule le signe astrologique à partir de la date de naissance
require_once __DIR__.'/vendor/autoload.php';

use Whatsma\ZodiacSign;

$calculator = new ZodiacSign\Calculator();

try {
  $zodiacSign = $calculator->calculate($jour,$mois);
  echo $zodiacSign . "\n";
} catch (ZodiacSign\InvalidDayException $e) {
  echo "ERROR: Invalid Day";
} catch (ZodiacSign\InvalidMonthException $e) {
  echo "ERROR: Invalid Month";
}

//Fonction qui traduit le signe astrologique de français en anglais
switch($zodiacSign){

	case 'aries':
	$zodiacFr='belier';
	break;

	case 'taurus':
	$zodiacFr='taureau';
	break;

	case 'gemini':
	$zodiacFr='gémaux';
	break;

	case 'cancer':
	$zodiacFr='cancer';
	break;

	case 'leo':
	$zodiacFr='lion';
	break;

	case 'virgo':
	$zodiacFr='vierge';
	break;

	case 'libra':
	$zodiacFr='balance';
	break;

	case 'scorpio':
	$zodiacFr='scorpion';

	case 'sagittarius':
	$zodiacFr='sagittaire';
	break;

	case 'capricorn':
	$zodiacFr='capricorne';
	break;

	case 'aquarius':
	$zodiacFr='verseau';
	break;

	case 'pisces':
	$zodiacFr='poissons';
	break;

	default:
	$zodiacFr='????';
	break;

}
echo $zodiacFr;

require 'inc/header.php';
require 'inc/student_view.php';
require 'inc/footer.php';
