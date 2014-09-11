<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Halaman extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	function __construct() {
		parent::__construct();
		$this->load->model('pesan');
	}

	public function index()
	{
		$data['judul'] = "Selamat Datang di Halaman Utama";
		$this->load->view('header',$data);
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function jadwal()
	{
		$data['judul'] = "Jadwal Pelaksanaan PPDB Sidoarjo 2014";
		$this->load->view('header',$data);
		$this->load->view('jadwal');
		$this->load->view('footer');
	}

	public function kontak()
	{
		$data['judul'] = "Kontak";
		$this->load->view('header',$data);
		$this->load->view('kontak');
		$this->load->view('footer');
	}

	public function kirimPesan()
	{
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$pesan = $this->input->post('pesan');
		$error = '';
		if(!$nama) {
			$error .= 'Please enter your name.<br />';
		}

		if(!$email) {
			$error .= 'Please enter an e-mail address.<br />';
		}

		if($email) {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error .= 'Please enter a valid e-mail address.<br />';
			}
		}

		if(!$pesan) {
			$error .= "You don't have anything to say?<br />";
		}
		
		if(!$error) {
			$tes = $this->pesan->insertPesan($nama,$email,$pesan);
			echo $tes;

		}
		else {
			echo '<div class="alert alert-error">'.$error.'</div>';
		}
	}

	public function error()
	{
		$this->load->view('header');
		$this->load->view('not-found-404');
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */