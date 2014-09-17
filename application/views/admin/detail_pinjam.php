<div>
</div>
<h1>List barang yg dipinjam</h1>
<div>
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
	<a href="<?php echo base_url()?>pinjam/acc/<?php echo $id?>">ACC</a>
	<a href="<?php echo base_url()?>pinjam/tolak/<?php echo $id?>">Tolak</a>

</div>
