
    <section id="ranking" class="info">

        <div class="info-section-gray" style="min-height: 470px;">

            <div class="container">
                <header>
                    <h1>Ranking Siswa</h1>
                    <!-- <p class="lead">Ranking Untuk SMA</p> -->
                    <form role="form" action="<?php echo base_url(); ?>ranking/selectSiswa" method="POST" class="navbar-form">
                        <div class="form-group">
                            <input name="no_ujian" class="form-control" style="margin-bottom: 0; border: 2px solid #bdc3c7 !important;" placeholder="Nomor Ujian">
                        </div>
                        <button type="submit" class="btn btn-default" style="margin-top: 0">Pilih</button>
                    </form>
                </header>
                <div class="row">

                    <div class="col-md-12">
                        <table class="table table-bordered table-hover table-striped">
                            <thead style="background-color: #dde4e6; font-weight: 700; text-align: center;">
                                <tr>
                                    <td>Nomor Ujian</td>
                                    <td>Nama Lengkap</td>
                                    <td>Asal Sekolah</td>
                                    <td>Diterima di Sekolah</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    if (empty($rank)) { ?>
                                        <td style="text-align: center; background: #ffffff" colspan="5">Tidak Ada Data</td>
                                    <?php }
                                    else { ?> 
                                        <tr>
                                            <td style="text-align: center;"><?php echo $rank[0]['no_ujian']; ?></td>
                                            <td style="text-align: center;"><?php echo $rank[0]['nama']; ?></td>
                                            <td style="text-align: center;"><?php echo $rank[0]['asal_sekolah']; ?></td>
                                            <td style="text-align: center;"><?php echo $rank[0]['NAMA_SEKOLAH']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>

                    </div> 

                </div>
            </div>

        </div>

    </section>
