<?php
class Barang extends CI_Model
{
	function Barang()
	{
		parent::__construct();
	}
	function get_barang($a,$b)
	{
		$query="select * from barang order by nama_barang limit $b,$a ";
		$query=$this->db->query($query);
		return $query->result();
	}
	function get_barang3($id)
	{
		$query = $this->db->get_where('barang', array('id_barang' => $id));
		return $query->row();
	}
	function detail_peminjaman($id)
	{
		$query="SELECT b.* FROM peminjaman p, detail_peminjaman dp, barang b WHERE dp.`id_peminjaman`=$id AND b.`id_barang`= dp.`id_barang` AND dp.`id_peminjaman`=p.`id_peminjaman`";
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
		$query="insert into peminjaman values ('$a','$nama', '$nrp','$tgl','$tb',0)";
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
		$query="update peminjaman set status_peminjaman=1 where id_peminjaman='$id'";
		$query=$this->db->query($query);
	}
	public function tolak_barang($id)
	{
		$query="update peminjaman set status_peminjaman=2 where id_peminjaman='$id'";
		$query=$this->db->query($query);
	}
	function detail_transaksi($id)
	{
		$query="SELECT b.* FROM detail_peminjaman dp, barang b WHERE dp.`id_peminjaman`=$id AND b.`id_barang`=dp.`id_barang`";
		$query=$this->db->query($query);
		return $query->result();
	}
	function flag_transaksi($id)
	{
		$query="select status_peminjaman from peminjaman where id_peminjaman='$id'";
		$query=$this->db->query($query);
		return $query->row();
	}
	function tambah($data)
	{
		$this->db->insert('barang', $data); 
	}
	function edit($data,$id)
	{
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data); 

	}
	function editphoto($id,$nama)
	{
		$data = array(
               'id_barang' => $nama
            );

		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data); 

	}
	function update_status($id)
	{
		$data=array(
			'status'=>3);
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data);
	}
	function hapus($id)
	{
		$this->db->where('id_barang', $id);
		$this->db->delete('barang'); 
	}
	
}