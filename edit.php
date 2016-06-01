<pre>
<?php
$dsn = 'mysql:dbname=tablepdo;host=localhost;charset=utf8';
// J'instancie mon objet PDO et créé la connexion à la DB
$pdo = new PDO($dsn,'root', 'yluredewittig');

// Formulaire soumis
if (!empty($_POST)) {
	/*print_r($_POST);
	print_r($_FILES);*/

	// Je récupère mon tableau avec les infos sur le fichier
	foreach ($_FILES as $key => $fichier) {
		// Je teste si le fichier a été uploadé
		if (!empty($fichier) && !empty($fichier['name'])) {
			print_r($fichier);
			// Je déplace le fichier uploadé au bon endroit
			if (move_uploaded_file($fichier['tmp_name'], 'upload/'.$fichier['name'])) {
				echo 'fichier téléversé<br />';
			}
			else {
				echo 'une erreur est survenue<br />';
			}
		}
	}
}

?>

<h1>Upload de fichier</h1>
<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="fichierSoumis" value="1">
	<input type="file" name="fichierteleverse"><br/><br/>
	<input type="file" name="fichierteleverse2"><br/><br/>
	<input type="submit" value="Téléverser">
</form>

</pre>

