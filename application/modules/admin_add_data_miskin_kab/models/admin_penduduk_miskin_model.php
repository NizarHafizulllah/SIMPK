<?php 

class admin_penduduk_miskin_model extends CI_Model {


	function admin_penduduk_miskin_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"id_kab",
		 					"tahun",
							"jumlah"
		 	);
			
		 $this->db->select('d.*, p.nama_kab as kabupaten')->from("data_penduduk_miskin d");
		 $this->db->join('tiger_kabupaten p','p.id=d.id_kab');
		
		 

		 // if(!empty($id)) {
		 	// $this->db->like("p.nama_kab",$id);
		 // }

		 // if($tahun!='null') {
		 	// $this->db->like("kabupaten.id",$tahun);
		 // }

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('');
		// echo $this->db->last_query(); exit;
 		return $res;
	}

	public function delete($var, $val, $table) {
		
		$this->db->where($var, $val);
		$this->db->delete($table);		
		
	}
	
	public function add($table, $data) {
		
		$this->db->insert($table, $data);
		
	}

	


}

?>