<?php
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    require_once 'dao.php';
    $dao = new DAO();
    $_SESSION['authenticated'] = $dao->userExists($email, $password);

    if($_SESSION['authenticated']){
        header('Location: index.php');
    } else {
        header('Location:login.php');
    }
    exit;
?>