<?php

/*
On veut insérer la liste complète des étudiants de la session 2 dans la table student.
On dispose de certaines informations dans le tableau se trouvant dans students_session2.php.
Cependant, des étudiants sont déjà renseignés dans la table student. Il ne faut donc ajouter que les étudiants n'y figurant pas.
Pour savoir si un étudiant est déjà dans la table, on se basera sur le champ "email".
D'ailleurs, pour plus de sécurité, on va ajouter un attribut d'unicité sur ce champ, dans la table student.

Copiez ces 2 fichiers dans un répertoire batch de votre projet Toto, puis éditez ce fichier pour effectuer les insertions en DB.
*/
require '../inc/db.php';
require 'students_session2.php';
$emailListe = array();
$eamilListFinal= array();

$sql1='
	SELECT stu_email
	FROM student
';

$pdoStatement1 = $pdo->query($sql1);
$emailListe = $pdoStatement1->fetchAll();
//print_r($emailListe);

for ($j=0; $j<sizeof($emailListe); $j++){
	$emailListeFinal[$j]=$emailListe[$j][0]; 
}
print_r($emailListeFinal);


$sql = '
	INSERT INTO student (ses_id, stu_name, stu_firstname, stu_email, stu_birthdate, stu_sex, stu_with_experience, stu_is_leader) 
	VALUES (:session, :name, :firstname, :email, :birthdate, :sex, :experience, :leader)
';

for ($i=0; $i<sizeof($studentsList); $i++){

	$name = $studentsList[$i]['name'];
	$firstname = $studentsList[$i]['firstname'];
	$email = $studentsList[$i]['email'];
	$birthdate = $studentsList[$i]['birthdate'];
	$sex = $studentsList[$i]['sex'];
	$with_experience = $studentsList[$i]['with_experience'];
	$is_leader = $studentsList[$i]['is_leader'];

	$emailEx= false;
	
	if(in_array($studentsList[$i]['email'], $emailListeFinal)){
		$emailEx = true;
	}
	
	if($emailEx == false){
		$pdoStatement = $pdo->prepare($sql);
		$pdoStatement->bindValue(':name',$name);
		$pdoStatement->bindValue(':firstname',$firstname);
		$pdoStatement->bindValue(':email',$email);
		$pdoStatement->bindValue(':birthdate',$birthdate);
		$pdoStatement->bindValue(':sex',$sex);
		$pdoStatement->bindValue(':experience',$with_experience, PDO::PARAM_INT);
		$pdoStatement->bindValue(':leader',$is_leader, PDO::PARAM_INT);
		$pdoStatement->bindValue(':session',2, PDO::PARAM_INT);
		$pdoStatement->execute();
	}
	
} 