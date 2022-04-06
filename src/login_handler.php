<?php
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    require_once 'dao.php';
    $dao = new DAO();
    $errors = array();
    $_SESSION['authenticated'] = $dao->userExists($email, $password);

    $_SESSION['email'] = $email;

    if($_SESSION['authenticated']==1){
        if(isset($_SESSION['create-user-errors'])){
            unset( $_SESSION['create-user-errors']);
        }
        if(isset($_SESSION['login-errors'])){
            unset( $_SESSION['login-errors']);
        }
        $_SESSION['name'] = $dao->getUserName($email,$password)['name'];
        header('Location: index.php');
    } else {
        $errors[] = "The user or password you entered is not valid.";
        $_SESSION['login-errors'] = $errors;
        header('Location: login.php');
    }
    exit;
?>