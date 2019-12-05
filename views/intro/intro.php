<?php
    require_once '../../config/auth.php';
    require_once '../../config/lock/lock.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once '../../link/_path.php'; ?>
        <?php require_once '../../link/_css.php'; ?>
        <?php require_once '../../link/_js.php'; ?>
        
    </head>
    <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
    <body class="hold-transition skin-blue fixed layout-top-nav">
        <div class="wrapper">
            
            <?php require_once '../../views/header/header_intro.php'; ?>
            
            <!-- Full Width Column -->
            <div class="content-wrapper">
                <div class="container">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            Top Navigation
                            <small>Example 2.0</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="#">Layout</a></li>
                            <li class="active">Top Navigation</li>
                        </ol>
                    </section>
                    
                    <!-- Main content -->
                    <section class="content">
                       
                        <h1>Introduction here...</h1>
                        
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="container">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> 2.3.7
                    </div>
                    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
                    reserved.
                </div>
                <!-- /.container -->
            </footer>
        </div>
        <!-- ./wrapper -->
        
    </body>
</html>

    