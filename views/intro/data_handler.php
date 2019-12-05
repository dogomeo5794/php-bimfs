<?php
    require_once '../../controllers/parents/controller.php';
    $pctrl = new Controller();
    $action = $_POST['action'];
    if($action == 'add') {
        $data = array(
            "fn" => $_POST['pfname'],
            "mn" => $_POST['pmname'],
            "ln" => $_POST['plname'],
            "fno" => $_POST['pfamno'],
            "bdy" => $_POST['pbday'],
            "hg" => $_POST['pheight'],
            "bl" => $_POST['pblood'],
            "add" => $_POST['paddress']
        );
//        $data = array($fn, $mn, $ln, $fno, $bdy, $hg, $bl, $add);
        
        
        $result = $pctrl->insert($data);
        
        echo json_encode($result);
    }
?>