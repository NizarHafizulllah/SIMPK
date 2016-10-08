<?php 

class klaster_model extends CI_Model {


	function klaster_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"id",
		 					"klaster"						 
		 	);




		 // $this->db->select('p.*, klaster.klaster as klaster desa.desa as desa')->from("penduduk p");
		 // $this->db->join('tiger_desa desa','p.id_desa=desa.id');
		
		 

		 if(!empty($klaster)) {
		 	$this->db->like("klaster",$klaster);
		 }

		 // // if($desa!='null') {
		 // // 	$this->db->like("desa.id",$desa);
		 // // }

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('klaster');
		// echo $this->db->last_query(); exit;
 		return $res;
	}


	


}

?>