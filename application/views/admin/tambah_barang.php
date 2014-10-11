
    <div id="wrapper" style="padding-left: 0px;">
    
        <div id="page-wrapper" >

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="text-align:center">
                            

                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <h2 style="text-align:center"> Tambah Barang Inventaris</h2>
                    <div class="form" style="margin-left:32%">
                        <?php
                        $attributes = array('enctype' => 'multipart/form-data');
                            echo form_open('admin/tambah_barang',$attributes); ?>
                            <div class="form-group" style="width:50%">
                                <label> ID Barang </label>
                                <input class="form-control" name="id">
                            </div>
                             <div class="form-group" style="width:50%">
                                <label> Nama Barang </label>
                                <input class="form-control" name="name">
                            </div>
                            <div class="form-group" style="width:50%">
                                <label>Kondisi</label>
                                <select class="form-control" name="kondisi">
                                        <option value="0">Rusak</option>
                                        <option value="1">Bagus</option>
                                </select>
                            </div>
                            <div class="form-group" style="width:50%">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                        <option value="0">Tidak Bisa di Pinjam</option>
                                        <option value="1">Bisa di Pinjam</option>
                                </select>
                            </div>

                            <div class="form-group" style="width:50%">
                                <label> Gambar </label>
                                <input name="foto" type="file">
                            </div>
                    
                            <input type="submit" class="btn btn-default" value="Tambah">
                            
                        </form>
                        <div class="notif">
                        <?php echo validation_errors();?>
                        </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url()?>js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url()?>js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url()?>js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url()?>js/plugins/morris/morris-data.js"></script>


</body>

</html>
