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


    </head>
    <body class="hold-transition sidebar-mini success">
        <div class="wrapper">
            
            <?php require_once '../header/header_settings.php'; ?>
            <?php require_once '../sidebar/sidebar.php'; ?>
            
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">My Profile</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item">
                                        <a href="../home/home.php">
                                            <i class="fa fa-home"></i> Home
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <i class="fa fa-gears"></i> Settings
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#" onclick="javascript:window.history.back()">
                                            <i class="fa fa-reply"></i> Accounts
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <i class="fa fa-user"></i> User Info
                                    </li>
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
                                                 src="<?php echo URL."/templates/img/icon/question.PNG"; ?>" alt="User profile picture">
                                        </div>
                                        
                                        <h3 class="profile-username text-center" id="user_name">----- -. -----</h3>
                                        
                                        <p class="text-muted text-center" id="user_position">----</p>
                                        
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Status</b> 
                                                <a class="float-right" id="user_active">
                                                    <i class="fa fa-spinner fa-spin"></i>
                                                    ----
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Birthday</b> <a class="float-right" id="user_bday">---- --, ----</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Age</b> <a class="float-right" id="user_age">--</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Sex</b> <a class="float-right" id="user_gender">------</a>
                                            </li>
                                        </ul>
                                        
                                        
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                                
                                <!-- About Me Box -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fa fa-info mr-1"></i> 
                                            Info
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <strong><i class="fa fa-map-marker mr-1"></i> Family Address</strong>
                                        
                                        <p class="text-muted" id="user_address">----------</p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-male mr-1"></i> Contact</strong>
                                        
                                        <p class="text-muted" id="user_contact">
                                            -------------
                                        </p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-home mr-1"></i> Email</strong>
                                        
                                        <p class="text-muted" id="user_email">------@-----.--</p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-child mr-1"></i> Civil Status</strong>
                                        
                                        <p class="text-muted" id="user_civil">-------</p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-calendar mr-1"></i> Date Employed</strong>
                                        
                                        <p class="text-muted" id="user_demp">--- --, ----</p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-map-marker mr-1"></i> Nationality</strong>
                                        
                                        <p class="text-muted" id="user_nation">------</p>
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
                                                    <i class="fa fa-file-text"></i> 
                                                    User Form Info.
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
                                                        <img class="img-circle img-bordered-sm" src="<?php echo URL."/templates/img/icon/question.png"; ?>" alt="user image">
                                                        <span class="username">
                                                            <a href="#">USERNAME and PASSWORD</a>
                                                        </span>
                                                        <span class="description">
                                                            Account <i class="fa fa-user"></i> [ <b><span id="username_current"></span></b> ]
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <form name="updateunpass" id="updateunpass">
                                                        <div class="row">
                                                        
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <input type="checkbox" name="iuname" class="flat-red"> 
                                                                        Username 
                                                                    </label>
                                                                    <input type="text" class="form-control" name="uuname" style="width: 100%" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <input type="checkbox" name="iupass" class="flat-red"> 
                                                                        New Password 
                                                                    </label>
                                                                    <input type="password" class="form-control" name="uupass" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <i class="fa fa-lock"></i>
                                                                        Confirm Password 
                                                                    </label>
                                                                    <input type="password" class="form-control" name="uconpass" disabled>
                                                                </div>
                                                            </div>
                                                        
                                                            <div class="col-sm-12">
                                                                <button type="submit" form="updateunpass" class="btn btn-success btn-sm float-right">
                                                                    <i class="fa fa-pencil"></i> 
                                                                    Update
                                                                </button>
                                                            </div>
                                                        </div>
                                                    
                                                    </form>
                        
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post clearfix">
                                                    <div class="user-block">
                                                        <img class="img-circle img-bordered-sm" src="<?php echo URL."/templates/img/icon/question.png"; ?>" alt="User Image">
                                                        <span class="username">
                                                            <a href="#">USERS INFO</a>
                                                        </span>
                                                        <span class="description">Details</span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    
                                                    <form name="updateinfo" id="updateinfo">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <input type="checkbox" name="iufname" class="flat-red"> 
                                                                        First Name
                                                                    </label>
                                                                    <input type="text" name="uufname" class="form-control" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>
                                                                        <input type="checkbox" name="iumname" class="flat-red"> 
                                                                        Middle Name
                                                                    </label>
                                                                    <input type="text" name="uumname" class="form-control" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>
                                                                        <input type="checkbox" name="iulname" class="flat-red"> 
                                                                        Last Name
                                                                    </label>
                                                                    <input type="text" name="uulname" class="form-control" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>
                                                                        <input type="checkbox" name="iubday" class="flat-red"> 
                                                                        Birthday
                                                                    </label>
                                                                    <input type="date" name="uubday" class="form-control" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>
                                                                        <input type="checkbox" name="iugender" class="flat-red"> 
                                                                        Gender
                                                                    </label>
    <!--                                                                <input type="text" name="uugender" class="form-control">-->
                                                                    <select name="uugender" class="form-control" disabled>
                                                                        <option class="male">Male</option>
                                                                        <option class="female">Female</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>
                                                                        <input type="checkbox" name="iuaddress" class="flat-red"> 
                                                                        Address
                                                                    </label>
                                                                    <input type="text" name="uuaddress" class="form-control" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>
                                                                        <input type="checkbox" name="iuposition" class="flat-red"> 
                                                                        Position
                                                                    </label>
    <!--                                                                <input type="text" name="uuposition" class="form-control">-->
                                                                    <select name="uuposition" class="form-control" disabled>
                                                                        <option value="admin">Administrator</option>
                                                                        <option value="user">Users</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <input type="checkbox" name="iucontact" class="flat-red"> 
                                                                        Contact
                                                                    </label>
                                                                    <input type="text" name="uucontact" class="form-control" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>
                                                                        <input type="checkbox" name="iuemail" class="flat-red"> 
                                                                        Email
                                                                    </label>
                                                                    <input type="email" name="uuemail" class="form-control" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>
                                                                        <input type="checkbox" name="iucivil" class="flat-red"> 
                                                                        Civil Status
                                                                    </label>
    <!--                                                                <input type="text" name="uucivil" class="form-control">-->
                                                                    <select name="uucivil" class="form-control" disabled>
                                                                        <option value="single">Single</option>
                                                                        <option value="married">Married</option>
                                                                        <option value="widowed">Widowed</option>
                                                                        <option value="separated">Separated</option>
                                                                    </select>

                                                                </div>
                                                                <div class="form-group">
                                                                    <label>
                                                                        <input type="checkbox" name="iudemploy" class="flat-red"> 
                                                                        Date Employed
                                                                    </label>
                                                                    <input type="date" name="uudemploy" class="form-control" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>
                                                                        <input type="checkbox" name="iunation" class="flat-red"> 
                                                                        Nationality
                                                                    </label>
                                                                    <input type="text" name="uunation" class="form-control" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>
                                                                        <input type="checkbox" name="iuactstatus" class="flat-red"> 
                                                                        Status
                                                                    </label>
                                                                    <select name="uuactstatus" class="form-control" disabled>
                                                                        <option value="active">Activate</option>
                                                                        <option value="deactive">Deactivate</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    
                                                    <button type="submit" form="updateinfo" class="btn btn-success btn-sm float-right">
                                                        <i class="fa fa-pencil"></i> 
                                                        Update
                                                    </button>

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
            
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
                <h1>Ronald</h1>
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        
    </body>
</html>


<script>
    
    $(document).ready(function() {
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass   : 'iradio_minimal-blue'
        })

        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass   : 'iradio_flat-green'
        })

        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass   : 'iradio_minimal-red'
        })
        
        
        $('.alluseronly').hide();
        
        
        
        
        var accounts = {
            getpassword: function(pass) {
                var url = 'data_handler.php';
                var data = {'action':'getpassword', 'value': pass};
                return accounts.ajax(url, data);
                
            },
            update: function(data) {
                var url = 'data_handler.php';
                var result = accounts.ajax(url, data);
                result.done(function(resp) {
                    console.log(resp)
                    var data = JSON.parse(resp);
                    if (data.response) {
                        accounts.notify('check', data.message, true);
                    } else {
                        accounts.notify('warning', data.message , false);
                    }
                    myAccount();
                });
            },
            ajax: function(url, data) {
                return $.ajax({
                    method: 'POST',
                    url: url,
                    data: data,
                    success: function(resp) {
                        return resp;
                        
                    }, error: function(e) {
                        return e;
                    }
                });
            },
            notify: function(icon, msg, color) {
                color = color==true?'#336699':'#ff0000';
                $.amaran({
                    'theme'     :'colorful',
                    'content'   :{
                        bgcolor: color, //'#336699'(color: blue) //#ff0000 (color: red)
                        color:'#fff',
                        message: '<i class="fa fa-'+ icon +'"></i> ' + msg,
                    },
                    'position'  :'bottom right',
                    'outEffect' :'slideRight'
                });
            }
        };
        
        
        
        
        
        function myAccount() {
            url = 'data_handler.php';
            data = {
                'action': 'getaccount', 
                'refid': getUrlVars()["refid"]
            }
            var result = accounts.ajax(url, data);
            result.done(function(datas) {
                console.log(datas);
                var data = JSON.parse(datas);
                console.log(data);
                var active = data['active_status']=='Active'?'success':'danger';
                $('#user_name').html(data['fname'] + ' ' + data['mname'] + '. ' + data['lname']);
                $('#user_position').html(data['position']);
                $('#user_active').html('<i class="fa fa-circle text-'+ active +'"></i> ' + data['active_status']);
                $('#user_bday').html(data['birthdate']);
                $('#user_age').html(data['age']);
                $('#user_gender').html(data['gender']);
                $('#user_address').html(data['address']);
                $('#user_contact').html(data['contact']);
                $('#user_email').html(data['email']);
                $('#user_civil').html(data['civil_status']);
                $('#user_demp').html(data['date_employed']);
                $('#user_nation').html(data['nationality']);
                
                $('#username_current').html(data['uname']);
                
            })
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
            myAccount();
        }
        
    

        
            
        $(document).on('submit','#updateunpass', function(e) {
            e.preventDefault();
            var uuname = $('[name=uuname]').val();
            var uupass = $('[name=uupass]').val();
            var uconpass = $('[name=uconpass]').val();
            var myid = getUrlVars()["refid"];
            
            if (uupass != uconpass) {
                $('[name=uconpass]').focus();
                accounts.notify('warning', 'Confirm Password incorrect', false);
                return;
            }
            
            if (!$('[name=iupass]').prop("checked") && !$('[name=iuname]').prop("checked")) {
                $.amaran({
                    'theme'     :'colorful',
                    'content'   :{
                        bgcolor: 'orange', //'#336699'(color: blue) //#ff0000 (color: red)
                        color:'#fff',
                        message: '<i class="fa fa-warning"></i> No Action Needed!',
                    },
                    'position'  :'bottom right',
                    'outEffect' :'slideRight'
                });
                return;  
            }
            
            if (uupass != uconpass) {
                $('[name=uconpass]').focus();
                accounts.notify('warning', 'Confirm Password incorrect', false);
                return;
            }
                 
            if ($('[name=iupass]').prop("checked")) {
                var data = {'action': 'update', 'type': 'password', 'value': uupass, 'myid': myid};
                accounts.update(data);
                $('[name=iupass]').iCheck('uncheck');
                $('[name=uupass]').val('');
                $('[name=uconpass]').val('');
            }
                        
            if ($('[name=iuname]').prop("checked")) {
                var data = {'action': 'update', 'type': 'username', 'value': uuname, 'myid': myid};
                accounts.update(data);
                $('[name=iuname]').iCheck('uncheck');
                $('[name=uuname]').val('');
            }
             
        });
        
        $(document).on('submit','#updateinfo', function(e) {
            e.preventDefault();
            
            var uufname = $('[name=uufname]').val();
            var uumname = $('[name=uumname]').val();
            var uulname = $('[name=uulname]').val();
            var uubday  = $('[name=uubday]').val();
            var uugender    = $('[name=uugender]').val();
            var uuaddress   = $('[name=uuaddress]').val();
            var uuposition  = $('[name=uuposition]').val();
            var uucontact   = $('[name=uucontact]').val();
            var uuemail = $('[name=uuemail]').val();
            var uucivil = $('[name=uucivil]').val();
            var uudemploy   = $('[name=uudemploy]').val();
            var uunation    = $('[name=uunation]').val();
            var uuactstatus = $('[name=uuactstatus]').val();
            
            var myid = getUrlVars()["refid"];
            
            
            if (!$('[name=iufname]').prop("checked") && !$('[name=iumname]').prop("checked") && !$('[name=iulname]').prop("checked") && !$('[name=iubday]').prop("checked") && !$('[name=iugender]').prop("checked") && !$('[name=iuaddress]').prop("checked") && !$('[name=iuposition]').prop("checked") && !$('[name=iucontact]').prop("checked") && !$('[name=iuemail]').prop("checked") && !$('[name=iucivil]').prop("checked") && !$('[name=iudemploy]').prop("checked") && !$('[name=iunation]').prop("checked") && !$('[name=iuactstatus]').prop("checked")) {
                $.amaran({
                    'theme'     :'colorful',
                    'content'   :{
                        bgcolor: 'orange', //'#336699'(color: blue) //#ff0000 (color: red)
                        color:'#fff',
                        message: '<i class="fa fa-warning"></i> No Action Needed!',
                    },
                    'position'  :'bottom right',
                    'outEffect' :'slideRight'
                });
                return;
            }

            
            
            console.log('pas')

            if ($('[name=iufname]').prop("checked")) {
                var data = {'action': 'update', 'type': 'fname', 'value': uufname, 'myid': myid};
                accounts.update(data);
                $('[name=iufname]').iCheck('uncheck');
                $('[name=uufname]').val('');
            }

            if ($('[name=iumname]').prop("checked")) {
                var data = {'action': 'update', 'type': 'mname', 'value': uumname, 'myid': myid};
                accounts.update(data);
                $('[name=iumname]').iCheck('uncheck');
                $('[name=uumname]').val('');
            }

            if ($('[name=iulname]').prop("checked")) {
                var data = {'action': 'update', 'type': 'lname', 'value': uulname, 'myid': myid};
                accounts.update(data);
                $('[name=iulname]').iCheck('uncheck');
                $('[name=uulname]').val('');
            }
            
            if ($('[name=iubday]').prop("checked")) {
                var data = {'action': 'update', 'type': 'birthday', 'value': uubday, 'myid': myid};
                accounts.update(data);
                $('[name=iubday]').iCheck('uncheck');
                $('[name=uubday]').val('');
            }

            if ($('[name=iugender]').prop("checked")) {
                var data = {'action': 'update', 'type': 'gender', 'value': uugender, 'myid': myid};
                accounts.update(data);
                $('[name=iugender]').iCheck('uncheck');
                $('[name=uugender]').val('');
            }

            if ($('[name=iuaddress]').prop("checked")) {
                var data = {'action': 'update', 'type': 'address', 'value': uuaddress, 'myid': myid};
                accounts.update(data);
                $('[name=iuaddress]').iCheck('uncheck');
                $('[name=uuaddress]').val('');
            }

            if ($('[name=iuposition]').prop("checked")) {
                var data = {'action': 'update', 'type': 'position', 'value': uuposition, 'myid': myid};
                accounts.update(data);
                $('[name=iuposition]').iCheck('uncheck');
                $('[name=uuposition]').val('');
            }
            
            if ($('[name=iucontact]').prop("checked")) {
                var data = {'action': 'update', 'type': 'contact', 'value': uucontact, 'myid': myid};
                accounts.update(data);
                $('[name=iucontact]').iCheck('uncheck');
                $('[name=uucontact]').val('');
            }

            if ($('[name=iuemail]').prop("checked")) {
                var data = {'action': 'update', 'type': 'email', 'value': uuemail, 'myid': myid};
                accounts.update(data);
                $('[name=iuemail]').iCheck('uncheck');
                $('[name=uuemail]').val('');
            }

            if ($('[name=iucivil]').prop("checked")) {
                var data = {'action': 'update', 'type': 'civil', 'value': uucivil, 'myid': myid};
                accounts.update(data);
                $('[name=iucivil]').iCheck('uncheck');
                $('[name=uucivil]').val('');
            }

            if ($('[name=iudemploy]').prop("checked")) {
                var data = {'action': 'update', 'type': 'dateemploy', 'value': uudemploy, 'myid': myid};
                accounts.update(data);
                $('[name=iudemploy]').iCheck('uncheck');
                $('[name=uudemploy]').val('');
            }
            
            if ($('[name=iunation]').prop("checked")) {
                var data = {'action': 'update', 'type': 'nationality', 'value': uunation, 'myid': myid};
                accounts.update(data);
                $('[name=iunation]').iCheck('uncheck');
                $('[name=uunation]').val('');
            }

            if ($('[name=iuactstatus]').prop("checked")) {
                var data = {'action': 'update', 'type': 'activestatus', 'value': uuactstatus, 'myid': myid};
                accounts.update(data);
                $('[name=iuactstatus]').iCheck('uncheck');
                $('[name=uuactstatus]').val('');
            }
            
                   
        });

        
        
        
        
        
        /*** if iCheck is change the value ***/
        
        $('[name=iuname]').on('ifChanged', function(event) {
            if (event.target.checked == false) {
                $("[name=uuname]").attr('disabled', 'disabled');
            } else {
                $("[name=uuname]").removeAttr('disabled');
                $("[name=uuname]").prop('required', true);
            }
        });
        $('[name=iupass]').on('ifChanged', function(event) {
            if (event.target.checked == false) {
                $("[name=uupass]").attr('disabled', 'disabled');
                $("[name=ucurupass]").attr('disabled', 'disabled');
                $("[name=uconpass]").attr('disabled', 'disabled');
            } else {
                $("[name=uupass]").removeAttr('disabled');
                $("[name=ucurupass]").removeAttr('disabled');
                $("[name=uconpass]").removeAttr('disabled');;
                $("[name=uupass], [name=ucurupass], [name=uconpass]").prop('required', true);
            }
        });
        $('[name=iufname]').on('ifChanged', function(event) {
            if (event.target.checked == false) {
                $("[name=uufname]").attr('disabled', 'disabled');
            } else {
                $("[name=uufname]").removeAttr('disabled');
                $("[name=uufname]").prop('required', true);
            }
        });
        $('[name=iufname]').on('ifChanged', function(event) {
            if (event.target.checked == false) {
                $("[name=uufname]").attr('disabled', 'disabled');
            } else {
                $("[name=uufname]").removeAttr('disabled');
                $("[name=uufname]").prop('required', true);
            }
        });
        $('[name=iumname]').on('ifChanged', function(event) {
            if (event.target.checked == false) {
                $("[name=uumname]").attr('disabled', 'disabled');
            } else {
                $("[name=uumname]").removeAttr('disabled');
                $("[name=uumname]").prop('required', true);
            }
        });
        $('[name=iulname]').on('ifChanged', function(event) {
            if (event.target.checked == false) {
                $("[name=uulname]").attr('disabled', 'disabled');
            } else {
                $("[name=uulname]").removeAttr('disabled');
                $("[name=uulname]").prop('required', true);
            }
        });
        $('[name=iubday]').on('ifChanged', function(event) {
            if (event.target.checked == false) {
                $("[name=uubday]").attr('disabled', 'disabled');
            } else {
                $("[name=uubday]").removeAttr('disabled');
                $("[name=uubday]").prop('required', true);
            }
        });
        $('[name=iugender]').on('ifChanged', function(event) {
            if (event.target.checked == false) {
                $("[name=uugender]").attr('disabled', 'disabled');
            } else {
                $("[name=uugender]").removeAttr('disabled');
                $("[name=uugender]").prop('required', true);
            }
        });
        $('[name=iuaddress]').on('ifChanged', function(event) {
            if (event.target.checked == false) {
                $("[name=uuaddress]").attr('disabled', 'disabled');
            } else {
                $("[name=uuaddress]").removeAttr('disabled');
                $("[name=uuaddress]").prop('required', true);
            }
        });
        $('[name=iuposition]').on('ifChanged', function(event) {
            if (event.target.checked == false) {
                $("[name=uuposition]").attr('disabled', 'disabled');
            } else {
                $("[name=uuposition]").removeAttr('disabled');
                $("[name=uuposition]").prop('required', true);
            }
        });
        $('[name=iucontact]').on('ifChanged', function(event) {
            if (event.target.checked == false) {
                $("[name=uucontact]").attr('disabled', 'disabled');
            } else {
                $("[name=uucontact]").removeAttr('disabled');
                $("[name=uucontact]").prop('required', true);
            }
        });
        $('[name=iuemail]').on('ifChanged', function(event) {
            if (event.target.checked == false) {
                $("[name=uuemail]").attr('disabled', 'disabled');
            } else {
                $("[name=uuemail]").removeAttr('disabled');
                $("[name=uuemail]").prop('required', true);
            }
        });
        $('[name=iucivil]').on('ifChanged', function(event) {
            if (event.target.checked == false) {
                $("[name=uucivil]").attr('disabled', 'disabled');
            } else {
                $("[name=uucivil]").removeAttr('disabled');
                $("[name=uucivil]").prop('required', true);
            }
        });
        $('[name=iudemploy]').on('ifChanged', function(event) {
            if (event.target.checked == false) {
                $("[name=uudemploy]").attr('disabled', 'disabled');
            } else {
                $("[name=uudemploy]").removeAttr('disabled');
                $("[name=uudemploy]").prop('required', true);
            }
        });
        $('[name=iunation]').on('ifChanged', function(event) {
            if (event.target.checked == false) {
                $("[name=uunation]").attr('disabled', 'disabled');
            } else {
                $("[name=uunation]").removeAttr('disabled');
                $("[name=uunation]").prop('required', true);
            }
        });
        $('[name=iuactstatus]').on('ifChanged', function(event) {
            if (event.target.checked == false) {
                $("[name=uuactstatus]").attr('disabled', 'disabled');
            } else {
                $("[name=uuactstatus]").removeAttr('disabled');
                $("[name=uuactstatus]").prop('required', true);
            }
        });
     
    })
</script>
  