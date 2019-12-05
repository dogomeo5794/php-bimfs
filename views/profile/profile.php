<?php
    require_once '../../config/auth.php';
    require_once '../../config/lock/lock.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once '../../link/_css.php'; ?>
        <?php require_once '../../link/_js.php'; ?>
        <?php require_once 'modal.php'; ?>
        
        <style>
            tr.cursor-pointed {
                cursor: pointer;
                /*
                border-bottom-style: double;
                border-top-style: double;
                */
            }
            
            tr.cursor-pointed > td {
                vertical-align: middle !important;
            }
            
            tr.cursor-pointed:hover {
                color: blue;
                text-decoration-line: underline;
                border-bottom: 2px solid #3c8dbc !important;
            }
            
            .dataTables_filter{ 
                display: none; 
            }
            
            .content-header > .breadcrumb > li + li:before {
                content: '|\00a0' !important;
            }
            
            
            .todo-list > li > .tools > .fa {
                font-size: 20px;
            }
            .todo-list > li > .tools {
                border-left: 2px solid grey;
                padding-left: 10px;
            }
            
            .todo-list > li > .tools > .fa:hover {
                color: blue;
            }
            
            .todo-list > li > .text > .address:before, 
            .todo-list > li > .text > .birthday:before {
                content: '\00a0\00a0\00a0\00a0'
            }
            
            .todo-list > li > .text > .address, 
            .todo-list > li > .text > .birthday {
                display: block;
            }
            
            .todo-list > li > .text > .name {
                font-size: 16px;
            }
            
            .todo-list > li > .text > .address {
                font-size: 13px;
                font-weight: 500;
            }
            
            .todo-list > li > .text > .birthday {
                font-size: 13px;
                font-weight: 500;
            }
        </style>
    </head>
    <body class="hold-transition fixed skin-blue sidebar-mini">
        <div class="wrapper">
                
            <?php require_once '../header/header_parent.php'; ?>
            
            <?php require_once '../sidebar/sidebar.php'; ?>
            
                
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <section class="content">
                    
                    
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <i class="ion ion-clipboard"></i>
                                    
                                    <h3 class="box-title">To Do List</h3>

                                    
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <h3>Settings here...</h3>
                                </div>  
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
                
                
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.3.7
                </div>
                <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
                reserved.
            </footer>
            
        </div>
        <!-- ./wrapper -->
       
        
        
    </body>
</html>


<script>
    $('#user_account').addClass('active');

     //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
</script>


<script>
    $(document).ready(function() {
        $(document).on('click', '.open-data', function(e) {
            window.location.href = 'parents_info.php?token=' + $(this).attr('data-id') + '&refdata=current';
        })
        
        $(document).on('click', '.edit-data', function(e) {
            
        })
        
        $(document).on('click', '.delete-data', function(e) {
            
        })
        
        $(document).on('click', '.addParent', function(e) {
            $('#parents-add').modal({
                backdrop: false,
                keyboard: true
            });
            e.preventDefault();
        })
        
    })
</script>



    