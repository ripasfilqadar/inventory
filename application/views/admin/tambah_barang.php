
<!-- Products -->
    <div class="products">
    <p class="home-judul"> Tambah  Barang</p>
    	<div class="form">
    	<?php
    	$attributes = array('enctype' => 'multipart/form-data');
    		echo form_open('admin/tambah_barang',$attributes); ?>
    		<div class="form2">
				<div class="control-label">ID Barang</div>
				<div class="controls">
					<input class="form-control" type="text" name="id">
				</div>
			</div>
			<div class="form2">
				<div class="control-label">Nama Barang</div>
				<div class="controls">
					<input class="form-control" ="text" name="name">
				</div>
			</div>
			<div class="form2">
				<div class="control-label">Kondisi</div>
				<div class="controls">
					<select name="status">
						<option value="0">Rusak</option>
						<option value="1">Bagus</option>
					</select>
				</div>
			</div>
			<div class="form2">
				<div class="control-label">Status</div>
				<div class="controls">
					<select name="status">
						<option value="0">Tidak Bisa di Pinjam</option>
						<option value="1">Bisa di Pinjam</option>
					</select>
				</div>
			</div>
			<div class="form2">
				<div class="control-label">Foto</div>
				<div class="controls">
					<input class="form-control" type="file" name="foto">	
				</div>
			</div>
	
			<div class="form2">
				<div class="control-label">
						<input class="button" type="submit" value="Tambah">
				</div>		
			</div>
			
		</form>
		<div class="notif">
		<?php echo validation_errors();?>
		</div>
		</div>
	</div>
      <!-- End Products -->
</div>
    <!-- End Content -->
   

