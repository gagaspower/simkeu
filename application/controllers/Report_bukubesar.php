<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_bukubesar extends CI_Controller {


	 function __construct(){
		parent::__construct();
	
		if($this->session->userdata('login') !== TRUE){
			redirect(base_url("/"));
		}
	}

	public function index()
	{


		
		$data=array(
			'judul' 	=> 'Buku Besar',
			'periode' 	=> $this->db->query("SELECT * FROM ms_periode")->result_array()
	);
		$this->load->view('buku_besar/index',$data);

	}
	

	public function getreport()
	{

		$sql = "SELECT
		a.tgl_trx,
		a.detail_trx,
		a.kode_trx,
		a.debit,
		a.kredit
		FROM (
			(
				
				SELECT tgl_trx,
							detail_trx,
							kode_trx,
							nilai_trx as debit,
							0 as kredit
							
				FROM 
				tr_trx
				WHERE periode_trx_id = '".$this->input->post('periode_id')."'
				AND jenis_trx_id = 1
			
			)
	
			UNION ALL 
			(
			
					SELECT tgl_trx,
							detail_trx,
							kode_trx,
							0 as debit,
							nilai_trx as kredit
							
				FROM 
				tr_trx
				WHERE periode_trx_id = '".$this->input->post('periode_id')."'
				AND jenis_trx_id = 2
			)


		) AS a ORDER BY tgl_trx asc";


		$debit = " SELECT SUM(nilai_trx) AS total_debit
					FROM 
					tr_trx
					WHERE periode_trx_id = '".$this->input->post('periode_id')."'
					AND jenis_trx_id = 1";

		$kredit = "SELECT  SUM(nilai_trx) AS total_kredit
					FROM 
					tr_trx
					WHERE periode_trx_id = '".$this->input->post('periode_id')."'
					AND jenis_trx_id = 2";

		$data = $this->db->query($sql)->result_array();
		$debit = $this->db->query($debit)->row();
		$kredit = $this->db->query($kredit)->row();
		$saldo_akhir_debit =  $debit->total_debit - $kredit->total_kredit;
		$periode = $this->db->query("SELECT * FROM ms_periode WHERE id = '".$this->input->post('periode_id')."'")->row();
		echo json_encode(['item' => $data, 'total_debit' => $debit->total_debit, 'total_kredit' => $kredit->total_kredit,'saldo_akhir_debit' => $saldo_akhir_debit, 'periode' => $periode]);

	}


}
