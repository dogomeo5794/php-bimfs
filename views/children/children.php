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
            
            <?php require_once '../header/header_children.php'; ?>
            <?php require_once '../sidebar/sidebar.php'; ?>
              
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Children</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="../home/home.php">Home</a></li>
                                    <li class="breadcrumb-item active">Children</li>
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
                                        <h3 class="card-title">Children List
                                            <a class="btn btn-sm btn-success float-right nav-link addchild" href="#">
                                                <i class="fa fa-plus"></i>
                                                Add Child
                                            </a>
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="pregnant_table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Pregnant Name</th>
                                                    <th>Birthday</th>
                                                    <th>Parents Address</th>
                                                    <th>Family No.</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-child-body">
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
                                                    <th>Birthday</th>
                                                    <th>Parents Address</th>
                                                    <th>Family No.</th>
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
            window.location.href = 'children_info.php?refid=' + id;
        })
        
        $(document).on('click', '.addchild', function(e) {
            child.getbrgy();
            $('#child-add').modal({
                backdrop: false,
                keyboard: true
            });
            e.preventDefault();
        })
        
        $(document).on('submit', '#child_add_form', function(e) {
            e.preventDefault();
            var data = {
                'action': 'add',
                'cfname': $('[name=cfname]').val(),
                'cmname': $('[name=cmname]').val(),
                'clname': $('[name=clname]').val(),
                'caddress': $('[name=caddress]').val(),
                'motname': $('[name=motname]').val(),
                'motschool': $('[name=motschool]').val(),
                'motwork': $('[name=motwork]').val(),
                'fatname': $('[name=fatname]').val(),
                'fatschool': $('[name=fatschool]').val(),
                'fatwork': $('[name=fatwork]').val(),
                'cfamno': $('[name=cfamno]').val(),
                'childno': $('[name=childno]').val(),
                'cgender': $('[name=cgender]').val(),
                'cbday': $('[name=cbday]').val(),
                'cweight': $('[name=cweight]').val(),
                'dfseen': $('[name=dfseen]').val(),
                'placedeliver': $('[name=placedeliver]').val(),
            }

            child.save(data);
        })   
        
        var child_lists = [];
        var child = {
            save: function(data) {
                var url = 'data_handler.php';
                var result = child.ajax(url, data);
                result.done(function(resp) {
                    console.log(resp);
                    var data = JSON.parse(resp);
                    console.log(data)
                    if (data.message == 'success') {
                        alert('Data save!');
                        window.location.href = 'children_info.php?refid='+ data.response;
                    } else {
                        alert('Failed to add data!');
                    }
                })
            },
            getbrgy: function() {
                var url = 'data_handler.php';
                var result = child.ajax(url, {action: 'getbrgy'});
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
                    
                    $("[name=caddress]").html(option);
                    $("[name=update_caddress]").html(option);
                    //Initialize Select2 Elements
                    $('.select2').select2();
                    
                })
            },
            getall: function() {
                var url = 'data_handler.php';
                var data = {'action': 'getall'}
                var result = child.ajax(url, data);
                result.done(function(resp) {
                    console.log(resp);
                    var data = JSON.parse(resp).data;
                    console.log(data);
                    var tr = "";
                    if (data.length > 0) {
                        
                        for (var i=0; i < data.length; i++) {
                            child_lists[data[i].id] = {
                                age: data[i].age,
                                birthat: data[i].birthat,
                                birthday: data[i].birthday,
                                birthweight: data[i].birthweight,
                                brgy_id: data[i].brgy_id,
                                brgy_lat: data[i].brgy_lat,
                                brgy_long: data[i].brgy_long,
                                brgy_name: data[i].brgy_name,
                                child_no: data[i].child_no,
                                date_reg: data[i].date_reg,
                                datefirstseen: data[i].datefirstseen,
                                deliveryplace: data[i].deliveryplace,
                                familno: data[i].familno,
                                fathername: data[i].fathername,
                                fatherseduclevel: data[i].fatherseduclevel,
                                fatherwork: data[i].fatherwork,
                                fname: data[i].fname,
                                gender: data[i].gender,
                                id: data[i].id,
                                lname: data[i].lname,
                                login_id: data[i].login_id,
                                message: data[i].message,
                                mname: data[i].mname,
                                motherseduclevel: data[i].motherseduclevel,
                                mothersname: data[i].mothersname,
                                motherswork: data[i].motherswork,
                                registerdate: data[i].registerdate,
                            }
                            
                            var name = data[i].fname + ' ' + data[i].mname + ' ' + data[i].lname;
                            var address = 'Brgy. ' + data[i].brgy_name + ', Sagay City';
                            tr += '<tr>';
                            tr += '    <td>'+ name +'</td>';
                            tr += '    <td>'+ data[i].birthday +'</td>';
                            tr += '    <td>'+ address +'</td>';
                            tr += '    <td>'+ data[i].familno +'</td>';
                            tr += '    <td>';
                            tr += '        <div class="pull-right">';
                            tr += '            <button class="btn btn-sm btn-success fa fa-folder-open open-info" data-id="'+ data[i].id +'">';
                            tr += '                Open';
                            tr += '            </button>';
                            tr += '            <button class="btn btn-sm btn-primary fa fa-edit child_edit" data-id="'+ data[i].id +'"></button>';
                            tr += '            <button class="btn btn-sm btn-danger fa fa-trash on_delete_child" data-id="'+ data[i].id +'"></button>';
                            tr += '        </div>';
                            tr += '    </td>';
                            tr += '</tr>';
                        } 
                        
                        
                        
                    } else {
                        
                    }
                    
                    $('#table-child-body').html(tr);
                    
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
                if (bg == 'success') {
                    bg = '#336699';
                } else if (bg == 'failed') {
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
        
        child.getall();
        
        
        $(document).on('click', '.child_edit', function(e) {
            var id = $(this).attr('data-id');
            var datas = child_lists[id];
            child.getbrgy();
            console.log(datas);
            var d = new Date(datas.datefirstseen);
            var yy = d.getFullYear();
            var mm = d.getMonth()+1;
            var dd = d.getDate();
            var seen_date = yy+'-'+(mm<10?'0'+mm:mm)+'-'+(dd<10?'0'+dd:dd);
            
            d = new Date(datas.birthday);
            yy = d.getFullYear();
            mm = d.getMonth()+1;
            dd = d.getDate();
            var b_date = yy+'-'+(mm<10?'0'+mm:mm)+'-'+(dd<10?'0'+dd:dd);
            
            $('#update_child-add').modal('show');
            
            $('[name=update_child_add_form]').attr('data-id', datas.id);
            $('[name=update_cfname]').val(datas.fname);
            $('[name=update_cmname]').val(datas.mname);
            $('[name=update_clname]').val(datas.lname);
            $('[name=update_caddress]').val(datas.brgy_id);
            $('[name=update_motname]').val(datas.mothersname);
            $('[name=update_motschool]').val(datas.motherseduclevel);
            $('[name=update_motwork]').val(datas.motherswork);
            $('[name=update_fatname]').val(datas.fathername);
            $('[name=update_fatschool]').val(datas.fatherseduclevel);
            $('[name=update_fatwork]').val(datas.fatherwork);
            $('[name=update_cfamno]').val(datas.familno);
            $('[name=update_childno]').val(datas.child_no);
            $('[name=update_cgender]').val(datas.gender.toLowerCase());
            $('[name=update_cbday]').val(b_date);
            $('[name=update_cweight]').val(datas.birthweight);
            $('[name=update_dfseen]').val(seen_date);
            $('[name=update_placedeliver]').val(datas.deliveryplace);


        })
        
        $(document).on('submit', '#update_child_add_form', function(e) {
            e.preventDefault();
            $('.btn_update_child').html('<i class="fa fa-spin fa-spinner"></i> Saving...');
            $('.btn_update_child').attr('disabled', true);
            var c_id = $(this).attr('data-id');
            var datas = {
                'action': 'update_child',
                'cid': c_id,
                'update_cfname': $('[name=update_cfname]').val(),
                'update_cmname': $('[name=update_cmname]').val(),
                'update_clname': $('[name=update_clname]').val(),
                'update_caddress': $('[name=update_caddress]').val(),
                'update_motname': $('[name=update_motname]').val(),
                'update_motschool': $('[name=update_motschool]').val(),
                'update_motwork': $('[name=update_motwork]').val(),
                'update_fatname': $('[name=update_fatname]').val(),
                'update_fatschool': $('[name=update_fatschool]').val(),
                'update_fatwork': $('[name=update_fatwork]').val(),
                'update_cfamno': $('[name=update_cfamno]').val(),
                'update_childno': $('[name=update_childno]').val(),
                'update_cgender': $('[name=update_cgender]').val(),
                'update_cbday': $('[name=update_cbday]').val(),
                'update_cweight': $('[name=update_cweight]').val(),
                'update_dfseen': $('[name=update_dfseen]').val(),
                'update_placedeliver': $('[name=update_placedeliver]').val(),
            }
            
            
            $.ajax({
                method: 'POST',
                url: 'data_handler.php',
                data: datas,
                success: function(resp) {
                    $('#update_child-add').modal('hide');
                    $('.btn_update_child').html('<i class="fa fa-save"></i> Save Changes');
                    $('.btn_update_child').removeAttr('disabled');
                    
                    console.log(resp);
                    var data = JSON.parse(resp);
                    if (data.response) {
                        child.notify('success', 'check', 'Parent Record was successfully update!.');
                    } else {
                        child.notify('failed', 'warning', 'Failed to update!.');
                    }
                    
                    window.location.reload();
                    

                }, error: function(e) {
                    child.notify('failed', 'warning', 'Something Wrong With your system!.');
                    $('.btn_update-child').html('<i class="fa fa-save"></i> Save Changes');
                    $('.btn_update-child').removeAttr('disabled');
                }
            })
        })
        
        
        
        $(document).on('click', '.on_delete_child', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            if (confirm('Are you sure to delete this data?')) {
                $.ajax({
                    method: 'POST',
                    url: 'data_handler.php',
                    data: {action: 'delete_child', 'child_id': id},
                    success: function(resp) {
                        console.log(resp);
                        var data = JSON.parse(resp);
                        if (data.response) {
                            alert('Child Record was successfully Deleted!.');
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
    