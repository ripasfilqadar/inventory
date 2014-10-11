
    <div id="wrapper" style="padding-left: 0px;">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">NCC Inventory</a>
            </div>
            <!-- Top Menu Items -->
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <!-- /.navbar-collapse -->
        </nav>            <!-- Top Menu Items -->
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <!-- /.navbar-collapse -->
        </nav>


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
                              <thead style="background-color: #dde4e6; font-weight: bold;">
                                    <tr>
                                        <td>Nama Barang</td>
                                        <td>Foto</td>
                                        <td>Keadaan</td>
                                    </tr>
                                </thead>
                                <?php foreach ($barang as $row) {?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row->nama_barang;?></td>
                                        <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row->foto).'" width=150px height=200px>'?></td>
                                        <td><?php
                                            if ($row->keadaan==0) echo "Bagus";
                                            else echo "Rusak"?></td>
                                    </tr>
                                </tbody>
                                <?php };?>
                            </table>
                        </div>
                        <?php if ($flag->status_peminjaman==0)
                        {
                            ?>
                            <a href="<?php echo base_url()?>admin/acc/<?php echo $id?>" class="link" style="float:left;padding:3px 3px 3px 3px;color:white; margin-right:20px;">ACC</a>
                            <a href="<?php echo base_url()?>admin/tolak/<?php echo $id?>" class="link" style="float:left;padding:3px 3px 3px 3px;color:white">Tolak</a>
                        <?php
    };?>
    
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
