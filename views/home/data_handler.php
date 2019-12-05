<?php
    require_once '../../controllers/home/controller.php';
    $pctrl = new Controller();
    $action = $_POST['action'];
    if ($action == 'getchildren') {
        $result = $pctrl->getchildren();
        echo json_encode($result);
    } else if ($action == 'getchildrenstat') {
        $result = $pctrl->getchildrenstat();
        echo json_encode($result);
    } else if ($action == 'getpregnant') {
        $result = $pctrl->getpregnant();
        echo json_encode($result);
    } else if ($action == 'getpregnantstat') {
        $result = $pctrl->getpregnantstat();
        echo json_encode($result);
    }
?>