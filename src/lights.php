<?php
$current = 'lights';
require_once 'header.php';
?>
    <div class ="content" id="lights">
        <?php
        echo "<pre>" . print_r($_SESSION,1) . "</pre>";
        ?>
    </div>
<?php
require_once 'footer.php'
?>