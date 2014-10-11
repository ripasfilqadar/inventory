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
		$data['flagkiri']=0;
		//$this->barang->update_status($id);
		$this->cart->insert($data);
		$this->load->view('header');
		$this->load->view('indexkiri',$data);
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
		$this->loadd->view('detail_pinjam',$data);
	}


	public function finish()
	{

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nrp', 'Alamat', 'required');
		$this->form_validation->set_rules('no_hp', 'No HP', 'required');
/*
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
			{*/
				$nama=$this->input->post('nama');
				$nrp=$this->input->post('nrp');
				$no_hp=$this->input->post('no_hp');;
				$a=$this->barang->finish($nama,$nrp,$no_hp);
				
				$this->bukti($a);
				$this->cart->destroy();/*
			}
		
		}*/
	}
	public function bukti($a)
	{
		$pdfku = new Cezpdf("A5", 'landscape'); //595.28,841.29
		
        $pdfku->addInfo('Title','List Barang');
        $pdfku->ezSetCmMargins("3","3","3","3");
        $barang= $this->barang->detail_peminjaman($a);
        $pdfku->ezSetY(100);
        $pdfku->ezSetDy(230);
        //$pdfku->addJpegFromFile("icon.jpg",20,300,-1);
        $pdfku->addText(120,($pdfku->y)+30,18,"Bukti Peminjaman Inventaris Laboratorium");
        $pdfku->addText(160,($pdfku->y)+10,15,"Komputasi Berbasis Jaringan (KBJ)");
        $cols_db=
        array
        (
        	'id_barang' => 'ID Barang',
            'nama_barang'=>'Nama Barang'
        );
        
        $option_db=
        array
        (
            'showHeadings'=>2,'shaded'=>0,'xPos'=>'center','xOrientation'=>'center','fontSize' => 12,
            'cols'=>array
            (
                'id_barang'=>array
                (
                    'justification'=>'center',
                    'width'=>'120'
                ),
                    'nama_barang'=>array
                (
                    'justification'=>'center',
                    'width'=>'120'
                )
            )
        );

		$pdfku->ezTable( $barang, $cols_db, '', $option_db);
        $pdfku->addText(100,($pdfku->y)-40,12,"Mengetahui ");
        $pdfku->addText(90,($pdfku->y)-60,12,"Administrator Lab");
        $pdfku->addText(400,($pdfku->y)-60,12,"Kepala Laboratorium");
        $pdfku->addText(80,($pdfku->y)-130,10,"__________________");
        $pdfku->addText(400,($pdfku->y)-130,10,"__________________");
     

        $pdfku->ezStream();
	}

	function hapus_barang($id)
	{
		$data = array(
               'rowid'      => $id,
               'qty'     => 0
            );
		$flag['flagkiri']=0;
		$this->cart->update($data);
		$this->cart->insert($data);
		$this->load->view('header');
		$this->load->view('indexkiri',$flag);
		$this->load->view('detail_pinjam');
	}

}
