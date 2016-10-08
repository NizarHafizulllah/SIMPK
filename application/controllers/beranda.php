<?php
class Beranda extends master_controller  {
	var $controller;
	function beranda(){
		$this->controller = get_class($this);
		parent::__construct();
        $this->load->model("coremodel","cm");
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

	function get_grafik() {
		
		$data_array['tahun'] = $this->input->get('tahun');

		$url    = $this->input->get('url');
		
		if($url == 1) {
			$title = 'Data Jumlah Penduduk Miskin';
			$tabel 				 = 'data_penduduk_miskin';
		} else {
			$title = 'Data Jumlah Garis Kemiskinan';						
			$tabel 				 = 'data_garis_miskin';
		}
		
		$data_array['title'] = $title;
		$data_array['kab']     = $this->db->get('tiger_kabupaten')->result();
		$data_array['jml']  = $this->db->where('tahun', $data_array['tahun'])
							                  ->order_by('id_kab', 'ASC')
											  ->get($tabel)
											  ->result();
		// $data_array['jml']  = $this->db->where('tahun', $data_array['tahun'])
		// 					                 ->order_by('id_kab', 'ASC')
		// 								  	 ->get('data_garis_miskin')
		// 									 ->result();
		
		$this->load->view($this->controller."/content/grafik_view",$data_array);
		
	}

	function get_grafik_kec() {

		$value = $this->input->post();

		if(!empty($value['tahun'])) {

			$title  = 'Data Jumlah Kemiskinan Menurut Kecamatan';
			$subtitle  = '';						
			$xaxis  = $this->db->query("SELECT id, kecamatan as title FROM tiger_kecamatan WHERE id_kota = '52_7'")->result();
			$query  = "SELECT tk.kecamatan title, COUNT(dk.nik) jumlah FROM data_kemiskinan dk
					   LEFT JOIN penduduk p on p.nik = dk.nik
					   LEFT JOIN tiger_desa td on td.id = p.id_desa
				   	   LEFT JOIN tiger_kecamatan tk on tk.id = td.id_kecamatan
				       WHERE dk.tahun = ".$value['tahun']."
			           GROUP BY(tk.id)";

		}

		if(!empty($value['tahun']) && !empty($value['id_kecamatan'])) {

			$cek_kec = $this->db->get_where('tiger_kecamatan', array('id' => $value['id_kecamatan']))->row();

			$title  = 'Data Jumlah Kemiskinan Menurut Kecamatan '.$cek_kec->kecamatan;						
			$subtitle  = '';						
			$xaxis  = $this->db->query("SELECT id, desa as title FROM tiger_desa WHERE id_kecamatan = '$value[id_kecamatan]'")->result();
			$query  = "SELECT tk.kecamatan, td.desa  title, COUNT(dk.nik) jumlah FROM data_kemiskinan dk
				       LEFT JOIN penduduk p on p.nik = dk.nik
				       LEFT JOIN tiger_desa td on td.id = p.id_desa
				       LEFT JOIN tiger_kecamatan tk on tk.id = td.id_kecamatan
				       WHERE dk.tahun = ".$value['tahun']."
				       AND tk.id = '".$value['id_kecamatan']."'
				       GROUP BY(td.id)";
		}

		if(!empty($value['tahun']) && !empty($value['id_kecamatan']) && !empty($value['id_desa'])) {

			$cek_desa = $this->db->get_where('tiger_desa', array('id' => $value['id_desa']))->row();

			$title  = 'Data Jumlah Kemiskinan Menurut Kecamatan '.$cek_kec->kecamatan.", Desa ".$cek_desa->desa;						
			$subtitle  = 'RW';						
			$xaxis  = $this->db->query("SELECT rw title FROM penduduk 
							    		WHERE id_desa = '".$value['id_desa']."' 
							    		GROUP BY rw 
							    		ORDER BY rw 
							    		ASC")->result();
			$query  = "SELECT tk.kecamatan, td.desa, p.rw title, COUNT(dk.nik) jumlah FROM data_kemiskinan dk
				       LEFT JOIN penduduk p on p.nik = dk.nik
				       LEFT JOIN tiger_desa td on td.id = p.id_desa
				       LEFT JOIN tiger_kecamatan tk on tk.id = td.id_kecamatan
				       WHERE dk.tahun = ".$value['tahun']."
				       AND tk.id = '".$value['id_kecamatan']."'
				       AND td.id  = '".$value['id_desa']."'
				       GROUP BY(p.rw)";
		}

		if(!empty($value['tahun']) && !empty($value['id_kecamatan']) && !empty($value['id_desa']) && !empty($value['rw'])) {

			$cek_rw = $this->db->query("SELECT * FROM `penduduk` 
										WHERE id_desa = '".$value['id_desa']."' 
										AND rw = ".$value['rw'])->row();

			$title  = 'Data Jumlah Kemiskinan Menurut Kecamatan '.$cek_kec->kecamatan.", Desa ".$cek_desa->desa.", RW ".$cek_rw->rw;						
			$subtitle  = 'RT ';						
			$xaxis  = $this->db->query("SELECT rt title FROM penduduk 
							    		WHERE id_desa = '".$value['id_desa']."'
							    		AND rw = ".$value['rw']." 
							    		GROUP BY rw 
							    		ORDER BY rw 
							    		ASC")->result();
			$query  = "SELECT tk.kecamatan, td.desa, p.rw, p.rt title, COUNT(dk.nik) jumlah FROM data_kemiskinan dk
				       LEFT JOIN penduduk p on p.nik = dk.nik
				       LEFT JOIN tiger_desa td on td.id = p.id_desa
				       LEFT JOIN tiger_kecamatan tk on tk.id = td.id_kecamatan
				       WHERE dk.tahun = ".$value['tahun']."
				       AND tk.id = '".$value['id_kecamatan']."'
				       AND td.id  = '".$value['id_desa']."'
				       GROUP BY(p.rw)";
		}


		$data_array['tahun'] = $value['tahun'];		
		$data_array['subtitle'] = $subtitle;
		$data_array['title'] = $title;						
		$data_array['data']  = $xaxis;
		$data_array['jml'] 	 = $this->db->query($query)->result();
		
		$this->load->view($this->controller."/content/grafik_view_kec",$data_array);
		
	}
	
	function get_grafdon_kec() {
		
		$data_array['tahun'] = $this->input->get('tahun');		
		$data_array['title'] = 'Data Jumlah Garis Kemiskinan';						
		$data_array['kec']   = $this->db->get_where('tiger_kecamatan', array('id_kota' => '52_7'))->result();
		$query				 = "SELECT tk.kecamatan, COUNT(dk.nik) jumlah FROM data_kemiskinan dk
							   LEFT JOIN penduduk p on p.nik = dk.nik
							   LEFT JOIN tiger_desa td on td.id = p.id_desa
							   LEFT JOIN tiger_kecamatan tk on tk.id = td.id_kecamatan
							   WHERE dk.tahun = ".$data_array['tahun']."
							   GROUP BY(tk.id)";
		$data_array['jml']	 = $this->db->query($query)->result();
		
		$this->load->view($this->controller."/content/grafik_donat_kec",$data_array);
		
	}

	
	function grafik($url) {

		if(!$url) {
			redirect('beranda');
		}

		$data_array = array();
		
		
		$content = $this->load->view($this->controller."/content/grafik",$data_array, true);
		
		$this->set_subtitle("Grafik");
		$this->set_title("SIMPK - Grafik");
		$this->set_content($content);
		$this->render();
	}

	function grafik_kec() {
		$data_array = array();
		
        $data_array['arr_kecamatan'] = $this->cm->arr_dropdown3("tiger_kecamatan", "id", "kecamatan", "kecamatan", 'id_kota', '52_7');
		$data_array['arr_desa'] 	 = array('' => '- Pilih Desa -', );
		$data_array['arr_rw'] 		 = array('' => '- Pilih RW -', );

		$content = $this->load->view($this->controller."/content/grafik_kec",$data_array, true);
		
		$this->set_subtitle("Grafik");
		$this->set_title("SIMPK - Grafik");
		$this->set_content($content);
		$this->render();
	}
	

	function klaster() {
		$data_array = array();

		$query = "SELECT p.*, k.klaster 
				  FROM program p 
				  LEFT JOIN klaster k 
				  ON k.id = p.id_klaster 
				  WHERE p.tahun = 2015";

		$data_array['klaster'] = $this->db->query($query)->result();

		$content = $this->load->view($this->controller."/content/klaster",$data_array, true);
		
		$this->set_subtitle("Profil Program");
		$this->set_title("SIMPK - Profil Program");
		$this->set_content($content);
		$this->render();
	}

	function get_klaster() {

		$data_array['tahun'] = $this->input->get('tahun');

		$data_array['title'] = "Profil Program Tahun : ".$data_array['tahun'];
		$query = "SELECT p.*, k.klaster 
				  FROM program p 
				  LEFT JOIN klaster k 
				  ON k.id = p.id_klaster 
				  WHERE p.tahun = ".$data_array['tahun'];

		$data_array['klaster'] = $this->db->query($query)->result();
		
		$this->load->view($this->controller."/content/klaster_view",$data_array);		

	}


	
	function tematik() {
		$data_array = array();
		$content = $this->load->view($this->controller."/content/tematik",$data_array, true);
		
		$this->set_subtitle("Tematik");
		$this->set_title("SIMPK - Tematik");
		$this->set_content($content);
		$this->render();
	}

	function pivot($url) {

		if(!$url) {
			redirect('beranda');
		}

		$data_array = array();
				
		$content = $this->load->view($this->controller."/content/pivot",$data_array, true);
		
		$this->set_subtitle("Pivot");
		$this->set_title("SIMPK - Pivot");
		$this->set_content($content);
		$this->render();
	}
	
	function pivot_kec() {
		$data_array = array();
				
		$content = $this->load->view($this->controller."/content/pivot_kec",$data_array, true);
		
		$this->set_subtitle("Pivot");
		$this->set_title("SIMPK - Pivot");
		$this->set_content($content);
		$this->render();
	}

	function get_pivot() {
		
		$data_array = array();
		$tahun1 = $this->input->get('tahun1');
		$tahun2 = $this->input->get('tahun2');
		$url    = $this->input->get('url');
		
		if($url == 1) {
			$data_array['title'] = 'Data Jumlah Penduduk Miskin';
			$tabel 				 = 'data_penduduk_miskin';
		} else {
			$data_array['title'] = 'Data Jumlah Garis Kemiskinan';						
			$tabel 				 = 'data_garis_miskin';
		}
		
		$query = "SELECT tk.nama_kab, ";
		
		for($x=$tahun1; $x<=$tahun2; $x++) {
			
			$query .="SUM(IF(pm.tahun=".$x.", pm.jumlah, 0)) t".$x.", ";
			
		}
		
		$query = substr($query, 0, strlen($query) - 2);
		
		$query .= " FROM ".$tabel." pm, 
				  tiger_kabupaten tk
				  WHERE pm.id_kab = tk.id
				  GROUP BY(id_kab)";
		
		$data_array['tahun1'] = $tahun1;
		$data_array['tahun2'] = $tahun2;
		$data_array['kab']   = $this->db->get('tiger_kabupaten')->result();
		$data_array['pivot'] = $this->db->query($query)->result();
		
		$content = $this->load->view($this->controller."/content/pivot_view",$data_array);
				
	}

	function get_pivot_kec() {
		
		$data_array = array();
		$tahun1 = $this->input->get('tahun1');
		$tahun2 = $this->input->get('tahun2');
		
		$data_array['title'] = 'Data Jumlah Penduduk Miskin per Kecamatan';						
		
		$query = "SELECT tk.kecamatan, ";
		
		for($x=$tahun1; $x<=$tahun2; $x++) {
			
			$query .="COUNT(CASE WHEN dk.tahun = ".$x." then dk.nik END) t".$x.", ";
			
		}
		
		$query = substr($query, 0, strlen($query) - 2);
		
		$query .= " FROM data_kemiskinan dk
					LEFT JOIN penduduk p on p.nik = dk.nik
					LEFT JOIN tiger_desa td on td.id = p.id_desa
					LEFT JOIN tiger_kecamatan tk on tk.id = td.id_kecamatan
					GROUP BY tk.id";
				
		$data_array['tahun1'] = $tahun1;
		$data_array['tahun2'] = $tahun2;
		$data_array['kec']   = $this->db->get_where('tiger_kecamatan', array('id_kota' => '52_7'))->result();
		$data_array['pivot'] = $this->db->query($query)->result();
		
		$content = $this->load->view($this->controller."/content/pivot_view_kec",$data_array);
				
	}	
	
	function statistik() {
		$data_array = array();
		$content = $this->load->view($this->controller."/content/statistik",$data_array, true);
		
		$this->set_subtitle("Statistik Situs");
		$this->set_title("SIMPK - Statistik Situs");
		$this->set_content($content);
		$this->render();
	}

	function kegiatan($num = null) {
		
		$config['base_url'] = base_url().'index.php/beranda/kegiatan/';
		$config['total_rows'] = $this->db->count_all('kegiatan');
		$config['per_page'] = '12';
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#"><span class="sr-only">(current)</span>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_link']='<span class="glyphicon glyphicon-fast-backward"></span>';
		$config['last_link']='<span class="glyphicon glyphicon-fast-forward"></span>';
		$config['next_link']='<span class="glyphicon glyphicon-step-forward"></span>';
		$config['prev_link']='<span class="glyphicon glyphicon-step-backward"></span>';	

		$this->pagination->initialize($config);
		
		$data_array = array();
		$data_array['halaman'] = $this->pagination->create_links();
		$data_array['query'] = $this->db->get('kegiatan', $config['per_page'],$num)->result();

		$content = $this->load->view($this->controller."/content/kegiatan",$data_array, true);
		
		$this->set_subtitle("Foto Kegiatan");
		$this->set_title("SIMPK - Foto Kegiatan");
		$this->set_content($content);
		$this->render();
	}

	function get_desa() {

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

	function get_rw() {

	    $data = $this->input->post();
	    $rs = array('' => 'Pilih Satu', );
	    $id_desa = $data['id_desa'];
	    $query = "SELECT rw FROM penduduk 
	    		  WHERE id_desa = '$id_desa' 
	    		  GROUP BY rw 
	    		  ORDER BY rw 
	    		  ASC";

	    $rs = $this->db->query($query)->result();

	    echo "<option value='0' selected>Pilih RW</option>";
	    foreach($rs as $row ) :
	        echo "<option value=$row->rw>$row->rw </option>";
	    endforeach;


	}


}
?> 