<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Liste Clients</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../CSS/style.css" />
</head>
<body>
    <?php
        include 'cnx.php';
        echo "<h1> Liste des clients du controleur ".$_GET['nom']." - ".$_GET['prenom']."</h1>";
        // write query 
        $sql = $cnx->prepare("select nom,prenom,ancienReleve,dernierReleve,idcontroleur
        from client where idcontroleur ='".$_GET['id']."'");
        // execure query
        $sql->execute();
        echo "<table>";
        // travailler avec des numéro au lieu des association
            foreach($sql-> fetchAll(PDO::FETCH_NUM) as $line){
                echo "<tr>";
				echo "<td>".$line[0]."</td>";
                echo "<td>".$line[1]."</td>";
                echo "<td>".$line[2]."</td>";
                echo "<td>".$line[3]."</td>";
                echo "<td><a href='nouveauReleve.php?nom=".$line[0]."&prenom=".$line[1]."&ancienReleve=".$line[2]."&dernierReleve=".$line[3]."&idcontroleur=".$line[4]."'> Nouveau Releve </a></td>";			
                echo "</tr>";
                echo "</tr>";
            }
        echo "</table>";     
        echo "<br>";
        echo '<input type="button" value="Retour" class="btn btn-primary" background-color ="royalblue" onclick="history.go(-1)">';
    ?>
</body>
</html>