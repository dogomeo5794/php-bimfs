<?php
    require_once '../../controllers/map/controller.php';
    $brgy = new mapController();
    $action = $_POST['action'];
    if($action == 'select') {
        $result = $brgy->select();
        echo json_encode($result);
    } else if($action == 'get_map_records') {
        $id = $_POST['brgy_id'];
        $result = $brgy->get_map_records($id);
        echo json_encode($result);
    }
?>