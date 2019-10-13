<?php
class Excel extends CI_Controller{
	function __construct(){
		parent::__construct();
			if($this->session->userdata('username') ==""){
           redirect('login');
       };
		
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->model('m_penjualan');
        $this->load->model('m_obat');
    }

		function import_excel(){
			//$x['data']=$this->m_chart->chart();
        $x['cp']=$this->m_obat->ntf_capsul();
    $x['bt']=$this->m_obat->ntf_botol();
    $x['tb']=$this->m_obat->ntf_tablet();
    $x['level'] = $this->session->userdata('level');
    $x['nama']=$this->session->userdata('nama');
			$this->load->view('admin/import',$x);
		
	}

  function export_excel(){
 $filter = $this->input->post('fl');
$tgl = $this->input->post('tgl');
$date = $this->input->post('date');
if(!empty($tgl)){
    $x['pjf'] =$this->m_penjualan->get_penjualan_filter($tgl);
    //$x['tgl'] = $tgl;

    $this->load->view('admin/filter_excel',$x);
  }
  else if(!empty($filter)){
    $x['pjf'] =$this->m_penjualan->get_penjualan_periode($filter,$date);
    //$x['filter'] = $filter;
    //$x['date'] = $date;
    $this->load->view('admin/filter_excel',$x); 
  }

}

public function upload(){
         $fileName = $this->input->post('file', TRUE);
         
        $config['upload_path'] = './assets/upload/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
         
        $this->load->library('upload');
        $this->upload->initialize($config);
         
        if(! $this->upload->do_upload('file') ){

        $this->upload->display_errors();
           $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
             }else {
   $media = $this->upload->data();
   $inputFileName = './assets/upload/'.$media['file_name'];
   
   try {
    $inputFileType = IOFactory::identify($inputFileName);
    $objReader = IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
   } catch(Exception $e) {
    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
   }

   $sheet = $objPHPExcel->getSheet(0);
   echo $highestRow = $sheet->getHighestRow();
   echo $highestColumn = $sheet->getHighestColumn();

             
            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                                                 
                //Sesuaikan sama nama kolom tabel di database                                
                 $data = array(
                    "id"=> $rowData[0][0],
                    "nama"=> $rowData[0][1],
                    "gol"=> $rowData[0][2],
                    "type"=> $rowData[0][3],
                    "tgl_kadaluarsa"=>$dates = date('Y-m-d',PHPExcel_Shared_Date::ExcelToPHP($rowData[0][4])),
                 "tgl"=>$dates1 = date('Y-m-d',PHPExcel_Shared_Date::ExcelToPHP($rowData[0][5])),
                   // $dates = date('Y-m-d',PHPExcel_Shared_Date::ExcelToPHP($rowData[0][4])),
                   // $dates1 = date('Y-m-d',PHPExcel_Shared_Date::ExcelToPHP($rowData[0][5)),
                    "stok"=> $rowData[0][6],
                    "harga_jual"=> $rowData[0][7],
                    "harga_beli"=> $rowData[0][8],
                    "id_supplier"=> $rowData[0][9]
                );
                 
                //sesuaikan nama dengan nama tabel
                $insert = $this->db->insert("obat",$data);
                delete_files($media['file_path']);
                     
            }
            if($insert){
  echo $this->session->set_flashdata('msg','success-hapus');  
        redirect('admin/obat/obat');
      }else{
          echo $this->session->set_flashdata('msg','error');  
        redirect('admin/obat/obat');
      }
          
    }
}
 public function upload1(){
  $fileName = $this->input->post('file', TRUE);

  $config['upload_path'] = './upload/'; 
  $config['file_name'] = $fileName;
  $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
  $config['max_size'] = 10000;

  $this->load->library('upload', $config);
  $this->upload->initialize($config); 
  
  if (!$this->upload->do_upload('file')) {
   $error = array('error' => $this->upload->display_errors());
   $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
   redirect('Welcome'); 
  } else {
   $media = $this->upload->data();
   $inputFileName = 'upload/'.$media['file_name'];
   
   try {
    $inputFileType = IOFactory::identify($inputFileName);
    $objReader = IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
   } catch(Exception $e) {
    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
   }

   $sheet = $objPHPExcel->getSheet(0);
   $highestRow = $sheet->getHighestRow();
   $highestColumn = $sheet->getHighestColumn();

   for ($row = 2; $row <= $highestRow; $row++){  
     $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
       NULL,
       TRUE,
       FALSE);
     $data = array(
     "No"=> $rowData[0][0],
     "NamaKaryawan"=> $rowData[0][1],
     "Alamat"=> $rowData[0][2],
     "Posisi"=> $rowData[0][3],
     "Status"=> $rowData[0][4]
    );
    $this->db->insert("tbimport",$data);
   } 
   $this->session->set_flashdata('msg','Berhasil upload ...!!'); 
   redirect('Import');
  }  
 } 
}

?>