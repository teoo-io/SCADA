
<div class="nav">
    <ul id='nav-li'>
        <a href="index.php" class="nav-anchor">
            <li <?php if ($current == 'index') { echo "id='current_page-li'"; } else { echo "id='nav-li'"; }?>>
                <i class="fas fa-truck-pickup" id='nav-i'></i>
            </li>
        </a>

        <?php
        require_once 'dao.php';
        $dao = new DAO();
        $applications = $dao->getApplications();
        foreach ($applications as $application){
            if($application['app_enabled']){
                echo "<a href='{$application['app_directory']}' class='nav-anchor'><li ";
                if ($current == $application['app_name']) { echo "id='current_page-li'"; } else { echo "id='nav-li'"; }
                echo "> <i class='{$application['app_logo']}' id='nav-i'></i></li> </a>";
            }
        }
        ?>

        <a href="settings.php" class="nav-anchor">
            <li <?php if ($current == 'settings') { echo "id='current_page-li'"; } else { echo "id='nav-li'"; }?>>
                <i class="fas fa-wrench" id='nav-i'></i>
            </li>
        </a>
    </ul>
</div>
