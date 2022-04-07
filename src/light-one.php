<?php
$output = " ";
session_start();
if(isset($_SESSION['light-one'])){
    if($_SESSION['light-one']==0){
        $_SESSION['light-one']=1;
        $output=shell_exec("sudo raspi-gpio set 20 dh");
    } else{
        $_SESSION['light-one']=0;
        $output=shell_exec("sudo raspi-gpio set 20 dl");
    }
} else {
    $_SESSION['light-one'] = 1;
    $output=shell_exec("sudo raspi-gpio set 20 dh");
}
header('Location: lights.php');
exit;

?>