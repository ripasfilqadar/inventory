<?php
class Admin extends CI_Controller
{
	function Admin ()
	{
		parent::__construct();
		$this->load->model('barang');
	}
	function index()
	{
		$this->load->view('admin/header');

	}
	public function cek_login()
	{
		if($this->session->userdata('user_id')==NULL)
		{
			redirect ('page/login');
		}
		
	}
	public function acc($id)
	{
		$this->cek_login();
		$this->barang->acc_barang($id);
		$data['data']=$this->barang->list_peminjaman();
		redirect('admin_page/list_pinjam');
	}
	public function tolak($id)
	{
		$this->cek_login();
		$this->barang->tolak_barang($id);
		$data['data']=$this->barang->list_peminjaman();
		redirect('admin_page/list_pinjam');
	}
	function tambah_barang()
	{
		$this->cek_login();
		$id=$this->input->post('id');
		$name=$this->input->post('name');
		$status=$this->input->post('status');
		$kondisi=$this->input->post('kondisi');
		$foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
		$data = array(
		   'id_barang' => $id ,
		   'nama_barang' =>$name ,
		   'keadaan' => $kondisi,
		   'status'=>$status,
		   'foto' => $foto
		   
		);

		$this->barang->tambah($data);
		redirect('admin_page/list_barang');
	}
	function edit_barang($a)
	{
		$this->cek_login();
		$nama=$this->input->post('nama');
		$status=$this->input->post('harga');
		$kondisi=$this->input->post('diskon');
		$data=array(
			'nama_barang' => $nama,
			'keadaan' => $kondisi,
			'status' => $status);
		$b=$this->barang->edit($data,$a);
		redirect('admin_page/list_barang');
	}
	public function editphoto($id)
	{
		$this->cek_login();
		$foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
		$this->barang->editphoto($id, $foto);
		redirect("admin_page/edit_barang/$id");

	}
}

