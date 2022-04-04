<?php
    session_start();
    session_unset();
    $email = $_POST['email'];
    $password = $_POST['password'];
    require_once 'dao.php';
    $dao = new DAO();
    $errors = array();
    $_SESSION['authenticated'] = $dao->userExists($email, $password);

    if($_SESSION['authenticated']){
//        header('Location: index.php');
    } else {
        $errors[] = "This user or password you entered is not valid.";
        $_SESSION['login-errors'] = $errors;
//        header('Location:login.php');
    }
    echo"<pre>" . print_r($_SESSION) . "</pre>"
//    exit;
?>