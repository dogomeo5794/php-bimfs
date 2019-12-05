<?php
    require_once '../../models/settings/model.php';

    class settingsController {
        public $model = NULL;
        public function __construct() {
            $this->model = new settingsModel();
        }
        
        public function insert($data) {
            $data = array(
                "idno"          => $this->validate($data['idno']),
                "fname"         => $this->validate($data['fname']),
                "mname"         => $this->validate($data['mname']),
                "lname"         => $this->validate($data['lname']),
                "bday"          => $this->validate($data['bday']),
                "gender"        => $this->validate($data['gender']),
                "address"       => $this->validate($data['address']),
                "position"      => $this->validate($data['position']),
                "contact"       => $this->validate($data['contact']),
                "email"         => $this->validate($data['email']),
                "civstatus"     => $this->validate($data['civstatus']),
                "dateemployed"  => $this->validate($data['dateemployed']),
                "nationality"   => $this->validate($data['nationality']),
                "activestatus"   => $this->validate($data['activestatus'])
            );
            $resp = $this->model->save($data);
            return $resp;
        }
        
        public function select() {
            $resp = $this->model->select();
            return $resp;
        }
        
        public function validate($value) {
            return $value;
        }
    }
    
?>