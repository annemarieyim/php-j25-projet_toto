<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PROJET TOTO INDEX VIEW</title>
		<style type="text/css">
		HTML, BODY {
			font-family: Tahoma, Verdana, sans-serif;
		}

		table, th, td {
    		border: 1px solid black;
		}
		.statistique{
			text-align : center;
			background-color: lightgrey;
			color: yellow;
			font-weight: bold;
			font-size: 25px;
		}
		</style>
	</head>
	<body>
		<h3>Session à Esch sur BELVAL</h3>
		<ul>
		<?php foreach ($sessionList as $key=>$value):?>
			<li>
				<a href="list.php?ses_id=<?=$value['ses_id']?>">
				du <?= $value['ses_opening']?> 
				au <?= $value['ses_ending']?>
				</a>
			</li>
		<?php endforeach;?>
		</ul>

		<h3>Statistique: Nombre d'étudiants par ville</h3>	
		<table align="center" style="width:70%" class="statistique">
			<thead valign="top">
				<tr>
					<td>Nom de la ville</td>
					<td>Nombre d'étudiants</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($nbStudentPerCity as $key=>$value):?>	
					<tr>
						<td><?php echo $value['cit_name']?></td>
						<td><?php echo $value['nbStudent']?></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</body>
</html>


