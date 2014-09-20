

<div class="form">
	<form action="<?php echo base_url();?>index.php/admin/editphoto/<?php echo $data->id_barang;?>" method="post" enctype="multipart/form-data">
		
		<div class="form2">
			<div class="control-label">Foto</div>
			<div class="controls">
				 <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($data->foto).'" width=100px height=100px>'?>
			</div>
		</div>
		<div class="form2">
			<div class="control-label"></div>
			<div class="controls">
				<input type="file" value="<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($data->foto).'"'?>" name="foto">
			</div>
		</div>
		<div class="form2">
			<div class="control-label">
				<input type="submit" value="Change Foto">		
			</div>		
		</div>	
		
	</form>

	<form action="<?php echo base_url();?>index.php/admin/edit_barang/<?php echo $data->id_barang;?>" method="post" enctype="multipart/form-data" >
		<div class="form2">
			<div class="control-label">Nama</div>
			<div class="controls">
				<input type="text" value="<?php echo $data->nama_barang;?>" name="nama" class="form-control">
			</div>
		</div>
		<div class="form2">
			<div class="control-label">Status</div>
			<div class="controls">
				<select name="status">
					<option type="text" value="0"  class="form-control">Tidak Bisa di Pinjam</option>
					<option type="text" value="1" class="form-control">Bisa di Pinjam</option>
				</select>
			</div>
		</div>
		<div class="form2">
			<div class="control-label">Kondisi</div>
				<div class="controls">
					<select name="kondisi">
						<option value="0">Rusak</option>
						<option value="1">Bagus</option>
					</select>
				</div>
		</div>
				
			</div>
		</div>
		<div class="form2">
			<div class="control-label">
				<input type="submit" value="Edit" class="form-submit">
			</div>		
		</div>	
	</form>


</div>