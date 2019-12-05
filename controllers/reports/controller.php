<?php
    require_once '../../models/reports/model.php';

    class Controller {
        public $model = NULL;
        public function __construct() {
            $this->model = new Model();
        }
        
        public function getreports($data) {
            $type   = $this->validate($data['type']);
            $frm    = $this->validate($data['from']);
            $to     = $this->validate($data['to']);
            
            $resp = $this->model->select($type, $frm, $to);
            
            return $resp;
        }
        
        public function validate($d) {
            return $d;
        }
    }
    
?>