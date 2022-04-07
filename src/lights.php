<?php
$current = 'lights';
require_once 'header.php';
?>
    <div class ="app" id="lights">
        <div class="header">
            <div id="left-light">
                <a href="light-one.php"><i class="fas fa-lightbulb" <?php if(isset($_SESSION['light-one']) && $_SESSION['light-one'] == 1){ echo "id='current_light-i'"; } else { echo "id='light-i'"; }?>></i></a>
            </div>
            <div id="middle-light">
                <a href="light-two.php"><i class="fas fa-sun" <?php if(isset($_SESSION['light-two']) && $_SESSION['light-two'] == 1){ echo "id='current_light-i'"; } else { echo "id='light-i'"; }?>></i></a>
            </div>
            <div class="right-light">
                <a href="light-three.php"><i class="fas fa-lightbulb" <?php if(isset($_SESSION['light-three']) && $_SESSION['light-three'] == 1){ echo "id='current_light-i'"; } else { echo "id='light-i'"; }?>></i></a>
            </div>
        </div>
    </div>
<?php
require_once 'footer.php'
?>