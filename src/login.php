<?php
session_start();

if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"]) {
    header("Location:granted.php");
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
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
                <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Create User</label>
                <div class="login-form">
                    <div class="sign-in-htm">
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
                    </div>
                    <div class="sign-up-htm">
                        <form action="user_create_handler.php" method="POST">
                            <div class="group">
                                <label class="label" for="email">Email</label>
                                <input class="input" type="text" name="email" id="email" value="<?php echo $email; ?>"/>
                            </div>
                            <div class="group">
                                <label class="label" for="password">Password</label>
                                <input class="input" type="password" name="password" id="password" value=""/>
                            </div>
                            <div class="group">
                                <label class="label" for="password">Repeat Password</label>
                                <input class="input" type="password" name="repeat_password" id="repeat_password" value=""/>
                            </div>
                            <div class="group">
                                <input type="submit" class="button" id="create_user" value="Create User">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>

