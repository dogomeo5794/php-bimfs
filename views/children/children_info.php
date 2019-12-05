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
                                <h1 class="m-0 text-dark">Pregnant Info</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                    <li class="breadcrumb-item">
                                        <a href="#" onclick="javascript:window.history.back()">
                                            <i class="fa fa-reply"></i> Children
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">Child Info</li>
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
                            <div class="col-md-3">
                                
                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle"
                                                 src="<?php echo URL."/templates/img/icon/question.png"; ?>" alt="User profile picture">
                                        </div>
                                        
                                        <h3 class="profile-username text-center" id="vname">---- -. ----</h3>
                                        
                                        
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Birthday</b> <a class="float-right" id="vbirthday">---- --, ----</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Age</b> <a class="float-right" id="vage">--</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Sex</b> <a class="float-right" id="vgender">----</a>
                                            </li>
                                        </ul>
                                        
                                        <a href="#" class="btn btn-primary btn-block child_edit child_done">
                                            <b>
                                                <i class="fa fa-pencil"></i> 
                                                Update
                                            </b>
                                        </a>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                                
                                <!-- About Me Box -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fa fa-info mr-1"></i> 
                                            Info
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <strong><i class="fa fa-map-marker mr-1"></i> Family Address</strong>
                                        
                                        <p class="text-muted" id="vaddress">----</p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-male mr-1"></i> Birth Weight</strong>
                                        
                                        <p class="text-muted" id="vweight">-- --</p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-home mr-1"></i> Family Number</strong>
                                        
                                        <p class="text-muted" id="vfamilyno">----</p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-child mr-1"></i> Child's No.</strong>
                                        
                                        <p class="text-muted" id="vchildno">--</p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-calendar mr-1"></i> Date First Seen</strong>
                                        
                                        <p class="text-muted" id="vdateseen">---- --, ----</p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-map-marker mr-1"></i> Place of Delivery</strong>
                                        
                                        <p class="text-muted" id="vplacedeliver">------</p>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                                
                                
                                
                                
                                <!-- About Me Box -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fa fa-female mr-1"></i> 
                                            Mother of Child
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <strong><i class="fa fa-female mr-1"></i> Mother's Name</strong>
                                        
                                        <p class="text-muted" id="vmothername">-------</p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-mortar-board mr-1"></i> Education Level</strong>
                                        
                                        <p class="text-muted" id="vmothereduc">-----</p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-suitcase mr-1"></i> Occupation</strong>
                                        
                                        <p class="text-muted" id="vmotheroccup">----</p>
                                        
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                                
                                
                                <!-- About Me Box -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fa fa-male mr-1"></i> 
                                            Father of Child
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <strong><i class="fa fa-male mr-1"></i> Father's Name</strong>
                                        
                                        <p class="text-muted" id="vfathername">-----</p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-mortar-board mr-1"></i> Education Level</strong>
                                        
                                        <p class="text-muted" id="vfathereduc">-----</p>
                                        
                                        <hr>
                                        
                                        <strong><i class="fa fa-suitcase mr-1"></i> Occupation</strong>
                                        
                                        <p class="text-muted" id="vfatheroccup">----</p>
                                        
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                                
                                
                                
                            </div>
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                
                                                                                                
                                                                                                
                                                                                                
                            <!-- /.col -->
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#homebase" data-toggle="tab">
                                                    <i class="fa fa-file-text"></i> 
                                                    Child's Records
                                                </a>
                                            </li>
                                            <li class="nav-item child_done">
                                                <a class="nav-link bg-danger onset-done" href="#">
                                                    <i class="fa fa-power-off"></i> 
                                                    Set as Done
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="active tab-pane" id="homebase">
                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <img class="img-circle img-bordered-sm" src="<?php echo URL."/templates/img/icon/question.png"; ?>" alt="user image">
                                                        <span class="username">
                                                            <a href="#">BROTHERS AND SISTERS</a>
                                                        </span>
                                                        <span class="description">
                                                            <button class="btn btn-sm btn-success fa fa-plus child_done" data-toggle="modal" data-target="#brod_sis_modal">
                                                                <small> Add</small>
                                                            </button>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <div class="row">
                                                        
                                                        <table class="table table-hover table-stripe" id="">
                                                            <thead>
                                                                <tr class="bg-primary">
                                                                    <th>NAME</th>
                                                                    <th>SEX</th>
                                                                    <th>DATE OF BIRTH</th>
                                                                    <th class="child_done"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbl_brother_body">
                                                                <tr>
                                                                    <td colspan="4" class="text-center">
                                                                        <i class="fa fa-spinner fa-spin"></i> 
                                                                        Loading...</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        
                                                    </div>
                                                
                        
                        
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post clearfix">
                                                    <div class="user-block">
                                                        <img class="img-circle img-bordered-sm" src="<?php echo URL."/templates/img/icon/question.png"; ?>" alt="User Image">
                                                        <span class="username">
                                                            <a href="#">ESSENTIAL HEALTH AND NUTRITION SERVICES</a>
                                                        </span>
                                                        <span class="description">-----------</span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <div class="row">
                                                    
                                                        
                                                        <table class="table table-bordered table-hover table-stripe" id="prev-preggytable">
                                                            <thead>
                                                                <tr class="bg-primary">
                                                                    <th>REMARKS</th>
                                                                    <th>1st</th>
                                                                    <th>2nd</th>
                                                                    <th>3rd</th>
                                                                    <th>4th</th>
                                                                    <th>5th</th>
                                                                    <th>6th</th>
                                                                    <th class="child_done"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbl_nutrition_body">
                                                                <!--- No data  --->
                                                            </tbody>
                                                        </table>

                                                        
                                                        
                                                        
                                                        
                                                    </div>

                                                </div>
                                                <!-- /.post -->
                                            </div>
                                            <!-- /.tab-pane -->
                    
                    

                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- /.nav-tabs-custom -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->


                        
                        
                    </div>
                    <!-- /.container-fluid -->
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


<script>
    
    $(document).ready(function() {
        $('.head-search').hide();
        
        $('#calendar').datepicker();
        
        $('#prev-preggytable').DataTable({
            "filter": false,
            "ordering": false,
            "info": false,
            "paging": false,
            "lenght": false
        });
        
        $('#cur-problempreggy').DataTable({
            "filter": false,
            "ordering": false,
            "info": false,
            "paging": false,
            "lenght": false
        });
        
        $(document).on('click', '.updatetoxoid', function(e) {
            e.preventDefault();
            var no = $(this).attr('data-number');
            $('#toxoid-modal').modal('show');
        })
        
        $(document).on('click', '#datepickerok', function() {
            var dpckr = $('#calendar').datepicker('getDate');
            dpckr = $.datepicker.formatDate("yy-mm-dd", dpckr);
            alert(dpckr)
        })
        
        $(document).on('submit', '#sibling_add_form', function(e) {
            e.preventDefault();
            var sibling_name = $('[name=sibling_name]').val();
            var sibling_gender = $('[name=sibling_gender]').val();
            var sibling_bday = $('[name=sibling_bday]').val();
            
            if (sibling_name == '' || sibling_gender == '' || sibling_bday == '') {
                children.notify('failed', 'warning', 'Please complete the form!.');
                return;
            }
            var data = {
                'action': 'addsiblings',
                'id': getUrlVars()["refid"],
                'sibling_name': sibling_name,
                'sibling_gender': sibling_gender,
                'sibling_bday': sibling_bday
            };
            children.addsiblings(data);
        })
        
        var nutrition_list = [];
        var sibling_list = [];
        var child_lists = [];
        var children = {
            getbrgy: function() {
                var url = 'data_handler.php';
                var result = children.ajax(url, {action: 'getbrgy'});
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
                    
                    $("[name=update_caddress]").html(option);
                    //Initialize Select2 Elements
                    $('.select2').select2();
                    
                })
            },
            addsiblings(data) {
                var url = 'data_handler.php';
                var result = children.ajax(url, data);
                result.done(function(resp) {
                    console.log(resp);
                    var data = JSON.parse(resp);
                    if (data.response) {
                        $('#brod_sis_modal').modal('hide');
                        children.notify('success', 'check', 'Success to add Siblings.');
                        children.getbrothersister(refid);
                    } else {
                        children.notify('failed', 'warning', 'Failed to add Sibling!.');
                    }
                });
            },
            updatesiblings(data) {
                var url = 'data_handler.php';
                var result = children.ajax(url, data);
                result.done(function(resp) {
                    console.log(resp);
                    var data = JSON.parse(resp);
                    if (data.response) {
                        $('#updatebrod_sis_modal').modal('hide');
                        children.notify('success', 'check', 'Success to Update Siblings.');
                        children.getbrothersister(refid);
                    } else {
                        children.notify('failed', 'warning', 'Failed to Update Sibling!.');
                    }
                });
            },
            getwhere: function(id) {
                var url = 'data_handler.php';
                var data = {'action': 'getchild', 'id': id}
                var result = children.ajax(url, data);
                result.done(function(resp) {
                    console.log('Children info: ');
                    var data = JSON.parse(resp).data;
                    console.log(data);
                    if (data.length > 0) {
                        var i=0;
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
                        };
                        $(".child_edit").attr('data-id', data[0].id);
                        $("#vname").html(data[0].fname + ' ' + data[0].mname + ' ' + data[0].lname);
                        $("#vbirthday").html(data[0].birthday);
                        $("#vage").html(data[0].age);
                        $("#vgender").html(data[0].gender);
                        $("#vaddress").html('Brgy. ' + data[0].brgy_name + ', Sagay City');
                        $("#vweight").html(data[0].birthweight);
                        $("#vfamilyno").html(data[0].familno);
                        $("#vchildno").html(data[0].child_no);
                        $("#vdateseen").html(data[0].datefirstseen);
                        $("#vplacedeliver").html(data[0].deliveryplace);
                        $("#vmothername").html(data[0].mothersname);
                        $("#vmothereduc").html(data[0].motherseduclevel);
                        $("#vmotheroccup").html(data[0].motherswork);
                        $("#vfathername").html(data[0].fathername);
                        $("#vfathereduc").html(data[0].fatherseduclevel);
                        $("#vfatheroccup").html(data[0].fatherwork);
                        
                        if (data[0].ifdone == 1) {
                            $('.child_done').remove();
                        }
                                                
                        
                    } else {
                        window.location.href = '../error/error.php';
                    }
                })
            },
            getbrothersister(id) {
                var url = 'data_handler.php';
                var data = {'action': 'getbrother', 'id': id}
                var result = children.ajax(url, data);
                result.done(function(resp) {
                    console.log('Brother or sister:');
                    var data = JSON.parse(resp).data;
                    console.log(data);
                    var tr = '';
                    if (data.length > 0) {
                        for (var i=0; i < data.length; i++) {
                            sibling_list[data[i].id] = {
                                'name': data[i].name,
                                'sex': data[i].sex,
                                'bdate': data[i].bdate,
                            };
                            tr += '<tr>';
                            tr += '    <td>'+ data[i].name +'</td>';
                            tr += '    <td>'+ data[i].sex +'</td>';
                            tr += '    <td>'+ data[i].bdate +'</td>';
                            tr += '    <td class="child_done">';
                            tr += '        <div class="pull-right">';
                            tr += '            <button class="btn btn-sm btn-success sibling_btn_edit" data-id="'+ data[i].id +'">';
                            tr += '                <i class="fa fa-edit"></i>';
                            tr += '                <small>Edit</small>';
                            tr += '            </button>';
                            tr += '            <button class="btn btn-sm btn-danger sibling_btn_delete" data-id="'+ data[i].id +'">';
                            tr += '                <i class="fa fa-trash"></i>';
                            tr += '                <small>Delete</small>';
                            tr += '            </button>';
                            tr += '        </div>';
                            tr += '    </td>';
                            tr += '</tr>';
                        }
                        
                    } else {
                        tr += '<tr>';
                        tr += '    <td colspan="4" class="text-center"><i class="fa fa-warning"></i> No Brother and Sister Records</td>';
                        tr += '</tr>';
                    }
                    $('#tbl_brother_body').html(tr);
                })
            },
            getnutrition(id) {
                var url = 'data_handler.php';
                var data = {'action': 'getnutrition', 'id': id}
                var result = children.ajax(url, data);
                myarray = 'okok';
                result.done(function(resp) {
                    console.log('ESSENTIAL HEALTH AND NUTRITION SERVICES:');
                    var data = JSON.parse(resp).data;
                    console.log(data);
                    var tr = '';
                    if (data.length > 0) {
                        for (var i=0; i < data.length; i++) {
                            nutrition_list[data[i].id] = {
                                'id': data[i].id,
                                'question': data[i].question,
                                'answer_1st': data[i].answer_1st,
                                'answer_2nd': data[i].answer_2nd,
                                'answer_3rd': data[i].answer_3rd,
                                'answer_4th': data[i].answer_4th,
                                'answer_5th': data[i].answer_5th,
                                'answer_6th': data[i].answer_6th,
                            };
                            tr += '<tr>';
                            tr += '    <td>'+ data[i].question +'</td>';
                            tr += '    <td>'+ data[i].answer_1st +'</td>';
                            tr += '    <td>'+ data[i].answer_2nd +'</td>';
                            tr += '    <td>'+ data[i].answer_3rd +'</td>';
                            tr += '    <td>'+ data[i].answer_4th +'</td>';
                            tr += '    <td>'+ data[i].answer_5th +'</td>';
                            tr += '    <td>'+ data[i].answer_6th +'</td>';
                            tr += '    <td class="child_done">';
                            tr += '        <button class="btn btn-sm btn-success pull-right fa fa-edit btn_edit_nutrition" data-id="'+ data[i].id +'">';
                            tr += '        </button>';
                            tr += '    </td>';
                            tr += '</tr>';
                        }
                        
                    } else {
                        tr += '<tr>';
                        tr += '    <td colspan="8" class="text-center"><i class="fa fa-spin fa-spinner"></i> Something wrong with your data. Please contact your administrator to fix this error <i class="fa fa-warning"></i></td>';
                        tr += '</tr>';
                    }
                    $('#tbl_nutrition_body').html(tr);
                })
            },
            ajax: function(url, data) {
                return $.ajax({
                    method: 'POST',
                    url: url,
                    data: data,
                    success: function(resp) {
                        return resp;
                    },
                    error: function(error) {
                        return error;
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
        }
        
        
        $(document).on('click', '.btn_edit_nutrition', function(e) {
            var id = $(this).attr('data-id');
            console.log(nutrition_list[id]);
            $('#nutrition_services_modal').modal('show');
            $('#nutrition_services_form').attr('data-id', id);
            $('#nutrition_services_label').html(nutrition_list[id].question.toUpperCase());
            $('[name=answer_1st]').val((nutrition_list[id].answer_1st=='---'?'':nutrition_list[id].answer_1st));
            $('[name=answer_2nd]').val((nutrition_list[id].answer_2nd=='---'?'':nutrition_list[id].answer_2nd));
            $('[name=answer_3rd]').val((nutrition_list[id].answer_3rd=='---'?'':nutrition_list[id].answer_3rd));
            $('[name=answer_4th]').val((nutrition_list[id].answer_4th=='---'?'':nutrition_list[id].answer_4th));
            $('[name=answer_5th]').val((nutrition_list[id].answer_5th=='---'?'':nutrition_list[id].answer_5th));
            $('[name=answer_6th]').val((nutrition_list[id].answer_6th=='---'?'':nutrition_list[id].answer_6th));
        })
        
        $(document).on('submit', '#nutrition_services_form', function(e) {
            e.preventDefault();
            var data = {
                'id': $(this).attr('data-id'),
                'action': 'update_nutrition',
                'answer_1st': $('[name=answer_1st]').val(),
                'answer_2nd': $('[name=answer_2nd]').val(),
                'answer_3rd': $('[name=answer_3rd]').val(),
                'answer_4th': $('[name=answer_4th]').val(),
                'answer_5th': $('[name=answer_5th]').val(),
                'answer_6th': $('[name=answer_6th]').val(),
            };
            var url = 'data_handler.php';
            var result = children.ajax(url, data);
            result.done(function(data) {
                console.log(data);
                var data = JSON.parse(data);
                if (data.response) {
                    children.notify('success', 'check', 'Data Updated');
                    children.getnutrition(refid);
                    $('#nutrition_services_modal').modal('hide')
                } else {
                    children.notify('failed', 'close', 'Failed to update');
                }
            })
        })
        
        
        $(document).on('click', '.sibling_btn_edit', function(e) {
            var id = $(this).attr('data-id');
            var d = new Date(sibling_list[id].bdate);
            var yy = d.getFullYear();
            var mm = (d.getMonth()+1)<10?'0'+(d.getMonth()+1):(d.getMonth()+1);
            var dd = d.getDate();
            var bday = yy+'-'+mm+'-'+dd;
            console.log(bday);
            $('#updatebrod_sis_modal').modal('show');
            $('[name=updatesibling_name]').val(sibling_list[id].name);
            $('[name=updatesibling_gender]').val(sibling_list[id].sex.toLowerCase());
            $('[name=updatesibling_bday]').val(bday);
            $('#sibling_update_form').attr('data-id', id);
        })
        
        $(document).on('submit', '#sibling_update_form', function(e) {
            e.preventDefault();
            var sibling_name = $('[name=updatesibling_name]').val();
            var sibling_gender = $('[name=updatesibling_gender]').val();
            var sibling_bday = $('[name=updatesibling_bday]').val();
            
            if (sibling_name == '' || sibling_gender == '' || sibling_bday == '') {
                children.notify('failed', 'warning', 'Please complete the form!.');
                return;
            }
            var data = {
                'action': 'updatesiblings',
                'sibling_id': $(this).attr('data-id'),
                'sibling_name': sibling_name,
                'sibling_gender': sibling_gender,
                'sibling_bday': sibling_bday
            };
            children.updatesiblings(data);
            
        })
        
        function getUrlVars() {
            var vars = {};
            var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
                vars[key] = value;
            });
            return vars;
        }
        
        var refid = getUrlVars()["refid"];
        if (refid == undefined) {
            window.location.href = '../error/notfound.php';
        } else {
            children.getbrothersister(refid);
            children.getnutrition(refid);
            children.getwhere(refid);
        }
        
        
        
        
        
        
        $(document).on('click', '.child_edit', function(e) {
            var id = $(this).attr('data-id');
            var datas = child_lists[id];
            children.getbrgy();
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
                        children.notify('success', 'check', 'Child Record was successfully update!.');
                    } else {
                        children.notify('failed', 'warning', 'Failed to update!.');
                    }
                    
                    children.getwhere(refid);
                    

                }, error: function(e) {
                    children.notify('failed', 'warning', 'Something Wrong With your system!.');
                    $('.btn_update-child').html('<i class="fa fa-save"></i> Save Changes');
                    $('.btn_update-child').removeAttr('disabled');
                }
            })
        })
        
        
        $(document).on('click', '.onset-done', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you set this record as DONE?')) {
                $.ajax({
                    method: 'POST',
                    url: 'data_handler.php',
                    data: {action: 'set_child_done', 'child_id':refid},
                    success: function(resp) {
                        var data = JSON.parse(resp);
                        if (data.response) {
                            children.notify('success', 'check', 'Child Record is done successfully');
                        } else {
                            children.notify('failed', 'warning', 'Failed to set as Done!.');
                        }

                        children.getwhere(refid);


                    }, error: function(e) {
                        children.notify('failed', 'warning', 'Something Wrong With your system!.');
                    }
                })
            }
        })
    })
</script>
  