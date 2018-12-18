<?php
        include 'cnx.php';
        // write query 
        $sql = $cnx->prepare("update client 
        SET ancienReleve ='".$_GET['dernierReleve']."', dernierReleve ='".$_GET['value']."'
        WHERE identifiant ='".$_GET['id']."'");
        // execure query
        $sql->execute();
        header('Location: index.php');
        exit();
?>