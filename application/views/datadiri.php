
<!-- Products -->
    <div class="products">
    <p class="home-judul"> Masukkan data Anda</p>
    	<div class="form">
    		<?php echo form_open('pinjam/finish'); ?>
    		<div class="form2">
				<div class="control-label">Nama</div>
				<div class="controls">
					<input class="form-control" type="text" name="nama" placeholder="Masukkan nama anda">
				</div>
			</div>
			<div class="form2">
				<div class="control-label">NRP</div>
				<div class="controls">
					<input class="form-control" ="text" name="nrp" placeholder="Alamat anda">
				</div>
			</div>
			<div class="form2">
				<div class="control-label">NO Handphone</div>
				<div class="controls">
					<input class="form-control" type="text" name="no_hp" placeholder="NO Handphone">
				</div>
			</div>
			<input type="submit" value="selesai">
			
		</form>
		<div class="notif">
		<?php echo validation_errors();?>
		</div>
		</div>
	</div>
      <!-- End Products -->
</div>
    <!-- End Content -->
   
