<?php
    require_once '../../config/urls.php';
?>

<!-- jQuery -->
<script src="<?php echo URL; ?>/templates/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>-->
<script src="<?php echo URL; ?>/templates/plugins/jQueryUI/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo URL; ?>/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
<script src="<?php echo URL; ?>/templates/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo URL; ?>/templates/plugins/morris/morris.min.js"></script>
<script src="<?php echo URL; ?>/templates/plugins/chartjs/Chart.js"></script>
<!-- Sparkline -->
<script src="<?php echo URL; ?>/templates/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo URL; ?>/templates/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo URL; ?>/templates/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo URL; ?>/templates/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>-->
<script src="<?php echo URL; ?>/templates/plugins/momentjs/moment.js"></script>
<script src="<?php echo URL; ?>/templates/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo URL; ?>/templates/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo URL; ?>/templates/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo URL; ?>/templates/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo URL; ?>/templates/plugins/fastclick/fastclick.js"></script>
<!-- Select2 -->
<script src="<?php echo URL; ?>/templates/plugins/select2/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo URL; ?>/templates/js/adminlte.js"></script>
<!-- DataTables -->
<script src="<?php echo URL; ?>/templates/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo URL; ?>/templates/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="<?php echo URL; ?>/templates/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo URL; ?>/templates/plugins/datatables/buttons.print.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo URL; ?>/templates/plugins/iCheck/icheck.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo URL; ?>/templates/plugins/notification/js/jquery.amaran.js"></script>


<?php if (!isset($_SESSION['iflock'])) { ?>

<script>
    function idleLogout() {
        var t;
        window.onload = resetTimer;
        window.onmousemove = resetTimer;
        window.onmousedown = resetTimer;  // catches touchscreen presses as well      
        window.ontouchstart = resetTimer; // catches touchscreen swipes as well 
        window.onclick = resetTimer;      // catches touchpad clicks as well
        window.onkeypress = resetTimer;   
        window.addEventListener('scroll', resetTimer, true); // improved; see comments
        
        function yourFunction() {
            // your function for too long inactivity goes here
            // e.g. window.location.href = 'logout.php';
            console.log('you are not interact the system!...');
            $.ajax({
                method: "POST",
                url: '../../config/lock/lock.php',
                data: {'lock': 'lock', 'type': 'lockup'},
                success: function(data) {
                    console.log(data);
                    var data = JSON.parse(data);
                    console.log(data);
                    
                    console.log(data.response);
                    if (data.response) {
                        window.location.reload();
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }
        
        function resetTimer() {
            clearTimeout(t);
            t = setTimeout(yourFunction, 180000);  // time is in milliseconds
        }
    }
    idleLogout();
</script>

<?php } ?>


