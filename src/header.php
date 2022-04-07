<?php
session_start();
if(!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']){
    header("Location: login.php");
}
if(!isset($_SESSION['ran'])){
    $_SESSION['ran'] = 1;
    shell_exec("sudo raspi-gpio set 20 op");
    shell_exec("sudo raspi-gpio set 26 op");
    shell_exec("sudo raspi-gpio set 21 op");
}
?>
<html lang="en">
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon"/>
        <title>R2 Wheeling</title>
        <script src="https://kit.fontawesome.com/9a7cc6e46e.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="header">
            <div id="left-header">
            </div>
            <div id="middle-header">
                <a href="index.php"><img src="img/clear-logo.png" id="header-logo"></a>
            </div>
            <div class="right-header">
                <a href="logout.php"><h1><?php echo " ". $_SESSION['name'] . " ";?></h1><i class="fas fa-user-circle" id="user-icon"></i></a>
            </div>
        </div>
        <div class="page-container">
            <?php require_once 'nav.php';
            ?>
