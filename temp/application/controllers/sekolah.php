<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sekolah extends CI_Controller {

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
		$data['judul'] = "Halaman Utama | Jadwal Pelaksanaan | Kontak";
		$this->load->view('header',$data);
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function sma() {
		$data['judul'] = "Sekolah SMA Sidoarjo";
		$this->load->view('header',$data);
		$this->load->view('sekolah/sma');
		$this->load->view('footer');	
	}

	public function smp() {
		$data['judul'] = "Sekolah SMP Sidoarjo";
		$this->load->view('header',$data);
		$this->load->view('sekolah/smp');
		$this->load->view('footer');	
	}

	public function smk() {
		$data['judul'] = "Sekolah SMK Sidoarjo";
		$this->load->view('header',$data);
		$this->load->view('sekolah/smk');
		$this->load->view('footer');	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */