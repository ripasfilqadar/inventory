<div>
</div>
<h1>Inventaris Bisa Dipinjam</h1>
<div>
	<table class="table table-bordered table-hover table-striped">
		<thead style="background-color: #dde4e6; font-weight: bold;">
			<tr>
				<td>Nama Barang</td>
				<td>Foto</td>
				<td>Total</td>
				<td>Kondisi Baik</td>
				<td>Kondisi Rusak</td>
				<td>Stok</td>
			</tr>
		</thead>
		<?php foreach ($barang as $row) {?>
		<tbody>
			<tr>
				<td><?php echo $row->nama_barang;?></td>
				<td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row->foto).'" width=150px height=200px>'?></td>
				<td><?php echo 	$row->total;?></td>
				<td><?php echo $row->bagus;?></td>
				<td><?php echo $row->rusak;?></td>
				<td><?php echo $row->stok;?></td>
				<?php
				if ($row->stok > 0)
				{?>
					<td><a href="<?php echo base_url();?>pinjam/pinjam_barang/<?php echo $row->id_barang?>">Pinjam</td>	
				<?php
				}?>
				
			</tr>
		</tbody>
		<?php };?>
	</table>
</div>
<h1>Barang Permanen</h1>
<div>
	<table class="table table-bordered table-hover table-striped">
		<thead style="background-color: #dde4e6; font-weight: bold;">
			<tr>
				<td>Nama Barang</td>
				<td>Foto</td>
				<td>Total</td>
				<td>Kondisi Baik</td>
				<td>Kondisi Rusak</td>
			</tr>
		</thead>
		<?php foreach ($barang2 as $row) {?>
		<tbody>
			<tr>
				<td><?php echo $row->nama_barang;?></td>
				<td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row->foto).'" width=150px height=200px>'?></td>
				<td><?php echo 	$row->total;?></td>
				<td><?php echo $row->bagus;?></td>
				<td><?php echo $row->rusak;?></td>
			</tr>
		</tbody>
		<?php };?>
	</table>
</div>