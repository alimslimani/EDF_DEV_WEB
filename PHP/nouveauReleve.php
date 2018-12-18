<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Information Client</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../CSS/style1.css" />
</head>

<body>
<script language="Javascript">

function IsEmpty(){
  if(document.forms['frm'].value.value === "")
  {
    alert("Veuillez remplir le champ NOUVEAU RELEVE");
    return false;
  }
    return true;
}

</script>
<?php
        include 'cnx.php';
        echo "<h1>Information du client : ".$_GET['nom']." ".$_GET['prenom']."</h1>";
        echo '<input type="button" value="Home" class="btn btn-primary" background-color ="royalblue"  onclick="history.go(-1)">';
        echo "<br>";
        $sql = $cnx->prepare("
                SELECT distinct nom,prenom,ancienReleve,dernierReleve,identifiant
                FROM client               
                WHERE nom ='".$_GET['nom']."'");
        $sql->execute();
       
            foreach($sql-> fetchAll(PDO::FETCH_NUM) as $line){
                echo "<br>";
                echo "<tr>";
                echo '<th>Nom Client</th>';
                echo "<br>";
                echo "</tr>";
                echo "<input type='text' disabled='yes' value='$line[0]'>";                
                echo "<br>";echo "<br>";
                echo "<tr>";
                echo '<th>Prenom Client</th>';
                echo "<br>";
                echo "</tr>";
                echo "<input type='text' disabled='yes' value='$line[1]'>";
                echo "<br>";echo "<br>";
                echo "<tr>";
                echo '<th>Ancien Releve</th>';
                echo "<br>";
                echo "</tr>";
                echo "<input type='text' disabled='yes' value='$line[2]'>";
                echo "<br>";echo "<br>";
                echo "<tr>";
                echo '<th>Dernier Releve</th>';
                echo "<br>";
                echo "</tr>";
                echo "<input type='text' disabled='yes' value='$line[3]'>";
                echo "<br>";echo "<br>";
                echo "<tr>";
                echo '<th>Nouveau Releve</th>';
                echo "<br>";
                echo "</tr>";
                
            }     
        echo"<form name ='frm' action='update.php' method='GET'>";
        echo "<input type='number' name ='value' id='value' min='$line[3]'/> <br />";
        echo "<br>";
        echo "<input type='hidden' name ='id' id='id'value='$line[4]'></input>";
        echo "<input type='hidden' name ='dernierReleve' id='dernierReleve'value='$line[3]'></input>";
        echo "<br>";
        echo"<input type='submit' name ='inserer' value='Inserer' onclick='return IsEmpty()' />";
        echo"</form>";

    ?>
</body>
</html>