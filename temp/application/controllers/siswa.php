<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends CI_Controller {

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

	public function selectSiswa() {
		$no_ujian = $this->input->post('no_ujian');
		$jenjang = $this->input->post('jenjang');
		redirect("siswa/detail/$no_ujian/$jenjang");
	}
	public function index() {
		$this->detail(0);
	}

	public function detail($NO_UJIAN=0,$jenjang=0)
	{
		if (empty($NO_UJIAN) || empty($jenjang)) {
			$data['detail'] = 0;
		}
		else {
			$data['detail'] = $this->rankingmodel->detailStatusSiswa($NO_UJIAN,$jenjang);
		}
		$data['judul'] = "Detail Siswa";
		$this->load->view('header',$data);
		$this->load->view('detail_status_siswa',$data);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */