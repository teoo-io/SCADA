<?php
$output = " ";
session_start();
if(isset($_SESSION['light-two'])){
    if($_SESSION['light-two']==0){
        $_SESSION['light-two']=1;
        $output=shell_exec("sudo raspi-gpio set 26 dh");
    } else{
        $_SESSION['light-two']=0;
        $output=shell_exec("sudo raspi-gpio set 26 dl");
    }
} else {
    $_SESSION['light-two'] = 1;
    $output=shell_exec("sudo raspi-gpio set 26 dh");
}
header('Location: lights.php');
exit;

?>