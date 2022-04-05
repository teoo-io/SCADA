<?php
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    require_once 'dao.php';
    $dao = new DAO();
    $errors = array();
    $_SESSION['authenticated'] = $dao->userExists($email, $password);

    if($_SESSION['authenticated']==1){
        header('Location: index.php');
    } else {
        $errors[] = "The user or password you entered is not valid.";
        $_SESSION['login-errors'] = $errors;
        $_SESSION['email'] = $email;
        header('Location: login.php');
    }
    exit;
?>