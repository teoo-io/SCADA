<?php
    session_start();
    session_unset();
    require_once 'dao.php';
    $dao = new DAO();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    $errors = array();

    preg_match('/^[A-Za-z0-9+_.-]+@(.+)$/', $email, $email_matches, PREG_UNMATCHED_AS_NULL);
    if($email == ""){
        $errors[] = "You did not enter an email.";
    }else if($dao->emailExists($email)){
        $errors[] = "This email already belongs to a user,";
    }else if($email_matches[0] == null){
        $errors[] = "The email format you entered is not valid.";
    }

    preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/', $password, $password_matches, PREG_UNMATCHED_AS_NULL);
    if($password == ""){
        $errors[] = "You did not enter a password.";
    }else if($password != $repeat_password){
        $errors[] = "Passwords you entered do not match.";
    } else if($email_matches[0] == null){
        $errors[] = "Password must be at least 8 characters, at least one letter, one number and one special character.";
    }

    if(count($errors) > 0){
        $_SESSION['create-user-errors'] = $errors;
        $_SESSION['error-origin'] = "create-user";
    } else {
        $dao->createUser($email, $password,1);
    }
    header("Location: login.php");
    exit;
?>