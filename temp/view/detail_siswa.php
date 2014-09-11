
    <section id="ranking" class="info">

        <div class="info-section-gray" style="min-height: 470px;">

            <div class="container">
                <header>
                    <h1>Hasil Seleksi Siswa</h1>
                    <!-- <p class="lead">Ranking Untuk SMA</p> -->
                    <form role="form" action="<?php echo base_url(); ?>ranking/selectSiswa" method="POST" class="navbar-form">
                        <div class="form-group">
                            <input name="no_ujian" class="form-control" style="margin-bottom: 0; border: 2px solid #bdc3c7 !important;" placeholder="Nomor Ujian">
                            <!-- <select name="jenjang" class="select-block mbl form-control" style="margin-bottom: 0;">
                                <option value="smp"></option>
                                <option value="sma"></option>
                                <option value="smk"></option>
                            </select> -->
                        </div>
                        <button type="submit" class="btn btn-default" style="margin-top: 0">Pilih</button>
                    </form>
                </header>
                <div class="row">

                    <div class="col-md-8 col-md-offset-2">
                        <?php if (!empty($detail)) { ?>
                        <div class="row">
                            <p style="padding: 10px; color: #2C3E50; font-size: 2em; text-align: center; margin-bottom: 0; border: 2px dashed #7F8C8D; border-radius: 6px; margin-top: 10px;">Anda Berada pada Ranking <?php echo $detail[0]['RANKING']; ?></p>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="text-align: right;">
                                <span style="font-size: 14px; font-weight: 300; color: #16A085;">Tanggal update: <?php echo date('j-n-Y'); ?> Pukul <?php echo date('H:i:s'); ?></span>
                            </div>
                        </div>
                        <table class="table table-bordered table-hover table-striped" style="margin-top: 20px;">
                            <tr>
                                <td style="font-weight: 700; text-align: right; width: 30%;">Nomor Ujian</td>
                                <td><?php echo $detail[0]['NO_UJIAN']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700; text-align: right; width: 30%;">Nama</td>
                                <td><?php echo $detail[0]['NAMA']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700; text-align: right; width: 30%;">Asal Sekolah</td>
                                <td><?php echo $detail[0]['ASAL_SEKOLAH']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700; text-align: right; width: 30%;">Tanggal Lahir</td>
                                <td><?php echo $detail[0]['TGL_LAHIR']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700; text-align: right; width: 30%;">Nilai Bahasa Indonesia</td>
                                <td><?php echo $detail[0]['BIND']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700; text-align: right; width: 30%;">Nilai Matematika</td>
                                <td><?php echo $detail[0]['MAT']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700; text-align: right; width: 30%;">Nilai IPA</td>
                                <td><?php echo $detail[0]['IPA']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700; text-align: right; width: 30%;">Nilai Bahasa Inggris</td>
                                <td><?php echo $detail[0]['BING']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700; text-align: right; width: 30%;">Nilai Akhir</td>
                                <td><?php echo $detail[0]['NILAI_AKHIR']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700; text-align: right; width: 30%;">Diterima di Sekolah</td>
                                <td><?php echo $detail[0]['NAMA_SEKOLAH']; ?> (Pilihan Ke-<?php echo $detail[0]['PILIHAN']; ?>)</td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700; text-align: right; width: 30%;">Peringkat</td>
                                <td>Ke-<?php echo $detail[0]['RANKING']; ?></td>
                            </tr>
                        </table>
                        <?php }
                        else { ?>
                            <table class="table table-bordered table-hover table-striped" style="margin-top: 20px;">
                                <tr>
                                    <td style="background-color: #fff; text-align: center;">Belum ada data</td>
                                </tr>
                            </table>
                        <?php } ?>
                    </div> 

                </div>
            </div>

        </div>

    </section>
