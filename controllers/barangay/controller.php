<?php
    require_once '../../models/barangay/model.php';

    class brgyController {
        public $model = NULL;
        public function __construct() {
            $this->model = new brgyModel();
        }
        
        public function getbrgy() {
            $resp = $this->model->select();
            return $resp;
        }
    }
    
?>