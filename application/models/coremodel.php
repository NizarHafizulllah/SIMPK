<?php
class coremodel extends CI_Model {
        function coremodel() {
                parent::__construct();
        }
        
var $arr_bulan = array(1=>"JANUARI","FEBRUARI","MARET","APRIL","MEI","JUNI","JULI",
  "AGUSTUS","SEPTERMBER","OKTOBER","NOVEMBER","DESEMBER");


        function get_arr_leasing(){
                // get data leasing
                $data['method']='get_data_leasing';
                $url = service_url($data);
                
                $xml = file_get_contents($url);
                $arr = xml_to_array($xml);
                echo "<pre>";
                print_r($arr);
                echo "</pre>";
        }

  var  $arr_status =  array(
            0=>"Pilih Status",
            "Level 2",
            "Menunggu Blokir",
            "Gagal Blokir",
            "Berhasil Blokir");

  var  $arr_status2 =  array(
            0=>"- SEMUA STATUS - ",
            "Level 2",
            "Menunggu Blokir",
            "Gagal Blokir",
            "Berhasil Blokir");

        function arr_dropdown($vTable, $vINDEX, $vVALUE, $vORDERBY){
                $this->db->order_by($vORDERBY);
                $res  = $this->db->get($vTable);
		//echo $this->db->last_query(); exit;

                $ret = array();
                $ret = array('' => '- Pilih Satu -', );
                foreach($res->result_array() as $row) : 
                        $ret[$row[$vINDEX]] = $row[$vVALUE];
                endforeach;
                return $ret;

        }




        function arr_dropdown2($vTable, $vINDEX, $vVALUE, $vORDERBY){
                
                // $this->db->where('id', '');
                // $this->db->order_by($vORDERBY);
                $res  = $this->db->get($vTable);
        //echo $this->db->last_query(); exit;

                $ret = array();
                $ret = array('' => '- Pilih Satu -', );
                foreach($res->result_array() as $row) : 
                        $ret[$row[$vINDEX]] = $row[$vVALUE];
                endforeach;
                return $ret;

        }

   function arr_dropdown3($vTable, $vINDEX, $vVALUE, $vORDERBY, $vCONDITION, $vWHERE){
                $this->db->where($vCONDITION, $vWHERE);
                $this->db->order_by($vORDERBY);
                $res  = $this->db->get($vTable);
        //echo $this->db->last_query(); exit;

                $ret = array();
                $ret = array('' => '- Pilih '.$vVALUE.' -', );
                foreach($res->result_array() as $row) : 
                        $ret[$row[$vINDEX]] = $row[$vVALUE];
                endforeach;
                return $ret;

        }


        

        function arr_level() {
                $arr = array(1=>"Level 1","Level 2","Level 3");
                return $arr;
        }

function arr_desa() {
    $arr=array();
    $res = $this->db->get('tiger_desa');
    foreach($res->result() as $row) : 
    //$arr['x'] = " - Semua Kabupaten / kota  - ";
    $arr[$row->id] = strtoupper($row->desa);
    endforeach;
    return $arr;
}

function arr_kecamatan() {
    $arr=array();
    $res = $this->db->get('tiger_kecamatan');
    foreach($res->result() as $row) : 
    //$arr['x'] = " - Semua Kabupaten / kota  - ";
    $arr[$row->id] = strtoupper($row->kecamatan);
    endforeach;
    return $arr;
}

function arr_pekerjaan() {
    $arr=array();
    $this->db->order_by("pekerjaan");
    $res = $this->db->get('pekerjaan');
    foreach($res->result() as $row) : 
    //$arr['x'] = " - Semua Kabupaten / kota  - ";
    $arr[$row->id] = strtoupper($row->pekerjaan);
    endforeach;
    return $arr;
}
 



}
?>
