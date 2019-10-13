<?php
 class Event extends CI_Controller{
	function __construct(){
		parent::__construct();
			if($this->session->userdata('username') ==""){
           redirect('login');
        };
	
		$this->load->model('m_event');
		$this->load->model('m_halaman');
		$this->load->model('m_user');
		$this->load->library('upload');
	}
	function event(){
		$username = $this->session->userdata('username');
		$x['events']= $this->m_event->get_all_event($username);

		$this->load->view('admin/v_event',$x);	
	}
		function event_berakhir(){
		$username = $this->session->userdata('username');
		$x['events']= $this->m_event->get_event_berakhir($username);

		$this->load->view('admin/v_event',$x);	
	}

	function add_event(){
		$x['hal']=$this->m_halaman->get_all_halaman();
			$x['username'] = $this->session->userdata('username');
		$x['nama'] = $this->session->userdata('nama');
		$this->load->view('admin/tambah_event',$x);
	}
	function simpan_event(){
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

	                        $gambar=$gbr['file_name'];
	                        $judul =$this->input->post('judul');
	                        $deskripsi = $this->input->post('deskripsi');
	                        $jam = $this->input->post('jam');
						$tanggal=$this->input->post('tanggal');
						$status =$this->input->post('status');
					
						$stok_tiket = $this->input->post('stok_tiket');
						$username=$this->session->userdata('username');
							$user=$this->m_user->get_user_login($username);
							$p=$user->row_array();
							$user_id=$p['username'];
							//$user_nama=$p['pengguna_nama'];
						$tgl_buat =date('Y-m-d');
						$this->m_event->simpan_event($judul,$deskripsi,$gambar,$jam,$tanggal,$tgl_buat,$stok_tiket,$user_id);
		//echo $this->session->set_flashdata('msg','success');
						redirect('admin/event/event');

	            		}
	            	}
	}

	function delete_event(){
		$kode=$this->uri->segment(4);
		//$this->m_event->hapus_event($kode);
		$x['data']=$this->m_event->hapus_event($kode);
		//echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/event/event',$x);
	}

	function update_event(){
		$kode = $this->uri->segment(4);
		//$x['hal']=$this->m_halaman->get_all_halaman();
		$x['evt'] =$this->m_event->get_event_by_id($kode);
		$this->load->view('admin/v_edit_event',$x);		

	}

	function edit_event(){
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
	                        $judul =$this->input->post('judul');
	                        $deskripsi = $this->input->post('deskripsi');
	                        $jam = $this->input->post('jam');
						$tanggal=$this->input->post('tanggal');
				
						$stok_tiket = $this->input->post('stok_tiket');
						$username=$this->session->userdata('username');
							$user=$this->m_user->get_user_login($username);
							$p=$user->row_array();
							$user_id=$p['username'];
							//$user_nama=$p['pengguna_nama'];
						$tgl_buat =date('Y-m-d');
						$this->m_event->update_event($id,$judul,$deskripsi,$gambar,$jam,$tanggal,$tgl_buat,$stok_tiket);
		//echo $this->session->set_flashdata('msg','success');
						echo $this->session->set_flashdata('msg','info');
						redirect('admin/event/event');


	}
}
else{
	   $id= $this->input->post('kode');
	                       
	                        $judul =$this->input->post('judul');
	                        $deskripsi = $this->input->post('deskripsi');
	                        $jam = $this->input->post('jam');
						$tanggal=$this->input->post('tanggal');
				
						$stok_tiket = $this->input->post('stok_tiket');
						$username=$this->session->userdata('username');
							$user=$this->m_user->get_user_login($username);
							$p=$user->row_array();
							$user_id=$p['username'];
							//$user_nama=$p['pengguna_nama'];
						$tgl_buat =date('Y-m-d');
						$this->m_event->update_event_tmp_img($id,$judul,$deskripsi,$jam,$tanggal,$tgl_buat,$stok_tiket);
		//echo $this->session->set_flashdata('msg','success');
						echo $this->session->set_flashdata('msg','info');
						redirect('admin/event/event');
}
}
function change_status(){
	   $id= $this->input->post('kode');
	$status=$this->input->post('status');
$this->m_event->ganti_status($kode,$status);

}

}
