<?php
class Admin extends CI_Controller
{
	function Admin ()
	{
		parent::__construct();
		$this->load->model('barang');
		$this->load->helper('file');
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
		$this->form_validation->set_rules('name', 'Nama', 'required');
		if ($this->form_validation->run()==FALSE)
		{
				$data['flagheader']=2;
				$this->load->view('admin/header');
				$this->load->view('admin/kiriadmin',$data);
				$this->load->view('admin/tambah_barang');
		}
		else
		{
			$this->cek_login();
			$id=random_string('alnum', 10);
			$name=$this->input->post('name');
			$status=$this->input->post('status');
			$kondisi=$this->input->post('kondisi');
			$data = array(
		   'id_barang' => $id ,
		   'nama_barang' =>$name ,
		   'keadaan' => $kondisi,
		   'status'=>$status,
		);

		$this->barang->tambah($data);
		$this->do_upload($id);
		redirect('admin_page/list_barang');
		}
		
	}
	function do_upload($id)
	{
		$config['file_name']="$id.png";
		$config['upload_path'] = './picture/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '4000';
		$config['max_width']  = '2048';
		$config['max_height']  = '1600';
		$this->upload->initialize($config);
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

		}
		return $config['file_name'];
	}
	function edit_barang($a)
	{
		$this->cek_login();
		$nama=$this->input->post('nama');

		$data=array(
			'nama_barang' => $this->input->post('nama'),
			'status' => $this->input->post('status'),
			'keadaan' => $this->input->post('kondisi'));
		$b=$this->barang->edit($data,$a);
		redirect('admin_page/list_barang');
	}
	public function editphoto($id)
	{
		$this->cek_login();
		$this->hapusfoto($id);
		$nama=$this->do_upload($id);
		//$this->edit_barang_page($id);
		redirect ("admin/edit_barang_page/$id");

	}
	public function hapusfoto($id)
	{
		$path="./picture/$id.png";
		if (unlink($path));
	}
	public function hapus($id)
	{
		$this->cek_login();
		$this->hapusfoto($id);
		$this->barang->hapus($id);
		redirect('admin_page/list_barang');
	}
	function edit_barang_page($id=0)
	{/*
		if ($id==0)
		{
			redirect('admin_page/list_barang');
		}*/
		$data['data']=$this->barang->get_barang3($id);
		$data['flagheader']=0;
		$this->load->view('admin/header');
		$this->load->view('admin/kiriadmin',$data);
		$this->load->view('admin/edit_barang',$data);
	}
}

