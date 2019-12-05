<?php
    require_once '../../config/config.php';

    class Model{
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
                $upass  = hash('sha256', $v['bday'].date('y', strtotime($date)));
                    
                $resp = $this->newaccount($un, $upass, $date, $last_id);
                if ($resp > 0) {
                    return array("response"=>$resp, "message"=> "success");
                } else {
                    return array("response"=>0, "message"=> $resp);
                }
            } else {
                return array("response"=>0, "message"=> "failed");
            }
        }
        
        public function select($data) {
            $sql = 'SELECT u.`login_id`, u.`username`, u.`password`, u.`datereg`, u.`staff_id`, s.fname, s.lname FROM `login` AS u INNER JOIN staff AS s ON u.staff_id=s.id WHERE u.username=?';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('s', $data['username']);
            if ($qry->execute()) {
                $result = $qry->get_result();
                $row = $result->fetch_assoc();
                if ($row != null) {
                    $newpass = hash('sha256', $data['password'].date('y', strtotime($row['datereg'])));
                    
                    if ($newpass == $row['password']) {
                        Session::start();
                        $_SESSION['account'] = $row['login_id'];
                        $_SESSION['account_username'] = $row['username'];
                        $_SESSION['user_name'] = ucfirst($row['fname']).' '.ucfirst($row['lname']);
                        $_SESSION['up_token'] = $row['password'];
                        $_SESSION['dreg_token'] = $row['datereg'];
                        return array('response'=>true, 'message'=> 'success');
                    } else {
                        return array('response'=>false, 'message'=> 'failed');
                    }
                } else {
                    return array('response'=>false, 'message'=> 'account not exist');
                }
                
                
            } else {
                return $this->connect->error;
            }
        }
        
        public function selectwhere($id) {
            $sql = 'SELECT l.`login_id`, l.`username`, l.`password`, l.`datereg`, s.* FROM `login` AS l INNER JOIN staff AS s ON s.id=l.staff_id WHERE l.login_id=?';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('i', $id);
            if ($qry->execute()) {
                $result = $qry->get_result();
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $date = new DateTime($row['birthdate']);
                    $now = new DateTime();
                    $interval = $now->diff($date);
                    $age = $interval->y;
                    
                    $data = array(
                        'uname'=> $row['username'],
                        'login_id'  => $row['login_id'],
                        'username'  => $row['username'],
                        'password'  => $row['password'],
                        'datereg'   => $row['datereg'],
                        'id'    => $row['id'],
                        'id_no' => $row['id_no'],
                        'fname' => $row['fname'],
                        'mname' => $row['mname'],
                        'lname' => $row['lname'],
                        'address'   => $row['address'],
                        'position'  => $row['position'],
                        'birthdate' => $row['birthdate'],
                        'age' => $age,
                        'contact'   => $row['contact'],
                        'email' => $row['email'],
                        'active_status' => $row['active_status'],
                        'civil_status'  => $row['civil_status'],
                        'date_employed' => $row['date_employed'],
                        'nationality'   => $row['nationality'],
                        'gender'    => $row['gender']
                    );
                }
                
                

    
                return $data;
                
            } else {
                return $this->connect->error;
            }
        }
        
        public function newaccount($un, $upass, $date, $id) {
            $sql = 'INSERT INTO `login`(`username`, `password`, `datereg`, `staff_id`) VALUES (?,?,?,?)';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('sssi', $un, $upass, $date, $id);
            if ($qry->execute()) {
                $acc_id = $this->connect->insert_id;
                return $acc_id;
            } else {
                return $this->connect->error;
            }
        }
        
        public function update($d, $id=false) {
            Session::start();
            $uid = $id==false?$_SESSION['account']:$id;
            $getlog = $this->getpassword($uid);
            $log = $getlog['login_id'];
            $msg = 'Your';
            if ($log != $_SESSION['account']) {
                $msg = ucfirst($getlog['name']);  
            }
            

            if ($d['type'] == 'username') {
                $sql = 'UPDATE `login` SET `username`=? WHERE login_id=?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('si', $d['value'], $uid);
                if ($qry->execute()) {
                    $_SESSION['account_username'] = $d['value'];
                    return array('response'=>true, 'message'=>$msg.' USERNAME is success to update');
                } else {
                    return array('response'=>false, 'message'=>$this->connect->error);
                }
            } else if ($d['type'] == 'password') {
                $pass = $this->getpassword($uid);
                $dreg = $pass['datereg'];
                $newpass = hash('sha256', $d['value'].date('y', strtotime($dreg)));
                $sql = 'UPDATE `login` SET `password`=? WHERE login_id=?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('si', $newpass, $uid);
                if ($qry->execute()) {
                    $_SESSION['up_token'] = $newpass;
                    return array('response'=>true, 'message'=>$msg.' PASSWORD is success to update');
                } else {
                    return array('response'=>false, 'message'=>$this->connect->error);
                }
            } else if ($d['type'] == 'address') {
                $pass = $this->getpassword($uid);
                $staffid = $pass['staff_id'];
                $sql = 'UPDATE `staff` SET `address`=? WHERE id = ?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('si', $d['value'], $staffid);
                if ($qry->execute()) {
                    return array('response'=>true, 'message'=>$msg.' ADDRESS is success to update');
                } else {
                    return array('response'=>false, 'message'=>$this->connect->error);
                }
            } else if ($d['type'] == 'contact') {
                $pass = $this->getpassword($uid);
                $staffid = $pass['staff_id'];
                $sql = 'UPDATE `staff` SET `contact`=? WHERE id = ?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('si', $d['value'], $staffid);
                if ($qry->execute()) {
                    return array('response'=>true, 'message'=>$msg.' CONTACT is success to update');
                } else {
                    return array('response'=>false, 'message'=>$this->connect->error);
                }
            } else if ($d['type'] == 'email') {
                $pass = $this->getpassword($uid);
                $staffid = $pass['staff_id'];
                $sql = 'UPDATE `staff` SET `email`=? WHERE id = ?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('si', $d['value'], $staffid);
                if ($qry->execute()) {
                    return array('response'=>true, 'message'=>$msg.' EMAIL is success to update');
                } else {
                    return array('response'=>false, 'message'=>$this->connect->error);
                }
            } else if ($d['type'] == 'civil') {
                $pass = $this->getpassword($uid);
                $staffid = $pass['staff_id'];
                $sql = 'UPDATE `staff` SET `civil_status`=? WHERE id = ?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('si', $d['value'], $staffid);
                if ($qry->execute()) {
                    return array('response'=>true, 'message'=>$msg.' CIVIL STATUS is success to update');
                } else {
                    return array('response'=>false, 'message'=>$this->connect->error);
                }
            }  else if ($d['type'] == 'fname') {
                $pass = $this->getpassword($uid);
                $staffid = $pass['staff_id'];
                $sql = 'UPDATE `staff` SET `fname`=? WHERE id = ?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('si', $d['value'], $staffid);
                if ($qry->execute()) {
                    return array('response'=>true, 'message'=>$msg.' FIRST NAME is success to update');
                } else {
                    return array('response'=>false, 'message'=>$this->connect->error);
                }
            } else if ($d['type'] == 'mname') {
                $pass = $this->getpassword($uid);
                $staffid = $pass['staff_id'];
                $sql = 'UPDATE `staff` SET `mname`=? WHERE id = ?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('si', $d['value'], $staffid);
                if ($qry->execute()) {
                    return array('response'=>true, 'message'=>$msg.' MIDDLE NAME is success to update');
                } else {
                    return array('response'=>false, 'message'=>$this->connect->error);
                }
            } else if ($d['type'] == 'lname') {
                $pass = $this->getpassword($uid);
                $staffid = $pass['staff_id'];
                $sql = 'UPDATE `staff` SET `lname`=? WHERE id = ?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('si', $d['value'], $staffid);
                if ($qry->execute()) {
                    return array('response'=>true, 'message'=>$msg.' LAST NAME is success to update');
                } else {
                    return array('response'=>false, 'message'=>$this->connect->error);
                }
            } else if ($d['type'] == 'birthday') {
                $pass = $this->getpassword($uid);
                $staffid = $pass['staff_id'];
                $sql = 'UPDATE `staff` SET `birthdate`=? WHERE id = ?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('si', $d['value'], $staffid);
                if ($qry->execute()) {
                    return array('response'=>true, 'message'=>$msg.' BIRTHDAY is success to update');
                } else {
                    return array('response'=>false, 'message'=>$this->connect->error);
                }
            } else if ($d['type'] == 'gender') {
                $pass = $this->getpassword($uid);
                $staffid = $pass['staff_id'];
                $sql = 'UPDATE `staff` SET `gender`=? WHERE id = ?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('si', $d['value'], $staffid);
                if ($qry->execute()) {
                    return array('response'=>true, 'message'=>$msg.' GENDER is success to update');
                } else {
                    return array('response'=>false, 'message'=>$this->connect->error);
                }
            } else if ($d['type'] == 'position') {
                $pass = $this->getpassword($uid);
                $staffid = $pass['staff_id'];
                $sql = 'UPDATE `staff` SET `position`=? WHERE id = ?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('si', $d['value'], $staffid);
                if ($qry->execute()) {
                    return array('response'=>true, 'message'=>$msg.' POSITION is success to update');
                } else {
                    return array('response'=>false, 'message'=>$this->connect->error);
                }
            } else if ($d['type'] == 'dateemploy') {
                $pass = $this->getpassword($uid);
                $staffid = $pass['staff_id'];
                $sql = 'UPDATE `staff` SET `date_employed`=? WHERE id = ?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('si', $d['value'], $staffid);
                if ($qry->execute()) {
                    return array('response'=>true, 'message'=>$msg.' DATE OF EMPLOYMENT is success to update');
                } else {
                    return array('response'=>false, 'message'=>$this->connect->error);
                }
            } else if ($d['type'] == 'nationality') {
                $pass = $this->getpassword($uid);
                $staffid = $pass['staff_id'];
                $sql = 'UPDATE `staff` SET `nationality`=? WHERE id = ?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('si', $d['value'], $staffid);
                if ($qry->execute()) {
                    return array('response'=>true, 'message'=>$msg.' NATIONALITY is success to update');
                } else {
                    return array('response'=>false, 'message'=>$this->connect->error);
                }
            } else if ($d['type'] == 'activestatus') {
                $pass = $this->getpassword($uid);
                $staffid = $pass['staff_id'];
                $sql = 'UPDATE `staff` SET `active_status`=? WHERE id = ?';
                $qry = $this->connect->prepare($sql);
                $qry->bind_param('si', $d['value'], $staffid);
                if ($qry->execute()) {
                    return array('response'=>true, 'message'=>$msg.' ACTIVE STATUS is success to update');
                } else {
                    return array('response'=>false, 'message'=>$this->connect->error);
                }
            }
            
            







            
//            $sql = 'UPDATE `login` SET `login_id`=[value-1],`username`=[value-2],`password`=[value-3],`datereg`=[value-4],`staff_id`=[value-5] WHERE login_id=?';
            
// UPDATE `staff` SET `id`=[value-1],`id_no`=[value-2],`fname`=[value-3],`mname`=[value-4],`lname`=[value-5],`address`=[value-6],`position`=[value-7],`birthdate`=[value-8],`contact`=[value-9],`email`=[value-10],`active_status`=[value-11],`civil_status`=[value-12],`date_employed`=[value-13],`nationality`=[value-14],`gender`=[value-15] WHERE 1


            
        }
        
        
        
        public function logout() {
            Session::start();
//            $uid = $id==false?$_SESSION['account']:$id;
            if (session_destroy()) {
                return array('logout' => 'success');
            } else {
                return array('logout' => 'failed');
            }
        }
        
        public function getpassword($id) {
            if ($id == false) {
                return $this->getpassworcurrent();
            } else {
                return $this->getpasswordwhere($id);
            }
            
        }
        
        public function getpasswordwhere($id) {
            $sql = 'SELECT l.`login_id`, l.`username`, l.`password`, l.`datereg`, l.staff_id, s.* FROM `login` AS l INNER JOIN staff AS s ON s.id=l.staff_id WHERE l.login_id=?';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('i', $id);
            if ($qry->execute()) {
                $result = $qry->get_result();
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data = array(
                        'password'  => $row['password'],
                        'datereg'   => $row['datereg'],
                        'staff_id'  => $row['staff_id'],
                        'login_id'  => $row['login_id'],
                        'name'  => $row['fname'],
                    );
                }
       
                return $data;
                
            } else {
                return $this->connect->error;
            }
        }
        
        public function getpassworcurrent() {
            Session::start();
            $id = $_SESSION['account'];
            $sql = 'SELECT l.`login_id`, l.`username`, l.`password`, l.`datereg`, l.staff_id, s.* FROM `login` AS l INNER JOIN staff AS s ON s.id=l.staff_id WHERE l.login_id=?';
            $qry = $this->connect->prepare($sql);
            $qry->bind_param('i', $id);
            if ($qry->execute()) {
                $result = $qry->get_result();
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data = array(
                        'password'  => $row['password'],
                        'datereg'   => $row['datereg'],
                        'staff_id'  => $row['staff_id'],
                        'login_id'  => $row['login_id'],
                        'name'  => $row['fname'],
                    );
                }
       
                return $data;
                
            } else {
                return $this->connect->error;
            }
        }
    }
?>
