<?php
    require_once '../../config/config.php';

    class Model{
        public $connect = NULL;
        public function __construct() {
            $config= new Config();
            $this->connect = $config->connect();
        }
        
        public function getchildren() {
            $done = 0;
            $data['data'] = array();
            $sql = 'SELECT COUNT(*) as total FROM `children` WHERE ifdone = ?';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('i', $done);
            if ($qry->execute()) {
                $result = $qry->get_result();
                while ($row = $result->fetch_assoc()) {
                    $data['data']['notdone'] = array(
                        'total' => $row['total'],
                    );   
                }
                
            }
            
            $sql = 'SELECT COUNT(*) as total FROM `children` WHERE ifdone != ?';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('i', $done);
            if ($qry->execute()) {
                $result = $qry->get_result();
                while ($row = $result->fetch_assoc()) {
                    $data['data']['done'] = array(
                        'total' => $row['total'],
                    );   
                }
                
            }
            
            
            return $data;
        }
        
        public function getchildrenstat() {
            $done = 0;
            $date = date('Y');
            $data['data']['notdone'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
            $data['data']['done'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
            
            $sql = 'SELECT COUNT(*) as total, date_reg, Month(date_reg) as month FROM children WHERE Year(date_reg) = ? AND ifdone=? GROUP BY Month(date_reg)';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('si', $date, $done);
            if ($qry->execute()) {
                $result = $qry->get_result();
                while ($row = $result->fetch_assoc()) {
                    $data['data']['notdone'][$row['month']-1] = $row['total'];
                }
                
            }
            
            $sql = 'SELECT COUNT(*) as total, date_reg, Month(date_reg) as month FROM children WHERE Year(date_reg) = ? AND ifdone != ? GROUP BY Month(date_reg)';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('si', $date, $done);
            if ($qry->execute()) {
                $result = $qry->get_result();
                while ($row = $result->fetch_assoc()) {
                    $data['data']['done'][$row['month']-1] = $row['total']; 
                }
                
            }
            
            
            return $data;
        }
        
        public function getpregnant() {
            $done = 0;
            $data['data'] = array();
            $sql = 'SELECT COUNT(*) as total FROM `parents` AS p LEFT JOIN give_birth AS g ON g.pregnant_id!=p.id WHERE p.ifdone = ? OR g.birth_id=NULL';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('i', $done);
            if ($qry->execute()) {
                $result = $qry->get_result();
                while ($row = $result->fetch_assoc()) {
                    $data['data']['notdone'] = array(
                        'total' => $row['total'],
                    );   
                }
                
            }
            
            $sql = 'SELECT COUNT(*) as total FROM `parents` AS p INNER JOIN give_birth AS g ON g.pregnant_id=p.id WHERE p.ifdone != ?';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('i', $done);
            if ($qry->execute()) {
                $result = $qry->get_result();
                while ($row = $result->fetch_assoc()) {
                    $data['data']['done'] = array(
                        'total' => $row['total'],
                    );   
                }
                
            }
            
            
            return $data;
        }
        
        public function getpregnantstat() {
            $done = 0;
            $date = date('Y');
            $data['data']['notdone'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
            $data['data']['done'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
            
            $sql = 'SELECT COUNT(*) as total, date_reg, Month(date_reg) as month FROM parents WHERE Year(date_reg) = ? AND ifdone=? GROUP BY Month(date_reg)';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('si', $date, $done);
            if ($qry->execute()) {
                $result = $qry->get_result();
                while ($row = $result->fetch_assoc()) {
                    $data['data']['notdone'][$row['month']-1] = $row['total'];
                }
                
            }
            
            $sql = 'SELECT COUNT(*) as total, date_reg, Month(date_reg) as month FROM parents WHERE Year(date_reg) = ? AND ifdone != ? GROUP BY Month(date_reg)';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('si', $date, $done);
            if ($qry->execute()) {
                $result = $qry->get_result();
                while ($row = $result->fetch_assoc()) {
                    $data['data']['done'][$row['month']-1] = $row['total']; 
                }
                
            }
            
            
            return $data;
        }
    }
?>
