<?php
    require_once '../../config/config.php';

    class Model{
        public $connect = NULL;
        public function __construct() {
            $config= new Config();
            $this->connect = $config->connect();
        }
        
        public function save($data) {
            Session::start();
            $uid = $_SESSION['account'];
            $date = date('Y-m-d');
            $sql = 'INSERT INTO `children`(`fname`, `mname`, `lname`, `gender`, `birthday`, `date_reg`, `child_no`, `familno`, `datefirstseen`, `birthweight`, `deliveryplace`, `registerdate`, `birthat`, `mothersname`, `motherseduclevel`, `motherswork`, `fathername`, `fatherseduclevel`, `fatherwork`, `brgy_id`, `login_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('ssssssissdsssssssssii', $data['cfname'], $data['cmname'], $data['clname'], $data['cgender'], $data['cbday'], $date, $data['childno'], $data['cfamno'], $data['dfseen'], $data['cweight'], $data['placedeliver'], $date, $data['placedeliver'], $data['motname'], $data['motschool'], $data['motwork'], $data['fatname'], $data['fatschool'], $data['fatwork'], $data['caddress'], $uid);
                
            if ($qry->execute()) {
                $last_id = $this->connect->insert_id;
                return array("response"=>$last_id, "message"=> "success");
            } else {
                return array("response"=>0, "message"=> "failed");
            }
        }
        
        public function update_child($v) {
            $sql = 'UPDATE `children` SET `fname`=?,`mname`=?,`lname`=?,`gender`=?,`birthday`=?,`child_no`=?,`familno`=?,`datefirstseen`=?,`birthweight`=?,`deliveryplace`=?,`birthat`=?,`mothersname`=?,`motherseduclevel`=?,`motherswork`=?,`fathername`=?,`fatherseduclevel`=?,`fatherwork`=?,`brgy_id`=? WHERE id=?';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('ssssssssdssssssssii', $v['cfname'], $v['cmname'], $v['clname'], $v['cgender'], $v['cbday'], $v['childno'], $v['cfamno'], $v['dfseen'], $v['cweight'], $v['placedeliver'], $v['placedeliver'], $v['motname'], $v['motschool'], $v['motwork'], $v['fatname'], $v['fatschool'], $v['fatwork'], $v['caddress'], $v['cid']);
            
            
            if ($qry->execute()) {
                return array("response"=>true, "message"=> "success");
            } else {
                return array("response"=>false, "message"=> "failed");
            }
        }
        
        public function delete_child($id) {
            $sql = 'DELETE FROM `children` WHERE id=?';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('i', $id);
            
            if ($qry->execute()) {
                return array("response"=>true, "message"=> "success");
            } else {
                return array("response"=>false, "message"=> $this->connect->error);
            }
        }
        
        
        public function setdone_child($id) {
            $done = 1;
            $sql = 'UPDATE `children` SET ifdone=? WHERE id=?';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('ii', $done, $id);
            
            if ($qry->execute()) {
                return array("response"=>true, "message"=> "success");
            } else {
                return array("response"=>false, "message"=> $this->connect->error);
            }
        }
        
        
        
        
        public function save_brother_sister($id, $type='select', $data=false) {
            if ($type == 'add') {
                $sql = 'INSERT INTO `brother_sister`(`name`, `sex`, `bdate`, `child_id`) VALUES (?,?,?,?)';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('sssi', $data['name'], $data['sex'], $data['bdate'], $id);
                if ($qry->execute()) {
                    return array("response"=>true, "message"=> "success");
                } else {
                    return array("response"=>false, "message"=> $this->connect->error);
                }
            } else if ($type == 'select') {
                $sql = 'SELECT `id`, `name`, `sex`, `bdate`, `child_id` FROM `brother_sister` WHERE child_id=?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('i', $id);
                if ($qry->execute()) {
                    $result = $qry->get_result();
                    $data['data'] = array();
                    while ($row = $result->fetch_assoc()) {
                        $data['data'][] = array(
                            'id'        => $row['id'],
                            'name'  => $row['name']==null?'----':strtoupper($row['name']),
                            'sex'  => $row['sex']==null?'----':strtoupper($row['sex']),
                            'bdate' => $row['bdate']==null?'----':date('F d, Y', strtotime($row['bdate'])),
                            'child_id' => $row['child_id'],
                        );

                    }
                    return $data;

                } else {
                    return $data['data'] = array('message'=>$this->connect->error);
                } 
            } else if ($type == 'update') {
                $brodsis_id = $id;
                $sql = 'UPDATE `brother_sister` SET `name`=?,`sex`=?,`bdate`=? WHERE id=?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('sssi', $data['name'], $data['sex'], $data['bdate'], $brodsis_id);
                if ($qry->execute()) {
                    return array("response"=>true, "message"=> 'success');
                } else {
                    return array("response"=>false, "message"=> $this->connect->error);
                }
            }
        }
        
        
        public function save_health_nutrition($id, $type, $data=false) {
            if ($type == 'add') {
                $date = date('Y-m-d');
                $question = array(
                    strtolower('NEW BORN SCREENING'),
                    strtolower('BCG (at Birth)'),
                    strtolower('DPT (6 wks, 10 wks, 14 wks old)'),
                    strtolower('OPV (6 wks, 10 wks, 14 wks old)'),
                    strtolower('HEPATITIS B (6 wks, 10 wks, 14 wks old)'),
                    strtolower('MEASLES (9 mos.)'),
                    strtolower('VITAMIN A (start at 6 mos.)'),
                    strtolower('PCV (3rd dose)'),
                );
                $sql = 'INSERT INTO `children_nutrition_services`(`question`, `date_reg`, `child_id`) VALUES (?,?,?)';
                $qry = $this->connect->prepare($sql);
                
                $error = array();
                foreach ($question as $q) {
                    $qry->bind_param('ssi', $q, $date, $id);
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
                $sql = 'SELECT nutrition_id, `question`, `answer_1st`, `answer_2nd`, `answer_3rd`, `answer_4th`, `answer_5th`, `answer_6th`, `remarks`, `date_reg`, child_id FROM `children_nutrition_services` WHERE child_id=?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('i', $id);
                if ($qry->execute()) {
                    $result = $qry->get_result();
                    $data['data'] = array();
                    while ($row = $result->fetch_assoc()) {
                        $data['data'][] = array(
                            'id'        => $row['nutrition_id'],
                            'question'  => strtoupper($row['question']),
                            'answer_1st'  => $row['answer_1st']==null||$row['answer_1st']==''?'---':$row['answer_1st'],
                            'answer_2nd'  => $row['answer_2nd']==null||$row['answer_2nd']==''?'---':$row['answer_2nd'],
                            'answer_3rd'  => $row['answer_3rd']==null||$row['answer_3rd']==''?'---':$row['answer_3rd'],
                            'answer_4th'  => $row['answer_4th']==null||$row['answer_4th']==''?'---':$row['answer_4th'],
                            'answer_5th'  => $row['answer_5th']==null||$row['answer_5th']==''?'---':$row['answer_5th'],
                            'answer_6th'  => $row['answer_6th']==null||$row['answer_6th']==''?'---':$row['answer_6th'],
                            'remarks'  => $row['remarks'],
                            'date_reg'  => $row['date_reg'],
                            'children_id' => $row['child_id'],
                        );

                    }
                    return $data;

                } else {
                    return $data['data'] = array('message'=>$this->connect->error);
                } 
            } else if ($type == 'update') {
                $nutrition_id = $id;
                $sql = 'UPDATE `children_nutrition_services` SET `answer_1st`=?, `answer_2nd`=?, `answer_3rd`=?, `answer_4th`=?, `answer_5th`=?, `answer_6th`=? WHERE nutrition_id=?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('ssssssi', $data['answer1'], $data['answer2'], $data['answer3'], $data['answer4'], $data['answer5'], $data['answer6'], $nutrition_id);
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
            $sql = 'SELECT c.*, b.* FROM `children` AS c INNER JOIN barangay AS b ON c.brgy_id=b.brgy_id WHERE c.id = ?';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('i', $id);
                
            if ($qry->execute()) {
                $result = $qry->get_result();
                $data['data'] = array();
                while ($row = $result->fetch_assoc()) {
                    $date = new DateTime($row['birthday']);
                    $now = new DateTime();
                    $interval = $now->diff($date);
                    $age = 0;
                    if ($interval->y > 0) {
                        $age = $interval->y.' yr/s old';
                    } else if ($interval->m > 0) {
                        $age = $interval->m.' month/s old';
                    } else {
                        $age = $interval->d. ' day/s old';
                    }
                    $data['data'][] = array(
                        'id'    => $row['id'],
                        'ifdone'    => $row['ifdone'],
                        'fname' => ucfirst($row['fname']),
                        'mname' => ucfirst($row['mname']),
                        'lname' => ucfirst($row['lname']),
                        'gender'    => ucfirst($row['gender']),
                        'birthday'  => date('M d, Y', strtotime($row['birthday'])),
                        'age'  => $age,
                        'date_reg'  => date('M d, Y', strtotime($row['date_reg'])),
                        'child_no'  => $row['child_no'],
                        'familno'   => $row['familno'],
                        'datefirstseen' => date('M d, Y', strtotime($row['datefirstseen'])),
                        'birthweight'   => $row['birthweight'],
                        'deliveryplace' => ucfirst($row['deliveryplace']),
                        'registerdate'  => date('M d, Y', strtotime($row['registerdate'])),
                        'birthat'   => ucfirst($row['birthat']),
                        'mothersname'   => ucfirst($row['mothersname']),
                        'motherseduclevel'  => ucfirst($row['motherseduclevel']),
                        'motherswork'   => ucfirst($row['motherswork']),
                        'fathername'    => ucfirst($row['fathername']),
                        'fatherseduclevel'  => ucfirst($row['fatherseduclevel']),
                        'fatherwork'    => ucfirst($row['fatherwork']),
                        'brgy_id'   => $row['brgy_id'],
                        'login_id'  => $row['login_id'],
                        'brgy_id'   => $row['brgy_id'],
                        'brgy_name' => ucfirst($row['brgy_name']),
                        'brgy_lat'  => $row['brgy_lat'],
                        'brgy_long' => $row['brgy_long'],
                        'message' => 'success',
                    );
                }
                
                return $data;
                
            } else {
                return $data['data'] = array('message'=>$this->connect->error);
            }
        }
        
        
        
        
        
        public function selectall() {
            $sql = 'SELECT c.*, b.* FROM `children` AS c INNER JOIN barangay AS b ON c.brgy_id=b.brgy_id';
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
                        'gender'    => ucfirst($row['gender']),
                        'birthday'  => date('M d, Y', strtotime($row['birthday'])),
                        'age'  => $age,
                        'date_reg'  => date('M d, Y', strtotime($row['date_reg'])),
                        'child_no'  => $row['child_no'],
                        'familno'   => $row['familno'],
                        'datefirstseen' => date('M d, Y', strtotime($row['datefirstseen'])),
                        'birthweight'   => $row['birthweight'],
                        'deliveryplace' => ucfirst($row['deliveryplace']),
                        'registerdate'  => date('M d, Y', strtotime($row['registerdate'])),
                        'birthat'   => ucfirst($row['birthat']),
                        'mothersname'   => ucfirst($row['mothersname']),
                        'motherseduclevel'  => ucfirst($row['motherseduclevel']),
                        'motherswork'   => ucfirst($row['motherswork']),
                        'fathername'    => ucfirst($row['fathername']),
                        'fatherseduclevel'  => ucfirst($row['fatherseduclevel']),
                        'fatherwork'    => ucfirst($row['fatherwork']),
                        'brgy_id'   => $row['brgy_id'],
                        'login_id'  => $row['login_id'],
                        'brgy_id'   => $row['brgy_id'],
                        'brgy_name' => ucfirst($row['brgy_name']),
                        'brgy_lat'  => $row['brgy_lat'],
                        'brgy_long' => $row['brgy_long'],
                        'message' => 'success',
                    );
                }
                
                return $data;
                
            } else {
                return $data['data'] = array('message'=>$this->connect->error);
            }
        }
    }
?>
