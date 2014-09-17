<?php
class Page extends CI_Controller
{
	public function Page()
	{
		parent::__construct();
		$this->load->model('barang');
	}
	public function pinjam()
	{
		$data['barang']=$this->barang->get_barang();
		$this->load->view('header');
		$this->load->view('pinjam',$data);
	}

	public function datadiri()
	{

		$this->load->view('header');
		$this->load->view('datadiri');
	}
	public function list_pinjam()
	{
		$data['data']=$this->barang->list_peminjaman();
		$this->load->view('header');
		$this->load->view('admin/list_pinjam',$data);
	}
	public function detail_pinjam($id)
	{
		$data['barang']= $this->barang->detail_transaksi($id);
		$data['id']=$id;
		$this->load->view('header');
		$this->load->view('admin/detail_pinjam',$data);
	}
}
