<?php

class Cetak extends CI_Controller
{
	function __construct()
	{
            parent::__construct();
            $this->load->helper('mydb');
            $this->load->library('cezpdf');
            $this->load->model('rankingmodel');
            $this->load->model('rankingmodeltahap2');
    }

	public function index()
	{
        $data['judul'] = "Cetak Data ";
        $data['smas'] = $this->rankingmodel->getSMA();
        $data['smps'] = $this->rankingmodel->getSMP();
        $data['smks'] = $this->rankingmodel->getSMK();
        $this->load->view('header',$data);
        $this->load->view('cetakpersekolah',$data);
        $this->load->view('footer');
	}

    public function selectSMA() {
        $sekolah = $this->input->post('sekolah');
        if (date('j') <= 30 && date('n') == 6 && date('Y') == 2014) {
            redirect("cetak/tahap1/sma/$sekolah");
        }
        elseif (date('j') <= 2 && date('n') == 7 && date('Y') == 2014) {
            redirect("cetak/tahap1/sma/$sekolah");
        }
        else {
            redirect("cetak/tahap2/sma/$sekolah");
        }
    }

    public function selectSMP() {
        $sekolah = $this->input->post('sekolah');
        if (date('j') <= 30 && date('n') == 6 && date('Y') == 2014) {
            redirect("cetak/tahap1/smp/$sekolah");
        }
        elseif (date('j') <= 2 && date('n') == 7 && date('Y') == 2014) {
            redirect("cetak/tahap1/smp/$sekolah");
        }
        else {
            redirect("cetak/tahap2/smp/$sekolah");
        }
    }

    public function selectSMK() {
        $sekolah = $this->input->post('sekolah');
        if (date('j') <= 30 && date('n') == 6 && date('Y') == 2014) {
            redirect("cetak/tahap1/smk/$sekolah");
        }
        elseif (date('j') <= 2 && date('n') == 7 && date('Y') == 2014) {
            redirect("cetak/tahap1/smk/$sekolah");
        }
        else {
            redirect("cetak/tahap2/smk/$sekolah");
        }
    }

    public function tes() {
        if (date('j') <= 30 && date('n') == 6 && date('Y') == 2014) {
            echo "benar";
        }
        // echo strtoupper("SMP Negeri 2 Candi");
    }

    public function tahap1($jenjang,$ID_SEKOLAH)
    {
        function HeaderFooter(&$dpdf,$nama_sekolah,$jurusan)
        {
            $dpdf->addJpegFromFile("images/sidoarjo.jpg",32,762,60);
            $text = "<b>DAFTAR CALON SISWA YANG DITERIMA TAHAP I</b>";
	    $jurus = "PROGRAM KEAHLIAN ".strtoupper($jurusan);
            $school = "DI ".strtoupper($nama_sekolah);
            $tahun = "<b>TAHUN PELAJARAN 2014/2015</b>";
            $all = $dpdf->openObject();
            $dpdf->saveState();
            $dpdf->setStrokeColor(0,0,0,1);
            $dpdf->ezSetY(820);
            $dpdf->ezText($text,15,array('justification'=>'center'));
            $dpdf->ezText($school,15,array('justification'=>'center'));
	    if(!empty($jurusan)) {
	    	$dpdf->ezText($jurus,14,array('justification'=>'center'));
		$dpdf->ezText($tahun,15,array('justification'=>'center'));
		$dpdf->ezSetY(800);
	    }
	    else {
		$dpdf->ezText($tahun,15,array('justification'=>'center'));
		$dpdf->ezSetY(820);
	    }
            $dpdf->restoreState();
            $dpdf->closeObject();
            $dpdf->addObject($all,'all');
        }
        $pdfku = new Cezpdf("A4", 'portrait'); //595.28,841.29
        $pdfku->addInfo('Title','Hasil Rekapitulasi');
        $pdfku->addInfo('Author','PPDB HELPER');
        $pdfku->addInfo('Application','PPDB Online Kabupaten Sidoarjo');
        $pdfku->ezSetCmMargins("3.5","3","3","3");
        $nama_sekolah= $this->rankingmodel->namaSekolah($ID_SEKOLAH)->NAMA_SEKOLAH;
	if($jenjang == "smk") {
		$jurusan = $this->rankingmodel->namaSekolah($ID_SEKOLAH)->JURUSAN;
	}
	else {
		$jurusan = 0;
	}
        HeaderFooter($pdfku, $nama_sekolah, $jurusan);
        $pdfku->ezStartPageNumbers(146,35,9,'','Halaman {PAGENUM} dari {TOTALPAGENUM} Halaman',1);
        $pdfku->ezSetY(760);
        $pdfku->ezSetDy(-20);
        $data= $this->rankingmodel->cetakData($jenjang,$ID_SEKOLAH);
        if ($jenjang == "smp") {
            $namakolom = "NILAI SEKOLAH";
        }
        elseif ($jenjang == "sma") {
            $namakolom = "NILAI UJIAN NASIONAL";
        }
        else {
            $namakolom = "NILAI TERPADU";
        }

        $cols_db=
        array
        (
            'NO_URUT'=>'NO.',
            'NO_UJIAN'=>'NO. UJIAN',
            'NAMA'=>' NAMA',
            'ASAL_SEKOLAH'=>'ASAL SEKOLAH',
            'NILAI_AKHIR' => $namakolom,
            'PILIHAN' => 'PIL'
        );
        $option_db=
        array
        (
            'showHeadings'=>1,'shaded'=>0,'xPos'=>'center','xOrientation'=>'center','fontSize' => 10,
            'cols'=>array
            (
                'NO_URUT'=>array
                (
                    'justification'=>'center',
                    'width'=>'30'
                ),
                'NO_UJIAN'=>array
                (
                    'justification'=>'center',
                    'width'=>'70'
                ),
                'NAMA'=>array
                (
                    'justification'=>'justify',
                    'width'=>'180'
                ),
                'ASAL_SEKOLAH'=>array
                (
                    'justification'=>'justify',
                    'width'=>'130'
                ),
                'NILAI_AKHIR'=>array
                (
                    'justification'=>'center',
                )
                ,
                'PILIHAN'=>array
                (
                    'justification'=>'center',
                )
            )
        );
        $pdfku->ezTable( $data, $cols_db, '', $option_db);
        $pdfku->addText(390,($pdfku->y)-40,10,"SIDOARJO, 30 JUNI 2014");
        $pdfku->addText(390,($pdfku->y)-53,10,"KEPALA DINAS PENDIDIKAN");
        $pdfku->addText(390,($pdfku->y)-66,10,"KABUPATEN SIDOARJO");
        $pdfku->addText(390,($pdfku->y)-145,10,"<b>Drs. MUSTAIN, M.Pd.I</b>");
        $pdfku->addText(390,($pdfku->y)-157,10,"Pembina Tingkat I");
        $pdfku->addText(390,($pdfku->y)-170,10,"NIP. 19650311 199103 1 006");
        $pdfku->ezStream();
    }


    public function tahap1_custom($jenjang,$ID_SEKOLAH)
    {
        function HeaderFooter(&$dpdf,$nama_sekolah,$jurusan)
        {
            $dpdf->addJpegFromFile("images/sidoarjo.jpg",32,762,60);
            $text = "<b>DAFTAR CALON SISWA YANG DITERIMA TAHAP I</b>";
	    $jurus = "PROGRAM KEAHLIAN ".strtoupper($jurusan);
            $school = "DI ".strtoupper($nama_sekolah);
            $tahun = "<b>TAHUN PELAJARAN 2014/2015</b>";
            $all = $dpdf->openObject();
            $dpdf->saveState();
            $dpdf->setStrokeColor(0,0,0,1);
            $dpdf->ezSetY(820);
            $dpdf->ezText($text,15,array('justification'=>'center'));
            $dpdf->ezText($school,15,array('justification'=>'center'));
	    if(!empty($jurusan)) {
	    	$dpdf->ezText($jurus,14,array('justification'=>'center'));
		$dpdf->ezText($tahun,15,array('justification'=>'center'));
		$dpdf->ezSetY(800);
	    }
	    else {
		$dpdf->ezText($tahun,15,array('justification'=>'center'));
		$dpdf->ezSetY(820);
	    }
            $dpdf->restoreState();
            $dpdf->closeObject();
            $dpdf->addObject($all,'all');
        }
        $pdfku = new Cezpdf("A4", 'portrait'); //595.28,841.29
        $pdfku->addInfo('Title','Hasil Rekapitulasi');
        $pdfku->addInfo('Author','PPDB HELPER');
        $pdfku->addInfo('Application','PPDB Online Kabupaten Sidoarjo');
        $pdfku->ezSetCmMargins("3.5","7","3","3");
        $nama_sekolah= $this->rankingmodel->namaSekolah($ID_SEKOLAH)->NAMA_SEKOLAH;
	if($jenjang == "smk") {
		$jurusan = $this->rankingmodel->namaSekolah($ID_SEKOLAH)->JURUSAN;
	}
	else {
		$jurusan = 0;
	}
        HeaderFooter($pdfku, $nama_sekolah, $jurusan);
        $pdfku->ezStartPageNumbers(146,35,9,'','Halaman {PAGENUM} dari {TOTALPAGENUM} Halaman',1);
        $pdfku->ezSetY(760);
        $pdfku->ezSetDy(-20);
        $data= $this->rankingmodel->cetakData($jenjang,$ID_SEKOLAH);
        if ($jenjang == "smp") {
            $namakolom = "NILAI SEKOLAH";
        }
        elseif ($jenjang == "sma") {
            $namakolom = "NILAI UJIAN NASIONAL";
        }
        else {
            $namakolom = "NILAI TERPADU";
        }

        $cols_db=
        array
        (
            'NO_URUT'=>'NO.',
            'NO_UJIAN'=>'NO. UJIAN',
            'NAMA'=>' NAMA',
            'ASAL_SEKOLAH'=>'ASAL SEKOLAH',
            'NILAI_AKHIR' => $namakolom,
            'PILIHAN' => 'PIL'
        );
        $option_db=
        array
        (
            'showHeadings'=>1,'shaded'=>0,'xPos'=>'center','xOrientation'=>'center','fontSize' => 10,
            'cols'=>array
            (
                'NO_URUT'=>array
                (
                    'justification'=>'center',
                    'width'=>'30'
                ),
                'NO_UJIAN'=>array
                (
                    'justification'=>'center',
                    'width'=>'70'
                ),
                'NAMA'=>array
                (
                    'justification'=>'justify',
                    'width'=>'180'
                ),
                'ASAL_SEKOLAH'=>array
                (
                    'justification'=>'justify',
                    'width'=>'130'
                ),
                'NILAI_AKHIR'=>array
                (
                    'justification'=>'center',
                )
                ,
                'PILIHAN'=>array
                (
                    'justification'=>'center',
                )
            )
        );
        $pdfku->ezTable( $data, $cols_db, '', $option_db);
        $pdfku->addText(390,($pdfku->y)-40,10,"SIDOARJO, 30 JUNI 2014");
        $pdfku->addText(390,($pdfku->y)-53,10,"KEPALA DINAS PENDIDIKAN");
        $pdfku->addText(390,($pdfku->y)-66,10,"KABUPATEN SIDOARJO");
        $pdfku->addText(390,($pdfku->y)-145,10,"<b>Drs. MUSTAIN, M.Pd.I</b>");
        $pdfku->addText(390,($pdfku->y)-157,10,"Pembina Tingkat I");
        $pdfku->addText(390,($pdfku->y)-170,10,"NIP. 19650311 199103 1 006");
        $pdfku->ezStream();
    }

    public function tahap2($jenjang,$ID_SEKOLAH)
    {
        function HeaderFooter(&$dpdf,$nama_sekolah,$jurusan)
        {
            $dpdf->addJpegFromFile("images/sidoarjo.jpg",32,762,60);
            $text = "<b>DAFTAR CALON SISWA YANG DITERIMA TAHAP II</b>";
        $jurus = "PROGRAM KEAHLIAN ".strtoupper($jurusan);
            $school = "DI ".strtoupper($nama_sekolah);
            $tahun = "<b>TAHUN PELAJARAN 2014/2015</b>";
            $all = $dpdf->openObject();
            $dpdf->saveState();
            $dpdf->setStrokeColor(0,0,0,1);
            $dpdf->ezSetY(820);
            $dpdf->ezText($text,15,array('justification'=>'center'));
            $dpdf->ezText($school,15,array('justification'=>'center'));
        if(!empty($jurusan)) {
            $dpdf->ezText($jurus,14,array('justification'=>'center'));
        $dpdf->ezText($tahun,15,array('justification'=>'center'));
        $dpdf->ezSetY(800);
        }
        else {
        $dpdf->ezText($tahun,15,array('justification'=>'center'));
        $dpdf->ezSetY(820);
        }
            $dpdf->restoreState();
            $dpdf->closeObject();
            $dpdf->addObject($all,'all');
        }
        $pdfku = new Cezpdf("A4", 'portrait'); //595.28,841.29
        $pdfku->addInfo('Title','Hasil Rekapitulasi');
        $pdfku->addInfo('Author','PPDB HELPER');
        $pdfku->addInfo('Application','PPDB Online Kabupaten Sidoarjo');
        $pdfku->ezSetCmMargins("3.5","3","3","3");
        $nama_sekolah= $this->rankingmodeltahap2->namaSekolah($ID_SEKOLAH)->NAMA_SEKOLAH;
    if($jenjang == "smk") {
        $jurusan = $this->rankingmodeltahap2->namaSekolah($ID_SEKOLAH)->JURUSAN;
    }
    else {
        $jurusan = 0;
    }
        HeaderFooter($pdfku, $nama_sekolah, $jurusan);
        $pdfku->ezStartPageNumbers(146,35,9,'','Halaman {PAGENUM} dari {TOTALPAGENUM} Halaman',1);
        $pdfku->ezSetY(760);
        $pdfku->ezSetDy(-20);
        $data= $this->rankingmodeltahap2->cetakData($jenjang,$ID_SEKOLAH);
        if ($jenjang == "smp") {
            $namakolom = "NILAI SEKOLAH";
        }
        elseif ($jenjang == "sma") {
            $namakolom = "NILAI UJIAN NASIONAL";
        }
        else {
            $namakolom = "NILAI TERPADU";
        }

        $cols_db=
        array
        (
            'NO_URUT'=>'NO.',
            'NO_UJIAN'=>'NO. UJIAN',
            'NAMA'=>' NAMA',
            'ASAL_SEKOLAH'=>'ASAL SEKOLAH',
            'NILAI_AKHIR' => $namakolom,
            'PILIHAN' => 'PIL'
        );
        $option_db=
        array
        (
            'showHeadings'=>1,'shaded'=>0,'xPos'=>'center','xOrientation'=>'center','fontSize' => 10,
            'cols'=>array
            (
                'NO_URUT'=>array
                (
                    'justification'=>'center',
                    'width'=>'30'
                ),
                'NO_UJIAN'=>array
                (
                    'justification'=>'center',
                    'width'=>'70'
                ),
                'NAMA'=>array
                (
                    'justification'=>'justify',
                    'width'=>'180'
                ),
                'ASAL_SEKOLAH'=>array
                (
                    'justification'=>'justify',
                    'width'=>'130'
                ),
                'NILAI_AKHIR'=>array
                (
                    'justification'=>'center',
                )
                ,
                'PILIHAN'=>array
                (
                    'justification'=>'center',
                )
            )
        );
        $pdfku->ezTable( $data, $cols_db, '', $option_db);
        $pdfku->addText(390,($pdfku->y)-40,10,"SIDOARJO, 3 JULI 2014");
        $pdfku->addText(390,($pdfku->y)-53,10,"KEPALA DINAS PENDIDIKAN");
        $pdfku->addText(390,($pdfku->y)-66,10,"KABUPATEN SIDOARJO");
        $pdfku->addText(390,($pdfku->y)-145,10,"<b>Drs. MUSTAIN, M.Pd.I</b>");
        $pdfku->addText(390,($pdfku->y)-157,10,"Pembina Tingkat I");
        $pdfku->addText(390,($pdfku->y)-170,10,"NIP. 19650311 199103 1 006");
        $pdfku->ezStream();
    }


    public function tahap2_custom($jenjang,$ID_SEKOLAH)
    {
        function HeaderFooter(&$dpdf,$nama_sekolah,$jurusan)
        {
            $dpdf->addJpegFromFile("images/sidoarjo.jpg",32,762,60);
            $text = "<b>DAFTAR CALON SISWA YANG DITERIMA TAHAP II</b>";
        $jurus = "PROGRAM KEAHLIAN ".strtoupper($jurusan);
            $school = "DI ".strtoupper($nama_sekolah);
            $tahun = "<b>TAHUN PELAJARAN 2014/2015</b>";
            $all = $dpdf->openObject();
            $dpdf->saveState();
            $dpdf->setStrokeColor(0,0,0,1);
            $dpdf->ezSetY(820);
            $dpdf->ezText($text,15,array('justification'=>'center'));
            $dpdf->ezText($school,15,array('justification'=>'center'));
        if(!empty($jurusan)) {
            $dpdf->ezText($jurus,14,array('justification'=>'center'));
        $dpdf->ezText($tahun,15,array('justification'=>'center'));
        $dpdf->ezSetY(800);
        }
        else {
        $dpdf->ezText($tahun,15,array('justification'=>'center'));
        $dpdf->ezSetY(820);
        }
            $dpdf->restoreState();
            $dpdf->closeObject();
            $dpdf->addObject($all,'all');
        }
        $pdfku = new Cezpdf("A4", 'portrait'); //595.28,841.29
        $pdfku->addInfo('Title','Hasil Rekapitulasi');
        $pdfku->addInfo('Author','PPDB HELPER');
        $pdfku->addInfo('Application','PPDB Online Kabupaten Sidoarjo');
        $pdfku->ezSetCmMargins("3.5","7","3","3");
        $nama_sekolah= $this->rankingmodeltahap2->namaSekolah($ID_SEKOLAH)->NAMA_SEKOLAH;
    if($jenjang == "smk") {
        $jurusan = $this->rankingmodeltahap2->namaSekolah($ID_SEKOLAH)->JURUSAN;
    }
    else {
        $jurusan = 0;
    }
        HeaderFooter($pdfku, $nama_sekolah, $jurusan);
        $pdfku->ezStartPageNumbers(146,35,9,'','Halaman {PAGENUM} dari {TOTALPAGENUM} Halaman',1);
        $pdfku->ezSetY(760);
        $pdfku->ezSetDy(-20);
        $data= $this->rankingmodeltahap2->cetakData($jenjang,$ID_SEKOLAH);
        if ($jenjang == "smp") {
            $namakolom = "NILAI SEKOLAH";
        }
        elseif ($jenjang == "sma") {
            $namakolom = "NILAI UJIAN NASIONAL";
        }
        else {
            $namakolom = "NILAI TERPADU";
        }

        $cols_db=
        array
        (
            'NO_URUT'=>'NO.',
            'NO_UJIAN'=>'NO. UJIAN',
            'NAMA'=>' NAMA',
            'ASAL_SEKOLAH'=>'ASAL SEKOLAH',
            'NILAI_AKHIR' => $namakolom,
            'PILIHAN' => 'PIL'
        );
        $option_db=
        array
        (
            'showHeadings'=>1,'shaded'=>0,'xPos'=>'center','xOrientation'=>'center','fontSize' => 10,
            'cols'=>array
            (
                'NO_URUT'=>array
                (
                    'justification'=>'center',
                    'width'=>'30'
                ),
                'NO_UJIAN'=>array
                (
                    'justification'=>'center',
                    'width'=>'70'
                ),
                'NAMA'=>array
                (
                    'justification'=>'justify',
                    'width'=>'180'
                ),
                'ASAL_SEKOLAH'=>array
                (
                    'justification'=>'justify',
                    'width'=>'130'
                ),
                'NILAI_AKHIR'=>array
                (
                    'justification'=>'center',
                )
                ,
                'PILIHAN'=>array
                (
                    'justification'=>'center',
                )
            )
        );
        $pdfku->ezTable( $data, $cols_db, '', $option_db);
        $pdfku->addText(390,($pdfku->y)-40,10,"SIDOARJO, 3 JULI 2014");
        $pdfku->addText(390,($pdfku->y)-53,10,"KEPALA DINAS PENDIDIKAN");
        $pdfku->addText(390,($pdfku->y)-66,10,"KABUPATEN SIDOARJO");
        $pdfku->addText(390,($pdfku->y)-145,10,"<b>Drs. MUSTAIN, M.Pd.I</b>");
        $pdfku->addText(390,($pdfku->y)-157,10,"Pembina Tingkat I");
        $pdfku->addText(390,($pdfku->y)-170,10,"NIP. 19650311 199103 1 006");
        $pdfku->ezStream();
    }

    // public function tahap2($jenjang,$ID_SEKOLAH)
    // {
    //     function HeaderFooter(&$dpdf,$nama_sekolah)
    //     {
    //         $dpdf->addJpegFromFile("images/sidoarjo.jpg",36,762,60);
    //         $text = "<b>DAFTAR CALON SISWA YANG DITERIMA TAHAP II</b>";
    //         $school = "DI ".strtoupper($nama_sekolah);
    //         $tahun = "<b>TAHUN AJARAN 2014/2015</b>";
    //         $all = $dpdf->openObject();
    //         $dpdf->saveState();
    //         $dpdf->setStrokeColor(0,0,0,1);
    //         $dpdf->ezSetY(820);
    //         $dpdf->ezText($text,15,array('justification'=>'center'));
    //         $dpdf->ezText($school,15,array('justification'=>'center'));
    //         $dpdf->ezText($tahun,15,array('justification'=>'center'));
    //         $dpdf->restoreState();
    //         $dpdf->closeObject();
    //         $dpdf->addObject($all,'all');
    //     }
    //     $pdfku = new Cezpdf("A4", 'portrait'); //595.28,841.29
    //     $pdfku->addInfo('Title','Hasil Rekapitulasi');
    //     $pdfku->addInfo('Author','PPDB HELPER');
    //     $pdfku->addInfo('Application','PPDB Online Kabupaten Sidoarjo');
    //     $pdfku->ezSetCmMargins("3.5","3","3","3");
    //     $nama_sekolah= $this->rankingmodeltahap2->namaSekolah($ID_SEKOLAH)->NAMA_SEKOLAH;
    //     HeaderFooter($pdfku, $nama_sekolah);
    //     $pdfku->ezStartPageNumbers(146,35,9,'','Halaman {PAGENUM} dari {TOTALPAGENUM} Halaman',1);
    //     $pdfku->ezSetY(760);
    //     $pdfku->ezSetDy(-20);
    //     $data= $this->rankingmodeltahap2->cetakData($jenjang,$ID_SEKOLAH);
    //     if ($jenjang == "smp") {
    //         $namakolom = "N. SEKOLAH";
    //     }
    //     elseif ($jenjang == "sma") {
    //         $namakolom = "N. UN";
    //     }
    //     else {
    //         $namakolom = "N.TERPADU";
    //     }

    //     $cols_db=
    //     array
    //     (
    //         'NO_URUT'=>'NO.',
    //         'NO_UJIAN'=>'NO. UJIAN',
    //         'NAMA'=>' NAMA',
    //         'ASAL_SEKOLAH'=>'ASAL SEKOLAH',
    //         'NILAI_AKHIR' => $namakolom,
    //         'PILIHAN' => 'PIL'
    //     );
    //     $option_db=
    //     array
    //     (
    //         'showHeadings'=>1,'shaded'=>0,'xPos'=>'center','xOrientation'=>'center','fontSize' => 10,
    //         'cols'=>array
    //         (
    //             'NO_URUT'=>array
    //             (
    //                 'justification'=>'center',
    //                 'width'=>'30'
    //             ),
    //             'NO_UJIAN'=>array
    //             (
    //                 'justification'=>'center',
    //                 'width'=>'70'
    //             ),
    //             'NAMA'=>array
    //             (
    //                 'justification'=>'justify',
    //                 'width'=>'200'
    //             ),
    //             'ASAL_SEKOLAH'=>array
    //             (
    //                 'justification'=>'justify',
    //                 'width'=>'130'
    //             ),
    //             'NILAI_AKHIR'=>array
    //             (
    //                 'justification'=>'center',
    //             )
    //             ,
    //             'PILIHAN'=>array
    //             (
    //                 'justification'=>'center',
    //             )
    //         )
    //     );
    //     $pdfku->ezTable( $data, $cols_db, '', $option_db);
    //     $pdfku->addText(390,($pdfku->y)-40,10,"SIDOARJO, 3 JULI 2014");
    //     $pdfku->addText(390,($pdfku->y)-53,10,"KEPALA DINAS PENDIDIKAN");
    //     $pdfku->addText(390,($pdfku->y)-66,10,"KABUPATEN SIDOARJO");
    //     $pdfku->addText(390,($pdfku->y)-145,10,"<b>Drs. MUSTAIN, M.Pd.I</b>");
    //     $pdfku->addText(390,($pdfku->y)-157,10,"Pembina Tingkat I");
    //     $pdfku->addText(390,($pdfku->y)-170,10,"NIP. 19650311 199103 1 006");
    // 	// print_r($pdfku);
    //     $pdfku->ezStream();
    // }

}
