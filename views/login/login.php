<?php
    session_start();
    if (isset($_SESSION['account'])) {
        header('Location: ../home/home.php'); 
    }
?>
    
<!DOCTYPE html>
<html>
    <head>
        <title id="head_title">AdminLTE 3 | Dashboard</title>
        <?php require_once '../../link/_css.php'; ?>  
        
        
        <?php
            require_once '../../config/urls.php';
        ?>

        <!-- jQuery -->
        <script src="<?php echo URL; ?>/templates/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>-->
        <script src="<?php echo URL; ?>/templates/plugins/jQueryUI/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        
        <!-- Bootstrap 4 -->
        <script src="<?php echo URL; ?>/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo URL; ?>/templates/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="<?php echo URL; ?>/templates/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo URL; ?>/templates/plugins/fastclick/fastclick.js"></script>
        
        <!-- AdminLTE App -->
        <script src="<?php echo URL; ?>/templates/js/adminlte.js"></script>
        
        <!-- iCheck 1.0.1 -->
        <script src="<?php echo URL; ?>/templates/plugins/iCheck/icheck.min.js"></script>
        <!-- iCheck 1.0.1 -->
        <script src="<?php echo URL; ?>/templates/plugins/notification/js/jquery.amaran.js"></script>
        
        <style>
/*
            .login-page {
                background-image: url('../../templates/img/credit/american-express.png');
                background-repeat: no-repeat;
                background-size: 100% 100%;
            }
*/
            .login-page {
                background-image: url('../../templates/img/sagay-bg.jpg');
                background-repeat: no-repeat;
                background-size: 100% 100%;
            }
         
            
            img.profile-user-img {
                width: 220px !important;
            }
            
            
        </style>

    </head>
    <body class="hold-transition login-page">
<!--
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-ban"></i> Alert!</h5>
            Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my
            entire
            soul, like these sweet mornings of spring which I enjoy with my whole heart.
        </div>
-->
        <div class="login-box">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="../../templates/img/bimfs-logo.png" alt="User profile picture">
            </div>
            
            <div class="login-logo">
                <a href="../home/home.php"><b>BIMS-FS</b></a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Input your correct Account</p>
                    
                    <form action="login" name="login-form" id="login-form" method="post">
                        <div class="form-group has-feedback">
                            <input type="tex" name="uname" class="form-control" placeholder="Username">
                            <span class="fa fa-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" name="upass" class="form-control" placeholder="Password">
                            <span class="fa fa-lock form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat login-button">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    
                    
                    <p class="mb-1">
                        <a href="#">I forgot my password</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->
        
        
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass   : 'iradio_square-blue',
                    increaseArea : '20%' // optional
                })
            })
            
            $(document).ready(function() {
                $(document).on('submit', '#login-form', function(e) {
                    e.preventDefault();
                    var un = $('[name=uname]').val();
                    var up = $('[name=upass]').val();
                    if (un == "" || up == "") {
                        //alert("Username or Password Required!");
                        if (un == "") $('[name=uname]').focus();
                        else if (up == "") $('[name=upass]').focus();
                        $.amaran({
                            'theme'     :'colorful',
                            'content'   :{
                                bgcolor: '#ff0000', //'#336699'(color: blue) //#ff0000 (color: red)
                                color:'#fff',
                                message: '<i class="fa fa-warning"></i> Username or Password Required!',
                            },
                            'position'  :'bottom right',
                            'outEffect' :'slideRight'
                        });
                        return false                    
                    }
                    $.ajax({
                        method: "POST",
                        url: 'data_handler.php',
                        data: {'action': 'login', 'username': un , 'password': up},
                        success: function(data) {
                            console.log(data);
                            var data = JSON.parse(data);
                            if (data.response) {
                                window.location.href = '../home/home.php';
                            } else {
                                //alert("Incorrect Username and Password");
                                $.amaran({
                                    'theme'     :'colorful',
                                    'content'   :{
                                        bgcolor: '#ff0000', //'#336699'(color: blue) //#ff0000 (color: red)
                                        color:'#fff',
                                        message: '<i class="fa fa-warning"></i> Incorrect Username and Password',
                                    },
                                    'position'  :'bottom right',
                                    'outEffect' :'slideRight'
                                });
                            }
                        },
                        error: function(error) {
                            $.amaran({
                                'theme'     :'colorful',
                                'content'   :{
                                    bgcolor: '#ff0000', //'#336699'(color: blue) //#ff0000 (color: red)
                                    color:'#fff',
                                    message: '<i class="fa fa-ban"></i> Incorrect Username and Password',
                                },
                                'position'  :'bottom right',
                                'outEffect' :'slideRight'
                            });
                        }
                    })
                })
            })
        </script>
    </body>
</html>
