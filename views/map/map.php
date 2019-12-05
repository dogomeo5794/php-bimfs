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

		<link href="<?php echo URL.'/plugins/leaflet/leaflet/leaflet.css'; ?>" rel="stylesheet">
		<script src="<?php echo URL.'/plugins/leaflet/leaflet/leaflet.js'; ?>" ></script>
		<script src="<?php echo URL.'/plugins/leaflet/js/sample.js'; ?>" ></script>
		
		<style>
			/*Legend specific*/
			.legend {
				padding: 6px 8px;
				font: 14px Arial, Helvetica, sans-serif;
				background: white;
				background: rgba(255, 255, 255, 0.8);
				/*box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);*/
				/*border-radius: 5px;*/
				line-height: 24px;
				color: #555;
			}
			.legend h4 {
				text-align: center;
				font-size: 16px;
				margin: 2px 12px 8px;
				color: #777;
			}
    
			.legend span {
				position: relative;
				bottom: 3px;
			}
    
			.legend i {
				width: 18px;
				height: 18px;
				float: left;
				margin: 0 8px 0 0;
				opacity: 0.7;
			}
    
			.legend i.icon {
				background-size: 18px;
				background-color: rgba(255, 255, 255, 1);
			}
    
        

			#mapid {
		/*
				min-height: 100%;
				position: absolute;
				display: inline-block;
				top: 0px;
				bottom: 0px;
				left: 0px;
				right: 0px;
		*/
				width: 100%;
				height: 600px;
			}
    
			.map-label {
				//background-color: 0px 0px 0px 0px rgba(0,0,0, 0.0);
				background-color: transparent;
				border: none;
				border-radius: 0;
				//color: #222;
				color: black;
				box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);
			}
    
		/*
			.sparkline13-graph {
    			margin-left: 30px;
    			padding: 10px;
    			height: 600px;
    			width: auto;
			}
		*/
		</style>
    </head>
    <body class="hold-transition sidebar-mini success">
        <div class="wrapper">
            
            <?php require_once '../header/header_map.php'; ?>
            <?php require_once '../sidebar/sidebar.php'; ?>
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-9">
                                <h1 class="m-0 text-dark">To Identify the location and Records of Patient</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-3">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Map</li>
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
							<div class="col-sm-12">
							<div class="card card-danger">
								<div class="card-header">
								<h3 class="card-title">Map of Every Barangay in Sagay</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
                                        
								<div id="mapid"></div>


							</div>
							<!-- /.card-body -->
							</div>
                                     
						</div>
						<!-- /.card -->
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

    function highlightFeat(e) {
        var layer = e.target;
        var idz = layer.feature.properties.id;
        layer.setStyle({
			weight: 3,
			color: "orange",
			fillColor: "yellow",
			fillOpacity: 0.2
		});
        
		if (!(L.Browser.ie && L.Browser.opera)) {
			layer.bringToFront();
		}
    }

    function resetHighlight(e){
        mapLayer.resetStyle(e.target);
    }
    
    function clickFeat(e){
        console.log(e.target.feature.properties.name);
        var id = e.target.feature.properties.id;
    }
    
    var labels = new Array();
    function onEach(feature, layer) {
        labels.push( 
            L.circleMarker(
                layer.getBounds().getCenter(),{
                    all: 'revert',
                    fillColor: 'none',
                    interactive: false,
                    radius: 0.0,
                    opacity: 0,       
                    fillOpacity: 0
                }
            )
        );
    
        var labelsCount = labels.length;
        labels[labelsCount-1].bindTooltip(
            feature.properties.name.toString(),{
                direction: 'center',
                permanent: true,
                className: 'map-label',
            }
        ); 

        labels[labelsCount-1].addTo(map);

        layer.on({
            mouseover: highlightFeat,
            mouseout: resetHighlight,
            click: clickFeat
        });
    }

    function getMapColor(name){
        if(name=='Road'){
            return 'gray';
        } else if(name=='old sagay') {
            return 'lightgreen';
        } else if(name=='vito') {
            return 'lightpink';
        } else if(name=='lopez jaena') {
            return 'blue';
        } else if(name=='bato') {
            return 'green';
        } else if(name=='poblacion 1') {
            return 'orange';
        } else if(name=='poblacion 2') {
            return 'lightblue';
        } else if(name=='molocaboc') {
            return 'lightblue';
        } else if(name=='malubon') {
            return 'violet';
        } else if(name=='taba-ao') {
            return 'lightpink';
        } else if(name=='bulanon') {
            return 'lightgreen';
        } else if(name=='flaridel') {
            return 'red';
        } else if(name=='himoga-an baybay') {
            return 'pink';
        } else if(name=='fabrica') {
            return 'orange';
        } else if(name=='paraiso') {
            return 'lightblue';
        } else if(name=='rizal') {
            return 'yellow';
        } else if(name=='general luna') {
            return 'lightblue';
        } else if(name=='rafaela barrera') {
            return 'lightblue';
        } else if(name=='tadlong') {
            return 'lightgreen';
        } else if(name=='campo himoga-an') {
            return 'lightgreen';
        } else if(name=='sewahon') {
            return 'lightgreen';
        } else if(name=='baviera') {
            return 'pink';
        } else if(name=='andres bonifacio') {
            return 'lightgreen';
        } else if(name=='puey') {
            return 'lightgreen';
        } else if(name=='colonia divina') {
            return 'lightblue';
        } else if(name=='maquiling') {
            return 'lightgreen';
        }
    }
    
    function mapStyle(feature){
        return{
            fillColor: getMapColor(feature.properties.name),
            weight: 2,
            opacity: 0.7,
            color: 'white',
            dashArray: 1,
            fillOpacity: 0.9
        }
    }
    
    var map=L.map('mapid',{
        zoomSnap: 0.05,
        minZoom: 11,
        maxZoom: 15,
        scrollWheelZoom: true
    });
    
    var mapLayer=L.geoJson([sagay_brgy], {
        style: mapStyle,
        onEachFeature:onEach,
    }).addTo(map);
    
    map.fitBounds(mapLayer.getBounds());
    
    
//    var newMarker = {
//        set: function(e) {
//            L.marker([e.lat, e.lng]).addTo(map).bindPopup(e.popup,{
//                maxWidth:"auto"
//            }).closePopup().bindTooltip(e.tooltip,  {
//                maxWidth:"auto",
//                direction:"top"
//            }); 
//        }
//    }
                        
//    newMarker.on('mouseover', function (e) {
//        this.openPopup();
//    });
//    newMarker.on('mouseout', function (e) {
//        this.closePopup();
//    });
//    
    
    
    var map_function = {
        load: function() {
            $.ajax({
                url: 'data_handler.php',
                type: 'POST',
                data: {'action': 'select'},
                success: function(resp) {
					console.log(resp);
                    var data = JSON.parse(resp);
                    if (data.length > 0) {
                        for (var i=0; i < data.length; i++) {
                            map_function.setMarker({
                                lng: data[i].long, 
                                lat: data[i].lat, 
                                id: data[i].id,
                                brgy: data[i].brgy,
//                                popup: '<h2>'+data[i].brgy+'</h2>',
//                                tooltip: '<h2>'+data[i].brgy+'</h2>'
                            });
                        }
                        
                        
                    } else {
                        alert('not available!.');
                    }
                },
                error: function(e) {
                    alert(e);
                }
            })
        },
        setMarker: function(e) {
            L.marker([e.lat, e.lng]).addTo(map).on('mouseover',function(ev) {
                lnd(e.id, e.brgy)
            });
        }
    }
    map_function.load();
    
    var legend = L.control({ position: "bottomright" });
    /*Legend specific*/
    function lnd(id, brgy) {
        
        $.ajax({
            url: 'data_handler.php',
            type: 'POST',
            data: {'action': 'get_map_records', 'brgy_id': id},
            success: function(resp) {
                console.log(resp);
                var data = JSON.parse(resp);
                console.log(data);
                legend.onAdd = function(map) {
                    var div = L.DomUtil.create("div", "legend");
                    div.innerHTML += '<h4>Brgy. <b><u>'+ brgy +'</u></b> of Sagay City</h4>';
                    div.innerHTML += '<h4><small>Current year: <b><?php echo date('Y'); ?></b></small></h4>';
                    div.innerHTML += '<i style="background: #477AC2"></i><span>Pregnant:  <b>'+ data['pregnant'] +'</b></span><br>';
                    div.innerHTML += '<i style="background: #477AC2"></i><span>Give Birth: <b>'+ data['give_birth'] +'</b></span><br>';
                    div.innerHTML += '<i style="background: #477AC2"></i><span>Done Vaccination: <b>'+ data['vaccine'] +'</b></span><br>';
                    div.innerHTML += '<i style="background: #477AC2"></i><span>Conduct Vaccine: <b>'+ data['vaccine_process'] +'</b></span><br>';
                    div.innerHTML += '<hr>';
                    div.innerHTML += '<h4><small><b>Prediction value 2yrs gap</b></small></h4>';
                    if (data['years'].length <= 0) {
                        div.innerHTML += '<h4><small><b class="fa fa-warning"> No data found!.</b></small></h4>';
                    } else {
                        div.innerHTML += '<i style="background: #448D40"></i><span>Previous Give Birth in '+data['years'][0]+': <b>'+ data['year_value'][0] +'</b></span><br>';
                        div.innerHTML += '<i style="background: #448D40"></i><span>Expected Give Birth in '+(data['years'][0] + 2)+': <b>'+ data['predict'] +'</b></span><br>';
                    }
        //            div.innerHTML += '<i style="background: #448D40"></i><span>Forest</span><br>';
        //            div.innerHTML += '<i style="background: #E6E696"></i><span>Land</span><br>';
        //            div.innerHTML += '<i style="background: #E8E6E0"></i><span>Residential</span><br>';
        //            div.innerHTML += '<i style="background: #FFFFFF"></i><span>Ice</span><br>';

                    return div;
                };

                legend.addTo(map);
            },
            error: function(e) {
                alert(e);
            }
                
        });
    }
    
</script>