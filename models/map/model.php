<?php

     require_once '../../frameworks/vendor/autoload.php';

//    require_once __DIR__ . '/vendor/autoload.php';

    use Phpml\Classification\KNearestNeighbors;
    use Phpml\Regression\LeastSquares;




    require_once '../../config/config.php';

    class mapModel{
        public $connect = NULL;
        public function __construct() {
            $config= new Config();
            $this->connect = $config->connect();
        }
        
        public function select($id) {
            $sql = 'SELECT `brgy_id`, `brgy_name`, `brgy_lat`, `brgy_long` FROM `barangay`';
            $qry = $this->connect->prepare($sql);
			
			$data = [];
            if($qry->execute()) {
                $result = $qry->get_result();
                while($fetch = $result->fetch_array()) {
                    $data[] = array(
                        'id'    => $fetch['brgy_id'],
                        'brgy'  => ucfirst($fetch['brgy_name']),
                        'lat'   => $fetch['brgy_lat'],
                        'long'  => $fetch['brgy_long']
                    );
                }
            }
			return $data;
        }
        
        public function get_map_records($brgy_id) {
//            $samples = [[100, 2018]];
//
//            $regression = new LeastSquares();
//            $regression->train($samples);
//            $sample_predict = $regression->predict([2,2020]);
//            // return 4094.82
//            
            
//            $samples = [[2018], [2019]];
//            $targets = [150, $fetch['total']];
//            $regression = new LeastSquares();
//            $regression->train($samples, $targets);
//            $sample_predict = $regression->predict([2020]);
//			$data['predict'] = array($sample_predict);

            
            
            $data['pregnant'] = array();
			$data['give_birth'] = array();
			$data['vaccine'] = array();
			$data['vaccine_process'] = array();
			$data['predict'] = array();
			$data['years'] = array();
			$data['year_value'] = array();
            
            $now = date('Y');
            
            $sql = 'SELECT COUNT(*) as total, YEAR(g.date_delivery) as year FROM `parents` as p INNER JOIN give_birth AS g ON g.pregnant_id=p.id WHERE p.brgy_id=? GROUP BY YEAR(g.date_delivery) ORDER BY YEAR(g.date_delivery) DESC LIMIT 2';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('i', $brgy_id);
			
			
            if($qry->execute()) {
                $result = $qry->get_result();
                $yy = array();
                $val = array();
                $i = 1;
                $ifonepredict = 0;
                $ifoneyear = 0;
                $ifonevalue = 0;
                
                while($fetch = $result->fetch_array()) {
                    $yy[$i] = array($fetch['year']);
                    $val[$i] = $fetch['total'];
                    $data['years'][$i] = $fetch['year'];
                    $data['year_value'][$i] = $fetch['total'];
                    $ifonepredict = $fetch['total'];
                    $ifoneyear =  $fetch['year'];
                    $ifonevalue = $fetch['total'];
                    $i--;
                }
                
                if ($result->num_rows > 1) {
                    $samples = $yy;
                    $targets = $val;

                    $regression = new LeastSquares();
                    $regression->train($samples, $targets);

                    $sample_predict = $regression->predict([date('Y')+2]);
                    //$data['predict'][] = $sample_predict;
                    $data['predict'][] = round($sample_predict, 2);
                } else if ($result->num_rows == 1) {
                    $data['years'][0] = $ifoneyear-1;
                    $data['year_value'][0] = 0;
                    $data['predict'][0] = $ifonepredict + $ifonepredict;
                }
            }
            
            
            $sql = 'SELECT COUNT(*) as total FROM `parents` as p INNER JOIN give_birth AS g ON g.pregnant_id=p.id WHERE p.brgy_id=? AND YEAR(g.date_delivery)=?';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('is', $brgy_id, $now);
			
			
            if($qry->execute()) {
                $result = $qry->get_result();
                while($fetch = $result->fetch_array()) {
                    $data['give_birth'][] = $fetch['total'];
                }
            }
            
            
            //$sql = 'SELECT COUNT(*) as total FROM `parents` as p INNER JOIN give_birth AS g ON g.pregnant_id!=p.id WHERE p.brgy_id=? AND YEAR(p.date_reg)=?';
            $left = '';
            $sql = 'SELECT COUNT(*) as total FROM `parents` as p LEFT JOIN give_birth AS g ON g.pregnant_id=p.id WHERE p.brgy_id=? AND YEAR(p.date_reg)=? AND g.birth_id!=?';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('isi', $brgy_id, $now, $left);
			
			
            if($qry->execute()) {
                $result = $qry->get_result();
                while($fetch = $result->fetch_array()) {
                    $data['pregnant'][] = $fetch['total'];
                }
            }
            
            $done = 0;
            $sql = 'SELECT COUNT(*) AS total FROM `children` WHERE ifdone=? AND brgy_id=? AND YEAR(date_reg)=?';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('iis', $done, $brgy_id, $now);
			
			
            if($qry->execute()) {
                $result = $qry->get_result();
                while($fetch = $result->fetch_array()) {
                    $data['vaccine'][] = $fetch['total'];
                }
            }
            
            $sql = 'SELECT COUNT(*) AS total FROM `children` WHERE ifdone!=? AND brgy_id=? AND YEAR(date_reg)=?';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('iis', $done, $brgy_id, $now);
			
			
            if($qry->execute()) {
                $result = $qry->get_result();
                while($fetch = $result->fetch_array()) {
                    $data['vaccine_process'][] = $fetch['total'];
                }
            }
			return $data;
        }
    }
?>
