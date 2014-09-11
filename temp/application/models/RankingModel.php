<?php 
class RankingModel extends CI_Model{
    public function __construct(){
        parent:: __construct();
    }

    public function namaSekolah($ID_SEKOLAH){
    	$db1 = $this->load->database('default',true);
		$query=$db1->query("SELECT NAMA_SEKOLAH FROM PAGU_SEKOLAH WHERE ID_SEKOLAH = $ID_SEKOLAH");
		if ($query) {
			return $query->row();
		}
		else {
			return null;
		}
		$db1->close();
	}

    public function getSMA(){
    	$db1 = $this->load->database('default',true);
		$query=$db1->query("SELECT ID_SEKOLAH, NAMA_SEKOLAH FROM PAGU_SEKOLAH WHERE NAMA_SEKOLAH like('%SMA%')");
		if ($query) {
			return $query->result_array();
		}
		else {
			return null;
		}
		$db1->close();
	}

	public function getSMP(){
		$db1 = $this->load->database('default',true);
		$query=$db1->query("SELECT ID_SEKOLAH, NAMA_SEKOLAH FROM PAGU_SEKOLAH WHERE NAMA_SEKOLAH like('%SMP%')");
		if ($query) {
			return $query->result_array();
		}
		else {
			return null;
		}
		$db1->close();
	}

	public function getSMK(){
		$db1 = $this->load->database('default',true);
		$query=$db1->query("SELECT ID_SEKOLAH, NAMA_SEKOLAH FROM PAGU_SEKOLAH WHERE NAMA_SEKOLAH like('%SMK%')");
		if ($query) {
			return $query->result_array();
		}
		else {
			return null;
		}
		$db1->close();
	}

	public function rankSMA($ID_SEKOLAH){
		$db1 = $this->load->database('default',true);
		$query=$db1->query("SELECT NO_UJIAN, NAMA, ASAL_SEKOLAH, NILAI_AKHIR FROM TERIMA_SMA_2 WHERE DITERIMA = '$ID_SEKOLAH' order by NILAI_AKHIR desc");
		if ($query) {
			return $query->result_array();
		}
		else {
			return null;
		}
		$db1->close();
	}

	public function rankSMP($ID_SEKOLAH){
		$db1 = $this->load->database('default',true);
		$query=$db1->query("SELECT NO_UJIAN, NAMA, ASAL_SEKOLAH, NILAI_AKHIR FROM TERIMA_SMP_2 WHERE DITERIMA = '$ID_SEKOLAH' order by NILAI_AKHIR desc");
		if ($query) {
			return $query->result_array();
		}
		else {
			return null;
		}
		$db1->close();
	}

	public function rankSMK($ID_SEKOLAH){
		$db1 = $this->load->database('default',true);
		$query=$db1->query("SELECT NO_UJIAN, NAMA, ASAL_SEKOLAH, NILAI_AKHIR FROM TERIMA_SMK_2 WHERE DITERIMA = '$ID_SEKOLAH' order by NILAI_AKHIR desc");
		if ($query) {
			return $query->result_array();
		}
		else {
			return null;
		}
		$db1->close();
	}

	public function rankSiswa($NO_UJIAN){
		$db1 = $this->load->database('default',true);
		$query=$db1->query("select t.no_ujian, t.asal_sekolah, t.nama, p.NAMA_SEKOLAH from terima_sma_2 t, pagu_sekolah p  where t.DITERIMA = p.ID_SEKOLAH and no_ujian = '$NO_UJIAN'");
		if ($query) {
			return $query->result_array();
		}
		else {
			return null;
		}
		$db1->close();
	}

	public function detailSiswa($NO_UJIAN){
		$db1 = $this->load->database('default',true);
		$query=$db1->query("select t.NO_UJIAN, t.NAMA, t.ASAL_SEKOLAH, t.TGL_LAHIR, t.BIND, t.MAT, t.IPA, t.BING, t.NILAI_AKHIR, t.PILIHAN, t.RANKING, p.NAMA_SEKOLAH from terima_sma_2 t, pagu_sekolah p  where t.DITERIMA = p.ID_SEKOLAH and t.NO_UJIAN = '$NO_UJIAN'");
		if ($query) {
			return $query->result_array();
		}
		else {
			return null;
		}
		$db1->close();
	}

	public function detailStatusSiswa($NO_UJIAN,$jenjang){
		if (empty($jenjang)) {
			$jenjang = "smp";
		}
		$db2 = $this->load->database('master',true);
		$query = "select * from master_un_$jenjang where no_ujian = '$NO_UJIAN'";
		$query=$db2->query($query);
		if ($query) {
			return $query->result_array();
		}
		else {
			return null;
		}
		$db2->close();
	}
}
