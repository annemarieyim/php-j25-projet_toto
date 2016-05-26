

<?php
//inclut automatiquement tous les packages de Composer
require_once __DIR__.'/vendor/autoload.php';

use Whatsma\ZodiacSign;

$calculator = new ZodiacSign\Calculator();

try {
  $zodiacSign = $calculator->calculate(30,10);
  echo $zodiacSign . "\n";
} catch (ZodiacSign\InvalidDayException $e) {
  echo "ERROR: Invalid Day";
} catch (ZodiacSign\InvalidMonthException $e) {
  echo "ERROR: Invalid Month";
}

/*
if ($zodiacSign=='aries'){
	$zodiacFr=='belier';
}
*/

//
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
	$zodiacFr=='????';
	break;

}
//
?>

