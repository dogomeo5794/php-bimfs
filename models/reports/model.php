<?php
    require_once '../../config/config.php';

    class Model{
        public $connect = NULL;
        public function __construct() {
            $config= new Config();
            $this->connect = $config->connect();
        }
        
        public function select($type, $frm, $to) {
            if ($type == 'child') {
                return $this->selectallchild($frm, $to);
            } else {
                return $this->selectallparent($frm, $to);
            } 
        }
            
        public function selectallchild($frm, $to) {
            $sql = 'SELECT c.*, b.* FROM `children` AS c INNER JOIN barangay AS b ON c.brgy_id=b.brgy_id WHERE c.`date_reg` >= ? AND c.date_reg <= ?';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('ss', $frm, $to);
                
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
        
        public function selectallparent($frm, $to) {
            $sql = 'SELECT p.`id`, p.`fname`, p.`mname`, p.`lname`, p.`birthday`, p.pregdate, p.bloodtype, p.`civil_status`, p.`date_reg`, p.`familyno`, p.`heigthcm`, b.brgy_id, b.brgy_name, b.brgy_lat, b.brgy_long FROM `parents` AS p INNER JOIN barangay AS b ON p.brgy_id=b.brgy_id WHERE p.`date_reg` >= ? AND p.date_reg <= ?';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('ss', $frm, $to);
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
    }
?>
