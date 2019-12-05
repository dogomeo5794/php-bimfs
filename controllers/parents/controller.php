<?php
    require_once '../../models/parents/model.php';

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
            $pdt    = $data['pdt']; 
            $hg     = $data['hg'];
            $bl     = $data['bl'];
            $add    = $data['add'];
            $resp = $this->model->save($fn, $mn, $ln, $fno, $bdy, $pdt, $hg, $bl, $add);
            
            if ($resp['response'] > 0) {
//                save_date_toxoid($parent_id, $type, $data=false)
                $resp1 = $this->model->save_date_toxoid($resp['response'], 'add');
                $resp2 = $this->model->save_lmp_edc($resp['response'], 'add');
                $resp3 = $this->model->save_previous_pregnant($resp['response'], 'add');
                $resp4 = $this->model->save_trimester($resp['response'], 'add');
                $resp5 = $this->model->save_trimester_action($resp['response'], 'add');
                $resp6 = $this->model->save_current_problem($resp['response'], 'add');
                if ($resp1 and $resp2 and $resp3 and $resp4 and $resp5 and $resp6) {
                    return array("response"=>$resp['response'], "message"=> "success");
                } else {
                    return array("response"=>false, "message"=> "failed");
                }
            } else {
                return $resp;
            }
//            return $resp;
        }
        
        public function getwhere($id) {
            $data = $this->validate($id);
            $resp = $this->model->select($data);
            return $resp;
        }
        
        public function getall() {
            $resp = $this->model->select();
            return $resp;
        }
        
        public function validate($data) {
            return $data;
        }
        
        public function get($id) {
            $resp = $this->model->select($id);
            return $resp;
        }
        
        public function get_date_toxoid($preg_id) {
            $resp = $this->model->save_date_toxoid($preg_id, 'select');
            return $resp;
        }
        public function get_lmp_edc($preg_id) {
            $resp = $this->model->save_lmp_edc($preg_id, 'select');
            return $resp;
        }
        public function get_previous_pregnant($preg_id) {
            $resp = $this->model->save_previous_pregnant($preg_id, 'select');
            return $resp;
        }
        public function get_trimester($preg_id) {
            $resp = $this->model->save_trimester($preg_id, 'select');
            return $resp;
        }
        public function get_trimester_action($preg_id) {
            $resp = $this->model->save_trimester_action($preg_id, 'select');
            return $resp;
        }
        public function get_current_problem($preg_id) {
            $resp = $this->model->save_current_problem($preg_id, 'select');
            return $resp;
        }
        
        public function update_toxoid_date($id, $type, $date) {
            $data = array('type' => $type, 'date' => $date);
            $resp = $this->model->save_date_toxoid($id, 'update', $data);
            return $resp;
        }
        
        public function update_lmp_edc($id, $type, $date) {
            $data = array('type' => $type, 'date' => $date);
            $resp = $this->model->save_lmp_edc($id, 'update', $data);
            return $resp;
        }
        
        public function update_prev_pregnant($id, $ans1, $ans2, $ans3, $ans4) {
            $data = array('ans_1' => $ans1, 'ans_2' => $ans2, 'ans_3' => $ans3, 'ans_4' => $ans4);
            $resp = $this->model->save_previous_pregnant($id, 'update', $data);
            return $resp;
        }
        
        public function update_cur_problem($id, $ans1, $ans2) {
            $data = array('ans_1' => $ans1, 'ans_2' => $ans2);
            $resp = $this->model->save_current_problem($id, 'update', $data);
            return $resp;
        }
        
        public function update_trimester($id, $answer2or3, $answer4, $answer5, $answer6, $answer7, $answer8, $answer9) {
            $data = array(
                'answer2or3'    => $answer2or3,
                'answer4'       => $answer4,
                'answer5'       => $answer5,
                'answer6'       => $answer6,
                'answer7'       => $answer7,
                'answer8'       => $answer8,
                'answer9'       => $answer9
            );
            $resp = $this->model->save_trimester($id, 'update', $data);
            return $resp;
        }
        
        public function update_trimester_action($id, $answer2or3, $answer4, $answer5, $answer6, $answer7, $answer8, $answer9) {
            $data = array(
                'answer2or3'    => $answer2or3,
                'answer4'       => $answer4,
                'answer5'       => $answer5,
                'answer6'       => $answer6,
                'answer7'       => $answer7,
                'answer8'       => $answer8,
                'answer9'       => $answer9
            );
            
            $resp = $this->model->save_trimester_action($id, 'update', $data);
            return $resp;
        }
        
        public function give_birth($pregnant_id, $date_delivery, $time_delivery, $birth_status, $birth_condition, $birth_weight) {
            $data = array(
                'pregnant_id'       => $pregnant_id,
                'date_delivery'     => $date_delivery,
                'time_delivery'     => $time_delivery,
                'birth_status'      => $birth_status,
                'birth_condition'   => $birth_condition,
                'birth_weight'      => $birth_weight,
            );
            
            $resp = $this->model->give_birth($data);
            return $resp;
        }
        
        public function update_parent($pid, $update_pfamno, $update_pfname, $update_pmname, $update_plname, $update_paddress, $update_pbday, $update_preggydate, $update_pheight, $update_pblood) {
            $data = array(
                'pid'   => $pid,
                'pfamno'   => $update_pfamno,
                'pfname'   => $update_pfname,
                'pmname'   => $update_pmname,
                'plname'   => $update_plname,
                'paddress'   => $update_paddress,
                'pbday'   => $update_pbday,
                'preggydate'   => $update_preggydate,
                'pheight'   => $update_pheight,
                'pblood'   => $update_pblood,
            );
            
            $resp = $this->model->update_parent($data);
            return $resp;
        }
        
        public function delete_parent($pid) {
            $resp = $this->model->delete_parent($pid);
            return $resp;
        }
        
        
    }
    
?>