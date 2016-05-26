<html>
<head>
	<title>Gestion des &Eacute;tudiants</title>
	<style type="text/css">
	HTML, BODY {
		font-family: Tahoma, Verdana, sans-serif;
	}
	</style>
</head>
<body>
	<form action="" method="post">
		<fieldset>
			<legend>Ajout d'un étudiant</legend>
			<input type="text" name="studentName" value="" placeholder="Nom"><br />
			<input type="text" name="studentFirstname" value="" placeholder="Prénom"><br />
			<input type="email" name="studentEmail" value="" placeholder="E-mail"><br />
			<input type="date" name="studentBirhtdate" value="" placeholder="Date de naissance (aaaa-mm-jj)"><br />
			Ville de résidence :<br />
			<select name="cit_id">
				<option value="0">choisissez :</option>
				<?php foreach ($citiesList as $key=>$value) :?>
				<option value="<?= $key ?>"><?= $value ?></option>
				<?php endforeach; ?>
			</select><br />
			Nationalité :<br />
			<select name="cou_id">
				<option value="0">choisissez :</option>
				<?php foreach ($countriesList as $key=>$value) :?>
				<option value="<?= $key ?>"><?= $value ?></option>
				<?php endforeach; ?>
			</select><br />
			Statut marital :<br />
			<select name="mar_id">
				<option value="0">choisissez :</option>
				<?php foreach ($maritalStatusList as $key=>$value) :?>
				<option value="<?= $key ?>"><?= $value ?></option>
				<?php endforeach; ?>
			</select><br />
			<input type="submit" value="Valider"><br />
		</fieldset>
	</form>
	<br>
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
			</tr>
		</thead>
		<tbody>
<?php foreach ($etudiantListe as $currentEtudiant) : ?>
			<tr>
				<td><?= $currentEtudiant['stu_name'] ?></td>
				<td><?= $currentEtudiant['stu_firstname'] ?></td>
				<td><?= $currentEtudiant['stu_email'] ?></td>
				<td><?= $currentEtudiant['cit_name'] ?></td>
				<td><?= $currentEtudiant['cou_name'] ?></td>
				<td><?= $currentEtudiant['mar_name'] ?></td>
				<td><?= $currentEtudiant['birthdate'] ?></td>
			</tr>
<?php endforeach; ?>
		</tbody>
	</table>
<?php else :?>
	aucun étudiant
<?php endif; ?>
</body>
</html>