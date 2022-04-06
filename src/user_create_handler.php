<?php
    session_start();
    require_once 'dao.php';
    $dao = new DAO();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    $name = $_POST['name'];
    $errors = array();

    preg_match('/^[A-Za-z0-9+_.-]+@(.+)$/', $email, $email_matches, PREG_UNMATCHED_AS_NULL);
    if($email == ""){
        $errors[] = "You did not enter an email.";
    } else if($dao->emailExists($email)){
        $errors[] = "This email already belongs to a user.";
    } else if($email_matches[0] == null){
        $errors[] = "The email format you entered is not valid.";
    }

    if($name == ""){
        $errors[] = "You must provide a name.";
    } else if(strlen($name) > 10){
        $errors[] = "Please enter a name less than 10 characters long.";
    }

    preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/', $password, $password_matches, PREG_UNMATCHED_AS_NULL);
    if($password == ""){
        $errors[] = "You did not enter a password.";
    } else if($password != $repeat_password){
        $errors[] = "Passwords you entered do not match.";
    } else if($password_matches[0] == null){
        $errors[] = "Password must contain at least 8 characters, one letter, one number and one special character.";
    }



    $_SESSION['email'] = $email;
    $_SESSION['name'] = $name;
    if(count($errors) > 0){
        $_SESSION['create-user-errors'] = $errors;
        header("Location: create_user.php");
    } else {
        unset( $_SESSION['create-user-errors']);
        $dao->createUser($email,$name, $password,1);
        $alert = "User with email " . $email . "successfully created.";
        $_SESSION['user-created'] = $email;

//        echo "<pre>". print_r($_POST) ."</pre>";
        header("Location: login.php");
    }
    exit;
?>