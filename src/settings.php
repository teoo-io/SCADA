<?php
$current = 'settings';
require_once 'header.php';

?>
    <div class ="app" id="settings">
        <ul id='nav-li'>
            <form method="post">
            <?php
            require_once 'dao.php';
            $dao = new DAO();
            echo "<h2> Apps Available:</h2>";
            $applications = $dao->getApplications();
            foreach ($applications as $application){
                echo "<a href='{$application['app_directory']}' class='nav-anchor'><li> <i class='{$application['app_logo']}'></i></li> </a>";
                if($application['app_enabled']){
                    echo "<input type='submit' name='app_disable' value='Disable' />";
                } else {
                    echo "<input type='submit' name='app_enable' value='Enable' />";
                }
            }
            if(array_key_exists('app_enable', $_POST)) {
                $dao->enableApplication('lights');
            } else if(array_key_exists('app_disable', $_POST)) {
                $dao->disableApplication('lights');
            }

            ?>
            </form>
        </ul>
    </div>
<?php
require_once 'footer.php'
?>