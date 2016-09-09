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
		$this->set_title("SIMPK");
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
	
	function klaster1() {
		$data_array = array();
		$content = $this->load->view($this->controller."/content/klaster1",$data_array, true);
		
		$this->set_subtitle("Profil Program klaster 1");
		$this->set_title("SIMPK - Profil Program klaster 1");
		$this->set_content($content);
		$this->render();
	}

	function klaster2() {
		$data_array = array();
		$content = $this->load->view($this->controller."/content/klaster2",$data_array, true);
		
		$this->set_subtitle("Profil Program klaster 2");
		$this->set_title("SIMPK - Profil Program klaster 2");
		$this->set_content($content);
		$this->render();
	}
	
	function klaster3() {
		$data_array = array();
		$content = $this->load->view($this->controller."/content/klaster3",$data_array, true);
		
		$this->set_subtitle("Profil Program klaster 3");
		$this->set_title("SIMPK - Profil Program klaster 3");
		$this->set_content($content);
		$this->render();
	}

		function klaster4() {
		$data_array = array();
		$content = $this->load->view($this->controller."/content/klaster4",$data_array, true);
		
		$this->set_subtitle("Profil Program klaster 4");
		$this->set_title("SIMPK - Profil Program klaster 4");
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