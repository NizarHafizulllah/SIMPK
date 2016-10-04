<?php 
class import_penduduk extends admin_controller{
	var $controller;
	function import_penduduk(){
		parent::__construct();

		$this->controller = get_class($this);
		// $this->load->model('admin_penduduk_model','dm');
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

        

        

		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("Data Penduduk");
		$this->set_title("Data Penduduk");
		$this->set_content($content);
		$this->cetak();
}



function import(){
	$config['upload_path'] = './temp_upload/';
	if(!is_uploaded_file($_FILES['xlsfile']['tmp_name'])) {
			$ret = array("error"=>true,'pesan'=>"error");
			echo json_encode($ret);
		}
	else {
		$full_path = $config['upload_path']. date("dmYhis")."_".$_FILES['xlsfile']['name'];
		copy($_FILES['xlsfile']['tmp_name'],$full_path);
		$this->load->library('excel');

		$objPHPExcel = PHPExcel_IOFactory::load($full_path);
		$arr_data = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);	

		// show_array($arr_data);
		// exit();

		
		$arr_pekerjaan = $this->cm->arr_pekerjaan();
		$arr_pekerjaan = array_flip($arr_pekerjaan);
		$id_kecamatan = 
		$arr_desa = $this->cm->arr_desa();
		$arr_desa = array_flip($arr_desa);
		// show_array($arr_desa);exit;

		$arr_kecamatan = $this->cm->arr_kecamatan();
		$arr_kecamatan = array_flip($arr_kecamatan);

		$i=2;



		$penduduk = array();

		foreach($arr_data   as  $index =>  $data) : 
			//echo "index $index <br />" ;
			//show_array($data);
		// echo $i.'<br />';
		// echo $data[$i]['A'] . '<br />'; 
		// $i++;
		if($index == 1)  continue;

		// $nama_pekerjaan = ;
		// $pekerjaan = ;
		// $id_pekerjaan = $pekerjaan;
		// echo $id_pekerjaan;exit;	

			$penduduk[] = array( 
		"nik"					=>$data['B'],
		"nomor_kk" 				=>$data['C'],
		"nama" 					=>$data['D'],
		"alamat" 				=>$data['E'],
		"rt" 					=>$data['F'],
		"rw" 					=>$data['G'],
		"desa" 					=>$arr_desa[strtoupper($data['H'])],
		"kecamatan" 			=>$arr_kecamatan[strtoupper($data['I'])],
		"jk" 					=>$data['J'],
		"hubungan_keluarga" 	=>$data['K'],
		"tempat_lahir" 			=>$data['L'],
		"tanggal_lahir" 		=>flipdate($data['M']),
		"pekerjaan" 			=>$arr_pekerjaan[strtoupper($data['N'])],
					);

			
			endforeach;
			// show_array($penduduk); exit;

				$xdata = $penduduk;
				// $arr =  array('xdata' => $xdata );
				$this->session->set_userdata('hello', $penduduk);
				// $tes = $this->session->userdata('xdata');
		
		 	// 	show_array($tes); exit;
				// $arrdata['xdata'] = $arr;
				$arrdata['title'] = "IMPORT DATA PENDUDUK";
		 		$arrdata['data'] = $xdata;
		 		$arrdata['controller'] = "penduduk_import";
			   	$content = $this->load->view("ip_review_view",$arrdata,true);
		}

		// show_array($penduduk);
		// exit();

			$this->set_subtitle("Data Penduduk");
			$this->set_title("Data Penduduk");
			$this->set_content($content);
			$this->cetak();

}


function save(){

		
		// $datalogin = $this->session->userdata("data");
		// $tes = $this->session->userdata("hello");
		// show_array($tes); exit;

		// session_start();
		show_array($_POST['data']);exit();
		$post = $this->input->post();
		// $xdata = $datalogin['xdata']; 
		
		$true = 0;
		$false = 0; 

		$arr_berhasil = array();
		$arr_gagal = array();

		foreach($post['data'] as $index) : 
			
			// echo "index $index <br />";
			// show_array($xdata[$index]);
			
					$res = $this->db->insert("penduduk",$xdata[$index]);
					// echo $this->db->last_query()."<br />"; 

					if($res) { 
						$true++;
						$arr_berhasil[] = $xdata[$index]['nik']. " ". $xdata[$index]['nama'];
					}
					else {
					//	echo "error ".$xdata[$index]['nik']. " ". $xdata[$index]['nama']. mysql_error()."<br />";
						$false++;
						$arr_gagal[] = $xdata[$index]['nik']. " ". $xdata[$index]['nama'];
					}
			
		endforeach;




		
		 		$arrdata['berhasil'] = $true;
		 		$arrdata['gagal'] = $false;
		 		$arrdata['arr_berhasil'] = $arr_berhasil;
		 		$arrdata['arr_gagal'] = $arr_gagal;
		 		$arrdata['controller'] = "penduduk_import";
			   	$content = $this->load->view("pi_hasil_view",$arrdata,true);
				$this->set_title("HASIL IMPORT DATA PENDUDUK");
				$this->set_content($content);
				$this->render();
	}



    function coba() {
    	$data1 = array(
    			'1' => '1234',
    			'2' => '1234',
    			'3' => '1234',
    			'4' => '1234',
    		);

    	$data = array(
    			'satu' => $data1,
    			'dua' => 'kambing',
    			'tiga' => 'kambing',
    			'empat' => 'kambing',
    			'df' => $data1,
    			'ssfatsu' => $data1,
    			'safdtu' => $data1,
    			'safdftu' => $data1,
    			'safdfdsertu' => $data1,
    			'satdfdfu' => $data1,

    		);
    	$this->session->set_userdata('coba', $data);


    }

    function tes() {

$tes = $this->session->userdata("hello");
		show_array($tes);
    }

    function tes2() {

    	$this->session->unset_userdata('coba');

    }



}

?>
