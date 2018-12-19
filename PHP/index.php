<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Controleurs</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="../CSS/style.css" />
</head>
<body>
<?php
	include 'cnx.php';
	echo "<h1> Liste des controleurs </h1>";
	// write query 
	$sql = $cnx->prepare("select distinct nom,prenom,id from controleur");
	// execure query
	$sql->execute();
	echo "<table>";
	// travailler avec des numéro au lieu des association
		foreach($sql-> fetchAll(PDO::FETCH_NUM) as $line){
			echo "<tr>";
			echo "<td>".$line[0]."</td>";			
			echo "<td>".$line[1]."</td>";
			echo "<td><a href='controleur.php?nom=".$line[0]."&prenom=".$line[1]."&id=".$line[2]."'> Tous les clients </a></td>";
			echo "</tr>";
		}
		echo "</table>";
	?>
</body>
</html>