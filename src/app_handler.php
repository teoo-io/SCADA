<?php
    require_once 'dao.php';
    $dao = new DAO();
    echo "sent...".$_POST["appName"] ."<br>";
    $dao->enableApplication($_POST["appName"]);
   // header('Location: settings.php');
    exit;
?>