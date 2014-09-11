
    <section id="ranking" class="info">

        <div class="info-section-gray" style="min-height: 470px;">

            <div class="container">
                <header>
                    <h1>Status Pendaftaran Siswa</h1>
                    <!-- <p class="lead">Ranking Untuk SMA</p> -->
                    <form role="form" action="<?php echo base_url(); ?>siswa/selectSiswa" method="POST" class="form-inline">
                        <div class="form-group">
                            <input name="no_ujian" class="form-control" style="margin-bottom: 0; border: 2px solid #bdc3c7 !important; background-color: #fff !Important;" placeholder="Masukkan Nomor Ujian">
                        </div>
                        <!-- &nbsp;atau&nbsp;
                        <div class="form-group">
                            <input name="nama" class="form-control" style="margin-bottom: 0; border: 2px solid #bdc3c7 !important; background-color: #fff !Important;" placeholder="Masukkan Nama Siswa">
                        </div>&nbsp; -->
                        <div class="form-group">
                            <select name="jenjang" class="select-block mbl form-control" style="margin-bottom: 0;">
                                <option selected disabled value="0">Jenjang Studi Sekarang</option>
                                <option value="sd">SD</option>
                                <option value="smp">SMP</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default" style="margin-top: 0">Pilih</button>
                    </form>
                </header>
                <div class="row">

                    <div class="col-md-8 col-md-offset-2">
                        <?php if (!empty($detail)) { ?>
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
                                <td style="font-weight: 700; text-align: right; width: 30%;">Tanggal Lahir</td>
                                <td><?php echo $detail[0]['TGL_LAHIR']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700; text-align: right; width: 30%;">Tempat Lahir</td>
                                <td><?php echo $detail[0]['TMP_LAHIR']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700; text-align: right; width: 30%;">Alamat</td>
                                <td><?php echo $detail[0]['ALAMAT']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700; text-align: right; width: 30%;">Asal Sekolah</td>
                                <td><?php echo $detail[0]['ASAL_SEKOLAH']; ?></td>
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
                                <td><?php echo $detail[0]['NUN_ASLI']; ?></td>
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
