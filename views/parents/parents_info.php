<?php
    require_once '../../config/auth.php';
    require_once '../../config/lock/lock.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title id="head_title">AdminLTE 3 | Dashboard</title>
        <?php require_once '../../link/_css.php'; ?>  
        <?php require_once '../../link/_js.php'; ?>        
        <?php require_once 'modal.php'; ?>

        <style>
            .mycalendar {
                border: 3px solid lightgrey;
                font-size: 15px;
                background-color: grey;
                z-index: 100;
                overflow: auto;
                display: none;
            }
        </style>

    </head>
    <body class="hold-transition sidebar-mini success">
        <div class="wrapper">

            <?php require_once '../header/header_parents.php'; ?>
            <?php require_once '../sidebar/sidebar.php'; ?>
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Pregnant Info</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                    <li class="breadcrumb-item">
                                        <a href="#" onclick="javascript:window.history.back()">
                                            <i class="fa fa-reply"></i> Pregnant
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">Pregnant Info</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
                
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        
                        
                        <div class="row">
                            <div class="col-md-3">
                                
                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle"
                                                 src="<?php echo URL."/templates/img/icon/question.png"; ?>" alt="User profile picture">
                                        </div>
                                        
                                        <h3 class="profile-username text-center" id="vname">--- --- ----</h3>
                                        
                                        
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Birthday</b> <a class="float-right" id="vbirthday">--- --, ----</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Age</b> <a class="float-right" id="vage">---</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Blood Type</b> <a class="float-right" id="vblood">---</a>
                                            </li>
                                        </ul>
                                        
                                        <a href="#" class="btn btn-primary btn-block preg_edit btn-give-birth">
                                            <b>
                                                <i class="fa fa-edit"></i> 
                                                Update
                                            </b>
                                        </a>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                                
                                <!-- About Me Box -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Info</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <strong><i class="fa fa-map-marker mr-1"></i> Address</strong>
                                        
                                        <p class="text-muted" id="vaddress">--- ----, --- ---</p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-male mr-1"></i> Height</strong>
                                        
                                        <p class="text-muted" id="vheight">
                                            --- cm
                                        </p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-home mr-1"></i> Family Number</strong>
                                        
                                        <p class="text-muted" id="vfamilyno">-----</p>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                
                                                                                                
                                                                                                
                                                                                                
                            <!-- /.col -->
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#homebase" data-toggle="tab">
                                                    <i class="fa fa-check"></i> 
                                                    Home-based Records
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#currentrecords" data-toggle="tab">
                                                    <i class="fa fa-check"></i> 
                                                    Current Pregnant Records
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="btn-danger text-primary nav-link btn-give-birth" href="#" data-toggle="modal" data-target="#give_birth_modal">
                                                    <i class="fa fa-male"></i> 
                                                    Give Birth
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="active tab-pane" id="homebase">
                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <img class="img-circle img-bordered-sm" src="<?php echo URL."/templates/img/icon/calendar.png"; ?>" alt="user image">
                                                        <span class="username">
                                                            <a href="#">PITSA SANG GINAHATAG ANG TETANUS TOXOID</a>
                                                        </span>
                                                        <span class="description">-----------</span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <!-- small box -->
                                                            <div class="small-box bg-success">
                                                                <div class="inner">
                                                                    <h3>1</h3>
                                                                                      
                                                                    <p id="toxoid_date_1">---- --, ----</p>
                                                                </div>
                                                                <div class="icon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>

                                                                <a href="#" class="small-box-footer updatetoxoid btn-give-birth" id="toxoid_btn_1">
                                                                    <i class="fa fa-edit"></i> 
                                                                    Update
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <!-- small box -->
                                                            <div class="small-box bg-success">
                                                                <div class="inner">
                                                                    <h3>2</h3>
                                                                                      
                                                                    <p id="toxoid_date_2">---- --, ----</p>
                                                                </div>
                                                                <div class="icon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            
                                                                <a href="#" class="small-box-footer updatetoxoid btn-give-birth" id="toxoid_btn_2">
                                                                    <i class="fa fa-edit"></i> 
                                                                    Update
                                                                </a>
                                                            </div>
                                                        </div>
                                                                          
                                                        <div class="col-sm-3">
                                                            <!-- small box -->
                                                            <div class="small-box bg-success">
                                                                <div class="inner">
                                                                    <h3>3</h3>
                                                                                      
                                                                    <p id="toxoid_date_3">---- --, ----</p>
                                                                </div>
                                                                <div class="icon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            
                                                                <a href="#" class="small-box-footer updatetoxoid btn-give-birth" id="toxoid_btn_3">
                                                                    <i class="fa fa-edit"></i> 
                                                                    Update
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <!-- small box -->
                                                            <div class="small-box bg-success">
                                                                <div class="inner">
                                                                    <h3>4</h3>
                                                                                      
                                                                    <p id="toxoid_date_4">---- --, ----</p>
                                                                </div>
                                                                <div class="icon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            
                                                                <a href="#" class="small-box-footer updatetoxoid btn-give-birth" id="toxoid_btn_4">
                                                                    <i class="fa fa-edit"></i> 
                                                                    Update
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <!-- small box -->
                                                            <div class="small-box bg-success">
                                                                <div class="inner">
                                                                    <h3>5</h3>
                                                                                      
                                                                    <p id="toxoid_date_5">---- --, ----</p>
                                                                </div>
                                                                <div class="icon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            
                                                                <a href="#" class="small-box-footer updatetoxoid btn-give-birth" id="toxoid_btn_5">
                                                                    <i class="fa fa-edit"></i> 
                                                                    Update
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                        
                        
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post clearfix">
                                                    <div class="user-block">
                                                        <img class="img-circle img-bordered-sm" src="<?php echo URL."/templates/img/icon/question.png"; ?>" alt="User Image">
                                                        <span class="username">
                                                            <a href="#">MGA NAGLILIGAD NGA PITSA SA PAGBUSONG SANG NANAY</a>
                                                        </span>
                                                        <span class="description">-----------</span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <div class="row">
                                                    
                                                        
                                                        <table class="table table-bordered" id="prev-preggytable">
                                                            <thead>
                                                                <tr class="bg-primary">
                                                                    <th>NUMERO SANG PAGBUSONG</th>
                                                                    <th>1</th>
                                                                    <th>2</th>
                                                                    <th>3</th>
                                                                    <th>4</th>
                                                                    <th class="btn-give-birth">
                                                                        Action
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td id="prev_question_1">Nakaagi Ceasarian Section</td>
                                                                    <td id="prev_answer_1_1"> ---- </td>
                                                                    <td id="prev_answer_1_2"> ---- </td>
                                                                    <td id="prev_answer_1_3"> ---- </td>
                                                                    <td id="prev_answer_1_4"> ---- </td>
                                                                    <td class="btn-give-birth">
                                                                        <button class="btn btn-sm btn-success pull-right fa fa-edit btn_prev_preggy" id="prev_btn_edit_1">
                                                                            <small>Edit</small>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="prev_question_2">3 Kasunod-sunod na Hulugan</td>
                                                                    <td id="prev_answer_2_1"> ---- </td>
                                                                    <td id="prev_answer_2_2"> ---- </td>
                                                                    <td id="prev_answer_2_3"> ---- </td>
                                                                    <td id="prev_answer_2_4"> ---- </td>
                                                                    <td class="btn-give-birth">
                                                                        <button class="btn btn-sm btn-success pull-right fa fa-edit btn_prev_preggy" id="prev_btn_edit_2">
                                                                            <small>Edit</small>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="prev_question_3">Bata nga Binun-ag nga Patay</td>
                                                                    <td id="prev_answer_3_1"> ---- </td>
                                                                    <td id="prev_answer_3_2"> ---- </td>
                                                                    <td id="prev_answer_3_3"> ---- </td>
                                                                    <td id="prev_answer_3_4"> ---- </td>
                                                                    <td class="btn-give-birth">
                                                                        <button class="btn btn-sm btn-success pull-right fa fa-edit btn_prev_preggy" id="prev_btn_edit_3">
                                                                            <small>Edit</small>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="prev_question_4">Dinugo Tapos Pagbun-ag</td>
                                                                    <td id="prev_answer_4_1"> ---- </td>
                                                                    <td id="prev_answer_4_2"> ---- </td>
                                                                    <td id="prev_answer_4_3"> ---- </td>
                                                                    <td id="prev_answer_4_4"> ---- </td>
                                                                    <td class="btn-give-birth">
                                                                        <button class="btn btn-sm btn-success pull-right fa fa-edit btn_prev_preggy" id="prev_btn_edit_4">
                                                                            <small>Edit</small>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        
                                                        
                                                        
                                                        
                                                    </div>

                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <img class="img-circle img-bordered-sm" src="<?php echo URL."/templates/img/icon/question.png"; ?>" alt="User Image">
                                                        <span class="username">
                                                            <a href="#">SA SUBONG NGA PROBLEMA SANG IKAAYONG LAWAS</a>
                                                        </span>
                                                        <span class="description">-----------</span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <div class="row">
                                                        
                                                        
                                                        
                                                        <table class="table table-bordered" id="cur-problempreggy">
                                                            <thead>
                                                                <tr class="bg-primary">
                                                                    <th>Remarks</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th class="btn-give-birth">
                                                                        Action
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td id="curprob_question_1">TUBERCOLOSIS</td>
                                                                    <td id="curprob_answer_1_1"> ---- </td>
                                                                    <td id="curprob_answer_1_2"> ---- </td>
                                                                    <td class="btn-give-birth">
                                                                        <button class="btn btn-sm btn-success pull-right fa fa-edit btn_curprob" id="curprob_btn_edit_1">
                                                                            <small>Edit</small>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="curprob_question_2">SOBRA SA 14 KA ADLAW NGA UBO</td>
                                                                    <td id="curprob_answer_2_1"> ---- </td>
                                                                    <td id="curprob_answer_2_2"> ---- </td>
                                                                    <td class="btn-give-birth">
                                                                        <button class="btn btn-sm btn-success pull-right fa fa-edit btn_curprob" id="curprob_btn_edit_2">
                                                                            <small>Edit</small>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="curprob_question_3">SAKIT SA CORAZON</td>
                                                                    <td id="curprob_answer_3_1"> ---- </td>
                                                                    <td id="curprob_answer_3_2"> ---- </td>
                                                                    <td class="btn-give-birth">
                                                                        <button class="btn btn-sm btn-success pull-right fa fa-edit btn_curprob" id="curprob_btn_edit_3">
                                                                            <small>Edit</small>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="curprob_question_4">DIABETES</td>
                                                                    <td id="curprob_answer_4_1"> ---- </td>
                                                                    <td id="curprob_answer_4_2"> ---- </td>
                                                                    <td class="btn-give-birth">
                                                                        <button class="btn btn-sm btn-success pull-right fa fa-edit btn_curprob" id="curprob_btn_edit_4">
                                                                            <small>Edit</small>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="curprob_question_5">HAPO</td>
                                                                    <td id="curprob_answer_5_1"> ---- </td>
                                                                    <td id="curprob_answer_5_2"> ---- </td>
                                                                    <td class="btn-give-birth">
                                                                        <button class="btn btn-sm btn-success pull-right fa fa-edit btn_curprob" id="curprob_btn_edit_5">
                                                                            <small>Edit</small>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="curprob_question_6">GOITER</td>
                                                                    <td id="curprob_answer_6_1"> ---- </td>
                                                                    <td id="curprob_answer_6_2"> ---- </td>
                                                                    <td class="btn-give-birth">
                                                                        <button class="btn btn-sm btn-success pull-right fa fa-edit btn_curprob" id="curprob_btn_edit_6">
                                                                            <small>Edit</small>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        
                                                        
                                                    </div>
                                                    <!-- /.row -->

                                                </div>
                                                <!-- /.post -->
                                            </div>
                                            <!-- /.tab-pane -->
                    
                    
                                            <div class="tab-pane" id="currentrecords">
                                                
                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <img class="img-circle img-bordered-sm" src="<?php echo URL."/templates/img/icon/calendar.png"; ?>" alt="user image">
                                                        <span class="username">
                                                            <a href="#">SA SUBONG NGA PAGBUSONG</a>
                                                        </span>
                                                        <span class="description">-----------</span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <div class="row">
                                                        <!-- /.col -->
                                                        <div class="col-md-6">
                                                            <!-- Widget: user widget style 1 -->
                                                            <div class="card card-widget widget-user">
                                                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                                                <div class="widget-user-header bg-success">
                                                                    <h3 class="widget-user-username">LMP</h3>
                                                                    <h5 class="widget-user-desc">
                                                                        <button class="btn btn-sm btn-danger btn_lmp_edc btn-give-birth" id="btn_lmp_edit">
                                                                            <i class="fa fa-pencil"></i> Edit
                                                                        </button>
                                                                    </h5>
                                                                </div>
                                                                <div class="widget-user-image">
                                                                    <img class="img-circle elevation-2" src="<?php echo URL."/templates/img/icon/question.png"; ?>" alt="User Avatar">
                                                                </div>
                                                                <div class="card-footer">
                                                                    <div class="row">
                                                                        <div class="col-sm-4 border-right">
                                                                            <div class="description-block">
                                                                                <h5 class="description-header">MONTH</h5>
                                                                                <span class="description-text" id="lmp_month">----</span>
                                                                            </div>
                                                                            <!-- /.description-block -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                        <div class="col-sm-4 border-right">
                                                                            <div class="description-block">
                                                                                <h5 class="description-header">DAY</h5>
                                                                                <span class="description-text" id="lmp_day">--</span>
                                                                            </div>
                                                                            <!-- /.description-block -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                        <div class="col-sm-4">
                                                                            <div class="description-block">
                                                                                <h5 class="description-header">YEAR</h5>
                                                                                <span class="description-text" id="lmp_year">----</span>
                                                                            </div>
                                                                            <!-- /.description-block -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                    </div>
                                                                    <!-- /.row -->
                                                                </div>
                                                            </div>
                                                            <!-- /.widget-user -->
                                                        </div>
                                                        <!-- /.col -->
                                                            
                                                        
                                                        <!-- /.col -->
                                                        <div class="col-md-6">
                                                            <!-- Widget: user widget style 1 -->
                                                            <div class="card card-widget widget-user">
                                                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                                                <div class="widget-user-header bg-success">
                                                                    <h3 class="widget-user-username">EDC</h3>
                                                                    <h5 class="widget-user-desc">
                                                                        <button class="btn btn-sm btn-danger btn_lmp_edc btn-give-birth" id="btn_edc_edit">
                                                                            <i class="fa fa-pencil"></i> Edit
                                                                        </button>
                                                                    </h5>
                                                                </div>
                                                                <div class="widget-user-image">
                                                                    <img class="img-circle elevation-2" src="<?php echo URL."/templates/img/icon/question.png"; ?>" alt="User Avatar">
                                                                </div>
                                                                <div class="card-footer">
                                                                    <div class="row">
                                                                        <div class="col-sm-4 border-right">
                                                                            <div class="description-block">
                                                                                <h5 class="description-header">MONTH</h5>
                                                                                <span class="description-text" id="edc_month">----</span>
                                                                            </div>
                                                                            <!-- /.description-block -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                        <div class="col-sm-4 border-right">
                                                                            <div class="description-block">
                                                                                <h5 class="description-header">DAY</h5>
                                                                                <span class="description-text" id="edc_day">--</span>
                                                                            </div>
                                                                            <!-- /.description-block -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                        <div class="col-sm-4">
                                                                            <div class="description-block">
                                                                                <h5 class="description-header">YEAR</h5>
                                                                                <span class="description-text" id="edc_year">----</span>
                                                                            </div>
                                                                            <!-- /.description-block -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                    </div>
                                                                    <!-- /.row -->
                                                                </div>
                                                            </div>
                                                            <!-- /.widget-user -->
                                                        </div>
                                                        <!-- /.col -->
                                                            
                                                            
                                                    </div>
                                                
                        
                        
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post clearfix">
                                                    <div class="user-block">
                                                        <img class="img-circle img-bordered-sm" src="<?php echo URL."/templates/img/icon/question.png"; ?>" alt="User Image">
                                                        <span class="username">
                                                            <a href="#">TRIMESTER</a>
                                                        </span>
                                                        <span class="description">-----------</span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <div class="row">
                                                    
                                                        <table class="table table-bordered" id="cur-problempreggy">
                                                            <thead>
                                                                <tr class="bg-info">  
                                                                    <th>Trimester</th>
                                                                    <th>1st</th>
                                                                    <th colspan="3">2nd</th>
                                                                    <th colspan="3">3rd</th>
                                                                    <th class="btn-give-birth"></th>
                                                                </tr>
                                                                <tr class="bg-primary">
                                                                    <th>Edad sang Pagbusong</th>
                                                                    <th>2 OR 3</th>
                                                                    <th>4</th>
                                                                    <th>5</th>
                                                                    <th>6</th>
                                                                    <th>7</th>
                                                                    <th>8</th>
                                                                    <th>9</th>
                                                                    <th class="btn-give-birth">
                                                                        Action
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tri_table_body">
                                                            <!-- -->
                                                            </tbody>
                                                        </table>
                                                        
                                                        
                                                    </div>

                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <img class="img-circle img-bordered-sm" src="<?php echo URL."/templates/img/icon/question.png"; ?>" alt="User Image">
                                                        <span class="username">
                                                            <a href="#">ACTION</a>
                                                        </span>
                                                        <span class="description">-----------</span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <div class="row">
                                                        
                                                        
                                                        
                                                        <table class="table table-bordered" id="cur-problempreggy">
                                                            <thead>
                                                                <tr class="bg-primary">
                                                                    <th>Remarks</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th class="btn-give-birth">
                                                                        Action
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="action_tbl_body">
                                                                
                                                            </tbody>
                                                        </table>
                                                        
                                                        
                                                    </div>
                                                    <!-- /.row -->

                                                </div>
                                                <!-- /.post -->
                                                
                                                
                                                


                                            </div>
                                            <!-- /.tab-pane -->

                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- /.nav-tabs-custom -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->


                        
                        
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            
            <?php require_once '../footer/footer.php'; ?>
            
            
        </div>
        <!-- ./wrapper -->
        
    </body>
</html>


<script>
    
    $(document).ready(function() {
        $('.head-search').hide();
        
        var prev_preg_list = [];
        var cur_problem_list = [];
        var trimester_list = [];
        var trimester_action_list = [];
        var parent_list = [];
        var parents = {
            get_date_toxoid: function(preg_id) {
                var url = 'data_handler.php';
                var data = {'action': 'get_date_toxoid', 'id': preg_id}
                var result = parents.ajax(url, data);
                result.done(function(resp) {
                    //console.log("1: " + resp);
                    console.log('get_date_toxoid');
                    var data = JSON.parse(resp).data;
                    console.log(data);
                    
                    $('#toxoid_date_1').html(data[0].date_1==null?'---- --, ----':data[0].date_1);
                    $('#toxoid_btn_1').attr({'data-date-number': 'date_1', 'data-id': data[0].id});
                    
                    $('#toxoid_date_2').html(data[0].date_2==null?'---- --, ----':data[0].date_2);
                    $('#toxoid_btn_2').attr({'data-date-number': 'date_2', 'data-id': data[0].id});
                    
                    $('#toxoid_date_3').html(data[0].date_3==null?'---- --, ----':data[0].date_3);
                    $('#toxoid_btn_3').attr({'data-date-number': 'date_3', 'data-id': data[0].id});
                    
                    $('#toxoid_date_4').html(data[0].date_4==null?'---- --, ----':data[0].date_4);
                    $('#toxoid_btn_4').attr({'data-date-number': 'date_4', 'data-id': data[0].id});
                    
                    $('#toxoid_date_5').html(data[0].date_5==null?'---- --, ----':data[0].date_5);
                    $('#toxoid_btn_5').attr({'data-date-number': 'date_5', 'data-id': data[0].id});
                })
            },
            get_lmp_edc: function(preg_id) {
                var url = 'data_handler.php';
                var data = {'action': 'get_lmp_edc', 'id': preg_id}
                var result = parents.ajax(url, data);
                result.done(function(resp) {
                    //console.log("2: " + resp);
                    console.log('get_lmp_edc');
                    var data = JSON.parse(resp).data;
                    console.log(data);
                    //btn_lmp_edc
                    $('#btn_lmp_edit').attr({'data-type': 'lmp', 'data-id': data[0].id});
                    $('#lmp_month').html(data[0].lmp_month);
                    $('#lmp_day').html(data[0].lmp_day);
                    $('#lmp_year').html(data[0].lmp_year);
                    
                    $('#btn_edc_edit').attr({'data-type': 'edc', 'data-id': data[0].id});
                    $('#edc_month').html(data[0].edc_month);
                    $('#edc_day').html(data[0].edc_day);
                    $('#edc_year').html(data[0].edc_year);
                    
                })
            },
            get_previous_pregnant: function(preg_id) {
                var url = 'data_handler.php';
                var data = {'action': 'get_previous_pregnant', 'id': preg_id}
                var result = parents.ajax(url, data);
                result.done(function(resp) {
                    //console.log("3: " + resp);
                    console.log('get_previous_pregnant');
                    var data = JSON.parse(resp).data;
                    console.log(data);
                    for (var i=0; i<data.length; i++) {
                        prev_preg_list[data[i].prev_preg_id] = {
                            'question': data[i].question,
                            'prev_preg_id': data[i].prev_preg_id,
                            'answer_1': data[i].answer1==null?'':data[i].answer1,
                            'answer_2': data[i].answer2==null?'':data[i].answer2,
                            'answer_3': data[i].answer3==null?'':data[i].answer3,
                            'answer_4': data[i].answer4==null?'':data[i].answer4,
                        }
                        $('#prev_question_' + (i+1)).html(data[i].question);
                        $('#prev_answer_'+ (i+1) +'_1').html(data[i].answer1==null||data[i].answer1==""?'----':data[i].answer1.toUpperCase());
                        $('#prev_answer_'+ (i+1) +'_2').html(data[i].answer2==null||data[i].answer2==""?'----':data[i].answer2.toUpperCase());
                        $('#prev_answer_'+ (i+1) +'_3').html(data[i].answer3==null||data[i].answer3==""?'----':data[i].answer3.toUpperCase());
                        $('#prev_answer_'+ (i+1) +'_4').html(data[i].answer4==null||data[i].answer4==""?'----':data[i].answer4.toUpperCase());
                        //btn_prev_preggy
                        $('#prev_btn_edit_'+ (i+1)).attr('data-id', data[i].prev_preg_id);
                    }
                })
            },
            get_trimester: function(preg_id) {
                var url = 'data_handler.php';
                var data = {'action': 'get_trimester', 'id': preg_id}
                var result = parents.ajax(url, data);
                result.done(function(resp) {
                    //console.log("4: " + resp);
                    console.log('get_trimester');
                    var data = JSON.parse(resp).data;
                    console.log(data);
                    var tr = '';
                    for (var i=0; i<data.length; i++) {
                        trimester_list[data[i].trimester_id] = {
                            'number': data[i].number,
                            'question': data[i].question,
                            'trimester_id': data[i].trimester_id,
                            'answer_2or3': data[i].answer_2or3==null?'':data[i].answer_2or3,
                            'answer_4': data[i].answer_4==null?'':data[i].answer_4,
                            'answer_5': data[i].answer_5==null?'':data[i].answer_5,
                            'answer_6': data[i].answer_6==null?'':data[i].answer_6,
                            'answer_7': data[i].answer_7==null?'':data[i].answer_7,
                            'answer_8': data[i].answer_8==null?'':data[i].answer_8,
                            'answer_9': data[i].answer_9==null?'':data[i].answer_9,
                        }
                        
                        var attr = 'data-id="'+ data[i].trimester_id +'" data-question';
                        tr += '<tr>';
                        tr += '    <td>'+ data[i].question +'</td>';
                        tr += '    <td>'+ (data[i].answer_2or3==null||data[i].answer_2or3==""?'---':data[i].answer_2or3) +'</td>';
                        tr += '    <td>'+ (data[i].answer_4==null||data[i].answer_4==""?'---':data[i].answer_4) +'</td>';
                        tr += '    <td>'+ (data[i].answer_5==null||data[i].answer_5==""?'---':data[i].answer_5) +'</td>';
                        tr += '    <td>'+ (data[i].answer_6==null||data[i].answer_6==""?'---':data[i].answer_6) +'</td>';
                        tr += '    <td>'+ (data[i].answer_7==null||data[i].answer_7==""?'---':data[i].answer_7) +'</td>';
                        tr += '    <td>'+ (data[i].answer_8==null||data[i].answer_8==""?'---':data[i].answer_8) +'</td>';
                        tr += '    <td>'+ (data[i].answer_9==null||data[i].answer_9==""?'---':data[i].answer_9) +'</td>';
                        tr += '    <td class="btn-give-birth">';
                        tr += '        <button class="btn btn-sm btn-success pull-right trimester_btn_edit loadingtrimester_'+ data[i].trimester_id +'" '+ attr +'>';
                        tr += '            <i class="fa fa-edit"></i>';
                        tr += '            <small>Edit</small>';
                        tr += '        </button>';
                        tr += '    </td>';
                        tr += '</tr>';
                    }
                    $('#tri_table_body').html(tr);
                })
            },
            get_trimester_action: function(preg_id) {
                var url = 'data_handler.php';
                var data = {'action': 'get_trimester_action', 'id': preg_id}
                var result = parents.ajax(url, data);
                result.done(function(resp) {
                    //console.log("5: " + resp);
                    console.log('get_trimester_action');
                    var data = JSON.parse(resp).data;
                    console.log(data);
                    var tr = '';
                    for (var i=0; i<data.length; i++) {
                        trimester_action_list[data[i].action_id] = {
                            'number': data[i].number,
                            'question': data[i].question,
                            'action_id': data[i].action_id,
                            'answer_2or3': data[i].answer_2or3==null?'':data[i].answer_2or3,
                            'answer_4': data[i].answer_4==null?'':data[i].answer_4,
                            'answer_5': data[i].answer_5==null?'':data[i].answer_5,
                            'answer_6': data[i].answer_6==null?'':data[i].answer_6,
                            'answer_7': data[i].answer_7==null?'':data[i].answer_7,
                            'answer_8': data[i].answer_8==null?'':data[i].answer_8,
                            'answer_9': data[i].answer_9==null?'':data[i].answer_9,
                        }
                        tr += '<tr>';
                        tr += '    <td>'+ data[i].question +'</td>';
                        tr += '    <td>'+ (data[i].action_2or3==null||data[i].action_2or3==""?'---':data[i].action_2or3) +'</td>';
                        tr += '    <td>'+ (data[i].action_4==null||data[i].action_4==""?'---':data[i].action_4) +'</td>';
                        tr += '    <td>'+ (data[i].action_5==null||data[i].action_5==""?'---':data[i].action_5) +'</td>';
                        tr += '    <td>'+ (data[i].action_6==null||data[i].action_6==""?'---':data[i].action_6) +'</td>';
                        tr += '    <td>'+ (data[i].action_7==null||data[i].action_7==""?'---':data[i].action_7) +'</td>';
                        tr += '    <td>'+ (data[i].action_8==null||data[i].action_8==""?'---':data[i].action_8) +'</td>';
                        tr += '    <td>'+ (data[i].action_9==null||data[i].action_9==""?'---':data[i].action_9) +'</td>';
                        tr += '    <td class="btn-give-birth">';
                        tr += '        <button class="btn btn-sm btn-success pull-right triaction_btn_edit loadingtrimesteraction_'+ data[i].action_id +'" data-id="'+ data[i].action_id +'">';
                        tr += '            <i class="fa fa-edit"></i>';
                        tr += '            <small>Edit</small>';
                        tr += '        </button>';
                        tr += '    </td>';
                        tr += '</tr>';
                    }
                    
                    $('#action_tbl_body').html(tr);
                })
            },
            get_current_problem: function(preg_id) {
                var url = 'data_handler.php';
                var data = {'action': 'get_current_problem', 'id': preg_id}
                var result = parents.ajax(url, data);
                result.done(function(resp) {
                    //console.log("6: " + resp);
                    console.log('get_current_problem');
                    var data = JSON.parse(resp).data;
                    console.log(data);
                    for (var i=0; i<data.length; i++) {
                        cur_problem_list[data[i].cur_prob_id] = {
                            'question': data[i].question,
                            'cur_prob_id': data[i].cur_prob_id,
                            'answer_1': data[i].answer1==null?'':data[i].answer1,
                            'answer_2': data[i].answer2==null?'':data[i].answer2,
                        }
                        $('#curprob_question_'+ (i+1)).html(data[i].question.toUpperCase());
                        $('#curprob_answer_'+ (i+1) +'_1').html(data[i].answer1==null||data[i].answer1==""?'---':data[i].answer1.toUpperCase());
                        $('#curprob_answer_'+ (i+1) +'_2').html(data[i].answer2==null||data[i].answer2==""?'---':data[i].answer2.toUpperCase());
                        //btn_curprob
                        $('#curprob_btn_edit_'+ (i+1)).attr('data-id', data[i].cur_prob_id);
                    }
                })
            },
            getwhere: function(id) {
                var url = 'data_handler.php';
                var data = {'action': 'getparents', 'id': id}
                var result = parents.ajax(url, data);
                result.done(function(resp) {
                    console.log(resp);
                    console.log('getwhere');
                    var data = JSON.parse(resp).data;
                    console.log(data);
                    if (data.length > 0) {
                        var i=0;
                        parent_list[data[i].id] = {
                            age: data[i].age,
                            birthday: data[i].birthday,
                            bloodtype: data[i].bloodtype,
                            brgy_id: data[i].brgy_id,
                            brgy_lat: data[i].brgy_lat,
                            brgy_long: data[i].brgy_long,
                            brgy_name: data[i].brgy_name,
                            civil_status: data[i].civil_status,
                            date_reg: data[i].date_reg,
                            familyno: data[i].familyno,
                            fname: data[i].fname,
                            heigthcm: data[i].heigthcm,
                            id: data[i].id,
                            lname: data[i].lname,
                            mname: data[i].mname,
                            pregdate: data[i].pregdate,
                        };
                        $("#vname").html(data[0].fname + ' ' + data[0].mname + ' ' + data[0].lname);
                        $("#vbirthday").html(data[0].birthday);
                        $("#vage").html(data[0].age);
                        $("#vblood").html((data[0].bloodtype==""?"N/A":data[0].bloodtype).toUpperCase());
                        $("#vaddress").html('Brgy. ' + data[0].brgy_name + ', Sagay City');
                        $("#vheight").html(data[0].heigthcm + ' cm');
                        $("#vfamilyno").html(data[0].familyno);
                        
                        $('.preg_edit').attr('data-id', data[i].id);
                        
                        if (data[0].ifdone == 1) {
                            $('.btn-give-birth').remove();
                        }
                        
                        
                    } else {
                        window.location.href = '../error/error.php';
                    }
                })
            },
            getbrgy: function() {
                var url = 'data_handler.php';
                var result = parents.ajax(url, {action: 'getbrgy'});
                result.done(function(resp) {
                    //console.log(resp);
                    var data = JSON.parse(resp).data;
                    //console.log(data)
                    var option = "";
                    for (var i = 0; i < data.length; i++) {
                        var selected = "";
                        if (i == 0) {
                            selected = 'selected';
                        }
                        option += '<option '+ selected +' value="'+ data[i].brgyid +'">Brgy. ' + data[i].brgyname + ', Sagay City</option>';
                    }
                    $("[name=update_paddress]").html(option);
                    //Initialize Select2 Elements
                    $('.select2').select2();
                    
                })
            },
            ajax: function(url, data) {
                return $.ajax({
                    method: 'POST',
                    url: url,
                    data: data,
                    success: function(resp) {
                        return resp;
                    },
                    error: function(error) {
                        return error;
                    }
                })
            },
            notify: function(bg, icon, msg) {
                if (bg == true) {
                    bg = '#336699';
                } else if (bg == false) {
                    bg = '#ff0000';
                }
                
                $.amaran({
                    'theme'     :'colorful',
                    'content'   :{
                        bgcolor: bg, //'#336699'(color: blue) //#ff0000 (color: red)
                        color:'#fff',
                        message: '<i class="fa fa-'+ icon +'"></i> '+ msg,
                    },
                    'position'  :'bottom right',
                    'outEffect' :'slideRight'
                });
            }
        }
        
        function getUrlVars() {
            var vars = {};
            var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
                vars[key] = value;
            });
            return vars;
        }
        
        var refid = getUrlVars()["refid"];
        if (refid == undefined) {
            window.location.href = '../error/notfound.php';
        } else {
            parents.get_date_toxoid(refid);
            parents.get_lmp_edc(refid);
            parents.get_previous_pregnant(refid);
            parents.get_trimester(refid);
            parents.get_trimester_action(refid);
            parents.get_current_problem(refid);
            parents.getwhere(refid);
        }
        
        
        
        
        
        $('#calendar').datepicker();
        $('#lmp_calendar').datepicker();
        $('#edc_calendar').datepicker();
        
     
        $('#prev-preggytable').DataTable({
            "filter": false,
            "ordering": false,
            "info": false,
            "paging": false,
            "lenght": false
        });
        
        $('#cur-problempreggy').DataTable({
            "filter": false,
            "ordering": false,
            "info": false,
            "paging": false,
            "lenght": false
        });
        
        $('.updatetoxoid').on('click', function(e) {
            e.preventDefault();
            var no = $(this).attr('data-number');
            $('#toxoid-modal').modal();
            $('.calendar_btn').removeAttr('id');
            $('.calendar_btn').attr('id', 'datepickerok');

        })
        
        
        $(document).on('click', '#datepickerok', function() {
            var dpckr = $('#calendar').datepicker('getDate');
            dpckr = $.datepicker.formatDate("yy-mm-dd", dpckr);
            var dno = local_dateno.split('_');
            if (dpckr == 'NaN-NaN-NaN') {
                parents.notify('orange', 'warning', 'Need to select date!');
            } else {
                $('#toxoid_btn_'+ dno[1]).html('<i class="fa fa-spinner fa-spin"></i> Please wait...');
                $('#toxoid_date_'+ dno[1]).html('<i class="fa fa-spinner fa-spin"></i> Fetching Data...');
                console.log(local_tox_id + ':'+local_dateno)
                var url = 'data_handler.php';
                var data = {'action': 'update_toxoid', 'id': local_tox_id, 'type': local_dateno, 'date_no': dpckr};
                var result = parents.ajax(url, data);
                result.done(function(data) {
                    console.log(data);
                    var data = JSON.parse(data);
                    if (data.response) {
                        parents.notify(true, 'check', 'TETANUS TOXOID DATE Success to Update!');
                        parents.get_date_toxoid(refid);
                        $('#toxoid_btn_'+ dno[1]).html('<i class="fa fa-edit"></i> Update');
                    } else {
                        parents.notify(false, 'close', 'Failed to update TETANUS TOXOID DATE!');
                    }
                })
                $('#toxoid-modal').modal('hide');
            }
        })
        
        
        var local_tox_id, local_dateno;
        $(document).on('click', '.updatetoxoid', function(e) {
            var id = $(this).attr('data-id');
            var dateno = $(this).attr('data-date-number');
            local_tox_id = id;
            local_dateno = dateno;
//            alert(id + ' : ' + dateno);
        });
        
        $('.btn_prev_preggy').on('click', function(e) {
            var id = $(this).attr('data-id');
            $('#prev_preggy_modal').modal();
            $('#prev_preggy_label').html(prev_preg_list[id].question)
//            $('.btn_prev_preggy_savechanges').attr({'data-id': prev_preg_list[id].prev_preg_id})
            $('#prev_preggy_form').attr({'data-id': prev_preg_list[id].prev_preg_id})
            $('[name=prev_preggy_answer1]').val(prev_preg_list[id].answer_1)
            $('[name=prev_preggy_answer2]').val(prev_preg_list[id].answer_2)
            $('[name=prev_preggy_answer3]').val(prev_preg_list[id].answer_3)
            $('[name=prev_preggy_answer4]').val(prev_preg_list[id].answer_4)
            console.log(prev_preg_list[id])
        })
        
//        $(document).on('click', '.btn_prev_preggy_savechanges', function(e) {
        $(document).on('submit', '#prev_preggy_form', function(e) {
            e.preventDefault();
            var pid = $(this).attr('data-id');
            var ans_1 = $('[name=prev_preggy_answer1]').val();
            var ans_2 = $('[name=prev_preggy_answer2]').val();
            var ans_3 = $('[name=prev_preggy_answer3]').val();
            var ans_4 = $('[name=prev_preggy_answer4]').val();
            var url = 'data_handler.php';
            var data = {'action': 'update_prev_preggy', 'id': pid, 'answer_1': ans_1, 'answer_2': ans_2, 'answer_3': ans_3, 'answer_4': ans_4};
            var result = parents.ajax(url, data);
            result.done(function(data) {
                console.log(data);
                var data = JSON.parse(data);
                if (data.response) {
                    parents.notify(true, 'check', 'Data Updated');
                    parents.get_previous_pregnant(refid);
                    $('#prev_preggy_modal').modal('hide')
                } else {
                    parents.notify(false, 'close', 'Failed to update');
                }
            })
        })
        
        $('.btn_curprob').on('click', function(e) {
            var id = $(this).attr('data-id');
            $('#cur_problem_modal').modal();
            $('#cur_problem_label').html(cur_problem_list[id].question)
            $('#cur_problem_form').attr({'data-id': cur_problem_list[id].cur_prob_id})
            $('[name=cur_problem_answer1]').val(cur_problem_list[id].answer_1)
            $('[name=cur_problem_answer2]').val(cur_problem_list[id].answer_2)
            console.log(cur_problem_list[id])
        })
        $(document).on('submit', '#cur_problem_form', function(e) {
            e.preventDefault();
            var cpid = $(this).attr('data-id');
            var ans_1 = $('[name=cur_problem_answer1]').val();
            var ans_2 = $('[name=cur_problem_answer2]').val();
            var url = 'data_handler.php';
            var data = {'action': 'update_cur_problem', 'id': cpid, 'answer_1': ans_1, 'answer_2': ans_2};
            var result = parents.ajax(url, data);
            result.done(function(data) {
                console.log(data);
                var data = JSON.parse(data);
                if (data.response) {
                    parents.notify(true, 'check', 'Data Updated');
                    parents.get_current_problem(refid);
                    $('#cur_problem_modal').modal('hide')
                } else {
                    parents.notify(false, 'close', 'Failed to update');
                }
            })
        })
        
        
        $('#btn_lmp_edit').on('click', function() {
            $('#toxoid-modal').modal();
            
            var id = $(this).attr('data-id');
            var type = $(this).attr('data-type');
            $('.calendar_btn').removeAttr('id');
            $('.calendar_btn').attr({'id': 'datepicker_lmp', 'data-type': type, 'data-id': id});
        })
        
        $(document).on('click', '#datepicker_lmp', function() {
            lmp_edc_update('lmp');
        })
        
        $('#btn_edc_edit').on('click', function() {
            $('#toxoid-modal').modal();
            
            var id = $(this).attr('data-id');
            var type = $(this).attr('data-type');
            $('#toxoid-modal').modal();
            $('.calendar_btn').removeAttr('id');
            $('.calendar_btn').attr({'id': 'datepicker_edc', 'data-type': type, 'data-id': id});
        })
        
        $(document).on('click', '#datepicker_edc', function() {
            lmp_edc_update('edc');
        })
        
        function lmp_edc_update(type) {
            var id = $('#datepicker_'+ type).attr('data-id');
            var dpckr = $('#calendar').datepicker('getDate');
            dpckr = $.datepicker.formatDate("yy-mm-dd", dpckr);
            if (dpckr == 'NaN-NaN-NaN') {
                parents.notify('orange', 'warning', 'Need to select date!');
            } else {
                $('#btn_'+ type +'_edit').html('<i class="fa fa-spinner fa-spin"></i> Please wait...');
                $('#btn_'+ type +'_edit').attr('disabled', true);
                $('#'+ type +'_month, #'+ type +'_day, #'+ type +'_year').html('<i class="fa fa-spinner fa-spin"></i>');
                
                var url = 'data_handler.php';
                var data = {'action': 'update_lmp_edc', 'id': id, 'type': type, 'date_no': dpckr};
                var result = parents.ajax(url, data);
                result.done(function(data) {
                    console.log(data);
                    var data = JSON.parse(data);
                    if (data.response) {
                        parents.notify(true, 'check', type.toUpperCase()+' Success to Update!');
                        parents.get_lmp_edc(refid);
                        $('#btn_'+ type +'_edit').html('<i class="fa fa-pencil"></i> Edit');
                        $('#btn_'+ type +'_edit').removeAttr('disabled');
                    } else {
                        parents.notify(false, 'close', 'Failed to update '+type.toUpperCase()+'!');
                    }
                })
                $('#toxoid-modal').modal('hide');
            }
        }
        
        
        
        $(document).on('click', '.trimester_btn_edit', function() {
            var tid = $(this).attr('data-id');
            $('#trimester_form').attr('data-id', tid);
            console.log(trimester_list[tid])
//            alert('Trimester Update, \nData Displaying is working but data update is on proccess. please wait for my updates \n Thank you');
            $('#trimester_label').html(trimester_list[tid].question.toUpperCase())
            $('#trimester_modal').modal();
            
            var values = [
                trimester_list[tid].answer_2or3,
                trimester_list[tid].answer_4,
                trimester_list[tid].answer_5,
                trimester_list[tid].answer_6,
                trimester_list[tid].answer_7,
                trimester_list[tid].answer_8,
                trimester_list[tid].answer_9,
            ]
            if (trimester_list[tid].number == 1) {
                for (var i=0; i < 7; i++) {
                    var form = '<input type="date" class="form-control" name="trimester_answer'+  (i+1) +'" value="'+ values[i] +'">';
                    $('#trimester_div'+ (i+1)).html(form);
                }
            }
            else if (trimester_list[tid].number == 4) {
                for (var i=0; i < 7; i++) {
                    var form = '<input type="number" class="form-control" name="trimester_answer'+ (i+1) +'" value="'+ values[i] +'">';
                    $('#trimester_div'+(i+1)).html(form);
                }
            } 
            else if (trimester_list[tid].number == 5 || trimester_list[tid].number == 14) {
                for (var i=0; i < 7; i++) {
                    var form = '<input type="text" class="form-control" name="trimester_answer'+ (i+1) +'" value="'+ values[i] +'">';
                    $('#trimester_div'+(i+1)).html(form);
                }
            }
            else {
                for (var i=0; i < 7; i++) {
                    var no = values[i]=='wala'?'checked':'';
                    var ys = values[i]=='hu-o'?'checked':'';
                    var o = values[i]==''||values[i]==null?'checked':'';
                    var form = '<select name="trimester_answer'+ (i+1) +'" class="form-control">';
                    form += '    <option value="" '+ o +'>No answer</option>';
                    form += '    <option value="wala" '+ no +'>WALA</option>';
                    form += '    <option value="hu-o" '+ ys +'>HU-O</option>';
                    form += '</select>';
                    $('#trimester_div'+(i+1)).html(form);
                }
            }
        })
        
        $(document).on('submit', '#trimester_form', function(e) {
            var id = $(this).attr('data-id');
            $('.loadingtrimester_'+ id).html('<i class="fa fa-spin fa-spinner"></i> <small>Updating...</small>')
            $('.loadingtrimester_'+ id).attr('disabled', true);
            e.preventDefault();
            var datas = {
                'action': 'update_trimester',
                'id': $(this).attr('data-id'),
                'answer2or3': $('[name=trimester_answer1]').val(),
                'answer4': $('[name=trimester_answer2]').val(),
                'answer5': $('[name=trimester_answer3]').val(),
                'answer6': $('[name=trimester_answer4]').val(),
                'answer7': $('[name=trimester_answer5]').val(),
                'answer8': $('[name=trimester_answer6]').val(),
                'answer9': $('[name=trimester_answer7]').val(),
            }
            
            var url = 'data_handler.php';
            var result = parents.ajax(url, datas);
            result.done(function(data) {
                $('.loadingtrimester_'+ id).html('<i class="fa fa-edit"></i> <small>Edit</small>')
                console.log(data);
                var data = JSON.parse(data);
                if (data.response) {
                    parents.notify(true, 'check', 'Trimester data was updated!');
                    parents.get_trimester(refid);
                    $('#trimester_modal').modal('hide')
                } else {
                    parents.notify(false, 'close', 'Failed to update trimester data!');
                }
                
            })
        })
        
        
        
        $(document).on('click', '.triaction_btn_edit', function() {
            var tid = $(this).attr('data-id');
            $('#trimester_action_form').attr('data-id', tid);
            console.log(trimester_action_list[tid]);
            $('#trimester_action_modal').modal();
            var values = [
                trimester_action_list[tid].answer_2or3,
                trimester_action_list[tid].answer_4,
                trimester_action_list[tid].answer_5,
                trimester_action_list[tid].answer_6,
                trimester_action_list[tid].answer_7,
                trimester_action_list[tid].answer_8,
                trimester_action_list[tid].answer_9,
            ]
            
            
            $('#trimester_action_label').html(trimester_action_list[tid].question.toUpperCase())
            
            for (var i=0; i < 7; i++) {
                var form = '<input type="text" class="form-control" name="trimester_action_answer'+ (i+1) +'" value="'+ values[i] +'">';
                $('#trimester_action_div'+(i+1)).html(form);
            }
        })
        
        $(document).on('submit', '#trimester_action_form', function(e) {
            var id = $(this).attr('data-id')
            $('.loadingtrimesteraction_'+ id).html('<i class="fa fa-spin fa-spinner"></i> <small>Updating...</small>')
            $('.loadingtrimesteraction_'+ id).attr('disabled', true);
            e.preventDefault();
            var datas = {
                'action': 'update_trimester_action',
                'id': id,
                'answer2or3': $('[name=trimester_action_answer1]').val(),
                'answer4': $('[name=trimester_action_answer2]').val(),
                'answer5': $('[name=trimester_action_answer3]').val(),
                'answer6': $('[name=trimester_action_answer4]').val(),
                'answer7': $('[name=trimester_action_answer5]').val(),
                'answer8': $('[name=trimester_action_answer6]').val(),
                'answer9': $('[name=trimester_action_answer7]').val(),
            }
            
            var url = 'data_handler.php';
            var result = parents.ajax(url, datas);
            result.done(function(data) {
                $('.loadingtrimesteraction_'+ id).html('<i class="fa fa-spin fa spinner"></i> <small>Updating...</small>')
                console.log(data);
                var data = JSON.parse(data);
                if (data.response) {
                    parents.notify(true, 'check', 'Trimester action data was updated!');
                    parents.get_trimester_action(refid);
                    $('#trimester_action_modal').modal('hide')
                } else {
                    parents.notify(false, 'close', 'Failed to update trimester action response!');
                }
                
            })
        })
        
        
        $(document).on('submit', '#give_birth_form', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            $('.btn-give-birth').html('<i class="fa fa-spin fa-spinner"></i> Saving ...')
            $('.btn-give-birth').attr('disabled', true);
            e.preventDefault();
            var datas = {
                'action': 'give_birth',
                'pregnant_id': refid,
                'date_delivery': $('[name=date_delivery]').val(),
                'time_delivery': $('[name=time_delivery]').val(),
                'birth_status': $('[name=birth_status]').val(),
                'birth_condition': $('[name=birth_condition]').val(),
                'birth_weight': $('[name=birth_weight]').val(),
            }
            
            var url = 'data_handler.php';
            var result = parents.ajax(url, datas);
            result.done(function(data) {
                console.log(data);
                var data = JSON.parse(data);
                if (data.response) {
                    $('.btn-give-birth').html('<i class="fa fa-save"></i> Save');
                    $('.btn-give-birth').removeAttr('disabled');
                    parents.notify(true, 'check', 'Data Successfully saved.');
                    $('#give_birth_modal').modal('hide')
                } else {
                    parents.notify(false, 'close', 'Failed to save data!');
                }
                
            })
        })
        
        
        
        $(document).on('click', '.preg_edit', function(e) {
            var id = $(this).attr('data-id');
            var datas = parent_list[id];
            parents.getbrgy();
            console.log(datas);
            var d = new Date(datas.pregdate);
            var yy = d.getFullYear();
            var mm = d.getMonth()+1;
            var dd = d.getDate();
            var preg_date = yy+'-'+(mm<10?'0'+mm:mm)+'-'+(dd<10?'0'+dd:dd);
            
            d = new Date(datas.birthday);
            yy = d.getFullYear();
            mm = d.getMonth()+1;
            dd = d.getDate();
            var b_date = yy+'-'+(mm<10?'0'+mm:mm)+'-'+(dd<10?'0'+dd:dd);
            
            $('#update_parents-add').modal('show');
            
            $('[name=update_parents_add_form]').attr('data-id', datas.id);
            $('[name=update_pfamno]').val(datas.familyno);
            $('[name=update_pfname]').val(datas.fname);
            $('[name=update_pmname]').val(datas.mname);
            $('[name=update_plname]').val(datas.lname);
            $('[name=update_paddress]').val(datas.brgy_id);
            $('[name=update_pbday]').val(b_date);
            $('[name=update_preggydate]').val(preg_date);
            $('[name=update_pheight]').val(datas.heigthcm);
            $('[name=update_pblood]').val(datas.bloodtype);
        })
        
        $(document).on('submit', '#update_parents_add_form', function(e) {
            e.preventDefault();
            $('.btn-update-parent').html('<i class="fa fa-spin fa-spinner"></i> Saving...');
            $('.btn-update-parent').attr('disabled', true);
            var p_id = $(this).attr('data-id');
            var datas = {
                'action': 'update_parent',
                'pid': p_id,
                'update_pfamno': $('[name=update_pfamno]').val(),
                'update_pfname': $('[name=update_pfname]').val(),
                'update_pmname': $('[name=update_pmname]').val(),
                'update_plname': $('[name=update_plname]').val(),
                'update_paddress': $('[name=update_paddress]').val(),
                'update_pbday': $('[name=update_pbday]').val(),
                'update_preggydate': $('[name=update_preggydate]').val(),
                'update_pheight': $('[name=update_pheight]').val(),
                'update_pblood': $('[name=update_pblood]').val(),
            }
            
            
            $.ajax({
                method: 'POST',
                url: 'data_handler.php',
                data: datas,
                success: function(resp) {
                    $('#update_parents-add').modal('hide');
                    $('.btn-update-parent').html('<i class="fa fa-save"></i> Save');
                    $('.btn-update-parent').removeAttr('disabled');
                    
                    console.log(resp);
                    var data = JSON.parse(resp);
                    if (data.response) {
                        parents.notify(true, 'check', 'Parent Record was successfully update!.');
                    } else {
                        parents.notify(false, 'warning', 'Failed to update!.');
                    }
                    
                    parents.getwhere(refid);
                    

                }, error: function(e) {
                    parents.notify(false, 'warning', 'Something Wrong With your system!.');
                    $('.btn-update-parent').html('<i class="fa fa-save"></i> Save');
                    $('.btn-update-parent').removeAttr('disabled');
                }
            })
        })
        
        
        
        
    })
</script>
  