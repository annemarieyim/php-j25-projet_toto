<h3>INFORMATIONS SUR L'ETUDIANT :</h3>
<ul href="student.php?stu_name=<?=$etudiantListe['stu_id']?>" >
		<li>
		le nom de l'étudiant est : <strong><?= $etudiantListe['stu_name']?></strong><br/> 
		le prénom de l'étudiant est : <strong><?= $etudiantListe['stu_firstname']?></strong><br/>
		l'email de l'étudiant est : <strong><?= $etudiantListe['stu_email']?></strong><br/> 
		le ville de l'étudiant est : <strong><?= $etudiantListe['cit_name']?></strong><br/> 
		le pays d'origine de l'étudiant est : <strong><?= $etudiantListe['cou_name']?></strong><br/> 
		le statut marital de l'étudiant est : <strong><?= $etudiantListe['mar_name']?></strong><br/> 
		la date de naissance de l'étudiant est : <strong><?= $etudiantListe['birthdate']?></strong><br/> 
		l'étudiant est-il le leader de la session?0 (no) and 1 (yes)<strong><?= $etudiantListe['delegue']?></strong><br/>
		le signe zodiacal de l'étudiant est : <strong><?= $zodiacFr?></strong><br/>   
	</li>
</ul>
<br/>
<button>
	<a href="list.php?ses_id=<?=$etudiantListe['ses_id']?>">Retour sur la liste des étudiants</a>
</button>

