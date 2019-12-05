<?php
    session_start();
    require_once '../../controllers/register/controller.php';
    $pctrl = new Controller();
    $profile = array();
    if (isset($_SESSION['account'])) {
        $profile = $pctrl->getprofile($_SESSION['account']);    
    } else {
        header('Location: ../../views/login/login.php');
    }
?>
    