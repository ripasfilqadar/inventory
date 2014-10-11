<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">NCC Inventory </a>
            </div>
            <!-- Top Menu Items -->
           
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li  <?php  if ($flagkiri==1){?> class="active"<?php };?>>
                        <a href="<?php echo base_url()?>page/pinjam">List Barang</a>
                    </li>
                    <li  <?php  if ($flagkiri==2){?> class="active"<?php };?>>
                        <a href="<?php echo base_url()?>page/list_pinjam"> List Peminjaman</a>
                    </li>
                    <li  <?php  if ($flagkiri==3){?> class="active"<?php };?>>
                        <a href="tables.html">Aturan Peminjaman</a>
                    </li>
                     <li  <?php  if ($flagkiri==4){?> class="active"<?php };?>>
                        <a href="<?php echo base_url()?>page/login">Admin Login</a>
                    </li>
            <!-- /.navbar-collapse -->
        </nav>
