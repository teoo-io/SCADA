<?php
session_start();

if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] == 1) {
    header("Location: index.php");
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
    <div class="login-wrap">
        <div class="login-html">
            <!-- <img class="login-form-logo" src="img/logo-med.png"> -->
            <a href="login.php"><h4 class="tab">Sign In</h4></a>
            <a href="create_user.php"><h4 class="current-tab">Create User</h4></a>

            <div class="login-form">
                <form action="user_create_handler.php" method="POST">
                    <div class="group">
                        <label class="label" for="email">Email*</label>
                        <input class="input" type="text" name="email" placeholder="EMAIL" id="email" value="<?php if (isset($_SESSION['email'])){echo $_SESSION['email'];}?>"/>
                    </div>
                    <div class="group">
                        <label class="label" for="name">First Name*</label>
                        <input class="input" type="text" name="name" placeholder="FIRST NAME" id="name" value="<?php if (isset($_SESSION['name'])){echo $_SESSION['name'];}?>"/>
                    </div>
                    <div class="group">
                        <label class="label" for="password">Password*</label>
                        <input class="input" placeholder="PASSWORD" type="password" name="password" id="password" value=""/>
                    </div>
                    <div class="group">
                        <label class="label" for="repeat_password">Repeat Password*</label>
                        <input class="input" placeholder="REPEAT PASSWORD" type="password" name="repeat_password" id="repeat_password" value=""/>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" id="create_user" value="Create User">
                    </div>
                </form>
                <div>
                    <?php
                    if (isset($_SESSION["create-user-errors"])) {
                        echo "<h4>ERROR: </h4><ul>";
                        foreach ($_SESSION["create-user-errors"] as $error){
                            echo "<li>{$error}</li>";
                        }
                        echo "</ul>";
                    } else {
                        echo "<h4>ACCOUNT GUIDELINES: </h4><ul>";
                        echo "<li>Use a valid e-mail format.</li>";
                        echo "<li>Enter a name (max 10 characters).</li>";
                        echo "<li>Password must contain at least 8 characters, one letter, one number and one special character.</li>";
                        echo "</ul>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

