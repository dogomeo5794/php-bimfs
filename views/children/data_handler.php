<?php
    require_once '../../controllers/children/controller.php';
    require_once '../../controllers/barangay/controller.php';
    $cctrl = new Controller();
    $brgy = new brgyController();
    $action = $_POST['action'];
    if($action == 'add') {
        $data = array(
            "cfname"    => $_POST['cfname'],
            "cmname"    => $_POST['cmname'],
            "clname"    => $_POST['clname'],
            "caddress"  => $_POST['caddress'],
            "motname"   => $_POST['motname'],
            "motschool" => $_POST['motschool'],
            "motwork"   => $_POST['motwork'],
            "fatname"   => $_POST['fatname'],
            "fatschool" => $_POST['fatschool'],
            "fatwork"   => $_POST['fatwork'],
            "cfamno"    => $_POST['cfamno'],
            "childno"   => $_POST['childno'],
            "cgender"   => $_POST['cgender'],
            "cbday"     => $_POST['cbday'],
            "cweight"   => $_POST['cweight'],
            "dfseen"    => $_POST['dfseen'],
            "placedeliver"  => $_POST['placedeliver']
        );
//        $data = array($fn, $mn, $ln, $fno, $bdy, $hg, $bl, $add);
        
        
        $result = $cctrl->insert($data);
        
        echo json_encode($result);
    } else if ($action == 'getbrgy') {
        $result = $brgy->getbrgy();
        echo json_encode($result);
    } else if ($action == 'getchild') {
        $id = $_POST['id'];
        $result = $cctrl->getwhere($id);
        echo json_encode($result);
    } else if ($action == 'addsiblings') {
        $id = $_POST['id'];
        $name = $_POST['sibling_name'];
        $gender = $_POST['sibling_gender'];
        $bday = $_POST['sibling_bday'];
        $result = $cctrl->addsiblings($id, $name, $gender, $bday);
        echo json_encode($result);
    } else if ($action == 'updatesiblings') {
        $id = $_POST['sibling_id'];
        $name = $_POST['sibling_name'];
        $gender = $_POST['sibling_gender'];
        $bday = $_POST['sibling_bday'];
        $result = $cctrl->updatesiblings($id, $name, $gender, $bday);
        echo json_encode($result);
    } else if ($action == 'update_nutrition') {
        $id = $_POST['id'];
        $answer_1st = $_POST['answer_1st'];
        $answer_2nd = $_POST['answer_2nd'];
        $answer_3rd = $_POST['answer_3rd'];
        $answer_4th = $_POST['answer_4th'];
        $answer_5th = $_POST['answer_5th'];
        $answer_6th = $_POST['answer_6th'];
        $result = $cctrl->updatenutrition($id, $answer_1st, $answer_2nd, $answer_3rd, $answer_4th, $answer_5th, $answer_6th);
        echo json_encode($result);
    } else if ($action == 'getbrother') {
        $id = $_POST['id'];
        $result = $cctrl->get_brother_sister($id);
        echo json_encode($result);
    } else if ($action == 'getnutrition') {
        $id = $_POST['id'];
        $result = $cctrl->get_health_nutrition($id);
        echo json_encode($result);
    } else if ($action == 'getall') {
        $result = $cctrl->getall();
        echo json_encode($result);
    } else if ($action == 'update_child') {
        $data = array(
            'cid'           => $_POST['cid'],
            'cfname'        => $_POST['update_cfname'],
            'cmname'        => $_POST['update_cmname'],
            'clname'        => $_POST['update_clname'],
            'caddress'      => $_POST['update_caddress'],
            'motname'       => $_POST['update_motname'],
            'motschool'     => $_POST['update_motschool'],
            'motwork'       => $_POST['update_motwork'],
            'fatname'       => $_POST['update_fatname'],
            'fatschool'     => $_POST['update_fatschool'],
            'fatwork'       => $_POST['update_fatwork'],
            'cfamno'        => $_POST['update_cfamno'],
            'childno'       => $_POST['update_childno'],
            'cgender'       => $_POST['update_cgender'],
            'cbday'         => $_POST['update_cbday'],
            'cweight'       => $_POST['update_cweight'],
            'dfseen'        => $_POST['update_dfseen'],
            'placedeliver'  => $_POST['update_placedeliver'],
        );
        $result = $cctrl->update_child($data);
        echo json_encode($result);
    } else if ($action == 'delete_child') {
        $cid = $_POST['child_id'];
        $result = $cctrl->delete_child($cid);
        echo json_encode($result);
    } else if ($action == 'set_child_done') {
        $cid = $_POST['child_id'];
        $result = $cctrl->setdone_child($cid);
        echo json_encode($result);
    }
?>