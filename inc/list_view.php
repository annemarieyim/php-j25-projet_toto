<form>
	<!-- pour continuer à fournir ses_id dans l'URL -->
	<input type="hidden" name="ses_id" value="<?=$sessionID?>">
	<select name="nbPerPage">
		<option value="1">1 par page</option>
		<option value="2">2 par page</option>
		<option value="3">3 par page</option>
		<option value="4">4 par page</option>
		<option value="5">5 par page</option>
		<option value="6">6 par page</option>
	</select>
	<input type="submit" value="OK">
</form>

<h3>Liste des étudiants</h3>
<?php if (isset($etudiantListe) && sizeof($etudiantListe) > 0) : ?>
	<table>
		<thead>
			<tr>
				<td>Nom</td>
				<td>Prénom</td>
				<td>Email</td>
				<td>Ville</td>
				<td>Nationalité</td>
				<td>Statut marital</td>
				<td>Date de naissance</td>
				<td>Editer</td>
			</tr>
		</thead>
		<tbody>
<?php foreach ($etudiantListe as $currentEtudiant) : ?>
			<tr>
				<td><a href="student.php?stu_id=<?=$currentEtudiant['stu_id']?>"><?= $currentEtudiant['stu_name'] ?></a></td>
				<td><a href="student.php?stu_id=<?=$currentEtudiant['stu_id']?>"><?= $currentEtudiant['stu_firstname'] ?></a></td>
				<td><?= $currentEtudiant['stu_email'] ?></td>
				<td><?= $currentEtudiant['cit_name'] ?></td>
				<td><?= $currentEtudiant['cou_name'] ?></td>
				<td><?= $currentEtudiant['mar_name'] ?></td>
				<td><?= $currentEtudiant['birthdate'] ?></td>
				<td><a href="edit.php?ses_id=<?=$currentEtudiant['ses_id']?>">Editer </a></td>
			</tr>
<?php endforeach; ?>
		</tbody>
	</table>
	<br/><br/>

	<button>
		<a href="list.php?ses_id=<?=$sessionID?>&page=<?=($currentPage-1)?>">PRECEDENT<-</a><br/>
	</button>
	
	<button>
		<a href="list.php?ses_id=<?=$sessionID?>&page=<?=($currentPage+1)?>">SUIVANT -></a><br/>
	</button>
	<br/><br/>
<?php else :?>
	aucun étudiant
<?php endif; ?>

<button>
	<a href="index.php?ses_id=<?=$currentEtudiant['ses_id']?>">Retour à la liste des sessions</a>
</button>	

