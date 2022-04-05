<?php
session_start();

if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] == 1) {
    header("Location: index.php");
}

$email = "";
if (isset($_SESSION["email_preset"])) {
    $email = $_SESSION["email_preset"];
}
?>
<html lang="en">
<head>
    <link rel="stylesheet" href="login.css">
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
            <a href="create_user.php"><h4 class="tab">Create User</h4></a>

            <div class="login-form">
                <form action="login_handler.php" method="POST">
                    <div class="group">
                        <label class="label" for="email">Email</label>
                        <input class="input" type="text" name="email" id="email" value="<?php echo $email; ?>"/>
                    </div>
                    <div class="group">
                        <label class="label" for="password">Password</label>
                        <input class="input" type="password" name="password" id="password" value=""/>
                    </div>
                    <div class="group">
                        <input class="button" type="submit" name="submit" id="login" value="Login"/>
                    </div>
                </form>
                <div>
                    <?php
                    if (isset($_SESSION["login-errors"])) {
                        echo "<h4>ERROR: </h4><ul>";
                        foreach ($_SESSION["login-errors"] as $error){
                            echo "<li>{$error}</li>";
                        }
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

