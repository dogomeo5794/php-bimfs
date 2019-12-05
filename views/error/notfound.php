<?php
    require_once '../../config/auth.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title id="head_title">AdminLTE 3 | Dashboard</title>
        <?php require_once '../../link/_css.php'; ?>     
        <?php require_once '../../link/_js.php'; ?>

    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            
                
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-light border-bottom bg-success">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                    </li>
                    
                </ul>
                
            </nav>
            <!-- /.navbar -->   

            <?php require_once '../sidebar/sidebar.php'; ?>
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>404 Error Page</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">404 Error Page</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                
                <!-- Main content -->
                <section class="content">
                    <div class="error-page">
                        <h2 class="headline text-warning"> 404</h2>
                        
                        <div class="error-content">
                            <h3><i class="fa fa-warning text-warning"></i> Oops! Page not found.</h3>
                            
                            <p>
                                We could not find the page you were looking for.
                                Meanwhile, you may <a href="../home/home.php">return to your home page</a> or try using the search form.
                            </p>
                            
                            <div class="form-group">
                                <button class="btn btn-danger btn-block" onclick="javascript:window.history.go(-2)">
                                    <i class="fa fa-reply"></i>
                                    Return
                                </button>
                            </div>
                        </div>
                        <!-- /.error-content -->
                    </div>
                    <!-- /.error-page -->
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

<?php require_once '../../link/_javascript.php'; ?>



