<?php

//je crée le PDO
require 'inc/db.php';


//J'écris ma requête
$sql='
SELECT ses_opening, ses_ending, ses_id
FROM session
';

$pdoStatement=$pdo->query($sql);
	if ($pdoStatement === false){
		print_r($pdo->errorInfo());
	}
	//sinon
	else{
		//je récupère toutes les données
		$sessionList=$pdoStatement->fetchAll();
		print_r($sessionList);
	}

//Recupérer le jour et le mois de la date de naissance

$maDateFromDB='2015-04-01';
$jour=$maDateFromDB[8].$maDateFromDB[9]; 
$mois=$maDateFromDB[5].$maDateFromDB[6];
echo $jour.'<br/>';
echo $mois.'<br/>';


/*//Autre façon
// j'extrais les 2 caractères à partir de l'index 8
$jour=substr($maDateFromDB, 8, 2);
// j'extraie les 2 caractères à partir de l'index 5
$jour=substr($maDateFromDB, 5, 2);
echo $jour.'<br/>';
echo $mois.'<br/>';
*/
/*Afficher les statistiques sur le nombre d'étudiants par ville sur l'index */


$sql='

SELECT COUNT(*) AS nbStudent,
 cit_name
FROM
student
INNER JOIN
  city ON  city.cit_id=student.cit_id
GROUP BY
  cit_name
ORDER BY nbStudent ASC

';
$pdoStatement=$pdo->query($sql);
	if ($pdoStatement === false){
		print_r($pdo->errorInfo());
	}
	//sinon
	else{
		//je récupère toutes les données
		$nbStudentPerCity=$pdoStatement->fetchAll();
		print_r($nbStudentPerCity);
	}
	

	

//J'affiche ma page
	require 'inc/header.php';
	require 'inc/index_view.php';
	require 'inc/footer.php';

?>

