<?php 
class Admin_add_data_miskin_kab extends admin_controller{
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

        

        // $data_array['arr_kabupaten'] = $this->cm->arr_dropdown2("tiger_kabupaten", "id", "kecamatan", "kecamatan");

		$content = $this->load->view("view",$data_array,true);

		$this->set_subtitle("Data Penduduk");
		$this->set_title("Data Penduduk");
		$this->set_content($content);
		$this->cetak();
}


function baru(){
        $data_array=array();

        $data_array['action'] = 'simpan';
		// $data_array['kabupaten'] = $this->db->get("tiger_kabupaten");
       // $data_array['arr_kecamatan'] = $this->cm->arr_dropdown2("tiger_kecamatan", "id", "kecamatan", "kecamatan");
       
        $content = $this->load->view("add",$data_array,true);

        $this->set_subtitle("Tambah Data Miskin");
        $this->set_title("Tambah Data Miskin");
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

function cek_passwd($p1){
    $p2 = $this->input->post('p2');

    if(empty($p1) or empty($p2)){
         $this->form_validation->set_message('cek_passwd', ' %s harus diisi');
         return false;
    }
    if($p1 <> $p2) {
        $this->form_validation->set_message('cek_passwd', ' %s tidak sama');
         return false;
    }
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
    echo "<option value='0' selected>Pilih Desa</option>";
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


        


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				"nama" => $nama,
                "desa" => $desa,
				
				 
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
                	
        	 
        	$arr_data[] = array(
        		$row['nik'],
        		$row['nomor_kk'],
        		$row['nama'],
                $row['alamat'],
                $row['desa'],      		 
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

    

    function editdata(){
    	 $get = $this->input->get(); 
    	 $nik = $get['nik'];

    	 $this->db->where('nik',$nik);
    	 $rs = $this->db->get('penduduk');
    	 $data = $rs->row_array();

         $data['tanggal_lahir'] = flipdate($data['tanggal_lahir']);

       
       $data['arr_kecamatan'] = $this->cm->arr_dropdown("tiger_kecamatan", "id", "kecamatan", "kecamatan");
       $data['arr_desa'] = $this->cm->arr_dropdown("tiger_desa", "id", "desa", "desa");


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

		$this->set_subtitle("Edit Pengepul");
		$this->set_title("Edit Pengepul");
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

        $this->form_validation->set_rules('nama','Nama Pengguna','required');    
        $this->form_validation->set_rules('nomor_hp','Nomor HP','required');   
        $this->form_validation->set_rules('p1','Password','callback_cek_passwd2'); 
        // $this->form_validation->set_rules('email','Email','callback_cek_email');   
        // $this->form_validation->set_rules('email','Email','callback_cek_email');    
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required');         
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 




        if(!empty($post['p1']) or !empty($post['p2'])) {
            $post['password'] = md5($post['p1']);
        }
        
        unset($post['p1']);
        unset($post['p2']);




        $this->db->where("id",$post['id']);
        $res = $this->db->update('pengguna', $post); 
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


}

?>