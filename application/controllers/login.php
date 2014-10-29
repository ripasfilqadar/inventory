<?php

class Login extends CI_Controller
{
	function Login()
	{
		parent::__construct();
		//$this->load->model('admin');
		$this->load->library('session');
		$this->load->model('user');
		$this->load->library('cart');
		$this->load->model('barang');
	}
	function index()
	{
		$this->load->view('login');
	}
	function masuk()
	{
		$id=$this->input->post('nama');
		$password=$this->input->post('password');
		$a=$this->user->check($id, $password);
		$data['flagkiri']=0;
		$data['adminflag']=1;
		if ($a==1)
		{
			$data= array ('user_id'=> $id, 'status_admin'=>$a);
			$this->session->set_userdata($data);
			redirect ('admin_page/list_barang');
		}
		elseif ($a==2)
		{
		
			$data= array ('user_id'=> $id, 'status_admin'=>$a);
			$this->session->set_userdata($data);
			redirect ('admin_page/list_barang');
		}
		elseif ($a==0)
		{
			echo $a;
			redirect('page/login');
		}
	}
	function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->sess_destroy();
		redirect('page/pinjam');
	}
}