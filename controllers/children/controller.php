<?php
    require_once '../../models/children/model.php';

    class Controller {
        public $model = NULL;
        public function __construct() {
            $this->model = new Model();
        }
        
        public function insert($data) {
            $data = array(
                "cfname"    => $this->validate($data['cfname']),
                "cmname"    => $this->validate($data['cmname']),
                "clname"    => $this->validate($data['clname']),
                "caddress"  => $this->validate($data['caddress']),
                "motname"   => $this->validate($data['motname']),
                "motschool" => $this->validate($data['motschool']),
                "motwork"   => $this->validate($data['motwork']),
                "fatname"   => $this->validate($data['fatname']),
                "fatschool" => $this->validate($data['fatschool']),
                "fatwork"   => $this->validate($data['fatwork']),
                "cfamno"    => $this->validate($data['cfamno']),
                "childno"   => $this->validate($data['childno']),
                "cgender"   => $this->validate($data['cgender']),
                "cbday"     => $this->validate($data['cbday']),
                "cweight"   => $this->validate($data['cweight']),
                "dfseen"    => $this->validate($data['dfseen']),
                "placedeliver"  => $this->validate($data['placedeliver'])
            );
            $resp = $this->model->save($data);
            
            if ($resp['response'] > 0) {
                $resp1 = $this->model->save_health_nutrition($resp['response'], 'add');
                if ($resp1) {
                    return array("response"=>$resp['response'], "message"=> "success");
                } else {
                    return array("response"=>false, "message"=> "failed");
                }
            } else {
                return $resp;
            }
            
        }
        
        public function getwhere($id) {
            $data = $this->validate($id);
            $resp = $this->model->select($data);
            return $resp;
        }
        
        public function get_brother_sister($id) {
            $id = $this->validate($id);
            $resp = $this->model->save_brother_sister($id, 'select');
            return $resp;
        }
        
        public function get_health_nutrition($id) {
            $id = $this->validate($id);
            $resp = $this->model->save_health_nutrition($id, 'select');
            return $resp;
        }
        
        public function addsiblings($id, $name, $gender, $bday) {
            $id = $this->validate($id);
            $data = array(
                'name'     => $this->validate($name),
                'sex'   => $this->validate($gender),
                'bdate'     => $this->validate($bday),
            );
            $resp = $this->model->save_brother_sister($id, 'add', $data);
            return $resp;
        }
        
        public function updatesiblings($id, $name, $gender, $bday) {
            $id = $this->validate($id);
            $data = array(
                'name'     => $this->validate($name),
                'sex'   => $this->validate($gender),
                'bdate'     => $this->validate($bday),
            );
            $resp = $this->model->save_brother_sister($id, 'update', $data);
            return $resp;
        }
        
        public function updatenutrition($id, $answer_1st, $answer_2nd, $answer_3rd, $answer_4th, $answer_5th, $answer_6th) {
            $id = $this->validate($id);
            $data = array(
                'answer1'    => $this->validate($answer_1st),
                'answer2'    => $this->validate($answer_2nd),
                'answer3'    => $this->validate($answer_3rd),
                'answer4'    => $this->validate($answer_4th),
                'answer5'    => $this->validate($answer_5th),
                'answer6'    => $this->validate($answer_6th),
            );
            $resp = $this->model->save_health_nutrition($id, 'update', $data);
            return $resp;
        }
        
        public function update_child($val) {
            $data = array(
                'cid'           => $this->validate($val['cid']),
                'cfname'        => $this->validate($val['cfname']),
                'cmname'        => $this->validate($val['cmname']),
                'clname'        => $this->validate($val['clname']),
                'caddress'      => $this->validate($val['caddress']),
                'motname'       => $this->validate($val['motname']),
                'motschool'     => $this->validate($val['motschool']),
                'motwork'       => $this->validate($val['motwork']),
                'fatname'       => $this->validate($val['fatname']),
                'fatschool'     => $this->validate($val['fatschool']),
                'fatwork'       => $this->validate($val['fatwork']),
                'cfamno'        => $this->validate($val['cfamno']),
                'childno'       => $this->validate($val['childno']),
                'cgender'       => $this->validate($val['cgender']),
                'cbday'         => $this->validate($val['cbday']),
                'cweight'       => $this->validate($val['cweight']),
                'dfseen'        => $this->validate($val['dfseen']),
                'placedeliver'  => $this->validate($val['placedeliver'])
            );
            $resp = $this->model->update_child($data);
            return $resp;
        }
        
        
        public function delete_child($id) {
            $resp = $this->model->delete_child($id);
            return $resp;
        }
        
        public function setdone_child($id) {
            $resp = $this->model->setdone_child($id);
            return $resp;
        }
        
        public function getall() {
            $resp = $this->model->select();
            return $resp;
        }
        
        
        public function validate($value) {
            return $value;
        }
    }
    
?>