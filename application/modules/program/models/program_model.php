<?php 

class program_model extends CI_Model {


	function program_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"id",
		 					"klaster",
							"program",
							"keterangan",
							"tahun"
		 	);




		 $this->db->select('p.*, k.klaster')->from("program p");
		 $this->db->join('klaster k','k.id=p.id_klaster', 'left');
		
		 

		 if(!empty($program)) {
		 	$this->db->like("program",$program);
		 }

		 // // if($desa!='null') {
		 // // 	$this->db->like("desa.id",$desa);
		 // // }

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('program');
		// echo $this->db->last_query(); exit;
 		return $res;
	}


	


}

?>