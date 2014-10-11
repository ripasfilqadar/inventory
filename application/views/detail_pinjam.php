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
                <a class="navbar-brand" href="<?php echo base_url()?>page/pinjam">NCC Inventory</a>
            </div>
             <div class="navbar-header-right">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="text" href="<?php echo base_url()?>page/detail_pinjam">List Barang Yang Anda Pinjam(<?php
                echo $this->cart->total_items();?>)</a>
            </div>
            <!-- Top Menu Items -->
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="text-align:center">
                           Detail Peminjaman
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-6" style="width:60%; margin-left: 176px;">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="tableheader" style="width:200px">Gambar</th>
                                        <th class="tableheader" style="width:350px">Nama</th>
                                        <th></th>
                                        
                                    </tr>
                                </thead>
                                <?php 
								foreach($this->cart->contents() as $items)
								{?>
								 	<tr>
								 		<td><?php $query="select * from barang where id_barang='$items[id]'";
									 		$row=mysql_query($query);
									 		$row=mysql_fetch_row($row);
									 		echo '<img src="data:image/jpeg;base64,'.base64_encode($row[4] ).'"width=100px height=100px>';?>
								 		<td class="row_table" ><?php echo $items['name'];?></td>
                                        <td>
                                        <a class="link" style="float:left;padding:3px 3px 3px 3px;color:white"href="<?php echo base_url();?>pinjam/hapus_barang/<?php echo $items['rowid']?>">Cancel</a>
                                        </td>
								 	</tr>
								<?php };?>

							</table>
							<a href="<?php echo base_url();?>page/pinjam" class="link" style="width:120px;float:left;padding:5px 3px 5px 3px;color:white" >Pinjam Lagi</a>
							<a href="<?php echo base_url();?>page/datadiri" class="link"style="float:left;padding:5px 3px 5px 3px;color:white; margin-left:20px" >Selesai</a>	
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
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>

