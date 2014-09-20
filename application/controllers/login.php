<?php

class Login extends CI_Controller
{
	function Login()
	{
		parent::__construct();
		//$this->load->model('admin');
		$this->load->library('session');
		$this->load->model('user');
	}
	function index()
	{
		$this->load->view('login');
	}
	function masuk()
	{
		$id=$this->input->post('name');
		$password=$this->input->post('password');
		$a=$this->user->check($id, $password);
		if ($a>0)
		{
			$data= array ('user_id'=> $id);
			$this->session->set_userdata($data);
			$this->load->view('header');
		}
		elseif ($a==0)
		{
			redirect('login');
		}
	}
	function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->sess_destroy();
		redirect('page/pinjam');
	}
}