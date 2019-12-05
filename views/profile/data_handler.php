<?php
    require_once '../../controllers/register/controller.php';
    $pctrl = new Controller();
    $action = $_POST['action'];
    if($action == 'getpassword') {
        $result = $pctrl->getpassword();
        
        $dreg = $result['datereg'];
        $pass = $result['password'];
        echo json_encode($result); 
    }


echo json_encode("serger"); 
?>