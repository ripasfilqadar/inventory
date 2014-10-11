<?php
class Page extends CI_Controller
{
	public function Page()
	{
		parent::__construct();
		$this->load->model('barang');
		$this->load->library('pagination');
		$this->load->library('cart');
	}
	function index()
	{
		$this->pinjam();
	}
	public function pinjam()
	{
		$data['base_url'] = 'http://localhost/invent/page/pinjam/';
		$jml=$this->db->get('barang');
		$jml=$jml->num_rows();
		$data['total_rows'] = $jml;
		$data['per_page'] = 15;
		$this->pagination->initialize($data);
		$data['flag']=0;
		$data['adminflag']=0;
		$id=0;
		$data['flagkiri']=1;
		$data['halaman']=$this->pagination->create_links();
		$data['barang']=$this->barang->get_barang($data['per_page'],$id);
		$this->load->view('header');
		$this->load->view('indexkiri',$data);
		$this->load->view('atas',$data);
		$this->load->view('pinjam',$data);
	}

	public function datadiri()
	{
		$data['flagkiri']=0;
		$this->load->view('header');
		$this->load->view('indexkiri',$data);
		$this->load->view('datadiri');
	}
	public function list_pinjam()
	{
		$data['data']=$this->barang->list_peminjaman();
		$data['flag']=0;
		$data['flagkiri']=2;
		$this->load->view('header');
		$this->load->view('indexkiri',$data);
		$this->load->view('admin/list_pinjam',$data);
	}

	public function detail_pinjam()
	{
		$data['flagkiri']=0;
		$this->load->view('header');
		$this->load->view('indexkiri',$data);
		$this->load->view('detail_pinjam');
	}
	
	function login()
	{
		$data['flagkiri']=4;
		$this->load->view('header');
		$this->load->view('indexkiri',$data);
		$this->load->view('login');

	}
}
