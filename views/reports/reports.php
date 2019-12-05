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
        
        <style media="print">
            .content, .main-footer, .modal-header, .modal-footer, .not-print {
                display: none;
            }
            
            #child-modal-reports, 
            #parents-modal-reports, 
            #child-modal-reports .modal-dialog,
            #parents-modal-reports .modal-dialog {
                position: fixed;
                min-width: 100%;
                min-height: 100%;
                left: 0;
                padding: 0 !important;
                margin: 0 !important;
            }
            
            .modal-content {
                border: 0;
                outline: 0;
            }
            
            .dataTables_info, .dataTables_length, .dataTables_paginate {
                display: none;
            }
            
             #onprinttable, #onprinttable-parent {
                display: none;
            }
            .title-print {
                text-align: center;
            }
            .title-print p {
                font-size: 18px;
                font-weight: bold;
            }
            .title-print h1 {
                font-weight: bold;
            }
            .title-print .date {
                font-size: 18px;
                font-weight: bold;
            }
            
            
        </style>
        <style>
            .modal-body {
                overflow-y: auto;
                max-height: 700px;
            }
            
        </style>
    </head>
    <body class="hold-transition sidebar-mini success">
        <div class="wrapper">
            
            <?php require_once '../header/header_reports.php'; ?>
            <?php require_once '../sidebar/sidebar.php'; ?>
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Generating Reports</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item">
                                        <a href="../home/home.php">
                                            <i class="fa fa-home"></i> Home
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <i class="fa fa-print"></i> 
                                        Reports
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
                            <div class="col-6">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Children Reports</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>From *</label> 
                                                    <input type="date" name="cfrom" maxlength="10" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>To *</label> 
                                                    <input type="date" name="cto" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                          
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer clearfix">
                                        <button class="btn btn-sm btn-danger float-right" type="button" id="cbtngenerate">
                                            <i class="fa fa-print"></i> 
                                            Generate Reports
                                        </button>
                                    </div>
                                    
                                    
                                </div>
                                <!-- /.card -->
                            </div>
                            
                            
                            
                            <div class="col-6">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Parents Reports</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        
                                      <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>From *</label> 
                                                    <input type="date" name="pfrom" maxlength="10" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>To *</label> 
                                                    <input type="date" name="pto" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                          
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer clearfix">
                                        <button class="btn btn-sm btn-danger float-right" type="button" id="pbtngenerate">
                                            <i class="fa fa-print"></i> 
                                            Generate Reports
                                        </button>
                                    </div>
                                    
                                    
                                    
                                </div>
                                <!-- /.card -->
                            </div>
                            
                            
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            
            <?php require_once '../footer/footer.php'; ?>
            
        </div>
        <!-- ./wrapper -->
        
    </body>
</html>


<script>
    $(document).ready(function() {
        $('#sample').modal('show');
        
        var tblcild;
        var tblparents;
        
        $(document).on('click', '#print-child-reports', function() {
            var data = tblcild.rows().data();
            var table = '<div class="ctbl">';
            table += '<div class="title-print"><h1>Reports</h1><p>For Children Vacine</p><p class="date">Nov. 17, 2019</p></div>';
            table += '<table class="table table-bordered table-stripe">';
            table += '<theaad><tr><th>Cildrens Name</th><th>Birthday</th><th>Parents Address</th><th>Family No.</th><th>Child No.</th><tr></thead>';
            table += '<tbody>';
            if (data.length > 0) {
                for (var i=0; i < data.length; i++) {
                    table += '<tr>';
                    table += '<td>'+ data[i][0] +'</td>';
                    table += '<td>'+ data[i][1] +'</td>';
                    table += '<td>'+ data[i][2] +'</td>';
                    table += '<td>'+ data[i][3] +'</td>';
                    table += '<td>'+ data[i][4] +'</td>';
                    table += '</tr>';
                }
            } else {
                table += '<tr><td colspan="5">No data Found</td></tr>';
            }
            table += '</tbody>';
            table += '</div>';
            $('.print-page-modal').append(table);
            window.print(); 
            $('.ctbl').remove();
        });
        $(document).on('click', '#print-parents-reports', function() {
            var data = tblparents.rows().data();
            var table = '<div class="ptbl">';
            table += '<div class="title-print"><h1>Reports</h1><p>For Parents Pregnant</p><p class="date">Nov. 17, 2019</p></div>';
            table += '<table class="table table-bordered table-stripe" id="table-printing">';
            table += '<theaad><tr><th>Pregnant Name</th><th>Age</th><th>Address</th><th>Pregnant Date</th><th>Family No.</th><tr></thead>';
            table += '<tbody>';
            if (data.length > 0) {
                for (var i=0; i < data.length; i++) {
                    table += '<tr>';
                    table += '<td>'+ data[i][0] +'</td>';
                    table += '<td>'+ data[i][1] +'</td>';
                    table += '<td>'+ data[i][2] +'</td>';
                    table += '<td>'+ data[i][3] +'</td>';
                    table += '<td>'+ data[i][4] +'</td>';
                    table += '</tr>';
                }
            } else {
                table += '<tr><td colspan="5">No data Found</td></tr>';
            }
            table += '</tbody>';
            table += '</div>';
            $('.print-page-modal').append(table);
            window.print(); 
            $('.ptbl').remove();
        });
        
        
        
    
        $(document).on('click', '#cbtngenerate', function(e) {
            var from =      $('[name=cfrom]').val();
            var to =        $('[name=cto]').val();
            if (from == "") {
                $('[name=cfrom]').focus();
                reports.notify('close', 'Date Field is required', false);
                return;
            } else if (to == "") {
                $('[name=cto]').focus();
                reports.notify('close', 'Date Field is required', false);
                return;
            }
            
            var type = "child";
            reports.get(type, from, to);
            
        })
        
        $(document).on('click', '#pbtngenerate', function(e) {
            var from =      $('[name=pfrom]').val();
            var to =        $('[name=pto]').val();
            if (from == "") {
                $('[name=pfrom]').focus();
                reports.notify('close', 'Date Field required', false);
                return;
            } else if (to == "") {
                $('[name=pto]').focus();
                reports.notify('close', 'Date Field required', false);
                return;
            }
            
            var type = 'parents';
            reports.get(type, from, to);
        })
        
        
        var reports = {
            get: function(type, from, to) {
                var url = 'data_handler.php';
                var data = {'action': 'getreports', 'type': type, 'from': from, 'to': to};
                var result = reports.ajax(url, data);
                result.done(function(resp) {
                    if (type == 'child') {
                        reports.child(resp);
                    } else {
                        reports.parents(resp);
                    }  
                })
            },
            parents: function(resp) {
                console.log(resp);
                var data = JSON.parse(resp).data;
                console.log(data);
                var tr = "";
                tr += '<table class="table table-bordered table-striped not-print" id="onprinttable-parent">';
                tr += '    <thead>';
                tr += '        <tr>';
                tr += '            <th>Pregnant Name</th>';
                tr += '            <th>Age</th>';
                tr += '            <th>Address</th>';
                tr += '            <th>Pregnant Date</th>';
                tr += '            <th>Family No</th>';
                tr += '        </tr>';
                tr += '    </thead>';
                tr += '    <tbody id="table-child-body">';
                if (data.length > 0) {
                    for (var i=0; i < data.length; i++) {
                        var name = data[i].fname + ' ' + data[i].mname + ' ' + data[i].lname;
                        var address = 'Brgy. ' + data[i].brgy_name + ', Sagay City';
                        var pd = data[i].pregdate=="Jan 01, 1970"?"N/A":data[i].pregdate;
                        tr += '<tr>';
                        tr += '    <td>'+ name +'</td>';
                        tr += '    <td>'+ data[i].age +'</td>';
                        tr += '    <td>'+ address +'</td>';
                        tr += '    <td>'+ pd +'</td>';
                        tr += '    <td>'+ data[i].familyno +'</td>';
                        tr += '</tr>';
                    }      
                } 
                tr += '    </tbody>';
                tr += '    <tfoot class="not-print">';
                tr += '        <tr class="not-print">';
                tr += '            <th>Pregnant Name</th>';
                tr += '            <th>Age</th>';
                tr += '            <th>Address</th>';
                tr += '            <th>Pregnant Date</th>';
                tr += '            <th>Family No</th>';
                tr += '        </tr>';
                tr += '    </tfoot>';
                tr += '</table>';

                $('#tbl_reports_pregnant').html(tr);

                
                tblparents = $('#onprinttable-parent').DataTable({
                    "ordering": false,
                    "autoWidth": false
                });

                $('#parents-modal-reports').modal({
                    backdrop: false 
                });
                
            },
            child: function(resp) {
                console.log(resp);
                var data = JSON.parse(resp).data;
                console.log(data);
                var tr = "";
                tr += '<table class="table table-bordered table-striped not-print" id="onprinttable">';
                tr += '    <thead>';
                tr += '        <tr>';
                tr += '            <th>Cildrens Name</th>';
                tr += '            <th>Birthday</th>';
                tr += '            <th>Parents Address</th>';
                tr += '            <th>Family No.</th>';
                tr += '            <th>Child No.</th>';
                tr += '        </tr>';
                tr += '    </thead>';
                tr += '    <tbody id="table-child-body">';
                if (data.length > 0) {
                    for (var i=0; i < data.length; i++) {
                        var name = data[i].fname + ' ' + data[i].mname + ' ' + data[i].lname;
                        var address = 'Brgy. ' + data[i].brgy_name + ', Sagay City';
                        tr += '<tr>';
                        tr += '    <td>'+ name +'</td>';
                        tr += '    <td>'+ data[i].birthday +'</td>';
                        tr += '    <td>'+ address +'</td>';
                        tr += '    <td>'+ data[i].familno +'</td>';
                        tr += '    <td>'+ data[i].child_no +'</td>';
                        tr += '</tr>';
                    } 
                } 
                tr += '    </tbody>';
                tr += '    <tfoot class="not-print">';
                 tr += '        <tr>';
                tr += '            <th>Cildrens Name</th>';
                tr += '            <th>Birthday</th>';
                tr += '            <th>Parents Address</th>';
                tr += '            <th>Family No.</th>';
                tr += '            <th>Child No.</th>';
                tr += '        </tr>';
                tr += '    </tfoot>';
                tr += '</table>';

                $('#tbl_reports_child').html(tr);

                
                tblcild = $('#onprinttable').DataTable({
                    "ordering": false,
                    "autoWidth": false
                });

                $('#child-modal-reports').modal({
                    backdrop: false
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
                })
            }
        };
        
        
        
    })
</script>
    