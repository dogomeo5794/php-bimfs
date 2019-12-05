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
    </head>
    <body class="hold-transition sidebar-mini success">
        <div class="wrapper">
            
            <?php require_once '../header/header_graph.php'; ?>
            <?php require_once '../sidebar/sidebar.php'; ?>
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-8">
                                <h1 class="m-0 text-dark">To show the Statistic of all records from the year of: <b><u><?php echo date('Y'); ?></u></b></h1>
                            </div><!-- /.col -->
                            <div class="col-sm-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Graphs</li>
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
							<div class="col-sm-3">
								<div class="small-box bg-info">
									<div class="inner">
										<h3 id="childdone"><i class="fa fa-spin fa-spinner"></i></h3>
                                        
										<p>Children</p>
										<p>Records Done</p>
									</div>
									<div class="icon">
										<i class="ion ion-person-add"></i>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="small-box bg-danger">
									<div class="inner">
										<h3 id="childnotdone"><i class="fa fa-spin fa-spinner"></i></h3>
                                        
										<p>Children</p>
										<p>On process records</p>
									</div>
									<div class="icon">
										<i class="ion ion-person-add"></i>
									</div>
                                    
								</div>
							</div>
							<div class="col-sm-3">
								<div class="small-box bg-info">
									<div class="inner">
										<h3 id="pregnantdone"><i class="fa fa-spin fa-spinner"></i></h3>
                                        
										<p>Pregnant</p>
										<p>Records Done</p>
									</div>
									<div class="icon">
										<i class="ion ion-person-add"></i>
									</div>
                                    
								</div>
							</div>
							<div class="col-sm-3">
								<div class="small-box bg-danger">
									<div class="inner">
										<h3 id="pregnantnotdone"><i class="fa fa-spin fa-spinner"></i></h3>
                                        
										<p>Pregnant</p>
										<p>On process records</p>
									</div>
									<div class="icon">
										<i class="ion ion-person-add"></i>
									</div>
								</div>
							</div>
						</div>

						
                        <div class="row">
                            <div class="col-6">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Children Chart</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        
										<div class="chart">
											<canvas id="childChart" style="height:250px"></canvas>
										</div>


                                    </div>
                                    <!-- /.card-body -->
                                    
                                    <div class="overlay child-overlay">
                                        <i style="font-size: 60px;" class="text-danger fa fa-spinner fa-spin"></i>
                                    </div>
                                    
                                    
                                </div>
                                <!-- /.card -->
                            </div>


							<div class="col-6">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Pregnant Chart</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        
										<div class="chart">
											<canvas id="pregnantChart" style="height:250px"></canvas>
										</div>


                                    </div>
                                    <!-- /.card-body -->
                                    <div class="overlay pregnant-overlay">
                                        <i style="font-size: 60px;" class="text-danger fa fa-spinner fa-spin"></i>
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
        /* ChartJS
        * -------
        * Here we will create a few charts using ChartJS
        */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var childCanvas = $("#childChart").get(0).getContext("2d");
        var pregnantCanvas = $("#pregnantChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var childChart = new Chart(childCanvas);
        var pregnantChart = new Chart(pregnantCanvas);

        var monthLong = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var monthShort = ["Jan.", "Feb.", "Mar.", "Apr.", "May", "Jun.", "Jul.", "Aug.", "Sep.", "Oct.", "Nov.", "Dec."];
        
        var areaChartOptions = {
            //Boolean - If we should show the scale at all
            showScale: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: false,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - Whether the line is curved between points
            bezierCurve: true,
            //Number - Tension of the bezier curve between points
            bezierCurveTension: 0.3,
            //Boolean - Whether to show a dot for each point
            pointDot: false,
            //Number - Radius of each point dot in pixels
            pointDotRadius: 4,
            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20,
            //Boolean - Whether to show a stroke for datasets
            datasetStroke: true,
            //Number - Pixel width of dataset stroke
            datasetStrokeWidth: 2,
            //Boolean - Whether to fill the dataset with a color
            datasetFill: true,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true
        };
        
        var childChartData = {
            labels: monthShort,
            datasets: [
                {
                    label: "Complete",
                    fillColor: "rgba(210, 214, 222, 1)",
                    strokeColor: "rgba(210, 214, 222, 1)",
                    pointColor: "rgba(210, 214, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: []
                },
                {
                    label: "On Process",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(60,141,188,0.8)",
                    pointColor: "#3b8bba",
                    pointStrokeColor: "rgba(60,141,188,1)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: []
                }
            ]
        };
        
        var pregnantChartData = {
            labels: monthShort,
            datasets: [
                {
                    label: "Complete",
                    fillColor: "rgba(210, 214, 222, 1)",
                    strokeColor: "rgba(210, 214, 222, 1)",
                    pointColor: "rgba(210, 214, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: []
                },
                {
                    label: "On Process",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(60,141,188,0.8)",
                    pointColor: "#3b8bba",
                    pointStrokeColor: "rgba(60,141,188,1)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: []
                }
            ]
        };
        
  
        var home = {
            getchildren: function() {
                var url = 'data_handler.php';
                var data = {
                    'action': 'getchildren'
                }
                var result = home.ajax(url, data);
                result.done(function(resp) {
                    var data = JSON.parse(resp).data;
                    $('#childdone').html(data.done.total);
                    $('#childnotdone').html(data.notdone.total);
                    $('.child-overlay').hide();
                });
            },
            getpregnant: function() {
                var url = 'data_handler.php';
                var data = {
                    'action': 'getpregnant'
                }
                var result = home.ajax(url, data);
                result.done(function(resp) {
                    console.log(resp)
                    var data = JSON.parse(resp).data;
                    $('#pregnantdone').html(data.done.total);
                    $('#pregnantnotdone').html(data.notdone.total);
                    $('.pregnant-overlay').hide();
                });
            },
            getchildstat: function() {
                var url = 'data_handler.php';
                var data = {
                    'action': 'getchildrenstat'
                }
                var result = home.ajax(url, data);
                result.done(function(resp) {
                    var data = JSON.parse(resp).data;
                    
                    childChartData.datasets[0].data = data.done;
                    childChartData.datasets[1].data = data.notdone;
                    childChart.Line(childChartData, areaChartOptions);
                    
                });
            },
            getpregnantstat: function() {
                var url = 'data_handler.php';
                var data = {
                    'action': 'getpregnantstat'
                }
                var result = home.ajax(url, data);
                result.done(function(resp) {
                    var data = JSON.parse(resp).data;
                    
                    pregnantChartData.datasets[0].data = data.done;
                    pregnantChartData.datasets[1].data = data.notdone;
                    pregnantChart.Line(pregnantChartData, areaChartOptions);
                    
                });
            },
            ajax: function(url, data, method="POST") {
                return $.ajax({
                    method: method,
                    url: url,
                    data: data,
                    success: function(data) {
                        return data;
                    },
                    error: function(e) {
                        return e;
                    }
                })
            },
            notify: function() {
                
            }
        };
        
        home.getchildren();
        home.getpregnant();
        home.getchildstat();
        home.getpregnantstat();
    })
</script>


