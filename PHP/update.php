<?php
        include 'cnx.php';
        // write query 
        $sql = $cnx->prepare("update client 
        SET ancienReleve = ='".$_GET['dernierReleve']."' 
        AND dernierReleve ='".$_GET['value']."'
        WHERE identifiant ='".$_GET['id']."'");
        // execure query
        $sql->execute();
        history.go(-1);
?>