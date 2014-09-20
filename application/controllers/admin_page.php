<?php
class Admin_page extends CI_Controller
{
	function Admin_page()
	{
		parent::__construct();
		$this->load->model('barang');
	}
	public function list_pinjam()
	{
		$data['data']=$this->barang->list_peminjaman();
		$data['flag']=1;
		$this->load->view('admin/header');
		$this->load->view('admin/list_pinjam',$data);
	}
	public function detail_pinjam($id)
	{
		$data['barang']= $this->barang->detail_transaksi($id);
		$data['flag']=$this->barang->flag_transaksi($id);
		$data['id']=$id;
		$this->load->view('admin/header');
		$this->load->view('admin/detail_pinjam',$data);
	}
	public function tambah_barang()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/tambah_barang');
	}
		public function list_barang()
	{
		$data['barang']=$this->barang->get_barang();
		$data['flag']=1;
		$this->load->view('admin/header');
		$this->load->view('pinjam',$data);
	}
	function edit_barang($id)
	{
		$data['data']=$this->barang->get_barang3($id);
		$this->load->view('admin/header');
		$this->load->view('admin/edit_barang',$data);
	}
}