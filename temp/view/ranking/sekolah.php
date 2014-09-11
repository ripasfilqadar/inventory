
    <section id="ranking" class="info">

        <div class="info-section-gray" style="min-height: 470px;">

            <div class="container">
                <div class="row">
                    <header>
                        <h3 style="margin-bottom: 50px">Lihat Ranking Berdasarkan Sekolah</h3>
                    </header>
                    <div class="col-md-4">
                        <header>
                            <h3 style="font-weight: 300;">SMP</h3>
                            <form role="form" action="<?php echo base_url(); ?>ranking/selectSMP" method="POST" class="navbar-form">
                                <div class="form-group">
                                    <select name="sekolah" class="select-block mbl form-control" style="margin-bottom: 0;">
                                        <option value="0" checked="">Pilih Sekolah</option>
                                        <?php
                                            foreach ($smps as $sekolah) {?>
                                                <option value="<?php echo $sekolah['ID_SEKOLAH']; ?>"><?php echo $sekolah['NAMA_SEKOLAH']; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default" style="margin-top: 0">Pilih</button>
                            </form>
                        </header>
                    </div>

                    <div class="col-md-4">
                        <header>
                            <h3 style="font-weight: 300;">SMA</h3>
                            <form role="form" action="<?php echo base_url(); ?>ranking/selectSMA" method="POST" class="navbar-form">
                                <div class="form-group">
                                    <select name="sekolah" class="select-block mbl form-control" style="margin-bottom: 0;">
                                        <option value="0" checked="">Pilih Sekolah</option>
                                        <?php
                                            foreach ($smas as $sekolah) {?>
                                                <option value="<?php echo $sekolah['ID_SEKOLAH']; ?>"><?php echo $sekolah['NAMA_SEKOLAH']; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default" style="margin-top: 0">Pilih</button>
                            </form>
                        </header>
                    </div>
<div class="col-md-4">
                        <header>
                            <h3 style="font-weight: 300;">SMK</h3>
                            <form role="form" action="<?php echo base_url(); ?>ranking/selectSMK" method="POST" class="navbar-form">
                                <div class="form-group">
                                    <select name="sekolah" class="select-block mbl form-control" style="margin-bottom: 0;">
                                        <option value="0" checked="">Pilih Sekolah</option>
                                        <?php
                                            foreach ($smks as $sekolah) {?>
                                                <option value="<?php echo $sekolah['ID_SEKOLAH']; ?>"><?php echo $sekolah['NAMA_SEKOLAH']; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default" style="margin-top: 0">Pilih</button>
                            </form>
                        </header>
                    </div> 

                </div>

            </div>

        </div>

    </section>
