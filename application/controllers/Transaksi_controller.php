<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_controller extends CI_Controller {


	 function __construct(){
		parent::__construct();
	
		if($this->session->userdata('login') !== TRUE){
			redirect(base_url());
		}
	}

	public function index()
	{
		$this->db->select('tr_trx.*,ms_jenis_trx.jenis_kas');
		$this->db->from('tr_trx');
		$this->db->join('ms_jenis_trx', 'ms_jenis_trx.id = tr_trx.jenis_trx_id');
		$data = array(
				'judul' => 'Transaksi',
				'trxs' => $this->db->get()->result_array()
		);
		$this->load->view('transaksi/index',$data);
		

	}
	

	public function create()
	{

		$this->db->select('RIGHT(tr_trx.kode_trx,5) as kode_trx', FALSE);
		$this->db->order_by('kode_trx','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('tr_trx');
			if($query->num_rows() <> 0){      
				 $data = $query->row_array();
				 $kode = intval($data['kode_trx']) + 1; 
			}
			else{      
				 $kode = 1;  
			}
		$batas = str_pad($kode, 5, "0", STR_PAD_LEFT);  

		$data = array(
			'judul' 	=> 'Tambah Transaksi',
			'kode_trx' 	=> 'TRX'.$batas,
			'jenis_trx' 	=>  $this->db->get('ms_jenis_trx')->result_array()
		);
		$this->load->view('transaksi/create',$data);
	 }
	 

	public function store()
	{
			// var_dump(getBulan(substr($this->input->post('tgl_trx'),5,2)));exit;
			$get_periode_id = $this->db->query("SELECT id FROM ms_periode WHERE bulan_periode = '".getBulan(substr($this->input->post('tgl_trx'),5,2))."' AND tahun_periode='".substr($this->input->post('tgl_trx'),0,4)."'")->row();

			$data = array(
				'kode_trx' 		=> htmlentities($this->input->post('kode_trx')),
				'tgl_trx' 		=> $this->input->post('tgl_trx'),
				'periode_trx_id'=> $get_periode_id->id,
				'jenis_trx_id' 	=> htmlentities($this->input->post('jenis_trx_id')),
				'detail_trx'  	=> htmlentities($this->input->post('detail_trx')),
				'nilai_trx'		=> htmlentities($this->input->post('nilai_trx')),
				'user_create' 	=> $this->session->userdata('user_id')
		);

		$this->db->set($data);
		$save = $this->db->insert('tr_trx');
		$this->session->set_flashdata('msg','success');
		redirect('transaksi');


	}



	public function edit()
	{
			$result = $this->db->get_where('tr_trx',array('id' => $this->uri->segment('3')))->row_array();
			$data = array(
					'id' 			=> $result['id'],
					'kode_trx' 		=> $result['kode_trx'],
					'tgl_trx' 		=> $result['tgl_trx'],
					'jenis_trx_id' 	=> $result['jenis_trx_id'],
					'detail_trx' 	=> $result['detail_trx'],
					'nilai_trx' 	=> $result['nilai_trx'],
					'jenis_trx' 	=>  $this->db->get('ms_jenis_trx')->result_array(),
					'judul' 		=> 'Edit transaksi'

			);
			$this->load->view('transaksi/edit',$data);
	}
    

    public function update()
    {
		$get_periode_id = $this->db->query("SELECT id FROM ms_periode WHERE bulan_periode = '".getBulan(substr($this->input->post('tgl_trx'),5,2))."' AND tahun_periode='".substr($this->input->post('tgl_trx'),0,4)."'")->row();

		$array = array(
			'kode_trx' 		=> htmlentities($this->input->post('kode_trx')),
			'tgl_trx' 		=> $this->input->post('tgl_trx'),
			'periode_trx_id'=> $get_periode_id->id,
			'jenis_trx_id' 	=> htmlentities($this->input->post('jenis_trx_id')),
			'detail_trx'  	=> htmlentities($this->input->post('detail_trx')),
			'nilai_trx'		=> htmlentities($this->input->post('nilai_trx')),
			'user_create' 	=> $this->session->userdata('user_id')
		);

	
		$this->db->set($array);
		$this->db->where('id',$this->input->post('id'));
		$save = $this->db->update('tr_trx');
		$this->session->set_flashdata('msg','success');
		redirect(base_url().'transaksi/edit/'.$this->input->post('id'));
	}
	

	public function delete()
	{
		$this->db->delete('tr_trx', array('id' =>  $this->uri->segment('3')));
		$this->session->set_flashdata('msg','success');
		redirect('transaksi');  
	}
}
