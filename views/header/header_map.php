    
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light border-bottom bg-success">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        
    </ul>
   
    
    <ul class="navbar-nav ml-auto">
        <li>
            <a href="#" class="nav-link">
                <div class="form-group">
                    <label id="livetime">
                        this is timer
                    </label>
                </div>
            </a>
        </li>
    </ul>


</nav>

<script>
    
setInterval(function() {
    var month = ['January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var d = new Date();
    var yy = d.getFullYear();
    var mm = d.getMonth();
    var dd = d.getDate();
    var hh = d.getHours();
    var min = d.getMinutes();
    var sec = d.getSeconds();
    var tt = d.toLocaleString('en-US', {hour: 'numeric', 'minute': 'numeric', 'second': 'numeric', hours12: true})
//        var time = month[mm]+' '+dd+', '+yy+' [ '+hh+':'+min+':'+sec+' ]';
    var time = month[mm]+' '+dd+', '+yy+' [ '+ tt +' ]';
    $('#livetime').html(time)
}, 1)
</script>
