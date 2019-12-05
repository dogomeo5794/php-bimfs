<?php
    require_once '../../controllers/settings/controller.php';
    $pctrl = new settingsController();

    require_once '../../controllers/register/controller.php';
    $register = new Controller();

    $action = $_POST['action'];
    if($action == 'add') {
        $data = array(
            "idno" => $_POST['idno'],
            "fname" => $_POST['fname'],
            "mname" => $_POST['mname'],
            "lname" => $_POST['lname'],
            "bday" => $_POST['bday'],
            "gender" => $_POST['gender'],
            "address" => $_POST['address'],
            "position" => $_POST['position'],
            "contact" => $_POST['contact'],
            "email" => $_POST['email'],
            "civstatus" => $_POST['civstatus'],
            "dateemployed" => $_POST['dateemployed'],
            "nationality" => $_POST['nationality'],
            "activestatus" => $_POST['activestatus']
        );
//        $data = array($fn, $mn, $ln, $fno, $bdy, $hg, $bl, $add);
        
        
        $result = $pctrl->insert($data);
        
        echo json_encode($result);
    } else if($action == 'view') {
        
        $result = $pctrl->select();
        $data = array();    
        while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo ucfirst($row['fname']). ' '.ucfirst($row['mname']).' '.ucfirst($row['lname']); ?></td>
                <td><?php echo $row['position']=="admin"?ucfirst("Administrator"):ucfirst("Users"); ?></td>
                <td>
                    <?php $active = $row['active_status']=="active"?"success":"danger"; ?>
                    <?php echo "<i class='fa fa-circle text-$active'></i> ".ucfirst($row['active_status']); ?>
                </td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <div class="pull-right">
                        <button class="btn btn-sm btn-success fa fa-folder-open open-info" data-id="<?php echo $row['login_id']; ?>">
                            Open
                        </button>
                        <button data-id="<?php echo $row['login_id']; ?>" class="btn btn-sm btn-danger fa fa-trash"></button>
                    </div>
                </td>
            </tr>

<?php   } 
    } else if ($action == 'update') {
        $data = array(
            'type' => $_POST['type'],
            'value' => $_POST['value'],
        );
        
        $myid = $_POST['myid'];
        
        $result = $register->update($data, $myid);
        
        echo json_encode($result);
    } else if ($action == 'getaccount') {
        $id = $_POST['refid'];
        $row = $register->getaccount($id);
        
        $result = array(
            'uname'=> $row['username'],
            'login_id'  => $row['login_id'],
            'username'  => $row['username'],
            'password'  => $row['password'],
            'datereg'   => date('M d, Y', strtotime($row['datereg'])),
            'id'    => $row['id'],
            'id_no' => $row['id_no'],
            'fname' => ucfirst($row['fname']),
            'mname' => ucfirst($row['mname']),
            'lname' => ucfirst($row['lname']),
            'address'   => ucfirst($row['address']),
            'position'  => ucfirst($row['position']),
            'birthdate' => date('M d, Y', strtotime($row['birthdate'])),
            'age' => $row['age'],
            'contact'   => $row['contact'],
            'email' => $row['email'],
            'active_status' => ucfirst($row['active_status']),
            'civil_status'  => ucfirst($row['civil_status']),
            'date_employed' => date('M d, Y', strtotime($row['date_employed'])),
            'nationality'   => $row['nationality'],
            'gender'    => ucfirst($row['gender'])
        );
        
        echo json_encode($result);
    }

?>