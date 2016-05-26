<?php

//je crée le PDO
require 'inc/db.php';

$etudiantListe=array();//variable à remplir

//Mettre ici le code pour la recherche
//print_r($_GET);
if (!empty($_GET['search'])){
	$searchID=$_GET['search'];
	$searchAll='%'.$searchID.'%';
	//echo $searchID;

$sql='

SELECT stu_id, stu_name, stu_firstname, cou_name, cit_name, mar_name, stu_email, stu_birthdate AS birthdate, stu_is_leader,ses_id 
FROM student 
LEFT OUTER JOIN country ON country.cou_id = student.cou_id 
LEFT OUTER JOIN city ON city.cit_id = student.cit_id 
LEFT OUTER JOIN marital_status ON marital_status.mar_id = student.mar_id 
WHERE stu_name LIKE :searchKeyWord
OR stu_firstname LIKE :searchKeyWord 
OR cou_name LIKE :searchKeyWord
OR cit_name LIKE :searchKeyWord 
OR stu_email LIKE :searchKeyWord
';

$pdoStatement = $pdo->prepare($sql);
	$pdoStatement->bindValue(':searchKeyWord', $searchAll, PDO::PARAM_STR);

	// Si erreur
if ($pdoStatement ->execute()===false) {
		print_r($pdo->errorInfo());
	}
	else if ($pdoStatement->rowCount() > 0) {
		$etudiantListe = $pdoStatement->fetchAll();
		print_r($etudiantListe);
	}
}


//J'affiche ma page
	require 'inc/header.php';
	require 'inc/list_view.php';
	require 'inc/footer.php';

?>

