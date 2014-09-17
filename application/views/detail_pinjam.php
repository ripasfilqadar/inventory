
<!-- Products -->
    <div class="products">
    	<table cellpadding="6" cellspacing="1" style="width:100%" border="0">
			<tr>
			  <th>Foto</th>
			  <th>Nama Barang</th>
			  <th style="text-align:center"></th>

			</tr>
			<?php 
			foreach($this->cart->contents() as $items)
			{?>
			 <form method="post" action="<?php echo base_url();?>pinjam/update/<?php echo $items['rowid'];?>">
			 	<tr>
			 		<td><?php $query="select * from barang where id_barang='$items[id]'";
				 		$row=mysql_query($query);
				 		$row=mysql_fetch_row($row);
				 		echo '<img src="data:image/jpeg;base64,'.base64_encode($row[4] ).'"width=100px height=100px>';?>
			 		<td><?php echo $items['name'];?></td>
				  	<td style="text-align:center"><input type="submit" value="Update" class="search-submit"></td>
			 	</tr>
			 </form>
			<?php };?>
		</table>
		<a href="<?php echo base_url();?>page/pinjam" class="search-submit" style="float:left; width:80px; text-align:center">Pinjam Lagi</a>
		<a href="<?php echo base_url();?>page/datadiri" class="search-submit" style="float:left; margin-left:20px; text-align:center">Selesai</a>	
    </div>
    <div>
    	
    </div>
    
	<?php 
		if ($this->cart->total()==0)echo "anda belum meminjam apapun";
	?>
      <!-- End Products -->
</div>
    <!-- End Content -->

    
   
