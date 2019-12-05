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
            
            <?php require_once '../header/header_settings.php'; ?>
            <?php require_once '../sidebar/sidebar.php'; ?>
              
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">Users
                                <h1 class="m-0 text-dark"></h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item">
                                        <a href="../home/home.php">
                                            <i class="fa fa-home"></i> Home
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <i class="fa fa-gears"></i> Settings
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <i class="fa fa-users"></i> Accounts
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
                            <div class="col-12">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title float-left">
                                            Users List
                                        </h3> 
                                        <a class="btn btn-success addusers float-right" href="#">
                                            <i class="fa fa-plus"></i>
                                            New User
                                        </a>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="users_table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>User Name</th>
                                                    <th>Position</th>
                                                    <th>Status</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="users_table_body">
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
                                                    <th>User Name</th>
                                                    <th>Position</th>
                                                    <th>Status</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                    
                                    <!-- Loading (remove the following to stop the loading)-->
<!--
                                    <div class="overlay">
                                        <i class="fa fa-spinner fa-spin"></i>
                                    </div>
-->
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
    
    $(document).ready(function() {
        /** Table searching **/
        var dTable;
        dTable = $('#users_table').DataTable({
            "ordering": false,
            "autoWidth": false
        });
    
        $('#hsearch').keyup(function(){
            dTable.search($(this).val()).draw();
        });
        
        
        $(document).on('click', '.open-info', function(e) {
            var id = $(this).attr('data-id');
            window.location.href = 'users_info.php?refid=' + id;
        })
        
        $(document).on('click', '.addusers', function(e) {
            users.display();
            $('#users-add-modal').modal({
                backdrop: 'static'
            });
            e.preventDefault();
        })
        
        $(document).on('submit', '#add_users', function(e) {
            e.preventDefault();
            var data = {
                'action': 'add',
                'idno': $('[name=idno]').val(),
                'fname': $('[name=fname]').val(),
                'mname': $('[name=mname]').val(),
                'lname': $('[name=lname]').val(),
                'bday': $('[name=bday]').val(),
                'gender': $('[name=gender]').val(),
                'address': $('[name=address]').val(),
                'position': $('[name=position]').val(),
                'contact': $('[name=contact]').val(),
                'email': $('[name=email]').val(),
                'civstatus': $('[name=civstatus]').val(),
                'dateemployed': $('[name=dateemployed]').val(),
                'nationality': $('[name=nationality]').val(),
                'activestatus': $('[name=activestatus]').val()
            }
            
            users.save(data);
        })   
        
        
        var users = {
            save: function(data) {
                var url = 'data_handler.php';
                var result = users.ajax(url, data);
                result.done(function(resp) {
                    console.log(resp);
                    var data = JSON.parse(resp);
                    console.log(data)
                    if (data.message == 'success') {
                        alert('Data save!');
                        window.location.href = 'users_info.php?refid=' + data.response;
                    } else {
                        alert('Failed to add user!\n' + data.message);
                    }
                })
            },
            display: function() {
                var url = 'data_handler.php';
                var result = users.ajax(url, {action: 'view'});
                result.done(function(resp) {
                    $('#users_table_body').html(resp);
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
            }
        }
        
        users.display();
        
    })
</script>
    