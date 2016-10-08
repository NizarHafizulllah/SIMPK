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



		// $res = $this->db->query("SELECT p.*, k.klaster
						  // FROM program p
						  // LEFT JOIN klaster k 
						  // ON k.id=p.id_klaster
						  // ORDER BY id asc");
		 $this->db->select('p.*, k.klaster')->from("program p");
		 $this->db->join('klaster k','k.id=p.id_klaster', 'left');
		
		 

		 if(!empty($klaster)) {
		 	$this->db->like("k.klaster",$klaster);
		 }

		 if($program!='null') {
		 	$this->db->like("p.program",$program);
		 }
		 
		 if($tahun!='null') {
		 	$this->db->like("p.tahun",$tahun);
		 }

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('');
		// echo $this->db->last_query(); exit;
 		return $res;
	}


	


}

?>