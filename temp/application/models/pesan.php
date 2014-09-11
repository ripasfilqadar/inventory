<?php 
class Pesan extends CI_Model{
    public function __construct(){
        parent:: __construct();
        $this->load->database('default',true);
    }

	public function insertPesan($nama,$email,$pesan){
		$data = array(
			'waktu' => date('Y-m-d H:i:s') ,
			'nama' => $nama ,
			'email' => $email ,
			'pesan' => $pesan
		);

		if ($this->db->insert('pesan', $data)) {
			return "OK";
		}
		else {
			return "gagal";
		}
	}
}
