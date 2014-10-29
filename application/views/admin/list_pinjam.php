    
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
                    <div class="col-lg-6" style="width:60%;margin-left:190px" >
                        <h2 style="text-align:center">List Peminjaman Inventaris NCC</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <td>Nama</td>
                                        <td>NRP</td>
                                        <td>Status</td>
                                        <?php if($this->session->userdata('status_admin')==2)
                                        {?>
                                            <td></td>    
                                        <?php }; ?>
                                        
                                        <td></td>
                                    </tr>
                                </thead>
                                <?php foreach ($data as $row) {?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row->nama;?></td>
                                        <td><?php echo $row->nrp;?></td>
                                        <td><?php 
                                            if ($row->status_peminjaman == 0) {
                                                echo "PROSES";
                                                 }
                                            if ($row->status_peminjaman == 1)
                                                echo "ACC";
                                            if ($row->status_peminjaman == 2)
                                                echo "Di Tolak";
                                            ?>
                                        </td>
                                        <?php if ($flag==1)
                                        {?>
                                        <?php if ($this->session->userdata('status_admin')==2) {?>
                                        <td><a class="link" style="float:left;padding:3px 3px 3px 3px;color:white" href="<?php echo base_url();?>admin_page/detail_pinjam/<?php echo $row->id_peminjaman?>">LIST</a></td> <?php };   
                                        }?>
                                        <td><a class="link" style="float:left;padding:3px 3px 3px 3px;color:white"href="<?php echo base_url();?>pinjam/bukti/<?php echo $row->id_peminjaman?>">Form</a></td>
                                    </tr>
                                </thead>
                                <tbody>
                   
                                </tbody>
                                <?php };?>
                            </table>
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
