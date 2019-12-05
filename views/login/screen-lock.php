<?php
//    session_start();
//    if (!isset($_SESSION['account'])) {
//        header('Location: login.php'); 
//    }
?>
   

<!DOCTYPE html>
<html>
    <head>
        <title id="head_title">AdminLTE 3 | Dashboard</title>
        <?php require_once '../../link/_css.php'; ?>     
        <?php require_once '../../link/_js.php'; ?>
    </head>
    <body class="hold-transition lockscreen">
        
        
        
        <!-- Automatic element centering -->
        <div class="lockscreen-wrapper">
            <div class="lockscreen-logo">
                <a href="screen-lock.php"><b>BIM-FS</b> Lockscreen</a>
            </div>
            <!-- User name -->
            <div class="lockscreen-name"><?php echo isset($_SESSION['user_name'])?$_SESSION['user_name']:'[ Unknown User ]'; ?></div>
            
            <!-- START LOCK SCREEN ITEM -->
            <div class="lockscreen-item">
                <!-- lockscreen image -->
                <div class="lockscreen-image">
                    <img src="../../templates/img/avatar5.png" alt="User Image">
                </div>
                <!-- /.lockscreen-image -->
                
                <!-- lockscreen credentials (contains the form) -->
                <form class="lockscreen-credentials" id="lock-form">
                    <div class="input-group">
                        <input type="password" name="lock-password" <?php echo isset($_SESSION['user_name'])?'':'disabled style="background-color: white;"';?> class="form-control" placeholder="password">
                        
                        <div class="input-group-append">
                            <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                        </div>
                    </div>
                </form>
                <!-- /.lockscreen credentials -->
                
            </div>
            <!-- /.lockscreen-item -->
            <div class="help-block text-center">
                Enter your password to retrieve your session
            </div>
            <div class="text-center">
                <a href="../login/login.php" class="onlogout">Or sign in as a different user</a>
            </div>
            <div class="lockscreen-footer text-center">
                Copyright &copy; 2019 <b><a href="https://www.facebook.com" target="_blank" class="text-black">BIM-FS</a></b><br>
                Developed by <b>Jerz Aquado Team.</b>
            </div>
        </div>
        <!-- /.center -->
        
        
        <?php if (isset($_SESSION['user_name'])) { ?>
        
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass   : 'iradio_square-blue',
                    increaseArea : '20%' // optional
                })
            })
            
            $(document).ready(function() {
                $(document).on('click', '.onlogout', function(e) {
                    e.preventDefault();
                    $.ajax({
                        method: 'POST',
                        url: '../account/data_handler.php',
                        data: {'action': 'logout'},
                        success: function(data) {
                            console.log(data)
                            var data = JSON.parse(data)
                            if (data.logout == 'success') {
                                window.location.reload();
                            }
                        },
                        error: function(e) {
                            console.log(e);
                        }
                    })
                    
                })
                
                
                $(document).on('submit', '#lock-form', function(e) {
                    e.preventDefault();
                    var upass = $('[name=lock-password]').val();
                    if (upass == "") {
                        if (upass == "") $('[name=lock-password]').focus();
                        $.amaran({
                            'theme'     :'colorful',
                            'content'   :{
                                bgcolor: '#ff0000', //'#336699'(color: blue) //#ff0000 (color: red)
                                color:'#fff',
                                message: '<i class="fa fa-warning"></i> Password Required!',
                            },
                            'position'  :'bottom right',
                            'outEffect' :'slideRight'
                        });
                        return false                    
                    }
                    $.ajax({
                        method: "POST",
                        url: '../../config/lock/lock.php',
                        data: {'lock': 'lock', 'type': 'unlock', 'password': upass},
                        success: function(data) {
                            console.log(data);
                            var data = JSON.parse(data);
                            if (data.response) {
                                window.location.reload();
                            } else {
                                $.amaran({
                                    'theme'     :'colorful',
                                    'content'   :{
                                        bgcolor: '#ff0000', //'#336699'(color: blue) //#ff0000 (color: red)
                                        color:'#fff',
                                        message: '<i class="fa fa-ban"></i> Incorrect Password',
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
                                    message: '<i class="fa fa-ban"></i> Somethin wrong with your account.',
                                },
                                'position'  :'bottom right',
                                'outEffect' :'slideRight'
                            });
                        }
                    })
                })
            })
        </script>
        <?php } ?>
    </body>
</html>
    
    