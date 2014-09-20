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
		$data['flag']=0;
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
		$data['flag']=0;
		$this->load->view('header');
		$this->load->view('admin/list_pinjam',$data);
	}
	
}
