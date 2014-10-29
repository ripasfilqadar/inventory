<?php
class Admin_page extends CI_Controller
{
	function Admin_page()
	{
		parent::__construct();
		$this->load->model('barang');
		$this->load->library('cart');
		$this->cek_login();
	}
	public function cek_login()
	{
		if($this->session->userdata('user_id')==NULL)
		{
			redirect ('page/login');
		}
		
	}
	public function list_pinjam()
	{
		
		$data['data']=$this->barang->list_peminjaman();
		$data['flagheader']=1;
		$data['flag']=1;
		$this->load->view('admin/header');
		$this->load->view('admin/kiriadmin',$data);
		$this->load->view('admin/list_pinjam',$data);
	}
	public function detail_pinjam($id)
	{

		$data['barang']= $this->barang->detail_transaksi($id);
		$data['flag']=$this->barang->flag_transaksi($id);
		$data['id']=$id;
		$data['flagheader']=0;
		$this->load->view('admin/header');
		$this->load->view('admin/kiriadmin',$data);
		$this->load->view('admin/detail_pinjam',$data);
	}
	public function tambah_barang()
	{
		$data['flagheader']=2;
		$this->load->view('admin/header');
		$this->load->view('admin/kiriadmin',$data);
		$this->load->view('admin/tambah_barang');
	}
		public function list_barang($id=0)
	{
			$data['base_url'] = 'http://localhost/invent/admin_page/list_barang/';
			$jml=$this->db->get('barang');
			$jml=$jml->num_rows();
			$data['total_rows'] = $jml;
			$data['per_page'] = 15;
			$this->pagination->initialize($data);
			$data['flag']=0;
			$data['adminflag']=0;			
			$data['flagkiri']=1;
			$data['flagheader']=2;
			$data['halaman']=$this->pagination->create_links();
			$data['barang']=$this->barang->get_barang($data['per_page'],$id);
			$this->load->view('admin/header');
			$this->load->view('admin/kiriadmin',$data);
			$this->load->view('admin/pinjam',$data);;
	}
	
}