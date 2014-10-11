

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
                                        <?php
                                        if ($adminflag==1){?> <th class="tableheader" style="width:150px"></th><?php } ?>
                                    </tr>
                                </thead>
                                <?php foreach ($barang as $row) {
                                    if ($row->status!=3)
                                        {?>
                                             <tbody>
                                                 <tr>
                                       
                                                    <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row->foto).'" width=100px height=120px>'?></td>
                                                     <td ><span class="row_table"><?php echo $row->nama_barang;?></span></td>
                                                    <td><span class="row_table"><?php
                                                        if ($row->keadaan==0) echo "Bagus";
                                                        else echo "Rusak"?></span></td>
                                                    <td><span class="row_table"><?php
                                                        if ($row->status == 1&& $flag==0) {?>
                                                            <a class="link" style="float:left;padding:3px 3px 3px 3px;color:white"href="<?php echo base_url();?>pinjam/pinjam_barang/<?php echo $row->id_barang?>">Pinjam</a>
                                                            <?php }
                                                        if ($row->status == 2 && $flag==0){?>
                                                            <span class="link" style="float:left;padding:3px 3px 3px 3px;color:white">Dipinjam</span>
                                                            <?php }
                                                        if ($row->status == 1&& $flag==1) {?>
                                                            <span class="link" style="float:left;padding:3px 3px 3px 3px;color:white">Ada</span>
                                                            <?php } ?>
                                                            </span>
                                                     </td>
                                                    <?php
                                                     if ($adminflag==1){?>
                                                     <td>
                                                    
                                                    <a class="link" style="float:left;padding:3px 3px 3px 3px;color:white" href="<?php echo base_url()?>admin_page/edit_barang/<?php echo $row->id_barang?>">Edit</a>                                                
                                                    </td>
                                                    <?php } ?>
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
