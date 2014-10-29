

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
                <h2 style="text-align:center"> Edit Invetaris</h2><?php
                    $attributes = array('enctype' => 'multipart/form-data');
                            echo form_open("admin/editphoto/$data->id_barang",$attributes); ?>
        
                    <div class="form-group" style="width:50%">
                        <label>Gambar</label>
                             <td><img src="<?php echo base_url()?>picture/<?php echo $data->id_barang?>.png" width="150px" height="150px" style="border:2px solid"></td>
                    </div>

                    <div class="form-group" style="width:50%">
                            <input src="<?php echo base_url()?>picture/<?php echo $data->id_barang?>.png" width="150px" height="150px" name="userfile" type="file">
                    </div>

                   <input type="submit" class="btn btn-default" value="Edit">  
                </form>

                <form action="<?php echo base_url();?>admin/edit_barang/<?php echo $data->id_barang;?>" method="post" enctype="multipart/form-data" >
                    <div class="form-group" style="width:50%">
                        <label>Nama</label>
                            <input type="text" value="<?php echo $data->nama_barang;?>" name="nama" class="form-control">
                    </div>

                    <div class="form-group" style="width:50%">
                        <label>Status</label>
                            <select name="status" class="form-control">
                                <option type="text" value="0"  class="form-control">Tidak Bisa di Pinjam</option>
                                <option type="text" value="1" class="form-control">Bisa di Pinjam</option>
                            </select>
                    </div>

                    <div class="form-group" style="width:50%">
                        <label>Kondisi</label>
                                <select name="kondisi" class="form-control">
                                    <option value="0">Rusak</option>
                                    <option value="1">Bagus</option>
                                </select>
                    </div>
                    <input type="submit" value="Edit"class="btn btn-default">
                        </div>
                    </div>
                        
         
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
