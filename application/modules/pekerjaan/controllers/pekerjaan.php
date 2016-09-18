<?php 
class pekerjaan extends admin_controller{
	var $controller;
	function pekerjaan(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model('pekerjaan_model','dm');
        $this->load->model("coremodel","cm");
		
		//$this->load->helper("serviceurl");
		
	}


function index(){
		$data_array=array();

        

        $data_array['arr_kecamatan'] = $this->cm->arr_dropdown3("tiger_kecamatan", "id", "kecamatan", "kecamatan", 'id_kota', '52_7');

		$content = $this->load->view("pekerjaan_view",$data_array,true);

		$this->set_subtitle("Pekerjaan");
		$this->set_title("Pekerjaan");
		$this->set_content($content);
		$this->cetak();
}


function baru(){
        $data_array=array();

        $data_array['action'] = 'simpan';
        $data_array['arr_kecamatan'] = $this->cm->arr_dropdown3("tiger_kecamatan", "id", "kecamatan", "kecamatan", 'id_kota', '52_7');
       $data_array['arr_pekerjaan'] = $this->cm->arr_dropdown("pekerjaan", "id", "pekerjaan", "pekerjaan");
       
        $content = $this->load->view($this->controller."_form_view",$data_array,true);

        $this->set_subtitle("Tambah Penduduk");
        $this->set_title("Tambah Penduduk");
        $this->set_content($content);
        $this->cetak();
}





function simpan(){


    $post = $this->input->post();
    
       


        $this->load->library('form_validation');
        $this->form_validation->set_rules('pekerjaan','Nama Pekerjaan','required');  
              
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

       
        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        
        $res = $this->db->insert('pekerjaan', $post); 
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




    function get_data() {

    	
    	// show_array($userdata);

    	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        $pekerjaan = $_REQUEST['columns'][1]['search']['value'];





      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
                "pekerjaan" => $pekerjaan,
				
				 
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
        $id = $row['id'];
            $hapus = "<a href ='#' onclick=\"hapus('$id')\" class='btn btn-danger btn-xs'><i class='fa fa-trash'></i>Hapus</a>
            <a href ='$this->controller/editdata?id=$id' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i>Edit</a>";
       	
        	 
        	$arr_data[] = array(
        		$row['id'],
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

    

    function editdata(){
    	 $get = $this->input->get(); 
    	 $nik = $get['nik'];

    	 $this->db->where('nik',$nik);
    	 $rs = $this->db->get('penduduk');
    	 $data = $rs->row_array();

         $data['tanggal_lahir'] = flipdate($data['tanggal_lahir']);

       
       $data['arr_kecamatan'] = $this->cm->arr_dropdown("tiger_kecamatan", "id", "kecamatan", "kecamatan");
       $data_array['arr_pekerjaan'] = $this->cm->arr_dropdown("pekerjaan", "id", "pekerjaan", "pekerjaan");
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
    	$id = $get['id'];

    	$data = array('id' => $id, );

    	$res = $this->db->delete('pekerjaan', $data);
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