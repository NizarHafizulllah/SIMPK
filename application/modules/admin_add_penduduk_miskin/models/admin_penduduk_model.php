<?php 

class admin_penduduk_model extends CI_Model {


	function admin_penduduk_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"nik",
		 					"nomor_kk",
							"nama",
							"alamat",
							"desa"							 
		 	);


		$this->db->select ( '*' ); 
    	$this->db->from ( 'penduduk p' );
    	$this->db->where ( 'nik NOT IN ( SELECT nik FROM data_kemiskinan WHERE tahun = "'.$tahun.'" )' );
    	$this->db->join ( 'tiger_desa desa', 'desa.id = p.id_desa' , 'left' );
    	$this->db->join ( 'pekerjaan pk', 'pk.id = p.pekerjaan' , 'left' );

		 // $this->db->select('p.*, pekerjaan.pekerjaan as pekerjaan desa.desa as desa')->from("penduduk p");
		 // $this->db->join('tiger_desa desa','p.id_desa=desa.id');
		
		 

		 // if(!empty($nama)) {
		 	// $this->db->like("p.nama",$nama);
		 // }

		 // if($desa!='null') {
		 	// $this->db->like("desa.id",$desa);
		 // }

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('');
		// echo $this->db->last_query(); exit;
 		return $res;
	}


	


}

?>