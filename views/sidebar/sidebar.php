<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="../home/home.php" class="brand-link bg-danger" title="Barangay Information Management and Forecasting system">
        <img src="../../templates/img/AdminLTELogo.png" alt="Barangay Information Management and Forecasting system" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BIMFS</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../templates/img/icon/question.PNG" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <?php echo ucfirst($profile['fname']).' '.ucfirst($profile['mname']).' '.ucfirst($profile['lname']); ?>
                </a>
            </div>
        </div>
           
        
        
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-header">
                    <i class="nav-icon fa fa-database"></i>
                    Current User: <i class="fa fa-circle text-success"></i><br>
                    ---<b class="text-info"> [ <?php echo $profile['position']=='admin'?'ADMINISTRATOR':'USER'; ?> ] </b>---
                </li>
                <li class="nav-item account">
                    <a href="../account/profile.php" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                
                
                <li class="nav-header">
                    <i class="nav-icon fa fa-home"></i>
                    Main Menu
                </li>
                
                <li class="nav-item home">
                    <a href="../home/home.php" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            HOME
                        </p>
                    </a>
                </li>
                <li class="nav-item parents">
                    <a href="../parents/parents.php" class="nav-link">
                        <i class="nav-icon fa fa-female"></i>
                        <p>
                            PARENTS
                        </p>
                    </a>
                </li>
                <li class="nav-item children">
                    <a href="../children/children.php" class="nav-link">
                        <i class="nav-icon fa fa-male"></i>
                        <p>
                            CHILDREN
                        </p>
                    </a>
                </li>
<!--
                <li class="nav-item graph">
                    <a href="../graph/graph.php" class="nav-link">
                        <i class="nav-icon fa fa-pie-chart"></i>
                        <p>
                            GRAPH
                        </p>
                    </a>
                </li>
-->
                <li class="nav-item map">
                    <a href="../map/map.php" class="nav-link">
                        <i class="nav-icon fa fa-map"></i>
                        <p>
                            MAP
                        </p>
                    </a>
                </li>
                <li class="nav-header">
                    <i class="nav-icon fa fa-print"></i>
                    REPORTS
                </li>
                <li class="nav-item reports">
                    <a href="../reports/reports.php" class="nav-link">
                        <i class="nav-icon fa fa-print"></i>
                        <p>
                            GENERATE REPORTS
                        </p>
                    </a>
                </li>
<!--
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fa fa-file-text-o"></i>
                        <p>
                            PREGNANT REPORTS
                        </p>
                    </a>
                </li>
-->
                <?php if ($profile['position'] == 'admin') { ?>
                <li class="nav-header">
                    <i class="nav-icon fa fa-gears"></i>
                    SETTINGS
                </li>
                <li class="nav-item settings">
                    <a href="../settings/users.php" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            USER
                        </p>
                    </a>
                </li>
                <?php } ?>
<!--
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fa fa-folder-open"></i>
                        <p>
                            FORMS
                        </p>
                    </a>
                </li>
-->
                <li class="nav-header">
                    <i class="nav-icon fa fa-power-off"></i>
                    LOGOUT
                </li>
                <li class="nav-item">
                    <a href="../account/profile.php" class="nav-link bg-danger logout">
                        <i class="nav-icon fa fa-power-off"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
                
                
                                           
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>



<script type="text/javascript">
    $(function() {
        var url = window.location.pathname.split('/');
        active = url[url.length-2];
        $('.'+active + ' a').addClass('active');
//        console.log($('.'+active).children().children()[0])
//        var open = $('.'+active).children().children()[0];
//        $(open).attr('class', 'fa fa-folder-open');
    });
    
    $(document).ready(function() {
        $(document).on('click', '.logout', function(e) {
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
    })
    
</script>



