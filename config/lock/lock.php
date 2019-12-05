<?php
    
    if (isset($_POST['lock'])) {
        session_start();
        $type = $_POST['type'];
        if ($type == 'unlock') {
            $upass = $_POST['password'];
            $newpass = hash('sha256', $upass.date('y', strtotime($_SESSION['dreg_token'])));
                    
            if ($newpass == $_SESSION['up_token']) {
                unset($_SESSION['iflock']);
                echo json_encode(array('response'=>true, 'message'=> 'success'));
            } else {
                echo json_encode(array('response'=>false, 'message'=> 'failed'));
            }
            exit();
        } else if ($type == 'lockup') {
            $_SESSION['iflock'] = true;
            echo json_encode(array('response'=> true));
            exit();
        }
    }

    if (isset($_SESSION['iflock'])) {
        include_once('../login/screen-lock.php');
        exit();
    }
?>
