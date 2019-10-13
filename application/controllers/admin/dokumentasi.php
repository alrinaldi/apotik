<?php
 class Dokumentasi extends CI_Controller{
	function __construct(){
		parent::__construct();
			if($this->session->userdata('username') ==""){
           redirect('login');
        };
	
		$this->load->model('m_dokumentasi');
		$this->load->model('m_event');
		//$this->load->model('m_halaman');
		$this->load->model('m_user');
		$this->load->library('upload');
	}
	function dokumentasi(){
		$username = $this->session->userdata('username');
		$x['dokumentasi']= $this->m_dokumentasi->get_all_dokumentasi($username);
		$this->load->view('admin/v_dokumentasi.php',$x);	
	}
	function add_dokumentasi(){
		//$x['hal']=$this->m_halaman->get_all_halaman();
		//$status = 'berakhir';
		
			$username = $this->session->userdata('username');
		$x['nama'] = $this->session->userdata('nama');
		$x['status'] = $this->m_event->get_event_berakhir($username);
		$this->load->view('admin/tmbh_dokumentasi',$x);
	}
	function simpan_gallery(){
		$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
	            	$this->upload->initialize($config);
	            	$n = $this->input->post('n');
       					  for ($i=0; $i<=$n-1 ; $i++) { 
	            	if(!empty($_FILES['filefoto'.$i]['name']))
	            	{
	            		if($this->upload->do_upload('filefoto'.$i))
	            		{
	            			 
	            			
	            			 	# code...
	            			 
	            			$gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 710;
	                        $config['height']= 320;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];


	                    
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $foto=$gbr['file_name'];
				
						
						$username=$this->session->userdata('username');
							$user=$this->m_user->get_user_login($username);
							$p=$user->row_array();
							$user_id=$p['username'];
							$id_event -= $this->input->post('id_event');
							//$user_nama=$p['pengguna_nama'];
						
						$this->m_dokumentasi->simpan_dokumentasi($foto,$user_id,$id_event);
					
		echo $this->session->set_flashdata('msg','success');
						redirect('admin/dokumentasi/dokumentasi');

	            		}
	            	}
	            }
	}

	function delete_dokumentasi(){
		$kode=$this->uri->segment(4);
		//$this->m_event->hapus_event($kode);
		$x['data']=$this->m_event->hapus_event($kode);
		//echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/event/event',$x);
	}

	function update_dokumentasi(){
		$kode = $this->uri->segment(4);
		$x['evt'] =$this->m_dokumentasi->get_dokumentasi_by_id($kode);
		$this->load->view('admin/v_edit_event',$x);		

	}

	function edit_dokumentasi(){
			$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
	            	$this->upload->initialize($config);
       					 
	            	if(!empty($_FILES['filefoto']['name']))
	            	{
	            		if($this->upload->do_upload('filefoto'))
	            		{
	            			$gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 710;
	                        $config['height']= 320;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();
	                        $id= $this->input->post('kode');
	                        $gambar=$gbr['file_name'];
	                   
							//$user_nama=$p['pengguna_nama'];
					$foto=$gbr['file_name'];
				
						
						$username=$this->session->userdata('username');
							$user=$this->m_user->get_user_login($username);
							$p=$user->row_array();
							$user_id=$p['username'];
							$id_event -= $this->input->post('id_event');
							//$user_nama=$p['pengguna_nama'];
						
						$this->m_dokumentasi->simpan_dokumentasi($foto,$user_id,$id_event);
		//echo $this->session->set_flashdata('msg','success');
						echo $this->session->set_flashdata('msg','info');
						redirect('admin/dokumentasi/dokumentasi');


	}
}
}

}
