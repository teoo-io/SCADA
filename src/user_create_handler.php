<?php
    session_start();
    require_once 'dao.php';
    $dao = new DAO();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    $errors = array();

    preg_match('/^[A-Za-z0-9+_.-]+@(.+)$/', $email, $matches, PREG_UNMATCHED_AS_NULL);
    if($email == ""){
        $errors = "You did not enter an email.";
    }
    if($password == ""){
        $errors = "You did not enter a password.";
    }
    if($password != $repeat_password){
        $errors[] = "Passwords do not match.";
    }
    if($dao->emailExists($email)){
        $errors[] = "This email already belongs to a user,";
    }else if($matches[0] == null){
        $errors[] = "This email is not valid.";
    }

    if(count($errors) > 0){
        $_SESSION['errors'] = $errors;
    }


    $dao->createUser($email, $password,1);
    header("Location: login.php");
    exit;
?>