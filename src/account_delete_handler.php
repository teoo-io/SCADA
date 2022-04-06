<?php
session_start();
require_once 'dao.php';
$dao = new DAO();
$dao->deleteUser($_SESSION['email']);
session_destroy();
header('Location: index.php');
exit;
?>