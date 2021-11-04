<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_controller extends CI_Controller {


	 function __construct(){
		parent::__construct();
	
		if($this->session->userdata('login') !== TRUE){
			redirect(base_url());
		}
	}

	public function index()
	{
		$data = array(
				'judul' => 'Karyawan',
				'result' => $this->db->get('ms_karyawan')->result_array()
		);
		$this->load->view('karyawan/index',$data);
		

	}
	

	public function create()
	{

		$this->db->select('RIGHT(ms_karyawan.kode_karyawan,5) as kode_karyawan', FALSE);
		$this->db->order_by('kode_karyawan','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('ms_karyawan');
			if($query->num_rows() <> 0){      
				 $data = $query->row_array();
				 $kode = intval($data['kode_karyawan']) + 1; 
			}
			else{      
				 $kode = 1;  
			}
		$batas = str_pad($kode, 5, "0", STR_PAD_LEFT);  

		$data = array(
			'judul' 			=> 'Tambah Karyawan',
			'kode_karyawan' 	=> 'KRY'.$batas
		);
		$this->load->view('karyawan/create',$data);
	 }
	 

	public function store()
	{
			$data = array(
				'kode_karyawan' 	=> htmlentities($this->input->post('kode_karyawan')),
				'nama_karyawan' 	=> htmlentities($this->input->post('nama_karyawan')),
				'alamat_karyawan'	=> htmlentities($this->input->post('alamat_karyawan')),
				'umur_karyawan' 	=> htmlentities($this->input->post('umur_karyawan')),
				'tlp_karyawan'  	=> htmlentities($this->input->post('tlp_karyawan'))
		);

		$this->db->set($data);
		$save = $this->db->insert('ms_karyawan');
		$this->session->set_flashdata('msg','success');
		redirect('karyawan');


	}



	public function edit()
	{
			$result = $this->db->get_where('ms_karyawan',array('id' => $this->uri->segment('3')))->row_array();
			$data = array(
					'id' 				=> $result['id'],
					'kode_karyawan' 	=> $result['kode_karyawan'],
					'nama_karyawan' 	=> $result['nama_karyawan'],
					'alamat_karyawan' 	=> $result['alamat_karyawan'],
					'umur_karyawan' 	=> $result['umur_karyawan'],
					'tlp_karyawan' 	=> $result['tlp_karyawan'],
					'judul' 		=> 'Edit Karyawan'

			);
			$this->load->view('karyawan/edit',$data);
	}
    

    public function update()
    {
		$array = array(
			'kode_karyawan' 	=> htmlentities($this->input->post('kode_karyawan')),
			'nama_karyawan' 	=> htmlentities($this->input->post('nama_karyawan')),
			'alamat_karyawan'	=> htmlentities($this->input->post('alamat_karyawan')),
			'umur_karyawan' 	=> htmlentities($this->input->post('umur_karyawan')),
			'tlp_karyawan'  	=> htmlentities($this->input->post('tlp_karyawan'))
		);

	
		$this->db->set($array);
		$this->db->where('id',$this->input->post('id'));
		$save = $this->db->update('ms_karyawan');
		$this->session->set_flashdata('msg','success');
		redirect(base_url().'karyawan/edit/'.$this->input->post('id'));
	}
	

	public function delete()
	{
		$this->db->delete('ms_karyawan', array('id' =>  $this->uri->segment('3')));
		$this->session->set_flashdata('msg','success');
		redirect('karyawan');  
	}
}
