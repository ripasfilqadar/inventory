<?php 
class Pinjam extends CI_Controller
{
	function Pinjam()
	{
		parent::__construct();
		$this->load->helper('mydb');
        $this->load->library('cezpdf');
		$this->load->library('cart');
		$this->load->model('barang');
	}
	function pinjam_barang($id)
	{
		$a=$this->barang->get_barang3($id);
		$nama=$a->nama_barang;

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
			if ($this->cart->total_items()==0)
			{
				redirect('page/pinjam');
			}
			else
			{
				$nama=$this->input->post('nama');
				$nrp=$this->input->post('nrp');
				$no_hp=$this->input->post('no_hp');;
				$a=$this->barang->finish($nama,$nrp,$no_hp);
				
				$this->bukti($a);
				$this->cart->destroy();
			}
		
		}
	}
	public function bukti($a)
	{
		$pdfku = new Cezpdf("A4", 'portrait'); //595.28,841.29
        $pdfku->addInfo('Title','List Barang');
        $pdfku->ezSetCmMargins("3.5","3","3","3");
        $barang= $this->barang->detail_peminjaman($a);
        $pdfku->ezSetY(760);
        $pdfku->ezSetDy(-20);
        $pdfku->addText(20,($pdfku->y)+25,10,"Terima kasih sudah melakukan peminjaman");
        $cols_db=
        array
        (
            'nama_barang'=>'Nama Barang',
            'kondisi'=>'Kondisi',
        );

        $option_db=
        array
        (
            'showHeadings'=>1,'shaded'=>0,'xPos'=>'center','xOrientation'=>'center','fontSize' => 10,
            'cols'=>array
            (
                'nama_barang'=>array
                (
                    'justification'=>'center',
                    'width'=>'120'
                ),
                'kondisi'=>array
                (
                    'justification'=>'center',
                    'width'=>'100'
                )
            )
        );
        $pdfku->ezTable( $barang, $cols_db, '', $option_db);
        $pdfku->addText(10,($pdfku->y)-40,10," Harap cetak file ini  dan disimpan sebagai bukti peminjaman anda");
       $pdfku->addText(10,($pdfku->y)-50,10,"untuk keterangan lebih lanjut silahkan hubungi admin. terima kasih");

        $pdfku->ezStream();
	}


}