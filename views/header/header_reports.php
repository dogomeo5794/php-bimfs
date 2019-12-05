    
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light border-bottom bg-success">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
    </ul>
    
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3 head-search">
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


<style>
    .dataTables_filter { 
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
