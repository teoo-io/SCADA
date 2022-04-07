<?php
$output = " ";
session_start();
require_once 'dao.php';
$dao = new DAO();

if($_POST['app_enable'] == "Enable") {
    $dao->enableApplication('cam-view');
} else if($_POST['app_enable'] == "Disable") {
    $dao->disableApplication('cam-view');
}

header('Location: settings.php');
exit;

?>