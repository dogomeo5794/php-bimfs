    
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light border-bottom bg-success">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item alluseronly">
            <a href="#" class="nav-link">
                <div class="form-group">
                    <label>
                        <input type="checkbox" class="minimal-red" checked> 
                        Active
                    </label>
                </div>
            </a>
        </li>
        <li class="nav-item alluseronly">
            <a href="#" class="nav-link">
                <div class="form-group">
                    <label>
                        <input type="checkbox" class="minimal-red" checked> 
                        Inactive
                    </label>
                </div>
            </a>
        </li>
    </ul>
    
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3 alluseronly">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" id="hsearch" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    
    <!-- Right navbar links -->
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
<!-- /.navbar -->  

<script>
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
    
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
</script>

<style>
    .dataTables_filter{ 
        display: none; 
    }
</style>

<script>
    $(document).on('submit', '.head-search', function(e) {
        e.preventDefault();
    })
    
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
    }, 100)
</script>
