<?php
session_start();
if(!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']){
    header("Location: login.php");
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
        <div id="page-container">
            <div class="nav">
                <i class="fas fa-user-circle" id="user-icon"></i>
                <div id="logo-header">

                    <h1>R2Wheeling</h1>
                </div>

            </div>
            <?php require_once 'nav.php';
            ?>
