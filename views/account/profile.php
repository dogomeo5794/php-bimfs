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
                                        <i class="fa fa-user"></i> My Profile
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
                                                 src="<?php echo URL."/templates/img/user4-128x128.jpg"; ?>" alt="User profile picture">
                                        </div>
                                        
                                        <h3 class="profile-username text-center">
                                            <?php echo ucfirst($profile['fname']).' '.ucfirst($profile['mname']).' '.ucfirst($profile['lname']); ?>
                                        </h3>
                                        
                                        <p class="text-muted text-center">
                                            <?php echo $profile['position']=='admin'?'ADMINISTRATOR':'USER'; ?>
                                        </p>
                                        
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Status</b> 
                                                <a class="float-right">
                                                    <?php if ($profile['active_status'] == 'active') { ?>
                                                    <i class="fa fa-circle text-success"></i>
                                                    Active
                                                    <?php }  else { ?>
                                                    <i class="fa fa-circle text-danger"></i>
                                                    Deactive
                                                    <?php } ?>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Birthday</b> <a class="float-right"><?php echo date('M d, Y', strtotime($profile['birthdate']));?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Age</b> 
                                                <a class="float-right">
                                                    <?php 
                                                        $date = new DateTime($profile['birthdate']);
                                                        $now = new DateTime();
                                                        $interval = $now->diff($date);
                                                        $age = $interval->y;
                                                        echo $age;
                                                    ?>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Sex</b> <a class="float-right"><?php echo ucfirst($profile['gender']==""?"N/A":$profile['gender']); ?></a>
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
                                        <strong><i class="fa fa-map-marker mr-1"></i> Address</strong>
                                        
                                        <p class="text-muted"><?php echo ucfirst($profile['address']); ?></p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-male mr-1"></i> Contact</strong>
                                        
                                        <p class="text-muted">
                                            <?php echo $profile['contact']; ?>
                                        </p>
                                        
                                        <hr>
                                        
                                        
                                        <strong><i class="fa fa-home mr-1"></i> Email</strong>
                                        
                                        <p class="text-muted"><?php echo $profile['email']; ?></p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-child mr-1"></i> Civil Status</strong>
                                        
                                        <p class="text-muted"><?php echo ucfirst($profile['civil_status']); ?></p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-calendar mr-1"></i> Date Employed</strong>
                                        
                                        <p class="text-muted"><?php echo date('M d, Y', strtotime($profile['date_employed'])); ?></p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-map-marker mr-1"></i> Nationality</strong>
                                        
                                        <p class="text-muted"><?php echo ucfirst($profile['nationality']); ?></p>
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
                                                            Account [<?php echo $profile['username'];?>]
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
                                                                        <i class="fa fa-square" id="cicon2"></i>
                                                                        Confirm Password 
                                                                    </label>
                                                                    <input type="password" class="form-control" name="uconpass" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <i class="fa fa-lock" id="cicon1"></i>
                                                                        Current Password 
                                                                    </label>
                                                                    <input type="password" class="form-control" name="ucurupass">
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
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <input type="checkbox" name="iuaddress" class="flat-red"> 
                                                                        Address
                                                                    </label>
                                                                    <input type="text" name="uuaddress" class="form-control" disabled>
                                                                </div>
                                                                
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
                                                                    <select name="uucivil" class="form-control" disabled>
                                                                        <option value="single">Single</option>
                                                                        <option value="married">Married</option>
                                                                        <option value="widowed">Widowed</option>
                                                                        <option value="separated">Separated</option>
                                                                    </select>

                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label>
                                                                        <i class="fa fa-lock"></i>
                                                                        Input your password to confirm the updates of your info. 
                                                                    </label>
                                                                    <input type="password" class="form-control" name="infopass">
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

            
        $(document).on('submit','#updateunpass', function(e) {
            e.preventDefault();
            var uuname = $('[name=uuname]').val();
            var uupass = $('[name=uupass]').val();
            var uconpass = $('[name=uconpass]').val();
            var ucurupass = $('[name=ucurupass]').val();
            
            if (uupass != uconpass) {
                $('[name=uconpass]').focus();
                accounts.notify('warning', 'Confirm Password incorrect', false);
                return;
            }
            
            if (!$('[name=iupass]').prop("checked") && !$('[name=iuname]').prop("checked")) {
                accounts.notify('warning', 'No data to update, Select atleast 1 info', false);
                return;  
            } 
            
            var result = accounts.getpassword(ucurupass);
            result.done(function(resp) {
                var data = JSON.parse(resp);
                if (data.response) {
                    if ($('[name=iupass]').prop("checked")) {
                        var data = {'action': 'update', 'type': 'password', 'value': uupass};
                        accounts.update(data);
                        $('[name=iupass]').iCheck('uncheck');
                        $('[name=uupass]').val('');
                        $('[name=ucurupass]').val('');
                        $('[name=uconpass]').val('');
                    }
                    
                    if ($('[name=iuname]').prop("checked")) {
                        var data = {'action': 'update', 'type': 'username', 'value': uuname};
                        accounts.update(data);
                        $('[name=iuname]').iCheck('uncheck');
                        $('[name=uuname]').val('');
                    }
                    
                    $('[name=ucurupass]').val('');
                       
                } else {
                    $('[name=ucurupass]').focus();
                    accounts.notify('warning', 'Current Password incorrect', false);
                    return;
                }
            });
            
        });
        
        $(document).on('submit','#updateinfo', function(e) {
            e.preventDefault();
            var uuaddress = $('[name=uuaddress]').val();
            var uucontact = $('[name=uucontact]').val();
            var uuemail = $('[name=uuemail]').val();
            var uucivil = $('[name=uucivil]').val();
            var infopass = $('[name=infopass]').val();
            
            if (!$('[name=iuaddress]').prop("checked") && !$('[name=iucontact]').prop("checked") && !$('[name=iuemail]').prop("checked") && !$('[name=iucivil]').prop("checked")) {
                accounts.notify('warning', 'No data to update, Select atleast 1 info', false);
                return;  
            } 
            
            var result = accounts.getpassword(infopass);
            result.done(function(resp) {
                console.log(resp);
                var data = JSON.parse(resp);
                if (data.response) {
                    if ($('[name=iuaddress]').prop("checked")) {
                        var data = {'action': 'update', 'type': 'address', 'value': uuaddress};
                        accounts.update(data);
                        $('[name=iuaddress]').iCheck('uncheck');
                        $('[name=uuaddress]').val('');
                    }
                    
                    if ($('[name=iucontact]').prop("checked")) {
                        var data = {'action': 'update', 'type': 'contact', 'value': uucontact};
                        accounts.update(data);
                        $('[name=iucontact]').iCheck('uncheck');
                        $('[name=uucontact]').val('');
                    }
                    
                    if ($('[name=iuemail]').prop("checked")) {
                        var data = {'action': 'update', 'type': 'email', 'value': uuemail};
                        accounts.update(data);
                        $('[name=iuemail]').iCheck('uncheck');
                        $('[name=uuemail]').val('');
                    }
                    
                    if ($('[name=iucivil]').prop("checked")) {
                        var data = {'action': 'update', 'type': 'civil', 'value': uucivil};
                        accounts.update(data);
                        $('[name=iucivil]').iCheck('uncheck');
                        $('[name=uucivil]').val('');
                    }
                    
                    $('[name=infopass]').val('');
                       
                } else {
                    $('[name=infopass]').focus();
                    accounts.notify('warning', 'Current Password incorrect', false);
                    return;
                }
            });
        });
        
        
        
        
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
                    console.log(resp);
                    var data = JSON.parse(resp);
                    if (data.response) {
                        accounts.notify('check', data.message, true);
                    } else {
                        accounts.notify('warning', data.message , false);
                    }
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
                $("[name=uconpass]").attr('disabled', 'disabled');
                $("#cicon2").removeAttr('class');
                $("#cicon2").attr('class', 'fa fa-square');
            } else {
                $("[name=uupass]").removeAttr('disabled');
                $("[name=ucurupass]").removeAttr('disabled');
                $("[name=uconpass]").removeAttr('disabled');
                $("#cicon2").removeAttr('class');
                $("#cicon2").attr('class', 'fa fa-check-square');
                $("[name=uupass], [name=uconpass]").prop('required', true);
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
        
     
    })
</script>
  