<?php
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    require_once 'dao.php';
    $dao = new DAO();
    $dao->createUser($email, $password,1);
    header("Location: login.php");
    exit;
?>