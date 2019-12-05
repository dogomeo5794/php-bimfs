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
            
            <?php require_once '../header/header_parents.php'; ?>
            <?php require_once '../sidebar/sidebar.php'; ?>
              
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Pregnants</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="../home/home.php">Home</a></li>
                                    <li class="breadcrumb-item active">Parents</li>
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
                            <div class="col-12">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Parents List 
                                            <a class="btn btn-sm btn-success float-right addpregnant" href="#">
                                                <i class="fa fa-plus"></i>
                                                Add Pregnant
                                            </a>
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="pregnant_table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Pregnant Name</th>
                                                    <th>Age</th>
                                                    <th>Address</th>
                                                    <th>Pregnant Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-preggy-body">
                                                <tr>
                                                    <td>----</td>
                                                    <td>----</td>
                                                    <td>----</td>
                                                    <td>----</td>
                                                    <td>
                                                        <div class="pull-right">
                                                            <button class="btn btn-sm btn-success fa fa-folder-open open-info" data-id="1">
                                                                Open
                                                            </button>
                                                            <button class="btn btn-sm btn-primary fa fa-edit"></button>
                                                            <button class="btn btn-sm btn-danger fa fa-trash"></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Pregnant Name</th>
                                                    <th>Age</th>
                                                    <th>Address</th>
                                                    <th>Pregnant Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                    
                                    <!-- Loading (remove the following to stop the loading)-->
                                    <div class="overlay" id="tbl_loading">
                                        <i class="fa fa-spinner fa-spin"></i>
                                    </div>
                                    <!-- end loading -->
                                    
                                    
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
    $(function () {
//        $('#pregnant_table').DataTable({
//            "ordering": false,
//            "autoWidth": false
//        }); 
        
        /** Table searching **/
//        var dTable;
//        dTable = $('#pregnant_table').DataTable({
//            "ordering": false,
//            "autoWidth": false
//        });
//    
//        $('#hsearch').keyup(function(){
//            dTable.search($(this).val()).draw();
//        });
    });
    
    $(document).ready(function() {
        $(document).on('click', '.open-info', function(e) {
            var id = $(this).attr('data-id');
            window.location.href = 'parents_info.php?refid=' + id;
        })
        
        $(document).on('click', '.addpregnant', function(e) {
            e.preventDefault();
            parents.getbrgy();
            $('#parents-add').modal({
                backdrop: false,
                keyboard: true
            });
            
        })
        
        $(document).on('submit', '#parents_add_form', function(e) {
            e.preventDefault();
            var fn = $('[name=pfname]').val();
            var mn = $('[name=pmname]').val();
            var ln = $('[name=plname]').val();
            var fno = $('[name=pfamno]').val();
            var bd = $('[name=pbday]').val();
            var pd = $('[name=preggydate]').val();
            var h = $('[name=pheight]').val();
            var b = $('[name=pblood]').val();
            var a = $('[name=paddress]').val();
            var data = {
                'action': 'add',
                'pfname': fn,
                'pmname': mn,
                'plname': ln,
                'pfamno': fno,
                'pbday': bd,
                'preggydate': pd,
                'pheight': h,
                'pblood': b,
                'paddress': a
            }
            parents.save(data);
            e.preventDefault();
        })   
        
        
        var parent_list = [];
        var parents = {
            save: function(data) {
                var url = 'data_handler.php';
                var result = parents.ajax(url, data);
                result.done(function(resp) {
                    console.log(resp);
                    var data = JSON.parse(resp);
                    console.log(data)
                    if (data.message == 'success') {
                        //alert('Data save!');
                        $.amaran({
                            'theme'     :'colorful',
                            'content'   :{
                                bgcolor: '#336699', //'#336699'(color: blue) //#ff0000 (color: red)
                                color:'#fff',
                                message: '<i class="fa fa-check"></i> Data save!',
                            },
                            'position'  :'bottom right',
                            'outEffect' :'slideRight'
                        });
                        window.location.href = 'parents_info.php?refid='+ data.response;
                    } else {
                        //alert('Failed to add data!');
                        $.amaran({
                            'theme'     :'colorful',
                            'content'   :{
                                bgcolor: '#ff0000', //'#336699'(color: blue) //#ff0000 (color: red)
                                color:'#fff',
                                message: '<i class="fa fa-close"></i> Failed to add data',
                            },
                            'position'  :'bottom right',
                            'outEffect' :'slideRight'
                        });
                    }
                })
            },
            getbrgy: function() {
                var url = 'data_handler.php';
                var result = parents.ajax(url, {action: 'getbrgy'});
                result.done(function(resp) {
                    //console.log(resp);
                    var data = JSON.parse(resp).data;
                    //console.log(data)
                    var option = "";
                    for (var i = 0; i < data.length; i++) {
                        var selected = "";
                        if (i == 0) {
                            selected = 'selected';
                        }
                        option += '<option '+ selected +' value="'+ data[i].brgyid +'">Brgy. ' + data[i].brgyname + ', Sagay City</option>';
                    }
                    
                    $("[name=paddress]").html(option);
                    $("[name=update_paddress]").html(option);
                    //Initialize Select2 Elements
                    $('.select2').select2();
                    
                })
            },
            getall: function() {
                var url = 'data_handler.php';
                var data = {'action': 'getall'}
                var result = parents.ajax(url, data);
                result.done(function(resp) {
                    console.log(resp);
                    var data = JSON.parse(resp).data;
                    console.log(data);
                    var tr = "";
                    if (data.length > 0) {
                        
                        for (var i=0; i < data.length; i++) {
                            parent_list[data[i].id] = {
                                age: data[i].age,
                                birthday: data[i].birthday,
                                bloodtype: data[i].bloodtype,
                                brgy_id: data[i].brgy_id,
                                brgy_lat: data[i].brgy_lat,
                                brgy_long: data[i].brgy_long,
                                brgy_name: data[i].brgy_name,
                                civil_status: data[i].civil_status,
                                date_reg: data[i].date_reg,
                                familyno: data[i].familyno,
                                fname: data[i].fname,
                                heigthcm: data[i].heigthcm,
                                id: data[i].id,
                                lname: data[i].lname,
                                mname: data[i].mname,
                                pregdate: data[i].pregdate,
                            };
                            
                            var name = data[i].fname + ' ' + data[i].mname + ' ' + data[i].lname;
                            var address = 'Brgy. ' + data[i].brgy_name + ', Sagay City';
                            var pd = data[i].pregdate=="Jan 01, 1970"?"N/A":data[i].pregdate;
                            tr += '<tr>';
                            tr += '    <td>'+ name +'</td>';
                            tr += '    <td>'+ data[i].age +'</td>';
                            tr += '    <td>'+ address +'</td>';
                            tr += '    <td>'+ pd +'</td>';
                            tr += '    <td>';
                            tr += '        <div class="pull-right">';
                            tr += '            <button class="btn btn-sm btn-success fa fa-folder-open open-info" data-id="'+ data[i].id +'">';
                            tr += '                Open';
                            tr += '            </button>';
                            tr += '            <button class="btn btn-sm btn-primary fa fa-edit preg_edit" data-id="'+ data[i].id +'"></button>';
                            tr += '            <button class="btn btn-sm btn-danger fa fa-trash on_delete_parent" data-id="'+ data[i].id +'"></button>';
                            tr += '        </div>';
                            tr += '    </td>';
                            tr += '</tr>';
                        } 
                        
                        $('#table-preggy-body').html(tr);
                        
                    } else {
                        
                    }
                    
                    $('#table-preggy-body').html(tr);
                    
                    var dTable;
                    dTable = $('#pregnant_table').DataTable({
                        "ordering": false,
                        "autoWidth": false
                    });

                    $('#hsearch').keyup(function(){
                        dTable.search($(this).val()).draw();
                    });
                    
                    $('#tbl_loading').hide();
                })
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
            },
            notify: function(bg, icon, msg) {
                if (bg == true) {
                    bg = '#336699';
                } else if (bg == false) {
                    bg = '#ff0000';
                }
                
                $.amaran({
                    'theme'     :'colorful',
                    'content'   :{
                        bgcolor: bg, //'#336699'(color: blue) //#ff0000 (color: red)
                        color:'#fff',
                        message: '<i class="fa fa-'+ icon +'"></i> '+ msg,
                    },
                    'position'  :'bottom right',
                    'outEffect' :'slideRight'
                });
            }
        };
        
        
        parents.getall();
        
        
        
        $(document).on('click', '.preg_edit', function(e) {
            var id = $(this).attr('data-id');
            var datas = parent_list[id];
            parents.getbrgy();
            console.log(datas);
            var d = new Date(datas.pregdate);
            var yy = d.getFullYear();
            var mm = d.getMonth()+1;
            var dd = d.getDate();
            var preg_date = yy+'-'+(mm<10?'0'+mm:mm)+'-'+(dd<10?'0'+dd:dd);
            
            d = new Date(datas.birthday);
            yy = d.getFullYear();
            mm = d.getMonth()+1;
            dd = d.getDate();
            var b_date = yy+'-'+(mm<10?'0'+mm:mm)+'-'+(dd<10?'0'+dd:dd);
            
            $('#update_parents-add').modal('show');
            
            $('[name=update_parents_add_form]').attr('data-id', datas.id);
            $('[name=update_pfamno]').val(datas.familyno);
            $('[name=update_pfname]').val(datas.fname);
            $('[name=update_pmname]').val(datas.mname);
            $('[name=update_plname]').val(datas.lname);
            $('[name=update_paddress]').val(datas.brgy_id);
            $('[name=update_pbday]').val(b_date);
            $('[name=update_preggydate]').val(preg_date);
            $('[name=update_pheight]').val(datas.heigthcm);
            $('[name=update_pblood]').val(datas.bloodtype);
        })
        
        $(document).on('submit', '#update_parents_add_form', function(e) {
            e.preventDefault();
            $('.btn-update-parent').html('<i class="fa fa-spin fa-spinner"></i> Saving...');
            $('.btn-update-parent').attr('disabled', true);
            var p_id = $(this).attr('data-id');
            var datas = {
                'action': 'update_parent',
                'pid': p_id,
                'update_pfamno': $('[name=update_pfamno]').val(),
                'update_pfname': $('[name=update_pfname]').val(),
                'update_pmname': $('[name=update_pmname]').val(),
                'update_plname': $('[name=update_plname]').val(),
                'update_paddress': $('[name=update_paddress]').val(),
                'update_pbday': $('[name=update_pbday]').val(),
                'update_preggydate': $('[name=update_preggydate]').val(),
                'update_pheight': $('[name=update_pheight]').val(),
                'update_pblood': $('[name=update_pblood]').val(),
            }
            
            
            $.ajax({
                method: 'POST',
                url: 'data_handler.php',
                data: datas,
                success: function(resp) {
                    $('#update_parents-add').modal('hide');
                    $('.btn-update-parent').html('<i class="fa fa-save"></i> Save');
                    $('.btn-update-parent').removeAttr('disabled');
                    
                    console.log(resp);
                    var data = JSON.parse(resp);
                    if (data.response) {
                        parents.notify(true, 'check', 'Parent Record was successfully update!.');
                    } else {
                        parents.notify(false, 'warning', 'Failed to update!.');
                    }
                    
                    window.location.reload();
                    

                }, error: function(e) {
                    parents.notify(false, 'warning', 'Something Wrong With your system!.');
                    $('.btn-update-parent').html('<i class="fa fa-save"></i> Save');
                    $('.btn-update-parent').removeAttr('disabled');
                }
            })
        })
        
        
        $(document).on('click', '.on_delete_parent', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            if (confirm('Are you sure to delete this data?')) {
                $.ajax({
                    method: 'POST',
                    url: 'data_handler.php',
                    data: {action: 'delete_parent', 'parent_id': id},
                    success: function(resp) {
                        console.log(resp);
                        var data = JSON.parse(resp);
                        if (data.response) {
                            alert('Parent Record was successfully Deleted!.');
                        } else {
                            alert('Failed to delete Data.');
                        }

                        window.location.reload();


                    }, error: function(e) {
                        alert('Something Wrong With your system!.');
                    }
                })
            }
        })
        
        
    })
</script>
    