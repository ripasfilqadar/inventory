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
		$data['barang2']=$this->barang->get_barang2();
		$this->load->view('header');
		$this->load->view('pinjam',$data);
	}

	public function datadiri()
	{

		$this->load->view('header');
		$this->load->view('datadiri');
	}
}
