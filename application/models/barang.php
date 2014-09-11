<?php
class Barang extends CI_Model
{
	function Barang()
	{
		parent::__construct();
	}
	function get_barang()
	{
		$query = $this->db->get_where('barang', array('status' => 1));
		return $query->result();
	}
	function get_barang3($id)
	{
		$query = $this->db->get_where('barang', array('id_barang' => $id));
		return $query->row();
	}
	function get_barang2()
	{
		$query = $this->db->get_where('barang', array('status' => 0));
		return $query->result();
	}
	function ubahstok($id, $qty)
    {
        $query="update barang set stok=stok -$qty where id_barang=$id";
        $query=$this->db->query($query);
    }

    function finish($nama,$nrp,$no_hp)
	{
		$query="SELECT MAX(id_peminjaman) AS MAX FROM peminjaman";
		$query=$this->db->query($query);
		$id=$query->row();
		$a=$id->MAX +1;
		$b=0;
		$c=0;
		$tb=0;
		foreach ($this->cart->contents() as $items)
		{
			$total=$items['qty']*$items['price'];
			$query="insert into detailpeminjaman values ('$a', '$items[id]',$items[qty])";
			$this->db->query($query);	
			$b=$b+$total;
			$query2="update barang set stok=stok - $items[qty] where id_barang=$items[id]";
			$query2=$this->db->query($query2);
			$tb=$tb+$items['qty'];
		}
		
		$tgl = Date("Y-m-d H:i:s");
		$query="insert into peminjaman values ('$a','$nrp', '$nama','$tb','$tgl')";
		if ($query=$this->db->query($query)) return true;
		else
		{
			$a=$a+1;
			$query="insert into peminjaman values ('$a','$nrp', '$nama','$tb','$tgl')";
			$query=$this->db->query($query);
		}
		return $a;

	}
	
}