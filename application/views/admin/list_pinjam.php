<div>
</div>
<h1>Inventaris Yang Dipinjam</h1>
<div>
	<table class="table table-bordered table-hover table-striped">
		<thead style="background-color: #dde4e6; font-weight: bold;">
			<tr>
				<td>Nama</td>
				<td>NRP</td>
				<td>Status</td>
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
					?>
				</td>
				<td><a href="<?php echo base_url();?>page/detail_pinjam/<?php echo $row->id_peminjaman?>">LIST</a></td>
			</tr>
		</tbody>
		<?php };?>
	</table>
</div>