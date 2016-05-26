<?php
//je crée le PDO
require 'inc/db.php';

//print_r($_GET);
if (!empty($_GET['ses_id'])){
	$sessionID=intval($_GET['ses_id']);
	//echo $sessionID;

	// Nombre d'étudiants par page
	$nbPerPage=2;
	$currentOffset=0;
	$currentPage=1;
	if (array_key_exists('offset',$_GET)){
		$currentOffset=intval($_GET['offset']);
	}
	
	if (array_key_exists('page',$_GET)){//
		$currentPage=intval($_GET['page']);
		$currentOffset=($currentPage-1)*$nbPerPage;
	}

	$sql = '
		SELECT stu_id, stu_name, stu_firstname, cou_name, cit_name, mar_name, stu_email, stu_birthdate AS birthdate, stu_is_leader,ses_id
		FROM student
		LEFT OUTER JOIN country ON country.cou_id = student.cou_id
		LEFT OUTER JOIN city ON city.cit_id = student.cit_id
		LEFT OUTER JOIN marital_status ON marital_status.mar_id = student.mar_id
		WHERE ses_id= :sessionAnneMarie
		LIMIT :offset,:nbPerPage
	';
	$pdoStatement = $pdo->prepare($sql);
	$pdoStatement->bindValue(':sessionAnneMarie', $sessionID, PDO::PARAM_INT);
	$pdoStatement->bindValue(':nbPerPage', $nbPerPage, PDO::PARAM_INT);
	$pdoStatement->bindValue(':offset', $currentOffset, PDO::PARAM_INT);

	// Si erreur
	if ($pdoStatement->execute()===false) {
		print_r($pdo->errorInfo());
	}
	else if ($pdoStatement->rowCount() > 0) {
		$etudiantListe = $pdoStatement->fetchAll();
	}
}

require 'inc/header.php';
require 'inc/list_view.php';
require 'inc/footer.php';