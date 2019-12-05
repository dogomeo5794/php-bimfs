<?php
    require_once '../../config/auth.php';
    require_once '../../config/lock/lock.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once 'public/_css.php'; ?>
        <?php require_once 'public/_js.php'; ?>
        
        <?php require_once 'views/modal/modals.php'; ?>
        
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
        </style>
    </head>
    <body class="hold-transition fixed skin-blue sidebar-mini">
        <div class="wrapper">
                
            <?php require_once 'views/header/header_2.php'; ?>
            
            <?php require_once 'views/sidebar/sidebar.php'; ?>
            
                
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        STO (ADMIN)
                    </h1>
                    <ol class="breadcrumb">
                        <li><label><input type="checkbox" name="gassAll" class="minimal gparent"> ALL</label></li>
                        <li><label><input type="checkbox" name="gassAll" class="minimal gparent"> Guidance</label></li>
                        <li><label><input type="checkbox" name="gassAll" class="minimal gparent"> Library</label></li>
                        <li><label><input type="checkbox" name="gassAll" class="minimal gparent"> Clinic</label></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                    
                    
                    
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <button type="button" data-toggle="tooltip" title="Add Employee" class="addEmployee btn btn-flat btn-primary pull-right"><i class="fa fa-plus"></i></button>
                            
                            <button data-toggle="tooltip" style="margin-right: 20px;" type="button" title="Pending Employee" class="btn btn-flat btn-warning pull-right"><i class="fa fa-spin fa-spinner"></i> Pending New Employee <span class="label label-success">4</span></button>
                            
                          <table id="tbl_empRecord" class="table table-striped table-hover">
                            <thead>
                            <tr data-toggle="dropdown">
                                
                              <th>PHOTO</th>
                                <th>LAST NAME</th>
                              <th>FIRST NAME</th>
                              <th>MIDDLE NAME</th>
                              <th>GENDER</th>
                              <th>DEPARTMENT</th>
                                <th><span class="pull-right">Open</span></th>
                            </tr>
                                 
                            </thead>
                            <tbody id="all-emp">
                                <tr class="cursor-pointed">
                                    <td><img src="../7.png" width="40" height="40"></td>
                                    <td>Dogomeo</td>
                                    <td>Ronald</td>
                                    <td>Recibido</td>
                                    <td>Male</td>
                                    <td><span>ICT</span><span class="pull-right"><i class="fa fa-circle text-success"></i> Active</span></td>
                                
                                    <td>
                                        <a href="../page3/" title="click to open" type="button" class="btn btn-flat btn-sm fa fa-folder-open pull-right"></button>
                                    </td>
                                </tr>
                                
                                <tr class="cursor-pointed">
                                    <td><img src="../7.png" width="40" height="40"></td>
                                    <td>Dogomeo</td>
                                    <td>Ronald</td>
                                    <td>Recibido</td>
                                    <td>Male</td>
                                    <td><span>ICT</span><span class="pull-right"><i class="fa fa-circle text-success"></i> Active</span></td>
                                    <td><button title="click to open" type="button" class="btn btn-flat btn-sm fa fa-folder-open pull-right"></button></td>
                                </tr>
                                
                                <tr class="cursor-pointed">
                                    <td><img src="../7.png" width="40" height="40"></td>
                                    <td>Dogomeo</td>
                                    <td>Ronald</td>
                                    <td>Recibido</td>
                                    <td>Male</td>
                                    <td><span>ICT</span><span class="pull-right"><i class="fa fa-circle text-success"></i> Active</span></td>
                                    <td><button title="click to open" type="button" class="btn btn-flat btn-sm fa fa-folder-open pull-right"></button></td>
                                </tr>
                                <!-- Display data here from database -->
                            
                            </tbody>
                            
                          </table>
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
    $('#logs').addClass('active');
    
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
    $('[name=gassAll]').on('ifChanged', function(event) {
        if($(this).is(':checked')) { $('.gchild').iCheck('check'); }
        else { $('.gchild').iCheck('uncheck'); }
    })
    
    $('.gchild').on('ifChanged', function(event) {
        if($(this).is(':checked')){
            
        }
        if($('.gchild:checked').length == 7) {
            $('[name=gassAll]').iCheck('check');
        }
        else {
            $('[name=gassAll]').iCheck('uncheck');
        }
    });
    
    /*
    $('[name=gassCash]').on('ifChanged', function(event) {
        if($(this).is(':checked')){
            
        }
        if($('.gchild:checked').length == 7) {
            $('[name=gassAll]').iCheck('check');
        }
        else {
            $('[name=gassAll]').iCheck('uncheck');
        }
        
    });
    
    $('[name=gassBdgt]').on('ifChanged', function(event) {
        if($(this).is(':checked')){
            
        }
        if($('.gchild:checked').length == 7) {
            $('[name=gassAll]').iCheck('check');
        }
        else {
            $('[name=gassAll]').iCheck('uncheck');
        }
        
    });
    
    $('[name=gassHr]').on('ifChanged', function(event) {
        if($(this).is(':checked')){
            
        }
        if($('.gchild:checked').length == 7) {
            $('[name=gassAll]').iCheck('check');
        }
        else {
            $('[name=gassAll]').iCheck('uncheck');
        }
        
    });
    
    $('[name=gassRec]').on('ifChanged', function(event) {
        if($(this).is(':checked')){
            
        }
        if($('.gchild:checked').length == 7) {
            $('[name=gassAll]').iCheck('check');
        }
        else {
            $('[name=gassAll]').iCheck('uncheck');
        }
        
    });
    
    $('[name=gassReg]').on('ifChanged', function(event) {
        if($(this).is(':checked')){
            
        }
        if($('.gchild:checked').length == 7) {
            $('[name=gassAll]').iCheck('check');
        }
        else {
            $('[name=gassAll]').iCheck('uncheck');
        }
        
    });
    
    $('[name=gassSupp]').on('ifChanged', function(event) {
        if($(this).is(':checked')){
            
        }
        if($('.gchild:checked').length == 7) {
            $('[name=gassAll]').iCheck('check');
        }
        else {
            $('[name=gassAll]').iCheck('uncheck');
        }
        
    });
    */
</script>



<script>
    var oTable;
    oTable = $('#tbl_empRecord').dataTable();
    
    $('#search').keyup(function(){
        oTable.fnFilter($(this).val());
    });
</script>

    