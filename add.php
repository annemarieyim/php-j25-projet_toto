<?php

// Je prépare mon DSN pour se connecter à ma base MySQL en localhost, sur la base de données "formation"
$dsn = 'mysql:dbname=tablepdo;host=localhost;charset=utf8';
// J'instancie mon objet PDO et créé la connexion à la DB
$pdo = new PDO($dsn,'root', 'yluredewittig');

/*dans student.php, récupérer & valider les données venant du formulaire en POST (tous les champs sont obligatoires)
	* si les données sont valides, rediriger vers student.php
	* si non valide, afficher quelles données sont erronées*/

// Gestion du POST
$errorList = array();
// Si le formulaire a été soumis
if (!empty($_POST)) {
	// Je récupère tous les champs du formulaires
	// si isset($_POST['studentName']) == true alors récupère la valeur de $_POST['studentName'], sinon, la valeur ''
	$name = isset($_POST['studentName']) ? $_POST['studentName'] : '';
	/*équivalent à
	if (isset($_POST['studentName'])) {
		$name = $_POST['studentName'];
	}
	else {
		$name = '';
	}*/
	$firstname = isset($_POST['studentFirstname']) ? $_POST['studentFirstname'] : '';
	$email = isset($_POST['studentEmail']) ? $_POST['studentEmail'] : '';
	$birthdate = isset($_POST['studentBirhtdate']) ? $_POST['studentBirhtdate'] : '';
	$cityID = isset($_POST['cit_id']) ? intval($_POST['cit_id']) : 0;
	$countryID = isset($_POST['cou_id']) ? intval($_POST['cou_id']) : 0;
	$maritalID = isset($_POST['mar_id']) ? intval($_POST['mar_id']) : 0;

	if (empty($name)) {
		$errorList[] = 'Le nom est vide';
	}
	if (empty($firstname)) {
		$errorList[] = 'Le prénom est vide';
	}
	if (empty($email)) {
		$errorList[] = 'L\'email est vide';
	}
	else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		$errorList[] = 'L\'email est incorrect';
	}
	if (empty($birthdate)) {
		$errorList[] = 'La date de naissance est vide';
	}
	if (empty($cityID)) {
		$errorList[] = 'La ville est manquante';
	}
	if (empty($countryID)) {
		$errorList[] = 'La nationalité est manquante';
	}

	if (empty($errorList)) {
		echo 'je peux insérer en DB<br />';
	}
	// Sinon, afficher le contenu du tableau $errorList dans view.php
}


// Fin POST


//- dans student, vérifier que les index des tableaux correspondent aux IDs des tables dans votre DB
$etudiantListe = array();
$citiesList = array(
	
	1 => 'Luxembourg',
	2 => 'Longwy',
	3=>'Esch sur Alzette',
	4 => 'Verdun',
	5 => 'Arlon',
	6 => 'Leudelange',
	7 => 'Pissange',
	
);
$countriesList = array(
	1 => 'France',
	2 => 'Luxembourg',
	3 => 'Belgique',
	4 => 'Allemagne',
	
);
$maritalStatusList = array(
	1 => 'Célibataire',
	2 => 'Marié(e)',
	3 => 'Divorcé(e)',
	4 => 'Veuf/veuve',
);

/*
QUERY pour les students
-----------------------
SELECT stu_id, stu_name, stu_firstname, cou_name, cit_name, mar_name
FROM student
LEFT OUTER JOIN country ON country.cou_id = student.cou_id
LEFT OUTER JOIN city ON city.cit_id = student.cit_id
LEFT OUTER JOIN marital_status ON marital_status.mar_id = student.mar_id
*/



/* EXERCICE 5
- récupérer les fichiers student et view
	view.php ne contient que l'affichage, student.php contient tout le reste
	view.php est inclus par student.php
- dans student, vérifier que les index des tableaux correspondent aux IDs des tables dans votre DB
- exécuter la requête récupérant tous les étudiants de la base de données, et les informations liées (ville,nationalité, etc.)
- remplir le bon tableau, avec les bons index pour que ces informations s'affichent dans view.php (affichage déjà écrit, mais tableau vide actuellement)
- dans student.php, récupérer & valider les données venant du formulaire en POST (tous les champs sont obligatoires)
	* si les données sont valides, rediriger vers student.php
	* si non valide, afficher quelles données sont erronées
*/

//exécuter la requête récupérant tous les étudiants de la base de données, et les informations liées (ville,nationalité, etc.)
$sql='
SELECT stu_id, stu_name, stu_firstname, cou_name, cit_name, mar_name, stu_email, stu_birthdate AS birthdate
FROM student
LEFT OUTER JOIN country ON country.cou_id = student.cou_id
LEFT OUTER JOIN city ON city.cit_id = student.cit_id
LEFT OUTER JOIN marital_status ON marital_status.mar_id = student.mar_id
';

$pdoStatement = $pdo->query($sql);

//si erreur

//remplir le bon tableau, avec les bons index pour que ces informations s'affichent dans view.php (affichage déjà écrit, mais tableau vide actuellement)

if ($pdoStatement === false) {
	print_r($pdo->errorInfo());
}
else if ($pdoStatement->rowCount() > 0) {
	$etudiantListe = $pdoStatement->fetchAll();
}

/* EXERCICE++
- ajouter un INDEX au champ stu_email pour s'assurer que chacune de ses valeurs soit unique
- lors d'un ajout (form en POST), avant d'insérer, tester s'il n'existe pas déjà un student avec le même email
	* si existe, alors on affiche une erreur
	* sinon, on continue le script d'insertion en DB
- à chaque ligne du tableau, ajouter un lien 'supprimer'
- dans student.php, gérer la suppression à partir de l'id du student passé en GET
*/

require 'inc/header.php';
require 'inc/add_view.php';
require 'inc/footer.php';
