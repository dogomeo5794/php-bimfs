<?php
    require_once '../../models/home/model.php';

    class Controller {
        public $model = NULL;
        public function __construct() {
            $this->model = new Model();
        }
        
        public function getchildren() {
            $resp = $this->model->getchildren();
            return $resp;
        }
        
        public function getchildrenstat() {
            $resp = $this->model->getchildrenstat();
            return $resp;
        }
        
        public function getpregnant() {
            $resp = $this->model->getpregnant();
            return $resp;
        }
        
        public function getpregnantstat() {
            $resp = $this->model->getpregnantstat();
            return $resp;
        }
        
        public function validate($data) {
            return $data;
        }
        
        
        
    }
    
?>