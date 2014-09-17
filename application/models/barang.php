<?php
class Barang extends CI_Model
{
	function Barang()
	{
		parent::__construct();
	}
	function get_barang()
	{
		$query = $this->db->get_where('barang');
		return $query->result();
	}
	function get_barang3($id)
	{
		$query = $this->db->get_where('barang', array('id_barang' => $id));
		return $query->row();
	}
	function detail_peminjaman($id)
	{
		$query="SELECT b.`nama_barang`, b.`keadaan` FROM peminjaman p, detail_peminjaman dp, barang b WHERE dp.`id_peminjaman`=$id AND b.`id_barang`= dp.`id_barang` AND dp.`id_peminjaman`=p.`id_peminjaman`";
		$query=$this->db->query($query);
		return $query->result_array();
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
			$query="insert into detail_peminjaman values ('$items[id]','$a')";
			$this->db->query($query);
			$query="update barang set status=2 where id_barang='$items[id]'";
			$this->db->query($query);
		}
		
		$tgl = Date("Y-m-d H:i:s");
		$query="insert into peminjaman values ('$a','$nrp', '$nama','$tgl','$tb')";
		$query=$this->db->query($query);
		return $a;
	}

	public function list_peminjaman()
	{
		$query="select * from peminjaman";
		$query=$this->db->query($query);
		return $query->result();
	}
	public function acc_barang($id)
	{
		$query="update peminjaman";
	}
	function detail_transaksi($id)
	{
		$query="SELECT b.* FROM detail_peminjaman dp, barang b WHERE dp.`id_peminjaman`=$id AND b.`id_barang`=dp.`id_barang`";
		$query=$this->db->query($query);
		return $query->result();
	}
	
}