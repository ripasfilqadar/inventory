<div>
</div>
<h1>Inventaris Bisa Dipinjam</h1>
<div>
	<table class="table table-bordered table-hover table-striped">
		<thead style="background-color: #dde4e6; font-weight: bold;">
			<tr>
				<td>Nama Barang</td>
				<td>Foto</td>
				<td>Keadaan</td>
				<td>Status</td>
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
				<td><?php 
					if ($row->status == 1) {?>
						<a href="<?php echo base_url();?>pinjam/pinjam_barang/<?php echo $row->id_barang?>">Pinjam</a>
						<?php }
					if ($row->status == 2)
						echo "Dipinjam"
				?>
				</td>
			</tr>
		</tbody>
		<?php };?>
	</table>
</div>
