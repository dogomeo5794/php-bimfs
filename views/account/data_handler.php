<?php
    require_once '../../controllers/register/controller.php';

    $pctrl = new Controller();
    $action = $_POST['action'];
    if($action == 'getpassword') {
        $result = $pctrl->getpassword();
        
        $upass = $_POST['value'];
        
        $dreg = $result['datereg'];
        $pass = $result['password'];
        $newpass = hash('sha256', $upass.date('y', strtotime($result['datereg'])));
        
        if ($newpass == $pass) {
            echo json_encode(array('response'=>true, 'message'=>'Password match')); 
        } else {
            echo json_encode(array('response'=>false, 'message'=>'Password not match')); 
        }
        
    } else if ($action == 'update') {
        $data = array(
            'type' => $_POST['type'],
            'value' => $_POST['value']
        );
        
        $result = $pctrl->update($data);
        
        echo json_encode($result);
    } else if ($action == 'logout') {
        $result = $pctrl->logout();
        echo json_encode($result);
    }

?>