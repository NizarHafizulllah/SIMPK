<?php 
class export_penduduk extends  admin_controller {
 	function export_penduduk() {
		parent::__construct();
 		// $this->load->model("export_penduduk_model","cp");
		// $this->load->model("core_model","cm");
	}

	function index(){
		$data['title'] = "EXPORT Penduduk (EXCEL) ";
		 
	   	$content = $this->load->view($this->controller."_view",$data,true);
		$this->set_title($data['title']);
		$this->set_content($content);
		$this->render();
		//$this->load->view("");
	}


	function excel(){
       // $data_desa = $this->cm->data_desa();

        $this->load->library('Excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Data Penduduk ');

         $arr_kolom = array('a','b','c','d','e','f','g','h','i','j','k','l','m');

        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);        
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(18);  // nik 
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(31); // no kk  
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(40);  // nama 
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(10); // umur
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(18);  // tgl lahir 
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);  // alamat 
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(40);  // rt 
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(5); // rw
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(18);  // hubungan dalam kelurga 
        $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(18);  // Pendidikan
        $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);  
        $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(40);  



         $baris = 1;

        $this->excel->getActiveSheet()->mergeCells('a'.$baris.':L'.$baris);
        $this->excel->getActiveSheet()
                ->setCellValue('A' . $baris, "DATA PENDUDUK ");
       
       $this->format_center($arr_kolom,$baris);
 

        $baris++; 

        


        


        $this->excel->getActiveSheet()->mergeCells('a'.$baris.':L'.$baris);
         $this->excel->getActiveSheet()
                ->setCellValue('A' . $baris, "KABUPATEN SUMBAWA BARAT" );
        $this->format_center($arr_kolom,$baris);

        $baris +=2; 

        

        
          


          // $this->db->select('p.*')
          // $this->db->where("no_kk",$row->no_kk);
           $this->excel->getActiveSheet()
                ->setCellValue('A' . $baris, "NO.")
                ->setCellValue('B' . $baris, "NOMOR KK")
                ->setCellValue('C' . $baris, "NIK")
                ->setCellValue('D' . $baris, "NAMA")
                ->setCellValue('E' . $baris, "UMUR")      
                ->setCellValue('F' . $baris, "TEMPAT LAHIR")
                ->setCellValue('G' . $baris, "TANGGAL LAHIR")
                ->setCellValue('H' . $baris, "ALAMAT")
                ->setCellValue('I' . $baris, "RT")
                ->setCellValue('J' . $baris, "RW")
                ->setCellValue('K' . $baris, "HUBUNGAN DLM. KELUARGA")
                ->setCellValue('L' . $baris, "PENDIDIKAN")
                ->setCellValue('M' . $baris, "PEKERJAAN") ;    
          $this->format_header($arr_kolom,$baris);
          $baris++;

           
           $this->db->select('*')->from('penduduk p')
            ->join('pekerjaan pk','pk.id = p.pekerjaan','left')
            ->join('tiger_desa desa','desa.id = p.id_desa','left')
            ->join('tiger_kecamatan kecamatan','kecamatan.id = p.id_kecamatan','left');

            $resx = $this->db->get();
            // echo $this->db->last_query(); exit;
            $xx = 0;
            foreach($resx->result() as  $rowx) : 
              $xx++;
                 $this->excel->getActiveSheet()
                ->setCellValue('A' . $baris, $xx)
                ->setCellValue('B' . $baris, "$rowx->no_kk")
                ->setCellValue('C' . $baris, "$rowx->nik")
                ->setCellValue('D' . $baris, $rowx->nama)
                ->setCellValue('E' . $baris, $rowx->umur)      
                ->setCellValue('F' . $baris, $rowx->tmp_lahir)
                ->setCellValue('G' . $baris, $rowx->tgl_lahir)
                ->setCellValue('H' . $baris, $rowx->alamat)
                ->setCellValue('I' . $baris, $rowx->rt)
                ->setCellValue('J' . $baris, $rowx->rw)
                ->setCellValue('K' . $baris, $rowx->hubungan_dlm_keluarga)
                ->setCellValue('L' . $baris, $rowx->pendidikan)
                ->setCellValue('M' . $baris, $rowx->pekerjaan) ;  

                $this->format_baris($arr_kolom,$baris);
                $baris++;
            endforeach;

            


        $filename = "LAPORAN DATA PENDUDUK.xls";

        //exit;

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
                     
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');




}
	
	
	
}


?>
