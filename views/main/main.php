<?php
    require_once '../../config/auth.php';
    require_once '../../config/lock/lock.php';
?>
<!DOCTYPE html>
<html>
    <head>
        
        <title id="head_title">AdminLTE 3 | Dashboard</title>
        
        
        <?php require_once '../../link/_css.php'; ?>
        
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            
            
            <?php require_once '../header/header_1.php'; ?>
            
            
            <?php require_once '../sidebar/sidebar.php'; ?>
            
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                
                
                
                
                <h1>
                    <?php 
                        if (file_exists(URL.$_SERVER['REQUEST_URI'])) {
                            echo 'good'; 
                        } else {
                            echo 'none';
                        } 
                    ?>
                </h1>
                
                <p>
                    <?php echo URL.$_SERVER['REQUEST_URI']; ?>
                </p>
                
                
                
                
                
                
            </div>
            <!-- /.content-wrapper -->
            
            
            <?php require_once '../footer/footer.php'; ?>
            
            
        </div>
        <!-- ./wrapper -->
        
    </body>
</html>
    
    
                                    <?php require_once '../../link/_js.php'; ?>
