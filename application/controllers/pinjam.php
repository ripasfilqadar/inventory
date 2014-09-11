<?php 
class Pinjam extends CI_Controller
{
	function Pinjam()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('barang');
	}
	function pinjam_barang($id)
	{
		$a=$this->barang->get_barang3($id);
		$nama=$a->nama_barang;
		$b=$this->barang->ubahstok($id,1);

		$data = array(
               'id'      => $id,
               'qty'     => 1,
               'price' => 1,
               //'price'   => $a->harga_baju,
               'name'    => $nama
            );
	

		$this->cart->insert($data);
		$this->load->view('header');
		$this->load->view('detail_pinjam');
	}

	public function update($id)
	{
		$qty=$this->input->post('qty');
		$data = array(
               'rowid' => $id,
               'qty'   => $qty
            );
		
		$this->cart->update($data);
		$data['return']=$this->cart->total();
		$this->load->view('header',$data);
		$this->load->view('detail_pinjam',$data);
	}


	public function finish()
	{

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nrp', 'Alamat', 'required');
		$this->form_validation->set_rules('no_hp', 'No HP', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header');
			//$this->load->view('slider',$data);
			$this->load->view('datadiri');
			
		}

		else
		{
			$nama=$this->input->post('nama');
			$nrp=$this->input->post('nrp');
			$no_hp=$this->input->post('no_hp');;
			$a=$this->barang->finish($nama,$nrp,$no_hp);
			$this->cart->destroy();
		}
		
		
	}
}