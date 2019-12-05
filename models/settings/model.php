<?php
    require_once '../../config/config.php';

    class settingsModel{
        public $connect = NULL;
        public function __construct() {
            $config= new Config();
            $this->connect = $config->connect();
        }
        
        public function save($v) {
            $sql = 'INSERT INTO `staff`(`id_no`, `fname`, `mname`, `lname`, `address`, `position`, `birthdate`, `contact`, `email`, `active_status`, `civil_status`, `date_employed`, `nationality`, `gender`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('ssssssssssssss', $v['idno'], $v['fname'], $v['mname'], $v['lname'], $v['address'], $v['position'], $v['bday'], $v['contact'], $v['email'], $v['activestatus'], $v['civstatus'], $v['dateemployed'], $v['nationality'], $v['gender']);
            if ($qry->execute()) {
                $last_id = $this->connect->insert_id;
                $date   = date('Y-m-d');
                $un     = $v['fname'][0].$v['lname'].date('y', strtotime($v['bday']));
                $upass  = hash('sha256', date('mdY', strtotime($v['bday'])).date('y', strtotime($date)));
                    
                $resp = $this->newaccount($un, $upass, $date, $last_id);
                if ($resp > 0) {
                    return array("response"=>$resp, "message"=> "success");
                } else {
                    return array("response"=>0, "message"=> $resp);
                }
            } else {
                return array("response"=>0, "message"=> $this->connect->error);
            }
        }
        
        public function select() {
            $sql = 'SELECT l.*, s.* FROM `login` AS l INNER JOIN staff AS s ON s.id=l.staff_id';
            $qry = $this->connect->prepare($sql);
            if ($qry->execute()) {
                $result = $qry->get_result();
                
                return $result;
            } else {
                return $this->connect->error;
            }
        }
        
        public function newaccount($un, $upass, $date, $id) {
            $sql = 'INSERT INTO `login`(`username`, `password`, `datereg`, `staff_id`) VALUES (?,?,?,?)';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('sssi', $un, $upass, $date, $id);
            if ($qry->execute()) {
                $last_id = $this->connect->insert_id;
                return $last_id;
            } else {
                return $this->connect->error;
            }
        }
    }
?>
