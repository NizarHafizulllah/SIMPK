<?php 
class Admin_add_penduduk_miskin extends admin_controller{
	var $controller;
	function admin_add_penduduk_miskin(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model('admin_add_penduduk_miskin_model','dm');
		$this->load->model('admin_penduduk_model','adm');
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

		$content = $this->load->view("view",$data_array,true);

		$this->set_subtitle("Data Penduduk Miskin Kabupaten Sumbawa Barat");
		$this->set_title("Data Penduduk Miskin Kabupaten Sumbawa Barat");
		$this->set_content($content);
		$this->cetak();
}


function baru(){
        $data_array=array();

        $data_array['action'] = 'simpan';
		// $data_array['kabupaten'] = $this->db->get("tiger_kabupaten");
        $data_array['arr_kecamatan'] = $this->cm->arr_dropdown3("tiger_kecamatan", "id", "kecamatan", "kecamatan", 'id_kota', '52_7');
       
        $content = $this->load->view("add",$data_array,true);

        $this->set_subtitle("Tambah Data Penduduk Miskin Kabupaten Sumbawa Barat");
        $this->set_title("Tambah Data Penduduk Miskin Kabupaten Sumbawa Barat");
        $this->set_content($content);
        $this->cetak();
}


function cek_email($nik){
    $this->db->where("nik",$nik);
    if($this->db->get("penduduk")->num_rows() > 0)
    {
         $this->form_validation->set_message('cek_nik', ' %s Sudah pernah ditambahkan');
         return false;
    }

}


function simpan(){

    $post 		  = $this->input->post('nik');
		
	foreach($post as $nik) {
		
		$data = array(
	
			'nik'			=> $nik,
			'tahun'			=> $this->input->post('tahun')
		
		);
		$this->db->insert('data_kemiskinan', $data); 
		
	}
	$arr = array("error"=>false,'message'=>"BERHASIL DISIMPAN");

	echo json_encode($arr);
				
	}


function get_desa(){
    $data = $this->input->post();
    $rs = array('' => 'Pilih Satu', );
    $id_kecamatan = $data['id_kecamatan'];
    $this->db->where("id_kecamatan",$id_kecamatan);
    $this->db->order_by("desa");
    $rs = $this->db->get("tiger_desa");
    echo "<option value='0' selected>Pilih Desa</option>";
    foreach($rs->result() as $row ) :
        echo "<option value=$row->id>$row->desa </option>";
    endforeach;


}

function get_nama(){
    $data = $this->input->post();
    $rs = array('' => 'Pilih Satu', );
    $id_desa = $data['id_desa'];
    $this->db->where("id_desa",$id_desa);
    $this->db->order_by("nama");
    $rs = $this->db->get("penduduk");
    echo "<option value='0' selected>Pilih Nama</option>";
    foreach($rs->result() as $row ) :
        echo "<option value=$row->id>$row->nama </option>";
    endforeach;


}


    function get_data() {

    	
    	// show_array($userdata);

    	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        

        $desa = $_REQUEST['columns'][1]['search']['value'];
        $tahun = $_REQUEST['columns'][2]['search']['value'];
        $kecamatan = $_REQUEST['columns'][3]['search']['value'];



        // echo $kabupaten;
        // exit();

        


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,

				"desa" => $desa,
                "tahun" => $tahun,
                "kecamatan" => $kecamatan

				
				 
		);     
           
        $row = $this->dm->data($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
		$result = $this->dm->data($req_param)->result_array();	

        // echo $this->db->last_query();
        // exit();		
       
        $arr_data = array();
        foreach($result as $row) : 
		// $daft_id = $row['daft_id'];
        $nik = $row['nik'];
            $hapus = "<a href ='#' onclick=\"hapus('$nik')\" class='btn btn-danger btn-xs'><i class='fa fa-trash'></i>Hapus</a>
            <!--a href ='$this->controller/editdata?nik=$nik' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i>Edit</a-->";
        $alamat = $row['alamat'].' Desa/Kel. '.$row['desa'].' Kecamatan '.$row['kecamatan'];

             // $select = "<input type='checkbox' name='nik' id='nik' value='$nik'>";   	
        	$arr_data[] = array(
				// $select,
        		$row['tahun'],
        		$row['nik'],
                $row['nama'],
                $alamat,
                $row['pekerjaan'],           
				$hapus
        	);
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
    }

    function get_data2() {

    	
    	// show_array($userdata);

    	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        $desa = $_REQUEST['columns'][1]['search']['value'];
        $nama = $_REQUEST['columns'][2]['search']['value'];
		$tahun = $_REQUEST['columns'][3]['search']['value'];



        // echo $kabupaten;
        // exit();

        


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				"desa" => $desa,
				"nama" => $nama,
                "tahun" => $tahun,
				
				 
		);     
           
        $row = $this->adm->data($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          

			$result = $this->adm->data($req_param)->result_array();

        // echo $this->db->last_query();
        // exit();

       
        $arr_data = array();
        foreach($result as $row) : 
		// $daft_id = $row['daft_id'];
        $nik = $row['nik'];
            // $hapus = "<a href ='#' onclick=\"hapus('$nik')\" class='btn btn-danger btn-xs'><i class='fa fa-trash'></i>Hapus</a>
            // <a href ='$this->controller/editdata?nik=$nik' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i>Edit</a>";
             $select = "<input type='checkbox' name='nik[]' id='nik' value='$nik'>";  
						
        	$arr_data[] = array(
				$select,
        		$row['nik'],
                $row['nama'],     		
                $row['alamat'],     		
                $row['pekerjaan'],    		
                $row['desa']    		
        	);
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
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






    function hapusdata(){
    	$get = $this->input->post();
    	$nik = $get['nik'];

    	$data = array('nik' => $nik, );

    	$res = $this->db->delete('data_kemiskinan', $data);
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

        $post = $this->input->get();

        $tahun = $post['tahun'];
        $kecamatan = $post['kecamatan'];
        $desa = $post['desa'];

        $this->load->library('Excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Data Penduduk Miskin');

         $arr_kolom = array('a','b','c','d','e','f','g','h','i','j','k','l','m');

        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);   // no     
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(31);  // nomor_kk 
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(18); // nik
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(40);  // nama 
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(40); // tempat_lahir
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

        $this->excel->getActiveSheet()->mergeCells('a'.$baris.':K'.$baris);
        $this->excel->getActiveSheet()->setCellValue('A' . $baris, "DATA PENDUDUK MISKIN");
       
       // $this->format_center($arr_kolom,$baris);
 
        $baris++; 

        $this->excel->getActiveSheet()->mergeCells('a'.$baris.':K'.$baris);
         $this->excel->getActiveSheet()->setCellValue('A' . $baris, "KABUPATEN SUMBAWA BARAT" );
        // $this->format_center($arr_kolom,$baris);

            $this->db->select ( '*' ); 
            $this->db->from ( 'data_kemiskinan dk' )
            ->order_by('dk.tahun', 'ASC')
            ->join ( 'penduduk p', 'dk.nik=p.nik' , 'left' )
            ->join ( 'tiger_kecamatan kecamatan', 'kecamatan.id = p.id_kecamatan' , 'left' )
            ->join ( 'tiger_desa desa', 'desa.id = p.id_desa' , 'left' )
            ->join ( 'pekerjaan pk', 'pk.id = p.pekerjaan' , 'left' );
        
         if(!empty($tahun)) {
            $this->db->like("dk.tahun",$tahun);
         }

         if(!empty($kecamatan)) {
            $this->db->like("kecamatan.id",$kecamatan);
         }

         if($desa!='null'||$desa!=0) {
            $this->db->like("desa.id",$desa);
         }

            $resx = $this->db->get();
            // echo $this->db->last_query(); exit;

            $xx = 0;
            $a = 0;
           foreach($resx->result() as  $rowx) : 
              $xx++;
                $baris++; 
                if($rowx->tahun != $a) {
                $baris++; 

                $this->excel->getActiveSheet()->mergeCells('a'.$baris.':K'.$baris);
                 $this->excel->getActiveSheet()->setCellValue('A' . $baris, "TAHUN : ".$rowx->tahun);
                // $this->format_center($arr_kolom,$baris);

                $baris ++; 

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
                        ->setCellValue('N' . $baris, "UMUR");   
                  // $this->format_header($arr_kolom,$baris);
                    $baris++;
                    $xx=1;
                } else {
                }

                  // $baris++;

                $alamat = $rowx->alamat.' Desa/Kel. '.$rowx->desa.' Kecamatan '.$rowx->kecamatan;
                    if ($rowx->hubungan_keluarga==1) {
                        $hubungan_keluarga = 'Kepala Keluarga';
                    }else{
                        $hubungan_keluarga = 'Bukan Kepala Keluarga';
                    }

                    $umur = (date('Y') - date('Y',strtotime($rowx->tanggal_lahir)));
                    

                 $this->excel->getActiveSheet()
                ->setCellValue('A' . $baris, $xx)
                ->setCellValue('B' . $baris, $rowx->nomor_kk)
                ->setCellValue('C' . $baris, $rowx->nik)
                ->setCellValue('D' . $baris, $rowx->nama)      
                ->setCellValue('E' . $baris, $rowx->tempat_lahir)
                ->setCellValue('F' . $baris, $rowx->tanggal_lahir)
                ->setCellValue('G' . $baris, $rowx->alamat)
                ->setCellValue('H' . $baris, $rowx->rt)
                ->setCellValue('I' . $baris, $rowx->rw)
                ->setCellValue('J' . $baris, $rowx->desa)
                ->setCellValue('K' . $baris, $rowx->kecamatan)
                ->setCellValue('L' . $baris, $hubungan_keluarga)
                ->setCellValue('M' . $baris, $rowx->pekerjaan)
                ->setCellValue('N' . $baris, $umur);

                $a = $rowx->tahun;

                // $this->format_baris($arr_kolom,$baris);
                // $baris++;
            endforeach;

        $title = "";


        //title
        if(!empty($tahun)) {
            $title = $tahun;
        }

        if(!empty($tahun) && !empty($kecamatan) || !empty($kecamatan)) {
            $title = $tahun.$rowx->kecamatan;
        }

        if(!empty($tahun) && !empty($kecamatan) && !empty($desa) || !empty($kecamatan) && !empty($desa)) {
            $title = $tahun.$rowx->kecamatan.$rowx->desa;
        }

        $filename = "LAPORAN DATA PENDUDUK MISKIN ".$title.".xls";

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