<?php
    require_once '../../models/register/model.php';

    class Controller {
        public $model = NULL;
        public function __construct() {
            $this->model = new Model();
        }
        
        public function insert($data) {
            $fn     = $data['fn'];
            $mn     = $data['mn'];
            $ln     = $data['ln'];
            $fno    = $data['fno'];
            $bdy    = $data['bdy']; 
            $hg     = $data['hg'];
            $bl     = $data['bl'];
            $add    = $data['add'];
            $resp = $this->model->save($fn, $mn, $ln, $fno, $bdy, $hg, $bl, $add);
            return $resp;
        }
        
        public function get($data) {
            $data = array(
                'username' => $this->validate($data['username']),
                'password' => $this->validate($data['password'])
            );
            $resp = $this->model->select($data);
            return $resp;
        }
        
        public function getprofile($id) {
            $resp = $this->model->selectwhere($id);
            return $resp;
        }
        
        public function getpassword($id=false) {
            $di = $this->validate($id);
            $resp = $this->model->getpassword($id);
            return $resp;
        }
        
        public function update($data, $myid=false) {
            $myid = $this->validate($myid);
            $data = array(
                'type' => $this->validate($data['type']),
                'value' => $this->validate($data['value'])
            );
            
            $resp = $this->model->update($data, $myid);
            return $resp;
        }
        
        public function getaccount($id=false) {
            $resp = $this->model->selectwhere($id);
            return $resp;
        }
        
        public function logout() {
            $resp = $this->model->logout();
            return $resp;
        }
        
        public function validate($d) {
            return $d;
        }
    }
    
?>