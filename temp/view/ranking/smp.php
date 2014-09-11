
    <section id="ranking" class="info">

        <div class="info-section-gray" style="min-height: 470px;">

            <div class="container">
                <header>
                    <h1>Ranking <?php if (empty($nama_sekolah)) { ?>SMP<?php } else { echo $nama_sekolah->NAMA_SEKOLAH; }?></h1>
                    <!-- <p class="lead">Ranking Untuk SMA</p> -->
                    <form role="form" action="<?php echo base_url(); ?>ranking/selectSMP" method="POST" class="navbar-form">
                        <div class="form-group">
                            <select name="sekolah" class="select-block mbl form-control" style="margin-bottom: 0;">
                                <option value="0" checked="">Pilih Sekolah</option>
                                <?php
                                    foreach ($sekolahs as $sekolah) {?>
                                        <option value="<?php echo $sekolah['ID_SEKOLAH']; ?>"><?php echo $sekolah['NAMA_SEKOLAH']; ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default" style="margin-top: 0">Pilih</button>
                    </form>
                </header>
                <div class="row">

                    <div class="col-md-12">
                        <table class="table table-bordered table-hover table-striped">
                            <thead style="background-color: #dde4e6; font-weight: 700; text-align: center;">
                                <tr>
                                    <td>Nomor Urut</td>
                                    <td>Nomor Ujian</td>
                                    <td>Nama Lengkap</td>
                                    <td>Asal Sekolah</td>
                                    <td>Nilai Akhir</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $ew = 1;
                                    if (empty($ranks)) { ?>
                                        <td style="text-align: center; background: #ffffff" colspan="5">Tidak Ada Data</td>
                                    <?php }
                                    else {
                                        foreach ($ranks as $rank) {?>
                                            <tr>
                                                <td style="text-align: center"><?php echo $ew; ?></td>
                                                <td><?php echo $rank['NO_UJIAN']; ?></td>
                                                <td><?php echo $rank['NAMA']; ?></td>
                                                <td><?php echo $rank['ASAL_SEKOLAH']; ?></td>
                                                <td style="text-align: center"><?php echo $rank['NILAI_AKHIR']; $ew++;?></td>
                                            </tr>
                                        <?php }
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
