<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanbarangmasuk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['barangmasuk_m', 'item_m', 'supplier']);
	}

	public function index()
	{
		$data = [
			'isi' => 'laporan/laporanbarangmasuk/laporanbarangmasuk_form',
			'page' => 'Laporan Barang Masuk',
			'data_barangmasuk' => $this->barangmasuk_m->get()
		];
		$this->load->view('Templates/master_dashboard', $data);
	}

	public function process()
	{
		//! Print preview
	}

}