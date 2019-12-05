<?php
    require_once '../../controllers/reports/controller.php';
    $rctrl = new Controller();
    $action = $_POST['action'];
    if($action == 'getreports') {
        $data = array(
            "type"    => $_POST['type'],
            "from"      => $_POST['from'],
            "to"        => $_POST['to']
        );
        
        $result = $rctrl->getreports($data);
        
        echo json_encode($result);
    }
?>