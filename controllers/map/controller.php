<?php
    require_once '../../models/map/model.php';

    class mapController {
        public $model = NULL;
        public function __construct() {
            $this->model = new mapModel();
        }
        
        public function select($data=false) {
            $resp = $this->model->select($data);
            return $resp;
        }
        
        public function get_map_records($id) {
            $resp = $this->model->get_map_records($id);
            return $resp;
        }
    }
    
?>