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
                <a class="navbar-brand" href="<?php echo base_url()?>admin_page/list_barang">NCC Inventory </a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li <?php if ($flagheader==1){?>class="active"<?php }?>>
                        <a href="<?php echo base_url()?>admin_page/list_pinjam">List Peminjaman</a>
                     </li>
                    <li  <?php if ($flagheader==2){?>class="active"<?php }?>>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo">Inventaris<i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo" class="collapse">
                                <li>
                                    <a href="<?php echo base_url()?>admin_page/list_barang">List</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url()?>admin_page/tambah_barang">Tambah</a>
                                </li>
                            </ul>
                    </li>
                    <li >
                        <a href="<?php echo base_url()?>login/logout">Logout admin_page</a>
                     </li>
            </div>

            </nav>