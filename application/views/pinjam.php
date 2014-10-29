

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
                                       
                                                    <td><img src="<?php echo base_url()?>picture/<?php echo $row->id_barang?>.png" width="150px" height="150px"></td>
                                                     <td ><span class="row_table"><?php echo $row->nama_barang;?></span></td>
                                                    <td><span class="row_table"><?php
                                                        if ($row->keadaan==1) echo "Bagus";
                                                        elseif($row->keadaan==0) echo "Rusak"?></span></td>
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
    
<div id="penutupan" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">

            <div class="col-sm-12">
                <center><h2><b>Alhamdulillah PPDB SD, SMP, SMA, dan SMK sudah selesai.<br>
                Terima Kasih Atas Partisipasinya</b></h2></center>
                <hr/>
                <!--<center><p>PPDB SD dapat diakses melalui link berikut : <a href="http://sd.ppdbsurabaya.net" target="_blank">sd.ppdbsurabaya.net</a></p></center>-->
            </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">
 $(window).load(function(){
        $('#penutupan').modal('show');
    });
</script>        </div>
        <div class="col-md-1"></div>
 </div>
<script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-22367884-1']);
      _gaq.push(['_setDomainName', 'ppdbsurabaya.net']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

      
      $(document).ready(function() {

                      });
</script>

<script type="text/javascript">
    $(window).load(function(){
        $('#penutupan').modal('show');
    });

    $('#penutupan').modal({
      backdrop: 'static',
      keyboard: false
    })
</script>
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
