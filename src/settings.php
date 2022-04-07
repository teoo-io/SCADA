<?php
$current = 'settings';
require_once 'header.php';

?>
    <div class ="app" id="settings">
        <ul id='nav-li'>
            <form action="app_handler.php" method="POST">
            <?php
            require_once 'dao.php';
            $dao = new DAO();
            echo "<h2> Apps Available:</h2>";
            $applications = $dao->getApplications();
            foreach ($applications as $application){
                echo "<a href='{$application['app_directory']}' class='nav-anchor'><li> <i class='{$application['app_logo']}'></i></li> </a>";
                if($application['app_enabled']){
                    echo "<input type='submit' name='app_disable' value='Disable' id='app_disable'/>";
                } else {
                    echo "<input type='submit' name='app_enable' value='Enable' id='app_disable'/>";
                }
            }

            ?>
            </form>
        </ul>
    </div>
<?php
require_once 'footer.php'
?>