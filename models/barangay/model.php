<?php
    require_once '../../config/config.php';

    class brgyModel{
        public $connect = NULL;
        public function __construct() {
            $config= new Config();
            $this->connect = $config->connect();
        }
        
        public function select() {
            $sql = 'SELECT `brgy_id`, `brgy_name`, `brgy_lat`, `brgy_long` FROM `barangay`';
            $qry = $this->connect->prepare($sql);
            if ($qry->execute()) {
                $result = $qry->get_result();
                $data['data'] = array();
                while ($row = $result->fetch_assoc()) {
                    $data['data'][] = array(
                        'brgyid'=> $row['brgy_id'],
                        'brgyname'=> ucfirst($row['brgy_name']),
                        'brgylat'=> $row['brgy_lat'],
                        'brgylong'=> $row['brgy_long']
                    );
                }
                
                return $data;
                
            } else {
                return $this->connect->error;
            }
        }
    }
?>
