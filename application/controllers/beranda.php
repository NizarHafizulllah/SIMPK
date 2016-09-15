<?php
class Beranda extends master_controller  {
	var $controller;
	function beranda(){
		$this->controller = get_class($this);
		parent::__construct();
	}
	
	
	function index(){
		$data_array = array();
		$content = $this->load->view($this->controller."/content/welcome",$data_array, true);
		
		$this->set_subtitle("Beranda");
		$this->set_title("SIMPK - Sistem Informasi Pengentasan Kemiskinan");
		$this->set_content($content);
		$this->render();
	}
	
	function profil_daerah() {
		$data_array = array();
		$content = $this->load->view($this->controller."/content/profil_daerah",$data_array, true);
		
		$this->set_subtitle("Profil Dearah");
		$this->set_title("SIMPK - Profil Dearah");
		$this->set_content($content);
		$this->render();
	}

		function datamart() {
		$data_array = array();
		$content = $this->load->view($this->controller."/content/datamart",$data_array, true);
		
		$this->set_subtitle("Datamart");
		$this->set_title("SIMPK - Datamart");
		$this->set_content($content);
		$this->render();
	}

	// function grafik() {
		// $data_array = array();
		
		// $data_array['tahun'] = $this->input->get('tahun');
		
		// $data_array['kab']  = $this->db->get('tiger_kabupaten')->result();
		// $data_array['jml']  = $this->db->where('tahun', $data_array['tahun'])
							  // ->order_by('id_kab', 'ASC')
							  // ->get('data_penduduk_miskin')
							  // ->result();
		
		// $content = $this->load->view($this->controller."/content/grafik",$data_array, true);
		
		// $this->set_subtitle("Grafik");
		// $this->set_title("SIMPK - Grafik");
		// $this->set_content($content);
		// $this->render();
	// }

	function grafik_penduduk_miskin() {
		$data_array = array();
		
		$data_array['tahun'] = $this->input->get('tahun');
		
		$data_array['kab']  = $this->db->get('tiger_kabupaten')->result();
		$data_array['jml']  = $this->db->where('tahun', $data_array['tahun'])
							  ->order_by('id_kab', 'ASC')
							  ->get('data_penduduk_miskin')
							  ->result();
		
		$content = $this->load->view($this->controller."/content/grafik",$data_array, true);
		
		$this->set_subtitle("Grafik");
		$this->set_title("SIMPK - Grafik");
		$this->set_content($content);
		$this->render();
	}

	function grafik_garis_miskin() {
		$data_array = array();
		
		$data_array['tahun'] = $this->input->get('tahun');
		
		$data_array['kab']  = $this->db->get('tiger_kabupaten')->result();
		$data_array['jml']  = $this->db->where('tahun', $data_array['tahun'])
							  ->order_by('id_kab', 'ASC')
							  ->get('data_garis_miskin')
							  ->result();
		
		$content = $this->load->view($this->controller."/content/grafik",$data_array, true);
		
		$this->set_subtitle("Grafik");
		$this->set_title("SIMPK - Grafik");
		$this->set_content($content);
		$this->render();
	}

	
	function klaster() {
		$data_array = array();
		$content = $this->load->view($this->controller."/content/klaster1",$data_array, true);
		
		$this->set_subtitle("Profil Program");
		$this->set_title("SIMPK - Profil Program");
		$this->set_content($content);
		$this->render();
	}


	
	function tematik() {
		$data_array = array();
		$content = $this->load->view($this->controller."/content/tematik",$data_array, true);
		
		$this->set_subtitle("Tematik");
		$this->set_title("SIMPK - Tematik");
		$this->set_content($content);
		$this->render();
	}

	function Pivot() {
		$data_array = array();
		$content = $this->load->view($this->controller."/content/pivot",$data_array, true);
		
		$this->set_subtitle("Pivot");
		$this->set_title("SIMPK - Pivot");
		$this->set_content($content);
		$this->render();
	}

	function statistik() {
		$data_array = array();
		$content = $this->load->view($this->controller."/content/statistik",$data_array, true);
		
		$this->set_subtitle("Statistik Situs");
		$this->set_title("SIMPK - Statistik Situs");
		$this->set_content($content);
		$this->render();
	}

	function kegiatan() {
		$data_array = array();
		$content = $this->load->view($this->controller."/content/kegiatan",$data_array, true);
		
		$this->set_subtitle("Foto Kegiatan");
		$this->set_title("SIMPK - Foto Kegiatan");
		$this->set_content($content);
		$this->render();
	}


}
?> 