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
        <div class="header">
            <div class="left-header">
                <input id="menu-input" type="checkbox" name="menu-input" />
                <label for="menu-input"><h1 class="name"><?php echo " ". $_SESSION['name'] . " ";?></h1><i class="fas fa-user-circle" id="user-icon"></i></label>
                <ul class="submenu">
                    <li><a href="logout.php">Log out</a></li>
                    <li><a href="account_delete_handler.php">Delete Account</a></li>
                </ul>
            </div>

            <div id="logo-header">

                <h1>R2Wheeling</h1>
            </div>
        </div>
        <div class="page-container">
            <?php require_once 'nav.php';
            ?>
