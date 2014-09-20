<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8"> 		
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url(); ?>css/flat-ui.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/style2.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style1.css">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/icon.ico">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style1.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
        <![endif]-->
    </head>
<body id="home" data-spy="scroll" data-target=".main-nav" data-offset="73">
    <section id="header">
        <nav class="navbar navbar-fixed-top" role="navigation">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#navigation"></button>
                    <div class="collapse navbar-collapse main-nav" id="navigation">
                        <ul class="nav pull-right">
                            <li><a href="<?php echo base_url()?>admin_page/list_barang">Barang</a>
                                <ul>
                                    <li><a href="<?php echo base_url()?>admin_page/list_barang">List Barang</a>
                                    <li><a href="<?php echo base_url();?>admin_page/tambah_barang">Tambah barang</a></li>
                                </ul>
                            </li>
                             <li><a href="<?php echo base_url()?>admin_page/list_pinjam">Peminjaman</a>
                            </li>
                            
                            <li><a href="<?php echo base_url();?>login/logout">Logout</a>
                            </li>
                            <li>
                                
                            </li> 
                           
                        </ul>



                    </div>
                </div>
            </div>
        </nav>

    </section>