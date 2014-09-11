<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ranking extends CI_Controller {

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
		$this->load->model('rankingmodel');
	}

	public function selectSMA() {
		$sekolah = $this->input->post('sekolah');
		redirect("ranking/sma/$sekolah");
	}

	public function selectSMP() {
		$sekolah = $this->input->post('sekolah');
		redirect("ranking/smp/$sekolah");
	}

	public function selectSMK() {
		$sekolah = $this->input->post('sekolah');
		redirect("ranking/smk/$sekolah");
	}

	public function selectSiswa() {
		$no_ujian = $this->input->post('no_ujian');
		redirect("ranking/siswa/$no_ujian");
	}

	public function index() {
		$data['judul'] = "Ranking Siswa";
		$data['smas'] = $this->rankingmodel->getSMA();
		$data['smps'] = $this->rankingmodel->getSMP();
		$data['smks'] = $this->rankingmodel->getSMK();
		$this->load->view('header',$data);
		$this->load->view('ranking/sekolah',$data);
		$this->load->view('footer');
	}

	public function sma($ID_SEKOLAH=0)
	{
		$data['nama_sekolah'] = 0;
		if ($ID_SEKOLAH == 0) {
			$data['ranks'] = 0;
		}
		else {
			$data['ranks'] = $this->rankingmodel->rankSMA($ID_SEKOLAH);
			$data['nama_sekolah'] = $this->rankingmodel->namaSekolah($ID_SEKOLAH);
		}
		$data['sekolahs'] = $this->rankingmodel->getSMA();
		$data['judul'] = "Ranking SMA";
		$this->load->view('header',$data);
		$this->load->view('ranking/sma',$data);
		$this->load->view('footer');
	}

	public function smp($ID_SEKOLAH=0)
	{
		$data['nama_sekolah'] = 0;
		if ($ID_SEKOLAH == 0) {
			$data['ranks'] = 0;
		}
		else {
			$data['ranks'] = $this->rankingmodel->rankSMP($ID_SEKOLAH);
			$data['nama_sekolah'] = $this->rankingmodel->namaSekolah($ID_SEKOLAH);
		}
		$data['sekolahs'] = $this->rankingmodel->getSMP();
		$data['judul'] = "Ranking SMP";
		$this->load->view('header',$data);
		$this->load->view('ranking/smp',$data);
		$this->load->view('footer');
	}

	public function smk($ID_SEKOLAH=0)
	{
		$data['nama_sekolah'] = 0;
		if ($ID_SEKOLAH == 0) {
			$data['ranks'] = 0;
		}
		else {
			$data['ranks'] = $this->rankingmodel->rankSMK($ID_SEKOLAH);
			$data['nama_sekolah'] = $this->rankingmodel->namaSekolah($ID_SEKOLAH);
		}
		$data['sekolahs'] = $this->rankingmodel->getSMK();
		$data['judul'] = "Ranking SMK";
		$this->load->view('header',$data);
		$this->load->view('ranking/smk',$data);
		$this->load->view('footer');
	}

	public function siswa($NO_UJIAN=0)
	{
		if ($NO_UJIAN == 0) {
			$data['detail'] = 0;
		}
		else {
			$data['detail'] = $this->rankingmodel->detailSiswa($NO_UJIAN);
		}
		$data['judul'] = "Ranking Siswa";
		$this->load->view('header',$data);
		$this->load->view('detail_siswa',$data);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */