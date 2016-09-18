<?php 

class pekerjaan_model extends CI_Model {


	function pekerjaan_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"id",
		 					"pekerjaan"						 
		 	);




		 // $this->db->select('p.*, pekerjaan.pekerjaan as pekerjaan desa.desa as desa')->from("penduduk p");
		 // $this->db->join('tiger_desa desa','p.id_desa=desa.id');
		
		 

		 if(!empty($pekerjaan)) {
		 	$this->db->like("pekerjaan",$pekerjaan);
		 }

		 // // if($desa!='null') {
		 // // 	$this->db->like("desa.id",$desa);
		 // // }

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('pekerjaan');
		// echo $this->db->last_query(); exit;
 		return $res;
	}


	


}

?>