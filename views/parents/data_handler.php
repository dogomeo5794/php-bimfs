<?php
    require_once '../../controllers/parents/controller.php';
    require_once '../../controllers/barangay/controller.php';
    $brgy = new brgyController();
    $pctrl = new Controller();
    $action = $_POST['action'];
    if($action == 'add') {
        $data = array(
            "fn" => $_POST['pfname'],
            "mn" => $_POST['pmname'],
            "ln" => $_POST['plname'],
            "fno" => $_POST['pfamno'],
            "bdy" => $_POST['pbday'],
            "pdt" => $_POST['preggydate'],
            "hg" => $_POST['pheight'],
            "bl" => $_POST['pblood'],
            "add" => $_POST['paddress']
            
            

        );
//        $data = array($fn, $mn, $ln, $fno, $bdy, $hg, $bl, $add);
        
        
        $result = $pctrl->insert($data);
        
        echo json_encode($result);
    } else if ($action == 'getbrgy') {
        $result = $brgy->getbrgy();
        echo json_encode($result);
    } else if ($action == 'getparents') {
        $id = $_POST['id'];
        $result = $pctrl->getwhere($id);
        echo json_encode($result);
    } else if ($action == 'getall') {
        $result = $pctrl->getall();
        echo json_encode($result);
    } else if ($action == 'get_date_toxoid') {
        $preg_id = $_POST['id'];
        $result = $pctrl->get_date_toxoid($preg_id);
        echo json_encode($result);
        
    } else if ($action == 'get_lmp_edc') {
        $preg_id = $_POST['id'];
        $result = $pctrl->get_lmp_edc($preg_id);
        echo json_encode($result);
        
    } else if ($action == 'get_previous_pregnant') {
        $preg_id = $_POST['id'];
        $result = $pctrl->get_previous_pregnant($preg_id);
        echo json_encode($result);
        
    } else if ($action == 'get_trimester') {
        $preg_id = $_POST['id'];
        $result = $pctrl->get_trimester($preg_id);
        echo json_encode($result);
        
    } else if ($action == 'get_trimester_action') {
        $preg_id = $_POST['id'];
        $result = $pctrl->get_trimester_action($preg_id);
        echo json_encode($result);
        
    } else if ($action == 'get_current_problem') {
        $preg_id = $_POST['id'];
        $result = $pctrl->get_current_problem($preg_id);
        echo json_encode($result);
        
    } else if ($action == 'update_toxoid') {
        $id = $_POST['id'];
        $type = $_POST['type'];
        $date = $_POST['date_no'];
        $result = $pctrl->update_toxoid_date($id, $type, $date);
        echo json_encode($result);
    } else if ($action == 'update_lmp_edc') {
        $id = $_POST['id'];
        $type = $_POST['type'];
        $date = $_POST['date_no'];
        $result = $pctrl->update_lmp_edc($id, $type, $date);
        echo json_encode($result);
    } else if ($action == 'update_prev_preggy') {
        $id = $_POST['id'];
        $ans1 = $_POST['answer_1'];
        $ans2 = $_POST['answer_2'];
        $ans3 = $_POST['answer_3'];
        $ans4 = $_POST['answer_4'];
        
        $result = $pctrl->update_prev_pregnant($id, $ans1, $ans2, $ans3, $ans4);
        echo json_encode($result);
    } else if ($action == 'update_cur_problem') {
        $id = $_POST['id'];
        $ans1 = $_POST['answer_1'];
        $ans2 = $_POST['answer_2'];
        
        $result = $pctrl->update_cur_problem($id, $ans1, $ans2);
        echo json_encode($result);
    } else if ($action == 'update_trimester') {
        $id = $_POST['id'];
        $answer2or3 = $_POST['answer2or3'];
        $answer4 = $_POST['answer4'];
        $answer5 = $_POST['answer5'];
        $answer6 = $_POST['answer6'];
        $answer7 = $_POST['answer7'];
        $answer8 = $_POST['answer8'];
        $answer9 = $_POST['answer9'];
        
        $result = $pctrl->update_trimester($id, $answer2or3, $answer4, $answer5, $answer6, $answer7, $answer8, $answer9);
        echo json_encode($result);
    } else if ($action == 'update_trimester_action') {
        $id = $_POST['id'];
        $answer2or3 = $_POST['answer2or3'];
        $answer4 = $_POST['answer4'];
        $answer5 = $_POST['answer5'];
        $answer6 = $_POST['answer6'];
        $answer7 = $_POST['answer7'];
        $answer8 = $_POST['answer8'];
        $answer9 = $_POST['answer9'];
        
        $result = $pctrl->update_trimester_action($id, $answer2or3, $answer4, $answer5, $answer6, $answer7, $answer8, $answer9);
        echo json_encode($result);
    } else if ($action == 'give_birth') {
        $pregnant_id = $_POST['pregnant_id'];
        $date_delivery = $_POST['date_delivery'];
        $time_delivery = $_POST['time_delivery'];
        $birth_status = $_POST['birth_status'];
        $birth_condition = $_POST['birth_condition'];
        $birth_weight = $_POST['birth_weight'];
        
        $result = $pctrl->give_birth($pregnant_id, $date_delivery, $time_delivery, $birth_status, $birth_condition, $birth_weight);
        echo json_encode($result);
    } else if ($action == 'update_parent') {
        $pid = $_POST['pid'];
        $update_pfamno = $_POST['update_pfamno'];
        $update_pfname = $_POST['update_pfname'];
        $update_pmname = $_POST['update_pmname'];
        $update_plname = $_POST['update_plname'];
        $update_paddress = $_POST['update_paddress'];
        $update_pbday = $_POST['update_pbday'];
        $update_preggydate = $_POST['update_preggydate'];
        $update_pheight = $_POST['update_pheight'];
        $update_pblood = $_POST['update_pblood'];
        
        $result = $pctrl->update_parent($pid, $update_pfamno, $update_pfname, $update_pmname, $update_plname, $update_paddress, $update_pbday, $update_preggydate, $update_pheight, $update_pblood);
        echo json_encode($result);
    } else if ($action == 'delete_parent') {
        $pid = $_POST['parent_id'];
        $result = $pctrl->delete_parent($pid);
        echo json_encode($result);
    }
?>






