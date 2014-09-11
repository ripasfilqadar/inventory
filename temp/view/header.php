<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <title>PPDB Sidoarjo 2014 - <?php echo $judul; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url(); ?>css/flat-ui.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/icon.ico">

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

                    <a href="<?php echo base_url(); ?>" class="navbar-brand"><img src="<?php echo base_url(); ?>images/logo.png" class="logo-img img-responsive" alt="Logo PPDB Sidoarjo" title="PPDB Sidoarjo 2014"></a>

                    <div class="collapse navbar-collapse main-nav" id="navigation">

                        <ul class="nav pull-right">
                            <li><a href="<?php if ($judul != "Selamat Datang di Halaman Utama") { echo base_url(); } ?>#beranda">Beranda</a></li>
                            <li><a href="<?php if (substr($judul, 0, 14) != "Info Pendaftar") { echo base_url()."halaman/"; } ?>#info">Info Pendaftar</a>
                                <ul>
                                    <li><a href="<?php echo base_url(); ?>halaman/jadwal">Jadwal Pelaksanaan</a></li>
                                    <li><a href="<?php echo base_url(); ?>siswa">Status Pendaftaran</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php if (substr($judul, 0, 7) != "Ranking") { echo base_url()."ranking/"; } ?>#ranking">Hasil Seleksi</a>
                                <ul>
                                    <li><a href="<?php echo base_url(); ?>ranking/siswa">Per Siswa</a></li>
                                    <li><a href="<?php echo base_url()."ranking/" ?>#ranking">Per Sekolah</a>
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>ranking/smp">SMP</a></li>
                                            <li><a href="<?php echo base_url(); ?>ranking/sma">SMA</a></li>
                                            <li><a href="<?php echo base_url(); ?>ranking/smk">SMK</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="<?php if (substr($judul, 0, 7) != "Sekolah") { echo base_url()."sekolah/"; } ?>#sekolah">Sekolah</a>
                                <ul>
                                  <li><a href="<?php echo base_url(); ?>sekolah/smp">SMP</a></li>
                                  <li><a href="<?php echo base_url(); ?>sekolah/sma">SMA</a></li>
                                  <li><a href="<?php echo base_url(); ?>sekolah/smk">SMK</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php if (substr($judul, 0, 29) != "Rekapitulasi Penerimaan Tahun") { echo base_url()."rekapitulasi/"; } ?>#rekapitulasi">Rekapitulasi</a>
                                <ul>
                                  <li><a href="<?php echo base_url(); ?>rekapitulasi/rekap2010">Tahun 2010</a></li>
                                  <li><a href="<?php echo base_url(); ?>rekapitulasi/rekap2011">Tahun 2011</a></li>
                                  <li><a href="<?php echo base_url(); ?>rekapitulasi/rekap2012">Tahun 2012</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php if ($judul != "Kontak") { echo base_url()."halaman/kontak"; } ?>#kontak">Kontak</a>
                            </li>
                            <li>
                                
                            </li> 
                           
                        </ul>



                    </div>
                </div>
            </div>
        </nav>

    </section>