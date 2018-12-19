<?php
        include 'cnx.php';
        // write query 
        
        echo "<h1> Liste des clients du controleur ".$_GET['nom']."</h1>";
        $sql = $cnx->prepare("update client 
        SET ancienReleve ='".$_GET['dernierReleve']."', dernierReleve ='".$_GET['value']."'
        WHERE identifiant ='".$_GET['id']."'");
        // execure query
        $sql->execute();
        $idcontroleur = $_GET['idcontroleur'];
        echo $idcontroleur;
        $sql = $cnx->prepare("select distinct nom,prenom,id from controleur where id='".$idcontroleur."'");
        // execure query
        $sql->execute();
            foreach($sql-> fetchAll(PDO::FETCH_NUM) as $line){
                $nom = $line[0];
                $prenom = $line[1];
                $idcontroleur= $line[2];
            } 
        echo "<br>";
        header('Location: controleur.php?nom='.$nom.'&prenom='.$prenom.'&id='.$idcontroleur.'');
        exit();
?>
