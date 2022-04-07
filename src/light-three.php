<?php
$output = " ";
session_start();
if(isset($_SESSION['light-three'])){
    if($_SESSION['light-three']==0){
        $_SESSION['light-three']=1;
        $output=shell_exec("sudo raspi-gpio set 21 dh");
    } else{
        $_SESSION['light-three']=0;
        $output=shell_exec("sudo raspi-gpio set 21 dl");
    }
} else {
    $_SESSION['light-three'] = 1;
    $output=shell_exec("sudo raspi-gpio set 21 dh");
}
header('Location: lights.php');
exit;

?>