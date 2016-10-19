<?php 
class admin_add_penduduk extends admin_controller{
	var $controller;
	function admin_add_penduduk(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model('admin_penduduk_model','dm');
        $this->load->model("coremodel","cm");
		
		//$this->load->helper("serviceurl");
		
	}


    function cekNIK(){
        $nik = $this->input->post('nik');
        $valid = true;
        $this->db->where('nik', $nik);
        $jumlah = $this->db->get("penduduk")->num_rows();    
        if($jumlah == 1) {
            $valid = false;
        }
        
        echo json_encode(array('valid' => $valid));
    
    }






function index(){
		$data_array=array();

        

        $data_array['arr_kecamatan'] = $this->cm->arr_dropdown3("tiger_kecamatan", "id", "kecamatan", "kecamatan", 'id_kota', '52_7');

		$content = $this->load->view("admin_penduduk_view",$data_array,true);

		$this->set_subtitle("Data Penduduk");
		$this->set_title("Data Penduduk");
		$this->set_content($content);
		$this->cetak();
}


function baru(){
        $data_array=array();

        $data_array['form'] = 'form_simpan';

        $data_array['action'] = 'simpan';
        $data_array['arr_kecamatan'] = $this->cm->arr_dropdown3("tiger_kecamatan", "id", "kecamatan", "kecamatan", 'id_kota', '52_7');
       $data_array['arr_pekerjaan'] = $this->cm->arr_dropdown("pekerjaan", "id", "pekerjaan", "pekerjaan");
       $data_array['arr_jk'] = array(
                            '' => 'Pilih Jenis Kelamin',
                            'l' => 'Laki-laki',
                            'p' => 'Perempuan' );

       $data_array['arr_hubungan'] = array( '' => 'Hubungan Dalam Keluarga',
                                            '1' => 'Kepala Keluarga',
                                            '2' => 'Bukan Kepala Keluarga' );
       $data_array['arr_desa'] = array('' => 'Silahkan Pilih Kecamatan');
       
        $content = $this->load->view($this->controller."_form_view",$data_array,true);

        $this->set_subtitle("Tambah Penduduk");
        $this->set_title("Tambah Penduduk");
        $this->set_content($content);
        $this->cetak();
}




function simpan(){


    $post = $this->input->post();
    
       


        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Nama Penduduk','required');  
        $this->form_validation->set_rules('nik','NIK','callback_cek_nik');    
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required');         
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        $post['tanggal_lahir'] = flipdate($post['tanggal_lahir']);
        
        unset($post['kecamatan']);
        
        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        
        $res = $this->db->insert('penduduk', $post); 
        if($res){
            $arr = array("error"=>false,'message'=>"BERHASIL DISIMPAN");
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DISIMPAN");
        }
}
else {
    $arr = array("error"=>true,'message'=>validation_errors());
}
        echo json_encode($arr);
}





function get_desa(){
    $data = $this->input->post();
    $rs = array('' => 'Pilih Satu', );
    $id_kecamatan = $data['id_kecamatan'];
    $this->db->where("id_kecamatan",$id_kecamatan);
    $this->db->order_by("desa");
    $rs = $this->db->get("tiger_desa");
    echo "<option value='0' selected>- Pilih Desa -</option>";
    foreach($rs->result() as $row ) :
        echo "<option value=$row->id>$row->desa </option>";
    endforeach;


}


    function get_data() {

    	
    	// show_array($userdata);

    	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        $nama = $_REQUEST['columns'][1]['search']['value'];
        $desa = $_REQUEST['columns'][2]['search']['value'];
        $kecamatan = $_REQUEST['columns'][3]['search']['value'];





      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				"nama" => $nama,
                "desa" => $desa,
                "kecamatan" => $kecamatan,
				
				 
		);     
           
        $row = $this->dm->data($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->data($req_param)->result_array();
        


       
        $arr_data = array();
        foreach($result as $row) : 
		// $daft_id = $row['daft_id'];
        $nik = $row['nik'];
            $hapus = "<a href ='#' onclick=\"hapus('$nik')\" class='btn btn-danger btn-xs'><i class='fa fa-trash'></i>Hapus</a>
            <a href ='$this->controller/editdata?nik=$nik' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i>Edit</a>";
        $alamat = $row['alamat'].' Desa/Kel. '.$row['desa'].' Kecamatan '.$row['kecamatan'];
       	
        	 
        	$arr_data[] = array(
        		$row['nik'],
        		$row['nama'],
                $alamat,
                $row['pekerjaan'],    		 
        		$hapus,
        		
         			 
        		  				);
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
    }

    

    function editdata(){
    	 $get = $this->input->get(); 
    	 $nik = $get['nik'];

    	 $this->db->where('nik',$nik);
    	 $rs = $this->db->get('penduduk');
    	 $data = $rs->row_array();

         $data['form'] = 'form_update'; 

         $data['tanggal_lahir'] = flipdate($data['tanggal_lahir']);

         $kecamatan = $data['id_kecamatan'];
       
       $data['arr_kecamatan'] = $this->cm->arr_dropdown3("tiger_kecamatan", "id", "kecamatan", "kecamatan", 'id_kota', '52_7');
       $data['arr_jk'] = array('l' => 'Laki-laki',
                            'p' => 'Perempuan' );

       $data['arr_hubungan'] = array('1' => 'Kepala Keluarga',
                                            '2' => 'Bukan Kepala Keluarga' );
      

       $data['arr_pekerjaan'] = $this->cm->arr_dropdown("pekerjaan", "id", "pekerjaan", "pekerjaan");
       $data['arr_desa'] = $this->cm->arr_dropdown3("tiger_desa", "id", "desa", "desa", "id_kecamatan", $kecamatan);


        $data['action'] = 'update';
         // show_array($data); exit;
    	 
		

    	// $data_array=array(
    	// 		'id' => $data->id,
    	// 		'nama' => $data->nama,
    	// 		'no_siup' => $data->no_siup,
    	// 		'no_npwp' => $data->no_npwp,
    	// 		'no_tdp' => $data->no_tdp,
    	// 		'telp' => $data->telp,
    	// 		'alamat' => $data->alamat,
    	// 		'email' => $data->email,
    	// 		'hp' => $data->hp,

    	// 	);
		$content = $this->load->view("admin_add_penduduk_form_view",$data,true);

         // $content = $this->load->view($this->controller."_form_view",$data,true);

		$this->set_subtitle("Edit Penduduk");
		$this->set_title("Edit Penduduk");
		$this->set_content($content);
		$this->cetak();

    }





 function get_kecamatan(){
    $data = $this->input->post();

    $id_kota = $data['id_kota'];
    $this->db->where("id_kota",$id_kota);
    $this->db->order_by("kecamatan");
    $rs = $this->db->get("tiger_kecamatan");
    foreach($rs->result() as $row ) :
        echo "<option value=$row->id>$row->kecamatan </option>";
    endforeach;


}



function update(){

    $post = $this->input->post();
   
       


        $this->load->library('form_validation');

        $this->form_validation->set_rules('nik','NIK','required');    
        // $this->form_validation->set_rules('p1','Password','callback_cek_passwd2'); 
      
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

       
        $post['tanggal_lahir'] = flipdate($post['tanggal_lahir']);


        $this->db->where("nik",$post['nik']);
        $res = $this->db->update('penduduk', $post); 

        if($res){
            $arr = array("error"=>false,'message'=>"BERHASIL DIUPDATE");
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DIUPDATE");
        }
}
else {
    $arr = array("error"=>true,'message'=>validation_errors());
}
        echo json_encode($arr);
        
}



    function hapusdata(){
    	$get = $this->input->post();
    	$nik = $get['nik'];

    	$data = array('nik' => $nik, );

    	$res = $this->db->delete('penduduk', $data);
        if($res){
            $arr = array("error"=>false,"message"=>"DATA BERHASIL DIHAPUS");
        }
        else {
            $arr = array("error"=>true,"message"=>"DATA GAGAL DIHAPUS ".mysql_error());
        }
    	//redirect('sa_birojasa_user');
        echo json_encode($arr);
    }




    function excel(){
       // $data_desa = $this->cm->data_desa();

        $post = $this->input->get();

        $kecamatan = $post['kecamatan'];
        $desa = $post['desa'];

        $this->load->library('Excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Data Penduduk');

         $arr_kolom = array('a','b','c','d','e','f','g','h','i','j','k','l','m');

        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);   // no     
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);  // nomor_kk 
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20); // nik
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);  // nama 
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // tempat_lahir
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);  // tgl lahir 
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(40);  // alamat 
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(5);  // rt 
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(5); // rw
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);  // hubungan dalam kelurga 
        $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(25);
        $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(10);  // Pekerjaan


        

         $baris = 1;

        $this->excel->getActiveSheet()->mergeCells('a'.$baris.':n'.$baris);
        $this->excel->getActiveSheet()->setCellValue('A' . $baris, "DATA PENDUDUK KABUPATEN SUMBAWA BARAT");
        
        $styleArray = array(
        'font' => array(
            'bold' => true,
            'color' => array('rgb' => '2F4F4F')
        ),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );

        $this->excel->getActiveSheet()->getStyle('a'.$baris.':n'.$baris)->applyFromArray($styleArray);
        
       // $this->format_center($arr_kolom,$baris);
 

        $baris++; 

        


        


        $this->excel->getActiveSheet()->mergeCells('a'.$baris.':n'.$baris);
         $this->excel->getActiveSheet()->setCellValue('A' . $baris, "KABUPATEN SUMBAWA BARAT" );
         $this->excel->getActiveSheet()->getStyle('a'.$baris.':n'.$baris)->applyFromArray($styleArray);
        // $this->format_center($arr_kolom,$baris);

        $baris +=2; 

        

        
          


          // $this->db->select('p.*')
          // $this->db->where("no_kk",$row->no_kk);
           $this->excel->getActiveSheet()
                ->setCellValue('A' . $baris, "NO.")
                ->setCellValue('B' . $baris, "NOMOR KK")
                ->setCellValue('C' . $baris, "NIK")
                ->setCellValue('D' . $baris, "NAMA")    
                ->setCellValue('E' . $baris, "TEMPAT LAHIR")
                ->setCellValue('F' . $baris, "TANGGAL LAHIR")
                ->setCellValue('G' . $baris, "ALAMAT")
                ->setCellValue('H' . $baris, "RT")
                ->setCellValue('I' . $baris, "RW")
                ->setCellValue('J' . $baris, "Desa/Kelurahan")
                ->setCellValue('K' . $baris, "Kecamatan")
                ->setCellValue('L' . $baris, "HUBUNGAN DLM. KELUARGA")
                ->setCellValue('M' . $baris, "PEKERJAAN")  
                ->setCellValue('N' . $baris, "UMUR") ;    
          // $this->format_header($arr_kolom,$baris);
          $baris++;

           
    
           $this->db->select('*')->from('penduduk p')
           ->order_by('nomor_kk')
           ->order_by('hubungan_keluarga')
            ->join('pekerjaan pk','pk.id = p.pekerjaan','left')
            ->join('tiger_desa desa','desa.id = p.id_desa','left')
            ->join('tiger_kecamatan kecamatan','kecamatan.id = p.id_kecamatan','left');

        if($desa!='null'||$desa!=0) {
            $this->db->like("desa.id",$desa);
         }

         if(!empty($kecamatan)) {
            $this->db->like("kecamatan.id",$kecamatan);
         }

            $resx = $this->db->get();
            // echo $this->db->last_query(); exit;
            $xx = 0;
            foreach($resx->result() as  $rowx) : 
              $xx++;

                $alamat = $rowx->alamat.' Desa/Kel. '.$rowx->desa.' Kecamatan '.$rowx->kecamatan;
                    if ($rowx->hubungan_keluarga==1) {
                        $hubungan_keluarga = 'Kepala Keluarga';
                    }else{
                        $hubungan_keluarga = 'Bukan Kepala Keluarga';
                    }

                    $umur = (date('Y') - date('Y',strtotime($rowx->tanggal_lahir)));
                    $this->excel->getActiveSheet()->getStyle('B'.$baris.':C'.$baris)
                    ->getNumberFormat()
                    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

                 $this->excel->getActiveSheet()
                ->setCellValue('A' . $baris, $xx)
                ->setCellValue('B' . $baris, ' '.$rowx->nomor_kk.'')
                ->setCellValue('C' . $baris, ' '.$rowx->nik.'')
                ->setCellValue('D' . $baris, $rowx->nama)      
                ->setCellValue('E' . $baris, $rowx->tempat_lahir)
                ->setCellValue('F' . $baris, flipdate($rowx->tanggal_lahir))
                ->setCellValue('G' . $baris, $rowx->alamat)
                ->setCellValue('H' . $baris, $rowx->rt)
                ->setCellValue('I' . $baris, $rowx->rw)
                ->setCellValue('J' . $baris, $rowx->desa)
                ->setCellValue('K' . $baris, $rowx->kecamatan)
                ->setCellValue('L' . $baris, $hubungan_keluarga)
                ->setCellValue('M' . $baris, $rowx->pekerjaan)
                ->setCellValue('N' . $baris, $umur)  ;

                // $this->format_baris($arr_kolom,$baris);
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


function pdf(){
    $post = $this->input->get(); 
    

    $kecamatan = $post['kecamatan'];
        $desa = $post['desa'];


    $this->db->select('*')->from('penduduk p')
           ->order_by('nomor_kk')
           ->order_by('hubungan_keluarga')
            ->join('pekerjaan pk','pk.id = p.pekerjaan','left')
            ->join('tiger_desa desa','desa.id = p.id_desa','left')
            ->join('tiger_kecamatan kecamatan','kecamatan.id = p.id_kecamatan','left');

    if($desa!='null'||$desa!=0) {
            $this->db->like("desa.id",$desa);
            $data['desa'] = $desa;
         }

    if(!empty($kecamatan)) {
            $this->db->like("kecamatan.id",$kecamatan);
        }

            $resx = $this->db->get();

    if (!empty($kecamatan)) {
        $this->db->where('id', $kecamatan);
        $data_kecamatan = $this->db->get('tiger_kecamatan')->row();
        $data['kecamatan'] = $data_kecamatan->kecamatan;
        // show_array($data_kecamatan);
        // exit();
    }
    if (!empty($desa)) {
        $this->db->where('id', $desa);
        $data_kecamatan = $this->db->get('tiger_desa')->row();
        $data['desa'] = $data_kecamatan->desa;
        // show_array($data_kecamatan);
        // exit();
    }

    $data['controller'] = get_class($this);
    $data['header'] = "data";
    $data['query']  = $resx->result();
    $data['title'] = $data['header'];
    $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
        // $pdf->Orientation('L');
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD  taujago@gmail.com');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);

         // add a page
        $pdf->AddPage('L');

 

         $html = $this->load->view("pdf/pdf_penduduk_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}





}

?>