<?php
    require_once '../../config/config.php';

    class Model{
        public $connect = NULL;
        public function __construct() {
            $config= new Config();
            $this->connect = $config->connect();
        }
        
        public function give_birth($v) {
            $date = date('Y-m-d');
            $sql = 'INSERT INTO `give_birth`(`date_delivery`, `time_delivery`, `birth_status`, `birth_condition`, `birth_weight`, date_reg, `pregnant_id`) VALUES (?,?,?,?,?,?,?)';
            
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('ssssssi', $v['date_delivery'], $v['time_delivery'], $v['birth_status'], $v['birth_condition'], $v['birth_weight'], $date, $v['pregnant_id']);
            if ($qry->execute()) {
                $ifdone = 1;
                $sql = 'UPDATE `parents` SET `ifdone`=? WHERE id=?';
            
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('ii', $ifdone, $v['pregnant_id']);
                if ($qry->execute()) {
                    return array("response"=>true, "message"=> "success");
                } else {
                    return array("response"=>false, "message"=> "failed");
                }
            } else {
                return array("response"=>false, "message"=> "failed");
            }
        }
        
        public function save($fn, $mn, $ln, $fno, $bdy, $pdt, $hg, $bl, $add) {
            Session::start();
            $hg = number_format($hg, 2);
            $date = date('Y-m-d');
            $uid = $_SESSION['account'];
            $sql = 'INSERT INTO `parents`(`fname`, `mname`, `lname`, `birthday`, pregdate, bloodtype, `date_reg`, `familyno`, `heigthcm`, `brgy_id`, `login_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
            
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('ssssssssdii', $fn, $mn, $ln, $bdy, $pdt, $bl, $date, $fno, $hg, $add, $uid);
            if ($qry->execute()) {
                $last_id = $this->connect->insert_id;
                return array("response"=>$last_id, "message"=> "success");
            } else {
                return array("response"=>0, "message"=> "failed");
            }
        }
        
        public function update_parent($d) {
            $sql = 'UPDATE `parents` SET `fname`=?,`mname`=?,`lname`=?,`birthday`=?,`bloodtype`=?,`pregdate`=?,`familyno`=?,`heigthcm`=?,`brgy_id`=? WHERE id=?';
            
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('sssssssdii', $d['pfname'], $d['pmname'], $d['plname'], $d['pbday'], $d['pblood'], $d['preggydate'], $d['pfamno'], $d['pheight'], $d['paddress'], $d['pid']);
            if ($qry->execute()) {
                return array("response"=>true, "message"=> "success");
            } else {
                return array("response"=>false, "message"=> "failed");
            }
        }
        
        public function delete_parent($id) {
            $sql = 'DELETE FROM `parents` WHERE id=?';
            
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('i', $id);
            if ($qry->execute()) {
                return array("response"=>true, "message"=> "success");
            } else {
                return array("response"=>false, "message"=> $this->connect->error);
            }
        }
        
        
        public function save_date_toxoid($parent_id, $type, $data=false) {
            if ($type == 'add') {
                $sql = 'INSERT INTO `date_toxoid`(`parent_id`) VALUES (?)';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('i', $parent_id);
                if ($qry->execute()) {
                    return array("response"=>true, "message"=> "success");
                } else {
                    return array("response"=>false, "message"=> $this->connect->error);
                }
            } else if ($type == 'select') {
                $sql = 'SELECT `id`, `date_1`, `date_2`, `date_3`, `date_4`, `date_5`, `parent_id` FROM `date_toxoid` WHERE parent_id=?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('i', $parent_id);
                if ($qry->execute()) {
                    $result = $qry->get_result();
                    $data['data'] = array();
                    while ($row = $result->fetch_assoc()) {
                        $data['data'][] = array(
                            'id'        => $row['id'],
                            'date_1'    => $row['date_1']==null?null:date('M. d, Y', strtotime($row['date_1'])),
                            'date_2'    => $row['date_2']==null?null:date('M. d, Y', strtotime($row['date_2'])),
                            'date_3'    => $row['date_3']==null?null:date('M. d, Y', strtotime($row['date_3'])),
                            'date_4'    => $row['date_4']==null?null:date('M. d, Y', strtotime($row['date_4'])),
                            'date_5'    => $row['date_5']==null?null:date('M. d, Y', strtotime($row['date_5'])),
                            'parent_id' => $row['parent_id'],
                        );

                    }
                    return $data;

                } else {
                    return $data['data'] = array('message'=>$this->connect->error);
                } 
            } else if ($type == 'update') {
//                $data = array('type' => $type, 'date' => $date);
                $toxid = $parent_id;
                $sql = 'UPDATE `date_toxoid` SET '.$data['type'].'=? WHERE id=?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('si', $data['date'], $toxid);
                if ($qry->execute()) {
                    return array("response"=>true, "message"=> 'success');
                } else {
                    return array("response"=>false, "message"=> $this->connect->error);
                }
            }
        }
        
        public function save_lmp_edc($parent_id, $type, $data=false) {
            if ($type == 'add') {
                $sql = 'INSERT INTO `pregnant_lmp_edc`(`parent_id`) VALUES (?)';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('i', $parent_id);
                if ($qry->execute()) {
                    return array("response"=>true, "message"=> "success");
                } else {
                    return array("response"=>false, "message"=> $this->connect->error);
                }
            } else if ($type == 'select') {
                $sql = 'SELECT `id`, `lmp`, `edc`, `parent_id` FROM `pregnant_lmp_edc` WHERE parent_id=?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('i', $parent_id);
                if ($qry->execute()) {
                    $result = $qry->get_result();
                    $data['data'] = array();
                    while ($row = $result->fetch_assoc()) {
                        $data['data'][] = array(
                            'id'        => $row['id'],
                            'lmp_year'  => $row['lmp']==null?'----':date('Y', strtotime($row['lmp'])),
                            'lmp_month' => $row['lmp']==null?'----':date('M.', strtotime($row['lmp'])),
                            'lmp_day'   => $row['lmp']==null?'---':date('d', strtotime($row['lmp'])),
                            'edc_year'  => $row['edc']==null?'----':date('Y', strtotime($row['edc'])),
                            'edc_month' => $row['edc']==null?'----':date('M.', strtotime($row['edc'])),
                            'edc_day'   => $row['edc']==null?'---':date('d', strtotime($row['edc'])),
                            'parent_id' => $row['parent_id'],
                        );

                    }
                    return $data;

                } else {
                    return $data['data'] = array('message'=>$this->connect->error);
                } 
            } else if ($type == 'update') {
                $lmp_edc_id = $parent_id;
                $sql = 'UPDATE `pregnant_lmp_edc` SET '.$data['type'].'=? WHERE id=?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('si', $data['date'], $lmp_edc_id);
                if ($qry->execute()) {
                    return array("response"=>true, "message"=> 'success');
                } else {
                    return array("response"=>false, "message"=> $this->connect->error);
                }
            }
        }
        
        public function save_previous_pregnant($parent_id, $type, $data=false) {
            if ($type == 'add') {
                $question = array(
                    strtolower('Nakaagi Ceasarian Section'),
                    strtolower('3 Kasunod-sunod na Hulugan'),
                    strtolower('Bata nga Binun-ag nga Patay'),
                    strtolower('Dinugo Tapos Pagbun-ag'),
                );
                $sql = 'INSERT INTO `prev_pregnant`(question, `pregnant_id`) VALUES (?,?)';
                $qry = $this->connect->prepare($sql);
                
                $error = array();
                foreach ($question as $q) {
                    $qry->bind_param('si', $q, $parent_id);
                    if (!$qry->execute()) {
                        $error[] = false;
                        return array("response"=>true, "message"=> "success");
                    }
                }
                if (count($error) == 0) {
                    return array("response"=>true, "message"=> "success");
                } else {
                    return array("response"=>false, "message"=> $this->connect->error);
                }
            } else if ($type == 'select') {
                $sql = 'SELECT `prev_preg_id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `pregnant_id` FROM `prev_pregnant` WHERE pregnant_id=?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('i', $parent_id);
                if ($qry->execute()) {
                    $result = $qry->get_result();
                    $data['data'] = array();
                    while ($row = $result->fetch_assoc()) {
                        $data['data'][] = array(
                            'prev_preg_id'  => $row['prev_preg_id'],
                            'question'      => $row['question'],
                            'answer1'       => $row['answer1'],
                            'answer2'       => $row['answer2'],
                            'answer3'       => $row['answer3'],
                            'answer4'       => $row['answer4'],
                            'pregnant_id'   => $row['pregnant_id'],
                        );

                    }
                    return $data;

                } else {
                    return $data['data'] = array('message'=>$this->connect->error);
                } 
            } else if ($type == 'update') {
                $prev_id = $parent_id;
                $sql = 'UPDATE `prev_pregnant` SET `answer1`=?,`answer2`=?,`answer3`=?,`answer4`=? WHERE prev_preg_id=?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('ssssi', $data['ans_1'], $data['ans_2'], $data['ans_3'], $data['ans_4'], $prev_id);
                if ($qry->execute()) {
                    return array("response"=>true, "message"=> 'success');
                } else {
                    return array("response"=>false, "message"=> $this->connect->error);
                }
            }
        }
        
        public function save_trimester($parent_id, $type, $data=false) {
            if ($type == 'add') {
                $question = array(
                    strtolower('Petsa sang Pagprenatal'),
                    strtolower('Nagpangdugo (Hu-o / Wala)'),
                    strtolower('Impeksyon sang Renion (Hu-o / Wala)'),
                    strtolower('Kabug-aton (Kg)'),
                    strtolower('Presyon sang Dugo'),
                    strtolower('Presyon sang Dugo 140/90 o subra pa (Hu-o / Wala)'),
                    strtolower('Hilanat 380 o sobra pa (Hu-o / Wala)'),
                    strtolower('Malapsi (Hu-o / Wala)'),
                    strtolower('Abnormal ang Kataason sang Pagbusong (Hu-o / Hindi)'),
                    strtolower('Abnormal ang posisyon sang bata (Hu-o / Hindi)'),
                    strtolower('Wala Magpitik ang Corazon sang Bata (Hu-o / Wala)'),
                    strtolower('May Palamanog (Hu-o / Wala)'),
                    strtolower('Impreksyon sa Puerta (Hu-o / Wala)'),
                    strtolower('Resulta sang eksaminasion sang Dugo, inih, Venareal Disease'),
                );
                $sql = 'INSERT INTO `trimester`(question, `parent_id`) VALUES (?,?)';
                $qry = $this->connect->prepare($sql);
                
                $error = array();
                foreach ($question as $q) {
                    $qry->bind_param('si', $q, $parent_id);
                    if (!$qry->execute()) {
                        $error[] = false;
                        return array("response"=>true, "message"=> "success");
                    }
                }
                if (count($error) == 0) {
                    return array("response"=>true, "message"=> "success");
                } else {
                    return array("response"=>false, "message"=> $this->connect->error);
                }
                
            } else if ($type == 'select') {
                $sql = 'SELECT `trimester_id`, `question`, `answer_2or3`, `answer_4`, `answer_5`, `answer_6`, `answer_7`, `answer_8`, `answer_9`, `parent_id` FROM `trimester` WHERE parent_id=?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('i', $parent_id);
                if ($qry->execute()) {
                    $result = $qry->get_result();
                    $data['data'] = array();
                    $num = 1;
                    while ($row = $result->fetch_assoc()) {
                        $data['data'][] = array(
                            'number'        => $num,
                            'trimester_id'  => $row['trimester_id'],
                            'question'      => $row['question'],
                            'answer_2or3'   => $row['answer_2or3'],
                            'answer_4'      => $row['answer_4'],
                            'answer_5'      => $row['answer_5'],
                            'answer_6'      => $row['answer_6'],
                            'answer_7'      => $row['answer_7'],
                            'answer_8'      => $row['answer_8'],
                            'answer_9'      => $row['answer_9'],
                            'parent_id'     => $row['parent_id'],
                        );
                        $num++;

                    }
                    return $data;

                } else {
                    return $data['data'] = array('message'=>$this->connect->error);
                } 
            } else if ($type == 'update') {
                $tri_id = $parent_id;
                $sql = 'UPDATE `trimester` SET `answer_2or3`=?,`answer_4`=?,`answer_5`=?,`answer_6`=?,`answer_7`=?,`answer_8`=?,`answer_9`=? WHERE trimester_id=?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('sssssssi', $data['answer2or3'], $data['answer4'], $data['answer5'], $data['answer6'], $data['answer7'], $data['answer8'], $data['answer9'], $tri_id);
                if ($qry->execute()) {
                    return array("response"=>true, "message"=> 'success');
                } else {
                    return array("response"=>false, "message"=> $this->connect->error);
                }
                    
            }
        }
        
        public function save_trimester_action($parent_id, $type, $data=false) {
            if ($type == 'add') {
                $question = array(
                    strtolower('question 1'),
                    strtolower('question 2'),
                    strtolower('question 3'),
                    strtolower('question 4'),
                    strtolower('question 5'),
                    strtolower('question 6'),
                    strtolower('question 7'),
                    strtolower('question 8'),
                    strtolower('question 9'),
                );
                $sql = 'INSERT INTO `trimester_action`(question, `parent_id`) VALUES (?,?)';
                $qry = $this->connect->prepare($sql);
                
                $error = array();
                foreach ($question as $q) {
                    $qry->bind_param('si', $q, $parent_id);
                    if (!$qry->execute()) {
                        $error[] = false;
                        return array("response"=>true, "message"=> "success");
                    }
                }
                if (count($error) == 0) {
                    return array("response"=>true, "message"=> "success");
                } else {
                    return array("response"=>false, "message"=> $this->connect->error);
                }
                
                
            } else if ($type == 'select') {
                $sql = 'SELECT `action_id`, `question`, `action_2or3`, `action_4`, `action_5`, `action_6`, `action_7`, `action_8`, `action_9`, `parent_id` FROM `trimester_action` WHERE parent_id=?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('i', $parent_id);
                if ($qry->execute()) {
                    $result = $qry->get_result();
                    $data['data'] = array();
                    $num = 1;
                    while ($row = $result->fetch_assoc()) {
                        $data['data'][] = array(
                            'number'        => $num,
                            'action_id'     => $row['action_id'],
                            'question'      => $row['question'],
                            'action_2or3'   => $row['action_2or3'],    
                            'action_4'      => $row['action_4'],
                            'action_5'      => $row['action_5'],
                            'action_6'      => $row['action_6'],
                            'action_7'      => $row['action_7'],
                            'action_8'      => $row['action_8'],
                            'action_9'      => $row['action_9'],
                            'parent_id'     => $row['parent_id'],
                        );
                        $num++;

                    }
                    return $data;

                } else {
                    return $data['data'] = array('message'=>$this->connect->error);
                } 
            } else if ($type == 'update') {
                $action_id = $parent_id;
                $sql = 'UPDATE `trimester_action` SET `action_2or3`=?,`action_4`=?,`action_5`=?,`action_6`=?,`action_7`=?,`action_8`=?,`action_9`=? WHERE action_id=?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('sssssssi', $data['answer2or3'], $data['answer4'], $data['answer5'], $data['answer6'], $data['answer7'], $data['answer8'], $data['answer9'], $action_id);
                if ($qry->execute()) {
                    return array("response"=>true, "message"=> 'success');
                } else {
                    return array("response"=>false, "message"=> $this->connect->error);
                }
            }
        }
        
        public function save_current_problem($parent_id, $type, $data=false) {
            if ($type == 'add') {
                $question = array(
                    strtolower('TUBERCOLOSIS'),
                    strtolower('SOBRA SA 14 KA ADLAW NGA UBO'),
                    strtolower('SAKIT SA CORAZON'),
                    strtolower('DIABETES'),
                    strtolower('HAPO'),
                    strtolower('GOITER'),
                );
                $sql = 'INSERT INTO `current_problem`(question, `parent_id`) VALUES (?,?)';
                $qry = $this->connect->prepare($sql);
                
                $error = array();
                foreach ($question as $q) {
                    $qry->bind_param('si', $q, $parent_id);
                    if (!$qry->execute()) {
                        $error[] = false;
                        return array("response"=>true, "message"=> "success");
                    }
                }
                if (count($error) == 0) {
                    return array("response"=>true, "message"=> "success");
                } else {
                    return array("response"=>false, "message"=> $this->connect->error);
                }
            } else if ($type == 'select') {
                $sql = 'SELECT `cur_prob_id`, `question`, `answer1`, `answer2`, `parent_id` FROM `current_problem` WHERE parent_id=?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('i', $parent_id);
                if ($qry->execute()) {
                    $result = $qry->get_result();
                    $data['data'] = array();
                    while ($row = $result->fetch_assoc()) {
                        $data['data'][] = array(
                            'cur_prob_id'   => $row['cur_prob_id'],    
                            'question'      => $row['question'],
                            'answer1'       => $row['answer1'],
                            'answer2'       => $row['answer2'],
                            'parent_id'     => $row['parent_id'],
                        );

                    }
                    return $data;

                } else {
                    return $data['data'] = array('message'=>$this->connect->error);
                } 
            } else if ($type == 'update') {
                $prev_id = $parent_id;
                $sql = 'UPDATE `current_problem` SET `answer1`=?,`answer2`=? WHERE cur_prob_id=?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('ssi', $data['ans_1'], $data['ans_2'], $prev_id);
                if ($qry->execute()) {
                    return array("response"=>true, "message"=> 'success');
                } else {
                    return array("response"=>false, "message"=> $this->connect->error);
                }
            }
        }
        
        
        
        
        
        public function select($id=false) {
            if ($id == false) {
                return $this->selectall();
            } else {
                return $this->selectwhere($id);
            } 
        }
            
        public function selectwhere($id) {
            $sql = 'SELECT p.`id`, p.`fname`, p.`mname`, p.`lname`, p.`birthday`, p.pregdate, p.bloodtype, p.`civil_status`, p.`date_reg`, p.`familyno`, p.`heigthcm`, p.`ifdone`, b.brgy_id, b.brgy_name, b.brgy_lat, b.brgy_long FROM `parents` AS p INNER JOIN barangay AS b ON p.brgy_id=b.brgy_id WHERE p.id=?';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('i', $id);
            if ($qry->execute()) {
                $result = $qry->get_result();
                $data['data'] = array();
                while ($row = $result->fetch_assoc()) {
                    $date = new DateTime($row['birthday']);
                    $now = new DateTime();
                    $interval = $now->diff($date);
                    $age = $interval->y;
                    $data['data'][] = array(
                        'id'    => $row['id'],
                        'ifdone'    => $row['ifdone'],
                        'fname' => ucfirst($row['fname']),
                        'mname' => ucfirst($row['mname']),
                        'lname' => ucfirst($row['lname']),
                        'age' => $age,
                        'birthday'  => date('M d, Y', strtotime($row['birthday'])),
                        'bloodtype'  => $row['bloodtype'],
                        'civil_status'  => $row['civil_status'],
                        'date_reg'  => $row['date_reg'],
                        'pregdate'  => $row['pregdate'],
                        'familyno'  => $row['familyno'],
                        'heigthcm'  => $row['heigthcm'],
                        'brgy_id'   => $row['brgy_id'],
                        'brgy_name' => ucfirst($row['brgy_name']),
                        'brgy_lat'  => $row['brgy_lat'],
                        'brgy_long' => $row['brgy_long']
                    );
                        
                }
                return $data;
                
            } else {
                return $data['data'] = array('message'=>$this->connect->error);
            }
        }
        
        public function selectall() {
            $sql = 'SELECT p.`id`, p.`fname`, p.`mname`, p.`lname`, p.`birthday`, p.pregdate, p.bloodtype, p.`civil_status`, p.`date_reg`, p.`familyno`, p.`heigthcm`, b.brgy_id, b.brgy_name, b.brgy_lat, b.brgy_long FROM `parents` AS p INNER JOIN barangay AS b ON p.brgy_id=b.brgy_id';
            $qry = $this->connect->prepare($sql);
            if ($qry->execute()) {
                $result = $qry->get_result();
                $data['data'] = array();
                while ($row = $result->fetch_assoc()) {
                    $date = new DateTime($row['birthday']);
                    $now = new DateTime();
                    $interval = $now->diff($date);
                    $age = $interval->y;
                    $data['data'][] = array(
                        'id'    => $row['id'],
                        'fname' => ucfirst($row['fname']),
                        'mname' => ucfirst($row['mname']),
                        'lname' => ucfirst($row['lname']),
                        'age' => $age,
                        'birthday'  => date('M d, Y', strtotime($row['birthday'])),
                        'bloodtype'  => $row['bloodtype'],
                        'civil_status'  => $row['civil_status'],
                        'date_reg'  => $row['date_reg'],
                        'pregdate'  => date('M d, Y', strtotime($row['pregdate'])),
                        'familyno'  => $row['familyno'],
                        'heigthcm'  => $row['heigthcm'],
                        'brgy_id'   => $row['brgy_id'],
                        'brgy_name' => ucfirst($row['brgy_name']),
                        'brgy_lat'  => $row['brgy_lat'],
                        'brgy_long' => $row['brgy_long']
                    );
                        
                }
                return $data;
                
            } else {
                return $data['data'] = array('message'=>$this->connect->error);
            }
        }
    }
?>
