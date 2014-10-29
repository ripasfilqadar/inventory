

        <!-- Navigation -->        

        <div id="page-wrapper" >

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="text-align:center">
                            List Barang Inventaris NCC Laboratory
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-6" style="width:100%">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="tableheader" style="width:200px">Gambar</th>
                                        <th class="tableheader">Nama</th>
                                        <th class="tableheader" style="width:150px">Kondisi</th>
                                        <th class="tableheader" style="width:150px">Status</th>
                                        <th class="tableheader" style="width:150px"></th>
                                    </tr>
                                </thead>
                                <?php foreach ($barang as $row) {
                                    if ($row->status!=3)
                                        {?>
                                             <tbody>
                                                 <tr>
                                       
                                                    <td><img src="<?php echo base_url()?>picture/<?php echo $row->id_barang?>.png" width="150px" height="150px"></td>
                                                     <td ><span class="row_table"><?php echo $row->nama_barang;?></span></td>
                                                    <td><span class="row_table"><?php
                                                        if ($row->keadaan==1) echo "Bagus";
                                                        else echo "Rusak"?></span></td>
                                                    <td><span class="row_table"><?php
                                                        if ($row->status == 0) {?>
                                                            <span class="link" style="float:left;padding:3px 3px 3px 3px;color:white;width:120px; height:60px">Tidak Bisa Dipinjam</span>
                                                            <?php }
                                                        else if ($row->status == 2){?>
                                                            <span class="link" style="float:left;padding:3px 3px 3px 3px;color:white">Dipinjam</span>
                                                            <?php }
                                                        else if ($row->status == 1) {?>
                                                            <span class="link" style="float:left;padding:3px 3px 3px 3px;color:white">Ada</span>
                                                            <?php } ?>
                                                            </span>
                                                     </td>
                                                 
                                                     <td>
                                                    <a class="link" style="float:left;padding:3px 3px 3px 3px;color:white" href="<?php echo base_url()?>admin/edit_barang_page/<?php echo $row->id_barang?>">Edit</a>
                                                    <a class="link" style="float:left;padding:3px 3px 3px 3px;color:white; margin-top:20px" href="<?php echo base_url()?>admin/hapus/<?php echo $row->id_barang?>">Hapus</a>
                                                    </td>
                                                </tr>
                                              </tbody>
                                                <?php }
                                                    
                                       };?>
                            </table>
                             <?php   
                                if (isset($halaman))
                                {
                                  echo $halaman;
                                }
                              ?>
                        </div>
                    </div>
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
